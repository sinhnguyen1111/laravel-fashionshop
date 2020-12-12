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
        $data['id']=$product->id;
        $data['qty']='10';
        $data['name']=$product->name;
        $data['price']=$product->sale_price;
        $data['weight']=$product->sale_price;
        $data['options']['avatar']=$product->avatar;
        
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        Cart::add($data);
        // Cart::destroy();
        return redirect()->route('frontend.cart.index');
        
        
    }

    public function remove($cart_id){
        Cart::remove($cart_id);
        return redirect()->route('frontend.cart.index');
    }
    public function update(Request $request){
        $rowid=$request->cart_rowid;
        $quantity = $request->qty;
        Cart::update($rowid,$quantity);
        return redirect()->route('frontend.cart.index');

    }
    public function checkout(){
        return view('frontend.includes.checkout');
    }

    
}
