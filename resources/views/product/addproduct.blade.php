@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8">
    <div class="card mb-4">
            <div class="card-header bg-success">
                <h3>Product List</h3>
            </div>
            @if(session('deletemsg'))
                <div class="alert alert-danger">
                    {{ session('deletemsg') }}
                </div>
            @endif
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">category Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">product_image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($all_product as $product)
                        <tr>
                            <th>{{$product->product_name}}</th>
                            <th>{{$product->relationcategory->product_category}}</th>
                            <td>{{ str_limit($product->product_description, 100)}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_quantity}}</td>
                            <td>
                                <img src="{{ asset('uploads/product_photo') }}/{{$product->product_image}}" alt="photo not found" width="80">
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-info" href="{{ url('edit/product') }}/{{ $product->id }}">Edit</a>
                                    <a class="btn btn-sm btn-warning" href="{{ url('delete/product') }}/{{ $product->id }}">Del</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="col-md-8"> No Data Available</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $all_product->links() }}
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-danger">
                <h3>Product Deleted</h3>
            </div>
            @if(session('deletemsg'))
                <div class="alert alert-danger">
                    {{ session('deletemsg') }}
                </div>
            @endif
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>

                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($deleted_product as $del_pro)
                        <tr>
                            <th>{{$del_pro->product_name}}</th>
                            <td>{{ str_limit($del_pro->product_description, 100)}}</td>
                            <td>{{$del_pro->product_price}}</td>
                            <td>{{$del_pro->product_quantity}}</td>

                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-success" href="{{ url('restore/product') }}/{{ $del_pro->id }}">Restore</a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('forceDelete/product') }}/{{ $del_pro->id }}">permanent Del</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="col-md-8"> No Data Available</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

            </div>
        </div>
        </div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success">
                Add Product Form
                </div>
                @if(session('status'))
                <div class="alert alert-success">
                {{ session('status') }}
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>
                {{$error}}
                </li>
                @endforeach
                </div>
                @endif
                <div class="card-body">
                <form action="{{ url('add/product/insert') }}" method="post" enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label>Product Category</label>
                     <select class="form-control" name="category_id">
                         <option>--Select--</option>
                         @foreach($categories as $category)
                         <option value="{{ $category->id }}">{{ $category->product_category }}</option>
                         @endforeach
                     </select>
                </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input name="product_name" type="text" class="form-control" id="product_name"  placeholder="Enter product name" value="{{ old('product_name') }}">
                    </div>

                <div class="form-group">
                    <label>Product Description</label>
                  <textarea class="form-control" row=5 name="product_description">{{ old('product_description') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" class="form-control" id="price"  placeholder="Enter product price" name="product_price" value="{{ old('product_price') }}">
                </div>
                <div class="form-group">
                    <label>Product Quantity</label>
                    <input type="text" class="form-control" id="quantity"  placeholder="Enter product quantity" name="product_quantity" value="{{ old('product_quantity') }}">
                </div>
                <div class="form-group">
                    <label>Alert Quantity</label>
                    <input type="text" class="form-control" id="alert_quantity"  placeholder="Enter product alert_quantity" name="product_alert_quantity" value="{{ old('product_alert_quantity') }}">
                </div>
                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" class="form-control" id="product_image" name="product_image" value="{{ old('product_alert_quantity') }}">
                    </div>
                <button type="submit" class="btn btn-info">Add Product</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection