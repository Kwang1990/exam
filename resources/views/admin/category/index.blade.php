@extends('admin')

@section('content')

    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <input class="form-control" id="namesearch" type="text" placeholder="Category Name">
                </div>
                <div class="col-6">
                    <input class="form-control" id="dessearch" type="text" placeholder="Category Description">
                </div>
            </div>
        </div>
        <div class="col-4">
            <br>
            <button id="search" type="button" class="btn btn-outline-primary">Search</button>
        </div>
        <br>
        <table id="category" class="table table-hover">

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
                        <a href="{{url('/admin/category/'.$cat->category_id.'/edit')}}" class="btn btn-info"
                           role="button">Edit</a>
                        <a href="{{url('/admin/category/'.$cat->category_id.'/delete')}}" class="btn btn-danger"
                           role="button" onclick="return confirm('Are you sure?')">Del</a>
                    </td>

                </tr>
            @endforeach
        </table>

    </div>
    <div id="pagination">
        {{$category->links()}}
    </div>
    <div>
        <a style="color: #FFF" href="{{ route('category.create')}}" class="btn btn-dark">Add Category</a>
    </div>
    <!-- ajax -->
    <script type="text/javascript">
        $('#search').on('click', function () {
            $name = $("#namesearch").val();

            $des = $("#dessearch").val();
            $.ajax({

                type: 'get',

                url: '/admin/category',

                data: {'name': $name, 'des': $des},

                success: function (data) {
                    console.log()
                    $('tbody').html(data.output);
                    $('#pagination').html(data.pagination);
                    $('#pagination .page-link').on('click', function (e) {
                        var _this = $(this);
                        // console.log(_this.html());
                        $('#pagination .page-item').removeClass('active');
                        _this.parent().addClass('active');
                        e.preventDefault();
                        $.ajax({
                            type: 'get',
                            url: '/admin/category',

                            data: {'name': $name, 'des': $des, 'page': _this.html()},
                            success: function (data) {
                                $('tbody').html(data.output);
                            }
                        });
                    });
                }
            });
        })
    </script>

    <script type="text/javascript">

        $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});

    </script>

@endsection