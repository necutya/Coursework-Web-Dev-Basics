<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MainController extends Controller
{
    /* Return welcome view */
    public function welcome(){
        return view('welcome');
    }

    /* Return landing view */
    public function landing(){
        $random_products = Product::all()->random(3);
        return view('landing', compact('random_products'));
    }

    /* Return info view */
    public function info(){
        return view('info');
    }

    /* Return a view with a product */
    public function item($item_id){
        $item = Product::findOrFail($item_id);
        return view('item', compact('item'));
    }

    /* Return catalog view with products */
    public function catalog(){
        $products = Product::paginate(16);
        return view('catalog', compact('products'));
    }

    /* Return catalog view with products of certain collection*/
    public function catalogCollection($collection){
        $products = Collection::findOrFail($collection)->products()->paginate(8);
        return view('catalog', compact('products'));
    }

    /* Add to basket */
    public function addToBasket($item_id) {
        $item = Product::findOrFail($item_id);

        /* Using session to store basket info*/

        /* Check if session variables are set*/
        if(!Session::has('order')) {
            /* Use key as a hash in order to avoid collisions */
            Session::put('order', [Str::random(8) => $item]);
            Session::put('order_sum', $item->price);
        }
        else {
            $order_sum = Session::get('order_sum');
            $order_list =  Session::get('order');
            $order_list += [Str::random(8) => $item];

            Session::put('order', $order_list);
            Session::put('order_sum', $order_sum + $item->price);
        }
        return redirect()->back()->with('success', 'Йоу! Річ була успішно додана');
    }

    /* Unset basket item*/
    public function unsetBasketItem($item_hash) {

        /* Unset session variables */
        if(Session::has('order')){
            $order_list = Session::get('order');

            if(count( $order_list) === 1) {
                Session::forget('order');
                Session::forget('order_sum');
            }

            else {
                $order_sum = Session::get('order_sum');
                Session::put('order_sum', $order_sum - $order_list[$item_hash]->price);

                unset($order_list[$item_hash]);
                Session::put('order', $order_list);

            }
        }

        return redirect()->back()->with('success', 'Річ була видалена:(');
    }
}
