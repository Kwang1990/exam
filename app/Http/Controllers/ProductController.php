<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateProduct;
use DB;

class ProductController extends Controller
{
    //
    private $product;
    private $category;

    public function __construct(
        Product $product,
        Category $category)
    {
        $this->middleware('auth');
        $this->product = $product;
        $this->category = $category;
    }

    public function index(Request $request)
    {
        if (auth()->user()->level == 0) {
            abort(403);
        }
        $itemPerPage = 2;
        $product = DB::table('product')->join('category', 'product.category_id', '=', 'category.category_id')->paginate($itemPerPage);
        if ($request->ajax()) {
            $output = "<tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>CatID</th>
                    <th>Action</th>
                </tr>";
            $product = DB::table('product')->orWhere(function ($query) use ($request) {
                if (!empty($request->productname)) {
                    $query->where('product_name', 'like', "%" . $request->productname . "%");
                }
                if (!empty($request->productsku)) {
                    $query->where('product_sku', 'like', "%" . $request->productsku . "%");
                }
                if (!empty($request->categoryid)) {
                    $query->where('category_id', 'like', "%" . $request->categoryid . "%");
                }
                if (!empty($request->pricefrom)) {
                    $query->where('product_price', '>=', $request->pricefrom);
                }
                if (!empty($request->priceto)) {
                    $query->where('product_price', '<=', $request->priceto);
                }
            })
                ->paginate($itemPerPage);
            $p = (string)$product->links();
            if (!empty($request->page)) {
                $product = DB::table('product')->orWhere(function ($query) use ($request) {
                    if (!empty($request->productname)) {
                        $query->where('product_name', 'like', "%" . $request->productname . "%");
                    }
                    if (!empty($request->productsku)) {
                        $query->where('product_sku', 'like', "%" . $request->productsku . "%");
                    }
                    if (!empty($request->categoryid)) {
                        $query->where('category_id', 'like', "%" . $request->categoryid . "%");
                    }
                    if (!empty($request->pricefrom)) {
                        $query->where('product_price', '>=', $request->pricefrom);
                    }
                    if (!empty($request->priceto)) {
                        $query->where('product_price', '<=', $request->priceto);
                    }
                })
                    ->offset($itemPerPage * ($request->page - 1))
                    ->limit($itemPerPage)
                    ->get();
            }
            foreach ($product as $pro) {

                $output .= "<tr>" .
                    "<td>" . $pro->id . "</td>" .
                    "<td>" . $pro->product_name . "</td>" .
                    "<td>" . $pro->product_sku . "</td>" .
                    "<td>" . $pro->product_price . "</td>" .
                    '<td><img class="mx-auto d-block img-thumbnail" width="200px" height="200px" src="' . Storage::url($pro->Product_image) . '"></td>' .
                    "<td>" . $pro->category_id . "</td>" .
                    "<td>" .
                    "<a href=\"" . url('/admin/product/' . $pro->id . '/edit') . "\" class=\"btn btn-info\" role=\"button\">Edit</a>" .
                    "<a href=\"" . url('/admin/product/' . $pro->id . '/delete') . "\" class=\"btn btn-danger\" role=\"button\" onclick=\"return confirm('Are you sure?')\">Del</a>" .
                    "</td>" .
                    "</tr>";
                // dd($output);
            }
            return Response()->json([
                'output' => $output,
                'product' => $product,
                'pagination' => $p,
            ]);
        }
        return view('admin.product.index', compact('product'));
    }


    public function create()
    {
        $cats = $this->category->all();
        return view('admin.product.create', compact('cats'));
    }

    public function store(CreateProduct $request)
    {
        $path = $request->file('Product_image')->store('public/product');
        $allRequest = $request->all();
        $product_name = $allRequest['product_name'];
        $product_sku = $allRequest['product_sku'];
        $product_price = $allRequest['product_price'];
        $category_id = $allRequest['category_id'];
        $dataInsertToDatabase = array(
            'product_name' => $product_name,
            'product_sku' => $product_sku,
            'product_price' => $product_price,
            'category_id' => $category_id,
            'Product_image' => $path,
        );
        $objProduct = new Product();
        $objProduct->insert($dataInsertToDatabase);
        return redirect()->action('ProductController@index');
    }

    public function edit($id)
    {
        $cats = $this->category->all();
        $getProductById = $this->product->find($id)->toArray();
        return view('admin.product.edit', compact('cats', 'getProductById'));
    }

    public function update(CreateProduct $request)
    {
        $allRequest = $request->all();
        $id = $allRequest['id'];
        $getProductById = $this->product->find($id);
        $path = $getProductById->Product_image;
        if (!empty($request->file('Product_image'))) {
            $path = $request->file('Product_image')->store('public/product');
        }
        $product_name = $allRequest['product_name'];
        $product_sku = $allRequest['product_sku'];
        $product_price = $allRequest['product_price'];
        $category_id = $allRequest['category_id'];


        $getProductById->product_name = $product_name;
        $getProductById->product_sku = $product_sku;
        $getProductById->product_price = $product_price;
        $getProductById->category_id = $category_id;
        $getProductById->Product_image = $path;
        $getProductById->save();
        return redirect()->action('ProductController@index');
    }

    public function del($id)
    {
        Product::find($id)->delete();
        return redirect()->action('ProductController@index');
    }
}
