@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-success">
                        <h3>Category List</h3>
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
                                <th scope="col">Category</th>
                                <th scope="col">menu Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)

                                <tr>
                                    <th>{{ $category->product_category }}</th>
                                    <td>{{ ($category->menu_status == 1) ? "Yes":"No" }}</td>
                                    <td>{{ $category->created_at->format('d-M-Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-sm btn-info" href="#">Edit</a>
                                            <a class="btn btn-sm btn-danger" href="#">Delete</a>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td> No Data found</td>
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
                        Add Category Form
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
                        <form action="{{ url('add/category') }}" method="post" > @csrf

                            <div class="form-group">
                                <label>Product Category</label>
                                <input type="text" class="form-control" id="category"  placeholder="Enter product Category" name="product_category" value="{{ old('product_category') }}">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="menu_status" value="1" id="menu"><label for="menu">Use as Menu</label>
                            </div>

                            <button type="submit" class="btn btn-info">Add Product Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection