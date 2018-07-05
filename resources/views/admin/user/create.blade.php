@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ URL::action('userController@store') }}" aria-label="{{ __('Register') }}"
                    enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Name') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  autofocus>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                @if($errors->has('name'))
                                  <a class="text-danger">
                                     {{$errors->first('name')}}
                                  </a>
                                @endif
                                
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-md-2 col-form-label text-md-left">{{ __('First Name') }}</label>

                            <div class="col-md-10">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" autofocus>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                @if($errors->has('first_name'))
                                  <a class="text-danger">
                                     {{$errors->first('first_name')}}
                                  </a>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-2 col-form-label text-md-left">{{ __('Last Name') }}</label>

                            <div class="col-md-10">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" autofocus>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                @if($errors->has('last_name'))
                                  <a class="text-danger">
                                     {{$errors->first('last_name')}}
                                  </a>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('Email') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                @if($errors->has('email'))
                                  <a class="text-danger">
                                     {{$errors->first('email')}}
                                  </a>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autofocus>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                @if($errors->has('password'))
                                  <a class="text-danger">
                                     {{$errors->first('password')}}
                                  </a>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-2 col-form-label text-md-left">{{ __('Birthday') }}</label>

                            <div class="col-md-10">
                                <input id="date_of_birth" type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" autofocus>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                @if($errors->has('date_of_birth'))
                                  <a class="text-danger">
                                     {{$errors->first('date_of_birth')}}
                                  </a>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-2 col-form-label text-md-left">{{ __('Avatar') }}</label>
                            
                            <div class="col-md-10">
                                <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" autofocus>
                            </div>
                            <div class="col-md-6 offset-md-2">
                                @if($errors->has('avatar'))
                                  <a class="text-danger">
                                     {{$errors->first('avatar')}}
                                  </a>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn-primary btn" a href="{{ route('user.index')}}">
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