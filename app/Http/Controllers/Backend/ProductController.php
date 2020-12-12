<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
// use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $option;
    public function __contruct(){
        $this->option='';
    }
   
    public function index()
    {
        
        $products = Product::first()->orderBy('created_at','desc')->paginate(5);

       
        return view('backend.products.index')->with([
            'products' => $products
        ]);
           
      
    }
    public function create()
    {
        $product = Product::get();
        $categories = Category::get();
        $data  = Category::all();
      
        foreach($data as $item){
            if($item['parent_id']==0){
                $this->option.="<option value='".$item['id']."'>".$item['name']."</option>" ;
                foreach($data as $item1){
                    if($item1['parent_id']==$item['id']){
                        $this->option.="<option value='".$item1['id']."'>"."--".$item1['name']."</option>" ;
                    }
                }
            }
        }

        return view('backend.products.create')->with([
            'categories'=>$categories,
            'option'=>$this->option,
            'products'=>$product
        ]);
    }
    public function store(StoreProductRequest $request)
    {
        
        $product = new Product();
      
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('parent_id');
        $product->color = $request->get('color');
        $product->size = $request->get('size');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
       
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        if ($request->hasFile('images')){
            /**Lưu file vào trong storage */
            // //C1:
            $get_images = $request->file('images');
            // dd( $get_images);
            foreach($get_images as $file){
                $path = Storage::disk('public')->putFileAs('images',$file,$file->getClientOriginalName(),$request->user()->id);
                $product->avatar = $path;   
                $save = $product->save();
    
                $image = new Image();
                $image->name= $file->getClientOriginalName();
                $image->path= $path;
                $image->product_id=$product->id;
                $image->user_id =0; 
                $image->save();
          
                if($save){
                    $request->session()->flash('success','Thêm mới thành công');
                }
                else{
                    $request->sesion()->flash('error','Thêm mới lỗi');
                }
            }
        
           
        }
        return redirect()->route('backend.product.index');
    }


   
   
    public function edit($id)
    {
        $data  = Category::all();
        // dd($data);
        foreach($data as $item){
            if($item['parent_id']==0){
                $this->option.="<option value='".$item['id']."'>".$item['name']."</option>" ;
                foreach($data as $item1){
                    if($item1['parent_id']==$item['id']){
                        $this->option.="<option value='".$item1['id']."'>"."--".$item1['name']."</option>" ;
                    }
                }
            }
        }
        // $user = Auth::user(1);
        // dd($user);
        // $product = Product::find($id);
        // if ($user->can('update', $product)) {
        //     dd('có');
        // }
        // else{
        //     dd('không');
        // }

        // if(Gate::allows('update-product',$product)){
        //     dd('có');
        // }
        // else{
        //     dd('không');
        // }
        $products = Product::find($id);
        $categories = Category::get();
        return view ('backend.products.edit',[
            'categories'=>$categories,
            'product'=>$products,
            'option'=>$this->option
        ]);

    }

 
    public function update(Request $request,$id)
    {
    //    

       $product = Product::find($id);
    //    dd($product);

      
       $product->name = $request->get('name');
       $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
       $product->category_id = $request->get('parent_id');
       $product->origin_price = $request->get('origin_price');
       $product->sale_price = $request->get('origin_sale');
       $product->content = $request->get('content');
       $product->status = $request->get('status');
       $product->user_id = Auth::user()->id;
       if ($request->hasFile('images')){
        /**Lưu file vào trong storage */
        // //C1:
        $get_images = $request->file('images');
        // dd( $get_images);
        foreach($get_images as $file){
            $path = Storage::disk('public')->putFileAs('images',$file,$file->getClientOriginalName(),$request->user()->id);
            $product->avatar = $path;   
            $save = $product->save();

            $image = new Image();
            $image->name= $file->getClientOriginalName();
            $image->path= $path;
            $image->product_id=$product->id;
            $image->user_id =0; 
            $image->save();
      
            if($save){
                $request->session()->flash('success','Thêm mới thành công');
            }
            else{
                $request->sesion()->flash('error','Thêm mới lỗi');
            }
        }
    
       
    }
     
       return redirect()->route('backend.product.index');
    }

    public function destroy($id,Request $request){
        $product = Product::find($id);
        // if(Auth::user()->can('delete',$product)){
        $delete=$product->delete();

        // }
        // else{
        //     dd('không được phép xóa');
        // }
        if($delete){
            $request->session()->flash('success','Xóa thành công');
        }
        else{
            $request->sesion()->flash('error','Xóa lỗi');
        }
        
        return redirect()->route('backend.product.index');
    }
  
    
        
    
}
