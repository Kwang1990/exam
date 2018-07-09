<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CreateCategory;
use DB;
class CategoryController extends Controller
{
    //
     public function index(Request $request){
    	$category = DB::table('category');
        if($request->ajax()){
            $output="<tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>";
            if(!empty($request->name)){

            $category = $category->where('category_name','like',"%".$request->name."%");
            //dd($users->get());
           }
           if(!empty($request->des)){
            $category = $category->where('category_description','like',"%".$request->des."%");
           }
           foreach ($category->get() as $cat) {

               $output.= "<tr>".
                        "<td>".$cat->category_id."</td>".
                        "<td>".$cat->category_name."</td>".
                        "<td>".$cat->category_description."</td>".
                        "<td>".
                            "<a href=\"".url('/admin/category/'.$cat->category_id.'/edit')."\" class=\"btn btn-info\" role=\"button\">Edit</a>".
                            "<a href=\"".url('/admin/category/'.$cat->category_id.'/delete')."\" class=\"btn btn-danger\" role=\"button\" onclick=\"return confirm('Are you sure?')\">Del</a>".
                        "</td>".
                    "</tr>" ;
                   // dd($output);
            }
            return Response($output);
        }
        return view('admin.category.index',[
            'category'=>$category->get()
        ]);

    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(CreateCategory $request){
        $allRequest = $request->all();
        $category_name = $allRequest['category_name'];
        $category_description = $allRequest['category_description'];
        $dataInsertToDatabase = array(
            'category_name'=>$category_name,
            'category_description'=>$category_description
        );
        $objCategory = new Category();
        $objCategory->insert($dataInsertToDatabase);
        return redirect()->action('CategoryController@index');
    }
    public function edit($category_id){
        $objCategory = new Category();
        $getCategoryById = $objCategory->find($category_id)->toArray();
        return view('admin.category.edit')->with('getCategoryById',$getCategoryById);
    }
    //edit update category
    public function update(Request $request){
        $allRequest = $request->all();
        $category_id = $allRequest['category_id'];
        $category_name = $allRequest['category_name'];
        $category_description = $allRequest['category_description'];

        $objCategory = new Category();
        $getCategoryById  = $objCategory->find($category_id);
        $getCategoryById->category_name = $category_name;
        $getCategoryById->category_description = $category_description;
        $getCategoryById->save();
        return redirect()->action('CategoryController@index');
    }
    public function del($category_id){
        Category::find($category_id)->delete();
        return redirect()->action('CategoryController@index');
    }
 }
