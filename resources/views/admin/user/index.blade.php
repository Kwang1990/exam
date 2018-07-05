@extends('admin')

@section('content')
  <div>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
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
                        <td>{{$user->avatar}}</td>
                        <td>
                            <a href="{{url('/admin/user/'.$user['id'].'/edit')}}" class="btn btn-info" role="button">Edit</a>
                            <a href='user/<?php echo $user['id'];?>/delete' class="btn btn-danger" role="button" onclick="return confirm('Are you sure?')">Del</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
            
                                     <a style="color: #FFF" href="{{ route('user.create')}}" class="btn btn-dark">Add User</a>
@endsection       
    