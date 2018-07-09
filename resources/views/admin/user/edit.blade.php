

@extends('admin')

@section('content')
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ URL::action('userController@update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ old('id',$getUserById['id']) }}">

                        <div class="form-group row">
                            <label for="name" class="col-md-2 ">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name',$getUserById['name']) }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-md-2 ">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name',$getUserById['first_name']) }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-2 ">{{ __('Last Name') }}</label>

                            <div class="col-md-8">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name',$getUserById['last_name']) }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 ">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email',$getUserById['email']) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 ">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-2 ">{{ __('Birthday') }}</label>

                            <div class="col-md-8">
                                <input id="date_of_birth" type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth',$getUserById['date_of_birth']) }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-2 ">{{ __('Avatar') }}</label>

                            <div class="col-md-8">
                                <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" value="{{ old('path',$getUserById['avatar']) }}"  required><br>
                                <img class=".mx-auto d-block img-thumbnail" width="200px" height="200px" src="{{Storage::url($getUserById['avatar'])}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn-primary btn">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection