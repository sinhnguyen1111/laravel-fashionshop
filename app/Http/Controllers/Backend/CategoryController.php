<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    protected $option;
    public function __contruct(){
        $this->option='';
    }
    public function index()
    {
        // dd($user);
        $category = Category::paginate(5); 
        return view('backend.categories.index')->with([
            'categories' => $category
        ]);
           
        // return view('backend.users.index');
    }
    public function create()
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
        return view('backend.categories.create',['option'=>$this->option]);
    }
    public function store(StoreCategoryRequest $request)
    {
        
        $category = new Category();
        $category->name=$request->get('name');
        $category->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $category->parent_id=$request->get('parent_id');
        $save=$category->save();
        if($save){
            $request->session()->flash('success','Thêm mới danh mục thành công');
        }
        else{
            $request->session()->flash('error','Thêm mới danh mục lỗi!!!');
        }

        return redirect()->route('backend.category.index');
    }

   
    public function show($id)
    {
       
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
        // $categories=$category->categoryChildrent->name;
        // dd($categories);
        $categories = Category::find($id);
        return view('backend.categories.edit',[
            'categories'=>$categories,
            'option'=>$this->option
        ]);
    }

 
    public function update(Request $request)
    {
        $category = new Category();
        $category->name=$request->get('name');
        $category->parent_id=$request->get('parent_id');
        // dd($category->parent_id);
        $category->save();

        return redirect()->route('backend.category.index');

    }
    public function destroy($id,Request $request){
        $category = Category::find($id);
        $delete = $category->delete();
        if($delete){
            $request->session()->flash('success','Xóa danh mục thành công');

        }
        else{
            $request->session()->flash('error','Xóa danh mục thành công');
        }
        return redirect()->route('backend.category.index');
    }
}
