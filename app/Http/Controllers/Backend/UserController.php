<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{
    public function index()
    {
        // dd($user);
        $users = DB::table('users')->paginate(5); 
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
        $user->password = $request->get('password');
        $user->remember_token=$request->get('status');
        $user->save();
        return redirect()->route('backend.user.index');
    }

   
    public function show($id)
    {
       
    }

   
    public function edit($id)
    {
        
    }

 
    public function update(Request $request, $id)
    {
       
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
