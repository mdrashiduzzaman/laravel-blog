@extends('frontend.master')
@section('content')
    <!-- Header section -->
    <header class="header-section header-normal">
        <div class="container-fluid">
            <!-- logo -->
            <div class="site-logo">
                <img src="{{asset('front_assets')}}/img/logo.png" alt="logo">
            </div>
            <!-- responsive -->
            <div class="nav-switch">
                <i class="fa fa-bars"></i>
            </div>
            <div class="header-right">
                <a href="cart.html" class="card-bag"><img src="{{asset('front_assets')}}/img/icons/bag.png" alt=""><span>2</span></a>
                <a href="#" class="search"><img src="{{asset('front_assets')}}/img/icons/search.png" alt=""></a>
            </div>
            <!-- site menu -->
            <ul class="main-menu">
                @php
                    $menus = App\Category::where('menu_status', 1)->get();
                @endphp
                <li><a href="{{url('/')}}">Home</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{ url('menu/product/view') }}/{{ $menu->id }}">{{ $menu->product_category }}</a></li>
                @endforeach
                <li><a href="#">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
    </header>
    <!-- Header section end -->
    <!-- Page Info -->
    <div class="page-info-section page-info-big">
        <div class="container">
            @foreach($categories as $category)
            <h2>{{ $category->product_category }}</h2>

            <div class="site-breadcrumb">
                <a href="{{url('/')}}">Home</a> /
                <span>{{ $category->product_category }}</span>
            </div>
            @endforeach
            <img src="{{asset('front_assets')}}/img/categorie-page-top.png" alt="" class="cata-top-pic">
        </div>
    </div>
    <!-- Page Info end -->


    <!-- Page -->
    <div class="page-area categorie-page spad">
        <div class="container">
            <div class="categorie-filter-warp">
                <p>Showing 12 results</p>
                <div class="cf-right">
                    <div class="cf-layouts">
                        <a href="#"><img src="{{asset('front_assets')}}/img/icons/layout-1.png" alt=""></a>
                        <a class="active" href="#"><img src="{{asset('front_assets')}}/img/icons/layout-2.png" alt=""></a>
                    </div>
                    <form action="#">
                        <select>
                            <option>Color</option>
                        </select>
                        <select>
                            <option>Brand</option>
                        </select>
                        <select>
                            <option>Sort by</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach($menu_products as $menu_prod)
                <div class="col-lg-3">
                    <div class="product-item">
                        <figure>
                            <img class="product-big-img" src="{{ asset('uploads/product_photo') }}/{{$menu_prod->product_image}}" alt="photo not found">
                            <div class="pi-meta">
                                <div class="pi-m-left">
                                    <img src="{{asset('front_assets')}}/img/icons/eye.png" alt="">
                                    <p>quick view</p>
                                </div>
                                <div class="pi-m-right">
                                    <img src="{{asset('front_assets')}}/img/icons/heart.png" alt="">
                                    <p>save</p>
                                </div>
                            </div>
                        </figure>
                        <div class="product-info">
                            <h6>{{ $menu_prod->product_name }}</h6>
                            <p>টাকা -:{{ $menu_prod->product_price }}</p>
                            <a href="{{url('product')}}/{{$menu_prod->id}}" class="site-btn btn-line">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Page -->

@endsection