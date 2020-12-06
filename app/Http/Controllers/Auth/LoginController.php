<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    // public const HOME = '/admin';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
     
    
        $arr = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($arr)){
            $request->session()->flash('success','Đăng nhập thành công');
            return view('backend.dashboard');
        }
        else{
        // else if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>0])){
          
            $request->session()->flash('fail','Đăng nhập không thành công');
                // return  redirect()->route('frontend.index');
               
        }
    }
    protected function logout(Request $request){
        return redirect()->route('login');
    }
    

}
