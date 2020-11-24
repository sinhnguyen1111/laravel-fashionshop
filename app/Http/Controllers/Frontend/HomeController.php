<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
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
        return view('frontend.index');
    }
    public function create()
    {
        // return view('backend.users.create');
    }
    public function store(Request $request)
    {
     
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
}
