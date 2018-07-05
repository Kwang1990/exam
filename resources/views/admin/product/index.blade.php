@extends('admin')

@section('content')

    

        <div>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
            <table class="table table-hover">

                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>CatID</th>
                    <th>Action</th>
                </tr>
                @foreach($product as $pros)
                    <tr>
                        <td>{{$pros->id_product}}</td>
                        <td>{{$pros->product_name}} </td>
                        <td>{{$pros->product_sku}}</td>
                        <td>{{$pros->product_price}}</td>
                        <td>{{$pros->Product_image}}</td>
                        <td>{{$pros->category_id}}</td>
                        <td>
                            <a href="product/<?php echo $pros['id_product'];?>/edit" class="btn btn-info" role="button">Edit</a>
                            <a href='product/<?php echo $pros['id_product'];?>/delete' class="btn btn-danger" role="button" onclick="return confirm('Are you sure?')">Del</a>
                        </td>

                       

                    </tr>
                @endforeach
            </table>
           
        </div>
        <div>
                                     <a style="color: #FFF" href="{{ route('product.create')}}" class="btn btn-dark" >Add Product</a>
                            </div>

@endsection