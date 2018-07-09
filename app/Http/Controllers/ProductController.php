<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateProduct;
use DB;

class ProductController extends Controller
{
    //
    public function index(Request $request){
        $product = DB::table('product');
        if($request->ajax()){
            $output="<tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>CatID</th>
                    <th>Action</th>
                </tr>";
            if(!empty($request->productname)){

            $product = $product->where('product_name','like',"%".$request->productname."%");
            //dd($users->get());
           }
           if(!empty($request->productsku)){
            $product = $product->where('product_sku','like',"%".$request->productsku."%");
           }
           if(!empty($request->categoryid)){
            $product = $product->where('category_id','like',"%".$request->categoryid."%");
           }
           if(!empty($request->pricefrom)){
            // dd($request->pricefrom);
            $product = $product->where('product_price','>=',$request->pricefrom);
           }
           if(!empty($request->priceto)){
            // dd($request->pricefrom);
            $product = $product->where('product_price','<=',$request->priceto);
           }
           foreach ($product->get() as $pro) {

               $output.= "<tr>".
                        "<td>".$pro->id_product."</td>".
                        "<td>".$pro->product_name."</td>".
                        "<td>".$pro->product_sku."</td>".
                        "<td>".$pro->product_price."</td>".
                        "<td>".$pro->Product_image."</td>".
                        "<td>".$pro->category_id."</td>".
                        "<td>".
                            "<a href=\"".url('/admin/product/'.$pro->id_product.'/edit')."\" class=\"btn btn-info\" role=\"button\">Edit</a>".
                            "<a href=\"".url('/admin/product/'.$pro->id_product.'/delete')."\" class=\"btn btn-danger\" role=\"button\" onclick=\"return confirm('Are you sure?')\">Del</a>".
                        "</td>".
                    "</tr>" ;
                   // dd($output);
            }
            return Response($output);
        }
        return view('admin.product.index',[
            'product'=>$product->get()
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
        $proegory_id = $allRequest['category_id'];
        $dataInsertToDatabase = array(
            'product_name'=>$product_name,
            'product_sku'=>$product_sku,
            'product_price'=>$product_price,
            'category_id'=>$proegory_id,
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
        $proegory_id = $allRequest['category_id'];

        $objProduct = new Product();
        $getProductById  = $objProduct->find($id_product);
        $getProductById->product_name = $product_name;
        $getProductById->product_sku = $product_sku;
        $getProductById->product_price = $product_price;
        $getProductById->category_id = $proegory_id;
        $getProductById->Product_image = $path;
        $getProductById->save();
        return redirect()->action('ProductController@index');
    }
    public function del($id_product){
        Product::find($id_product)->delete();
        return redirect()->action('ProductController@index');
    }
}
