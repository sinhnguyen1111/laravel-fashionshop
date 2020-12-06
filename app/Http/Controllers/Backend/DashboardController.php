<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index()
    {

        
        if(!Cache::has('user_number')){
                $user_number = User::count();
                Cache::put('user_number',$user_number,60);
            }
            $category = Cache::get('user_number');
        //     // dd($category);
        // $user = User::get();
        if(!Cache::has('product_number')){
            $product_number = Product::count();
            Cache::put('product_number',$product_number,60);
        }
        $product = Cache::get('product_number');
        $new_product = Product::latest()->take(5)->get();
        // dd($new_product);

        // $product = Product::get();
            return view('backend.dashboard',[
                'user_count'=>$category,
                'product_count'=>$product,
                'new_product'=>$new_product
                ]);
            // return 1;
    }
   
}
