<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateProduct;

class ProductController extends Controller
{
    //
    public function index(){
    	$pro = Product::all();
    	return view('admin.product.index',[
    		'product'=>$pro
    	]);

    }
    

    public function create(){
        return view('admin.product.create');
    }
    public function store(CreateProduct $request){
        $path = $request->file('Product_image')->store('public/product');
        $allRequest = $request->all();
        $product_name = $allRequest['product_name'];
        $product_sku = $allRequest['product_sku'];
        $product_price = $allRequest['product_price'];
        $category_id = $allRequest['category_id'];
        $dataInsertToDatabase = array(
            'product_name'=>$product_name,
            'product_sku'=>$product_sku,
            'product_price'=>$product_price,
            'category_id'=>$category_id,
            'Product_image'=>$path,
        );
        $objProduct = new Product();
        $objProduct->insert($dataInsertToDatabase);
        return redirect()->action('ProductController@index');
    }
    public function edit($id_product){
        $objProduct = new Product();
        $getProductById = $objProduct->find($id_product)->toArray();
        return view('admin.product.edit')->with('getProductById',$getProductById);
    }
    public function update(CreateProduct $request){
        if ($request->file('Product_image') == null) {
        $path = "";
}     else{
        $path = $request->file('Product_image')->store('public/product');  
         }
        
        $allRequest = $request->all();
        $id_product = $allRequest['id_product'];
        $product_name = $allRequest['product_name'];
        $product_sku = $allRequest['product_sku'];
        $product_price = $allRequest['product_price'];
        $category_id = $allRequest['category_id'];

        $objProduct = new Product();
        $getProductById  = $objProduct->find($id_product);
        $getProductById->product_name = $product_name;
        $getProductById->product_sku = $product_sku;
        $getProductById->product_price = $product_price;
        $getProductById->category_id = $category_id;
        $getProductById->Product_image = $path;
        $getProductById->save();
        return redirect()->action('ProductController@index');
    }
    public function del($id_product){
        Product::find($id_product)->delete();
        return redirect()->action('ProductController@index');
    }
}
