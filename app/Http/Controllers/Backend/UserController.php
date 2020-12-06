<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Models\Image;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
      

        $users = User::select()->orderBy('created_at','desc')->paginate(5);
      
        return view('backend.users.index')->with([
            'users' => $users
        ]);
           
        // return view('backend.users.index');
    }
    public function create()
    {
        return view('backend.users.create');
    }
    public function store(StoreUserRequest $request)
    {
        

        $user = new User();
        $user->name = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('status');

        if($request->hasFile('avatar')){
       
            $file = $request->file('avatar');
          
            $path = Storage::disk('public')->putFileAs('avatar',$file,$file->getClientOriginalName());
           
            $user->profile_photo_path= $path;
           
        }
        $file = $request->file('avatar');
       
        $save = $user->save();
          $avatar = new Image();
            $avatar->name = $file->getClientOriginalName();
            $avatar->path = $path;
               $avatar->product_id=0;
            $avatar->user_id=$user->id;
        $avatar->save();
       
        if($save){
            $request->session()->flash('success','Thêm mới thành công');
        }
        else{
            $request->session()->flash('error','Thêm mới lỗi');
        }
        return redirect()->route('backend.user.index');
    }

   
    

   
    public function edit($id)
    {
        $user = User::find($id);
        // $users = User::get();
        
        return view('backend.users.edit',[
            'users'=>$user
        ]);
    }

 
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        // dd($user);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
       
        if($request->hasFile('avatar')){
       
            $file = $request->file('avatar');
            // dd($file);
            $path = Storage::disk('public')->putFileAs('avatar',$file,$file->getClientOriginalName());
        //    dd($path);
            $user->profile_photo_path= $path;
            $save = $user->save();
            $avatar = new Image();
              $avatar->name = $file->getClientOriginalName();
              $avatar->path = $path;
                 $avatar->product_id=0;
              $avatar->user_id=$user->id;
          $avatar->save();
         
          if($save){
              $request->session()->flash('success','Chỉnh sửa thành công');
          }
          else{
              $request->session()->flash('error','Chỉnh sửa thông tin thất bại!!');
          }
        }
        // $file = $request->file('avatar');
       
      
        return redirect()->route('backend.user.index');

       
    }
    public function destroy(Request $request,$id){
        $user = User::find($id);
        $delete = $user->delete();
        if($delete){
            $request->session()->flash('success','Xóa thành công');
        }
        else{
            $request->session()->flash('error','Xóa thông tin thất bại!!');
        }
      
        return redirect()->route('backend.user.index');
    }

    public function test()
    {
        // $user=User::find(1);
        // dd($user->userInfor->fullname);

        // $user_info = UserInfo::find(1);
        // dd($user_info->user);

        $category = Category::find(1);
        $product = $category->products;
        // dd($product);
        // $product = Product::find(1);
        // $category = $product->category;
        // dd($category);

/* Chèn */
        // $product = Product::find(2);
        // $category = Category::find(1);

        // $productSaved = $category->products()->save($product);
/** Chèn DL vào database */
        $category = Category::find(2);

        $product = $category->products()->create([
            'name' => 'Sweater',
            'origin_price' => '10000',
            'sale_price' => '5000',
            'content' => 'Noi dung demo',
            'user_id' => 1
]);
/**Thêm */
        // $order_id = 1;
        // $order = Order::find(1);
        // $product_id = 1;
        // $order->products()->attach($product_id);

        // $order_id = 1;
        // $shop = Order::find($order_id);
        // $product_id_1 =1;
        // $product_id_2 = 2;
        // $product_id_3 = 3;
        // $shop->products()->attach([
        //     $product_id_1,
        //     $product_id_2,
        //     $product_id_3
        // ]);

        /**Xóa detach() */
$order=Order::find(1);//Tìm order_id=1
$order->products()->detach(2);

    }
}
