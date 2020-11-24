<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        // dd($user);
        $category = DB::table('categories')->paginate(3); 
        return view('backend.categories.index')->with([
            'categories' => $category
        ]);
           
        // return view('backend.users.index');
    }
    public function create()
    {
        return view('backend.categories.create');
    }
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name=$request->get('name');
        $category->parent_id=$request->get('parent_id');
        $category->save();

        return redirect()->route('backend.category.index');
    }

   
    public function show($id)
    {
       
    }

   
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::get();
        return view('backend.categories.edit',[
            'categories'=>$categories
        ]);
    }

 
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name=$request->get('name');
        $category->parent_id=$request->get('parent_id');
        $category->save();

        return redirect()->route('backend.category.index');

    }
}
