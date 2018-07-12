@extends('admin')

@section('content')
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <input class="form-control" name="emailsearch" id="emailsearch" type="text" placeholder="Email..">
                </div>
                <div class="col-4">
                    <input class="form-control" name="fnamesearch" id="fnamesearch" type="text"
                           placeholder="First name..">
                </div>
                <div class="col-4">
                    <input class="form-control" name="lnamesearch" id="lnamesearch" type="text"
                           placeholder="Last name..">
                </div>
            </div>
        </div>
        <br>
        <div class="col-4">
            <button id="search" type="button" class="btn btn-outline-primary">Search</button>
        </div>
        <br>
        <table class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>DayOfBirth</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->email}} </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->date_of_birth}}</td>
                    <td>
                        <img class=".mx-auto d-block img-thumbnail" width="100px" height="100px"
                             src="{{Storage::url($user->avatar)}}">
                    </td>
                    <td>
                        <a href="{{url('/admin/user/'.$user->id.'/edit')}}" class="btn btn-info" role="button">Edit</a>
                        <a href="{{url('/admin/user/'.$user->id.'/delete')}}" class="btn btn-danger" role="button"
                           onclick="return confirm('Are you sure?')">Del</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div id="pagination">
        {{$users->links()}}
    </div>
    <a style="color: #FFF" href="{{ route('user.create')}}" class="btn btn-dark">Add User</a>

    <!-- ajax
                                      -->

    <script type="text/javascript">

        $('#search').on('click', function () {
            $email = $("#emailsearch").val();

            $fname = $("#fnamesearch").val();

            $lname = $("#lnamesearch").val();


            $.ajax({

                type: 'get',

                url: '/admin/user',

                data: {'email': $email, 'fname': $fname, 'lname': $lname},

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
                            url: '/admin/user',

                            data: {'email': $email, 'fname': $fname, 'lname': $lname, 'page': _this.html()},
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




    