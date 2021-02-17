@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>

                @endif
                <div class="card">
                    <div class="card-header">Pool Configurator</div>
                    <div class="card-body">
                        <form method="POST" action="{{url('/save/configurator')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="shop_url" class="col-md-4 col-form-label text-md-right">Shop URL *</label>
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <input id="api_key" type="text" placeholder="JohnDoe"
                                           class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                                           value="{{ old('user_name') }}" required>

                                    @error('user_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="api_key" class="col-md-4 col-form-label text-md-right">API Key *</label>
                                <div class="col-md-6">
                                    <input id="api_key" type="text" placeholder="Ads781ddartyiopakiifvbhopetyavcd"
                                           class="form-control @error('api_key') is-invalid @enderror" name="api_key"
                                           value="{{ old('api_key') }}" required>

                                    @error('api_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_url_1" class="col-md-4 col-form-label text-md-right">Category URL
                                    (1) *</label>
                                <div class="col-md-6">
                                    <input id="category_url_1" type="text" placeholder="/category/"
                                           class="form-control @error('category_url_1') is-invalid @enderror"
                                           name="category_url_1"
                                           value="{{ old('category_url_1') }}" required>

                                    @error('category_url_1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_url_2" class="col-md-4 col-form-label text-md-right">Category URL
                                    (2) *</label>
                                <div class="col-md-6">
                                    <input id="category_url_2" type="text" placeholder="/category/sub_category/"
                                           class="form-control @error('category_url_2') is-invalid @enderror"
                                           name="category_url_2"
                                           value="{{ old('category_url_2') }}" required>

                                    @error('category_url_2')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_url_3" class="col-md-4 col-form-label text-md-right">Category URL
                                    (3) *</label>
                                <div class="col-md-6">
                                    <input id="category_url_3" type="text"
                                           placeholder="/category/sub_category/sub_sub_category"
                                           class="form-control @error('category_url_3') is-invalid @enderror"
                                           name="category_url_3"
                                           value="{{ old('category_url_3') }}" required>

                                    @error('category_url_3')
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
