<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index(){
        $items = Cart::content();
        // dd($items);
        return view('frontend.includes.cart',[
            'items'=>$items,
        ]);
        // return view('frontend.includes.cart');
    }
    public function add($id){

        $product = Product::find($id);
        Cart::add($product->id,$product->name,$product->sale_price,0);
        return redirect()->route('frontend.cart.index');
        
        
    }

    public function remove($cart_id){
        Cart::remove($cart_id);
        return redirect()->route('frontend.cart.index');
    }
}
