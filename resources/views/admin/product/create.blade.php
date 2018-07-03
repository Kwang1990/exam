@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ URL::action('ProductController@store') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }}" name="product_name" value="{{ old('product_name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_sku" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>

                            <div class="col-md-6">
                                <input id="product_sku" type="text" class="form-control{{ $errors->has('product_sku') ? ' is-invalid' : '' }}" name="product_sku" value="{{ old('product_sku') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="product_price" type="text" class="form-control{{ $errors->has('product_price') ? ' is-invalid' : '' }}" name="product_price" value="{{ old('product_price') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category ID') }}</label>

                            <div class="col-md-6">
                                <input id="category_id" type="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-default">
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