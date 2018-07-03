<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
     public function index(){
    	$cats = Category::all();
    	return view('admin.category.index',[
    		'category'=>$cats
    	]);

    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
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
