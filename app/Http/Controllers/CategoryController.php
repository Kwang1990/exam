<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
     public function index(){
    	// dd(route('user.index'));
    	$cats = Category::all();
    	return view('admin.category.index',[
    		'category'=>$cats
    	]);

    }
    public function detail($category_id){
    	return view('admin.category.detail');
    }
 }
