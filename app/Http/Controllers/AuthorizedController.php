<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\SendOrderMessage;
use App\Mail\SendSubscriptionMessage;
use App\Subscription;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthorizedController extends Controller
{

    /* Return account history with orders history*/
    public function account(){
        $products_history = array();
        foreach (Auth::user()->orders->where('confirmed', 1) as $order) {
            foreach ($order->products as $product) {
                array_push($products_history, $product);
            }
        }
        return view('account', compact('products_history'));
    }


    /* Subscription user to the newsletter */
    public function subscribe(){
        $user_id = Auth::user()->id;
        Subscription::create([
            'user_id' => $user_id]);
        return redirect()->back()->with('success', 'Ви успішно підписались на розсилку');
    }


    /* Unsubscription user to the newsletter */
    public function unsubscribe(){
        Subscription::where('user_id', Auth::user()->id)->delete();
        return redirect()->back()->with('success', 'Ви успішно відписались від розсилки');
    }


    /* Change account settings */
    public function changeAccountSettings(Request $request) {
        Auth::user()->update([
            'name'=>$request->name_settings,
            'email'=>$request->email_settings,
            'phone'=>$request->phone_settings,
            'country'=>$request->country_settings,
            'city'=>$request->city_settings,]);
        return redirect('account')->with('success', 'Дані були успішно змінені');
    }

    /* Return basket view */
    public function basket(){
        return view('basket');
    }

    /* Return order view*/
    public function orderForm(){
        return view('order');
    }

    /* Make an order and insert it into DB */
    public function order(OrderRequest $request){

        $user_id = Auth::user()->id;
        $order = Order::create([
            'user_id' => $user_id,
            'name' => $request->name_order,
            'email' => $request->email_order,
            'phone' => $request->phone_order,
            'country' => $request->country_order,
            'city' => $request->city_order,
            'post_type' => $request->delivery_order,
            'department' => $request->department_order,
            'price' => Session::get('order_sum'),
            'comment' => $request->comment_order,
            'payment_type' => $request->payment_type_order,
            'confirmed' => false,
        ]);


        foreach (Session::get('order') as $product) {
            \DB::table('order_product')->insert ([
              ['order_id' => $order->id,
               'product_id' =>$product->id]
            ]);
        }

        /* Unset session variables */
        Session::forget('order');
        Session::forget('order_sum');
        Session::save();

        /* Send mail to order owner, notify user and redirect him back*/
        Mail::to(Auth::user()->email)->send(new SendOrderMessage(Auth::user()->name));
        session()->flash('success', 'Ваше замолвлення було успішно виконано. Очікуйте інформацію на пошту.');
        return view('landing');
    }

}
