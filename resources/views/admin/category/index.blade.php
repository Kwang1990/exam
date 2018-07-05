
@extends('admin')

@section('content')

        <div>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
            <table class="table table-hover">

                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach($category as $cat)
                    <tr>
                        <td>{{$cat->category_id}}</td>
                        <td>{{$cat->category_name}}</td>
                        <td>{{$cat->category_description}}</td>
                        <td>
                            <a href='category/<?php echo $cat['category_id'];?>/edit' class="btn btn-info" role="button">Edit</a>
                            <a href='category/<?php echo $cat['category_id'];?>/delete' class="btn btn-danger" role="button" onclick="return confirm('Are you sure?')">Del</a>
                        </td>

                    </tr>
                @endforeach
            </table>
           
        </div>

                                     <a style="color: #FFF" href="{{ route('category.create')}}" class="btn btn-dark">Add Category</a>

    @endsection 