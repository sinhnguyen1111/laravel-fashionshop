<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index($slug,$id){
    //    $product = Product::find($id); 
    //    dd($id);
        $get_category = Category::where('parent_id','0')->get();
        $get_product = Product::where('category_id',$id)->get();
        // dd($get_product);
        return view('frontend.includes.product_cate',[
            'get_category'=>$get_category,
            'get_product'=>$get_product
        ]);            
    }
   
}
