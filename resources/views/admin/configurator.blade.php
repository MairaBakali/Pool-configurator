@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if (session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>

                @endif
                <div class="card">
                    <div class="card-header">Setup Your Pool Configurator</div>
                    <div class="card-body">
                        <form method="POST" action="{{url('/save/configurator')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="shop_url" class="col-md-4 col-form-label text-md-right">Shop URL *</label>
                                <div class="col-md-7">
                                    <input id="shop_url" type="text" placeholder="https://example.com"
                                           class="form-control @error('shop_url') is-invalid @enderror" name="shop_url"
                                           value="{{ old('shop_url') }}" required autofocus>

                                    @error('shop_url')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_name" class="col-md-4 col-form-label text-md-right">UserName *</label>
                                <div class="col-md-7">
                                    <input id="api_key" type="text" placeholder="JohnDoe"
                                           class="form-control @error('user_name') is-invalid @enderror"
                                           name="user_name"
                                           value="{{ old('user_name') }}" required>

                                    @error('user_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="api_key" class="col-md-4 col-form-label text-md-right">API Key *</label>
                                <div class="col-md-7">
                                    <input id="api_key" type="text" placeholder="Ads781ddartyiopakiifvbhopetyavcd"
                                           class="form-control @error('api_key') is-invalid @enderror" name="api_key"
                                           value="{{ old('api_key') }}" required>

                                    @error('api_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="base_products_category" class="col-md-4 col-form-label text-md-right">
                                    Base Products Category *
                                </label>
                                <div class="col-md-7">
                                    <input id="base_products_category" type="text"
                                           placeholder="Enter Base Product Category"
                                           class="form-control @error('base_products_category') is-invalid @enderror"
                                           name="base_products_category"
                                           value="{{ old('base_products_category') }}" required>

                                    @error('base_products_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="compatible_products_category" class="col-md-4 col-form-label text-md-right">
                                    Compatible Products Category *
                                </label>
                                <div class="col-md-6">
                                    <input id="compatible_products_category" type="text"
                                           placeholder=" Enter Compatible Products Category"
                                           class="form-control @error('compatible_products_category') is-invalid @enderror"
                                           name="compatible_products_category"
                                           value="{{ old('compatible_products_category') }}" required>

                                    @error('compatible_products_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_services_category" class="col-md-4 col-form-label text-md-right">
                                    Service & Assembly Product Category *
                                </label>
                                <div class="col-md-6">
                                    <input id="product_services_category" type="text"
                                           placeholder=" Enter Service & Assembly Product Category "
                                           class="form-control @error('product_services_category') is-invalid @enderror"
                                           name="product_services_category"
                                           value="{{ old('product_services_category') }}" required>

                                    @error('product_services_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success text-white">
                                        Save
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
