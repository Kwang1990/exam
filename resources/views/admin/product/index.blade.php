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
                        <td>{{$pros->product_image}}</td>
                        <td>{{$pros->category_id}}</td>
                        <td>
                            <a href='product/<?php echo $pros['id_product'];?>/edit'>Edit</a>
                            <a>|</a>
                            <a href='product/<?php echo $pros['id_product'];?>/delete'>Del</a>
                        </td>

                       

                    </tr>
                @endforeach
            </table>
           
        </div>
        <button type="submit" class="btn-primary btn">
                                     <a style="color: #FFF" href="{{ route('product.create')}}">Add Product</a>

                                </button>

@endsection