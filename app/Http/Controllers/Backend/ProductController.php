<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        // dd($user);
        $products = Product::paginate(5);
        // dd($products);
        return view('backend.products.index')->with([
            'products' => $products
        ]);
           
      
    }
    public function create()
    {
        $categories = Category::get();

        return view('backend.products.create')->with([
            'categories'=>$categories
        ]);
    }
    public function store(StoreProductRequest $request)
    {
    //     $validator = Validator::make($request->all(),
    //     [
    //         'name'         => 'required|min:10|max:255',
    //         'origin_price' => 'required|numeric',
    //         'sale_price'   => 'required|numeric',
    //     ],
    //     [
    //         'required' => ':attribute Không được để trống',
    //         'min' => ':attribute Không được nhỏ hơn :min',
    //         'max' => ':attribute Không được lớn hơn :max'
    //     ],
    //     [
    //         'name' => 'Tên sản phẩm',
    //         'origin_price' => 'Giá gốc',
    //         'sale_price' => 'Giá bán'
    //     ]
    // );
    // if ($validator->errors()){
    //     return back()
    //         ->withErrors($validator)
    //         ->withInput();
    // }
    if ($request->hasFile('images')){
        /**Lưu file vào trong storage */
        //C1:
        $files = $request->file('images');
        foreach($files as $file){
            $path = Storage::disk('public')->putFileAs('images',$file,$file->getClientOriginalName());

    
        //C2:
        // $file = $request->file('image');
        // $name = $file->getClientOriginalName();
        // $file->move('avatar', $name);
        // dd($path);
        $image = new Image();
        $image->name= $file->getClientOriginalName();
        $image->path= $path;
        $image->product_id=1;
        $image->save();
        }

    }else{
        dd('khong co file');
    }
        // dd($request->all());
        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        // $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        // $product->status = $request->get('status');
        // $product->user_id = Auth::user()->id;
        $save = $product->save();
        if($save){
            $request->session()->flash('success','Thêm mới thành công');
        }
        else{
            $request->sesion()->flash('error','Thêm mới lỗi');
        }
        

        return redirect()->route('backend.product.index');
    }

   
    public function show($id)
    {
       
    }

   
    public function edit($id)
    {
        $user = Auth::user($id);
        $product = Product::find($id);
        if ($user->can('update', $product)) {
            dd('có');
        }
        else{
            dd('không');
        }

        if(Gate::allows('update-product',$product)){
            dd('có');
        }
        else{
            dd('không');
        }
        // $products = Product::find($id);
        $categories = Category::get();
        return view ('backend.products.edit',[
            'categories'=>$categories,
            'product'=>$products
        ]);

    }

 
    public function update(StoreProductRequest $request,$id)
    {
       $product = Product::find($id);
      
       $product->name = $request->get('name');
       $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
       // $product->category_id = $request->get('category_id');
       $product->origin_price = $request->get('origin_price');
       $product->sale_price = $request->get('sale_price');
       $product->content = $request->get('content');
       $product->status = $request->get('status');
       $product->save();
       return redirect()->route('backend.product.index');
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        
        return redirect()->route('backend.product.index');
    }
  
    
        
    
}
