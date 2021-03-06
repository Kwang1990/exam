@extends('admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ URL::action('CategoryController@update') }}"
                              aria-label="{{ __('Register') }}">
                            @csrf
                            <input type="hidden" name="category_id"
                                   value="{{ old('category_id',$getCategoryById['category_id']) }}">

                            <div class="form-group row">
                                <label for="category_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                                <div class="col-md-6">
                                    <input id="category_name" type="text"
                                           class="form-control{{ $errors->has('category_name') ? ' is-invalid' : '' }}"
                                           name="category_name"
                                           value="{{ old('category_name',$getCategoryById['category_name']) }}" required
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Category Description') }}</label>

                                <div class="col-md-6">
                                    <input id="category_description" type="text"
                                           class="form-control{{ $errors->has('category_description') ? ' is-invalid' : '' }}"
                                           name="category_description"
                                           value="{{ old('category_description',$getCategoryById['category_description']) }}"
                                           required autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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