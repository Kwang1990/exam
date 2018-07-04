@extends('admin')

@section('content')
  <div>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>name</th>
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
                            <a href="{{url('/admin/user/'.$user['id'].'/edit')}}">Edit</a>
                            <a>|</a>
                            <a href='user/<?php echo $user['id'];?>/delete'>Del</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
            <button type="submit" class="btn-primary btn">
                                     <a style="color: #FFF" href="{{ route('user.create')}}">Add User</a>

                                </button>
@endsection       
    