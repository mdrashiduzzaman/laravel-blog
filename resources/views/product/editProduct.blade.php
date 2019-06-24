@extends('layouts.app')
@section('content')

<div class="col-md-6 offset-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/Add/Product') }}">Product List</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }}</li>
  </ol>
</nav>
            <div class="card">
                <div class="card-header bg-success">
                Edit Product 
                </div>
                @if(session('updatedmsg'))
                <div class="alert alert-success">
                {{ session('updatedmsg') }}
                </div>
                @endif
                <div class="card-body">
                <form action="{{ url('/update/product') }}/{{$product->id}}" method="post" enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label>Product Name</label>
                    <input name="product_name" type="text" class="form-control" id="product_name"  value="{{ $product->product_name }}">
                </div>

                <div class="form-group">
                    <label>Product Description</label>
                  <textarea class="form-control" row=5 name="product_description"> {{ $product->product_description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" class="form-control" id="price"  value="{{ $product->product_price }}" name="product_price">
                </div>
                <div class="form-group">
                    <label>Product Quantity</label>
                    <input type="text" class="form-control" id="quantity"  value="{{ $product->product_quantity }}" name="product_quantity">
                </div>
                <div class="form-group">
                    <label>Alert Quantity</label>
                    <input type="text" class="form-control" id="alert_quantity"  value="{{ $product->product_alert_quantity }}" name="product_alert_quantity">
                </div>
                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" class="form-control" id="product_image" name="product_image">

                    </div>
                    <div class="form-group">
                        <img src="{{asset('uploads/product_photo')}}/{{ $product->product_image }}" alt="not found photo" width="80">
                    </div>
                <button type="submit" class="btn btn-info">Edit Product</button>
                </form>
                </div>
            </div>
        </div>
@endsection