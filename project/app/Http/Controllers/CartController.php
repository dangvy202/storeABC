<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartController extends Controller
{
    public function add_cart($id){
        $product_buy = Product::find($id);
        Cart::add(['id'=>$id, 'name'=>$product_buy->product_name, 'qty'=>1,'price'=>$product_buy->product_price, 'options'=>['img'=>$product_buy->product_img1]]);
        return redirect('/show-cart');
    }

    public function show_cart(){
        $content = Cart::content();
        $total = Cart::total();
        return view('cart', compact('content', 'total'));
    }

    public function increment($id){
        $item = Cart::search(function($cartItem, $rowId) use($id){
            return $cartItem->id == $id;
        })->first();
        Cart::update($item->rowId, $item->qty + 1);
        return redirect('/show-cart');
    }

    public function decrease($id){
        $item = Cart::search(function($cartItem, $rowId) use($id){
            return $cartItem->id == $id;
        })->first();
        Cart::update($item->rowId, $item->qty - 1);
        return redirect('/show-cart');
    }

    public function remove_cart(){
        Cart::destroy();
        return redirect('/show-cart');
    }
}