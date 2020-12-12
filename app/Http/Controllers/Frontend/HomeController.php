<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use App\Models\Category;
use App\Models\Product;
use App\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
        $products = Product::latest()->take(6)->get();
    
        $category = Category::where('parent_id','0')->get();
        // $cate = Category::where('parent_id','id')->get();
        
        // // dd($cate);
        // return view('frontend.index',['category'=>$cate]);


// add va  put
        // $categories = Category::get();
    //    $check =  Cache::add('categories',$categories,60);
    //    $categories = Cache::get('categories');
    // //    dd($categories);
    //    dd($check);
        // return 1;

        // if(Cache::has('categories'))
        // {
        //     $categories = Cache::get('categories');
        // }
        // else{
        //     $categories = Category::get();
        //     $check =  Cache::put('categories',$categories,1);
        //     $categories = Cache::get('categories');
        //     // dd($categories );
        // }
        // return 1;

        // if(!cache::has('user_number')){
        //     $user_number = User::count();
        //     cache::put('user_number',$user_number,60);
        // }
        // $category = Cache::get('user_number');
        // dd($category);
        // return 1;


        // $categories = Cache::remember('categries', 60*60, function() {
        //     $categories = Category::get();
        //     return $categories;
        // });
        // dd($categories);

       
        

        // $value = $request->cookie('name');
        /** TRuy xuất giá trị của cookie */
        // $value = Cookie::get('product_name');

        // $cookie  = cookie('product_name','Iphone','5');
        // return response('Hello world')->cookie($cookie);

        // Cookie::queue(Cookie::make('item_product','Sweater','1'));
        // return $value;

        // session(['key' => 'value']);
        // $age = $request->session()->get('age');
        // echo $age;
        // dd(session('key'));
        // $request->session()->push('user.teams', 'developers');
        // $data = $request->session()->all();
        // dd($data);
        /** */
        // Storage::disk('public')->put('file1.txt','Contents');
/** */
        // $content=Storage::disk('public')->get('file1.txt');
    //    dd(2);

    /** Lấy ra nội dung trong file1 */
    // $content = Storage::get('file1.txt');
    // dd($content);

    /** Kiểm tra file có tồn tại k T or F */
    // $exists = Storage::disk('public')->exists('file1.txt');
    //     dd($exists);

    /** Lấy link file */
    // $url = Storage::disk('public')->url('file1.txt');
    // dd($url);
    // $url = Storage::url('test.txt');
    // dd($url);


    /** download file*/
    // return Storage::disk('public')->download('file1.txt');

    // Storage::disk('public')->copy('file1.txt', 'file2.txt');
    // dd(1);
    // Storage::move('new/file.jpg', 'file1.txt');
    // dd(1);
    // Storage::delete('file1.txt');
    // dd(1);
    // Storage::deleteDirectory('new/file.txt');
    //        dd(1);
        return view('frontend.index',[
            
            'product'=>$products,
            'categories'=>$category
        ]);
    }
    
}
