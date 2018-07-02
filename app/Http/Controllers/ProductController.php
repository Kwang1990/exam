<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function index(){
    	$pro = Product::all();
    	return view('admin.product.index',[
    		'product'=>$pro
    	]);

    }
    public function detail($id_product){
    	return view('admin.product.detail');
    }

    
}
