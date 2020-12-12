<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
   
    public function show($id)
    {
        $images = Product::find($id)->images()->where('product_id',$id)->get();
        // dd($images);
        $detail=Product::find($id);
        // dd($detail);
        // // $images = array();
        // foreach($detail as $value){
        //     // $category_id = $value->category_id;
        //     // dd($category_id);
        //     $images[] = $value->path;
           
            
        
       
        // $relation_product = find($id)
        // dd($images);
      
        // foreach($detail as $value)
        // {
        //     dd($value->path);
        // }
        
        // dd($detail->origin_price);
       return view('frontend.includes.detail_product',['images'=>$images,'detail'=>$detail]);
    }
    // public function showProduct_cate(){
    //     // $category = Category::find($id);
    //     // dd($category);
    //     $get_category = Category::where('parent_id','0')->get();
    //     // $get_product = Product::where($id);
    //     return view('frontend.includes.product_cate',[
    //         'get_category'=>$get_category,
    //         // 'cate'=>$category,
    //     ]);
    // }


}
