@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ URL::action('ProductController@update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_product" value="{{ old('id_product',$getProductById['id_product']) }}">

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }}" name="product_name" value="{{ old('product_name',$getProductById['product_name']) }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_sku" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>

                            <div class="col-md-6">
                                <input id="product_sku" type="text" class="form-control{{ $errors->has('product_sku') ? ' is-invalid' : '' }}" name="product_sku" value="{{ old('product_sku',$getProductById['product_sku']) }}" autofocus>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                @if($errors->has('product_sku'))
                                  <a class="text-danger">
                                     {{$errors->first('product_sku')}}
                                  </a>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="product_price" type="text" class="form-control{{ $errors->has('product_price') ? ' is-invalid' : '' }}" name="product_price" value="{{ old('product_price',$getProductById['product_price']) }}" autofocus>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                @if($errors->has('product_price'))
                                  <a class="text-danger">
                                     {{$errors->first('product_price')}}
                                  </a>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category_id') }}</label>

                            <div class="col-md-6">
                                <input id="category_id" type="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id',$getProductById['category_id']) }}">
                            </div>
                            <div class="col-md-6 offset-md-4">
                                @if($errors->has('category_id'))
                                  <a class="text-danger">
                                     {{$errors->first('category_id')}}
                                  </a>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Product_image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="Product_image" type="file" class="form-control{{ $errors->has('Product_image') ? ' is-invalid' : '' }}" name="Product_image"><br>
                                <img class=".mx-auto d-block img-thumbnail" width="200px" height="200px" src="{{Storage::url($getProductById['Product_image'])}}">
                            </div>
                            <div class="col-md-6 offset-md-4">
                                @if($errors->has('Product_image'))
                                  <a class="text-danger">
                                     {{$errors->first('Product_image')}}
                                  </a>
                                @endif
                                
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