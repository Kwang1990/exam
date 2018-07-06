@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ URL::action('CategoryController@store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="category_name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="category_name" type="text" class="form-control{{ $errors->has('category_name') ? ' is-invalid' : '' }}" name="category_name" value="{{ old('category_name') }}" autofocus>
                                <div style="color:#FF0000" class="errormsg" for="category_name"></div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                @if($errors->has('category_name'))
                                  <a class="text-danger">
                                     {{$errors->first('category_name')}}
                                  </a>
                                @endif
                                
                            </div>


                        </div>
                        
                        <div class="form-group row">
                            <label for="category_description" class="col-md-4 col-form-label text-md-right">{{ __('Category Description') }}</label>

                            <div class="col-md-6">
                                <input id="category_description" type="text" class="form-control{{ $errors->has('category_description') ? ' is-invalid' : '' }}" name="category_description" value="{{ old('category_description') }}" autofocus>
                                <div style="color:#FF0000" class="errormsg" for="category_description"></div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                             @if($errors->has('category_description'))
                                 <a class="text-danger">
                                    {{$errors->first('category_description')}}
                                 </a>
                             @endif
                        </div>
                        </div>
                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
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