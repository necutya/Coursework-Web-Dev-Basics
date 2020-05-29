<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Requests\AddItemRequest;
use App\Http\Requests\ChangeItemRequest;
use App\Order;
use App\Product;
use App\ProductsPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOption\None;

class AdminController extends Controller
{
    /*Add-item page*/
    public function addItemForm(){
        return view('admin.add', ['title'=>'Add new clothes']);
    }

    /*Add item*/
    public function addItem(AddItemRequest $request){

        // Add collection if it is needed
         if ($request->collection) {
             if(!$collection_item = Collection::where("name",$request->collection)->first()) {
                 $collection_item = Collection::create(['name' => $request->collection]);
                 $collection_id = $collection_item->id;
            } else {
                 $collection_id = $collection_item->id;
             }
        }

         // Create new product
        $product = Product::create([
            'name' => $request-> name_cloth,
            'price'  =>$request->price,
            'size' =>$request->size,
            'collection_id'=> $collection_id ?: null,
            'type' => $request->type,
        ]);

         // Add main photo
        $filename = $request->main_photo->store('items');
        ProductsPhoto::create([
            'product_id' => $product->id,
            'main' => 1,
            'url' => $filename,
        ]);

        // Add additional photos if they are existed
        if($request->additional_photos) {
            foreach ($request->additional_photos as $photo) {
                $filename = $photo->store('items');
                ProductsPhoto::create([
                    'product_id' => $product->id,
                    'url' => $filename
                ]);
            }
        }

        // Notify user and redirect back
        session()->flash('success', 'Річ була успішно додана');
        return view('admin.add', ['title'=>'Add new clothes']);
    }


    /*Item-refactor page*/
    public function itemRefactorForm($item_id){
        $item = Product::findOrFail($item_id);
        return view('admin.add', ['title'=> 'Change item', 'item'=>$item]);
    }


    /*Item Refactor*/
    public function itemRefactor($item_id, ChangeItemRequest $request){

        // Check if item exists
        $item = Product::findOrFail($item_id);
        // Change values
        $item->name = $request-> name_cloth;
        $item->price = $request-> price;
        $item->size = $request-> size;
        $item->type = $request-> type;

        // Check if collection exists
        if ($request->collection) {
            if(!$collection_item = Collection::where("name",$request->collection)->first()) {
                $collection_item = Collection::create(['name' => $request->collection]);
                $collection_id = $collection_item->id;
            } else {
                $collection_id = $collection_item->id;
            }
            $item->collection_id = $collection_id;
        }

        // Check if admin change photo
        if($request->main_photo) {
            $prev_main_photo = ProductsPhoto::where('product_id', $item_id)->where('main', 1)->first();
            Storage::delete($prev_main_photo->url);
            $filename = $request->main_photo->store('items');
            $prev_main_photo->url = $filename;
            $prev_main_photo->save();
        }


        // Add additional photos if they are existed
        if($request->additional_photos) {
            $prev_photo = ProductsPhoto::where('product_id', $item_id)->where('main',0)->get();

            foreach ($prev_photo as $photo) {
                Storage::delete($photo->url);
                $photo->delete();
            }

            foreach ($request->additional_photos as $photo) {
                $filename = $photo->store('items');
                ProductsPhoto::create([
                    'product_id' => $item_id,
                    'url' => $filename
                ]);
            }
        }

        // Save changing
        $item->save();

        // Notify user adn redirect him back
        session()->flash('success', 'Річ була успішно змінена');
        return view('admin.add', ['title'=> 'Change item', 'item'=>$item]);
    }

    // Delete item from DB
    public function deleteItem($item_id){
        // Check if item exists
        Product::findOrFail($item_id)->delete();

        // Notify user and redirect him back
        session()->flash('success', 'Річ була успішно видалена');
        return view('admin.add',['title'=> 'Add new item']);
    }


    // Show all existed orders
    public function orders() {
        $orders = Order::orderBy('confirmed')->paginate(8);
        return view('admin.orders', compact('orders'));
    }

    // Show info about order
    public function orderInfo($order_id) {
        $order = Order::findOrFail($order_id);
        return view('admin.order_info', compact('order'));
    }

    // Confirmed order
    public function orderConfirm($order_id) {
        $order = Order::findOrFail($order_id);
        $order->confirmed = true;
        $order->save();
        return redirect()->back()->with('success', 'Замовлення було успішно опрацьоване');
    }
}
