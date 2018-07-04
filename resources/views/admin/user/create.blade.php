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
                            <div class="col-md-12">{{ $errors->has('name') ? ' aaaaaa' : '' }}</div>
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('Name') }}</label>
                            
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-md-2 col-form-label text-md-left">{{ __('First Name') }}</label>

                            <div class="col-md-10">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-2 col-form-label text-md-left">{{ __('Last Name') }}</label>

                            <div class="col-md-10">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-2 col-form-label text-md-left">{{ __('date_of_birth') }}</label>

                            <div class="col-md-10">
                                <input id="date_of_birth" type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-2 col-form-label text-md-left">{{ __('Avatar') }}</label>

                            <div class="col-md-10">
                                <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
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