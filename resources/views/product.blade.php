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
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="{{url('/')}}">Home</a> /
				<a href="">Sales</a>/
				<span>{{$single_product->product_name}}</span>
			</div>
			<img src="{{asset('front_assets')}}/img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	<div class="page-area product-page spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<figure>
						<img class="product-big-img" src="{{ asset('uploads/product_photo') }}/{{$single_product->product_image}}" alt="photo not found">
					</figure>
					<div class="product-thumbs">
						<div class="product-thumbs-track">
							<div class="pt" data-imgbigurl="img/product/1.jpg"><img src="img/product/thumb-1.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/2.jpg"><img src="img/product/thumb-2.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/3.jpg"><img src="img/product/thumb-3.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/4.jpg"><img src="img/product/thumb-4.jpg" alt=""></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="product-content">
						<h2>{{$single_product->product_name}}</h2>
						<h5>Category:{{ $single_product->relationcategory->product_category }}</h5>
						<hr>
						<div class="pc-meta">
							<h4 class="price">টাকা-{{$single_product->product_price}}</h4>
							<div class="review">
								<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star is-fade"></i>
								</div>
								<span>(2 reviews)</span>
							</div>
						</div>
						<p>{{$single_product->product_description}}</p>
						<div class="color-choose">
							<span>Colors:</span>
							<div class="cs-item">
								<input type="radio" name="cs" id="black-color" checked>
								<label class="cs-black" for="black-color"></label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="blue-color">
								<label class="cs-blue" for="blue-color"></label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="yollow-color">
								<label class="cs-yollow" for="yollow-color"></label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="orange-color">
								<label class="cs-orange" for="orange-color"></label>
							</div>
						</div>
						<div class="size-choose">
							<span>Size:</span>
							<div class="sc-item">
								<input type="radio" name="sc" id="l-size" checked>
								<label for="l-size">L</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xl-size">
								<label for="xl-size">XL</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xxl-size">
								<label for="xxl-size">XXL</label>
							</div>
						</div>
						<a href="#" class="site-btn btn-line">ADD TO CART</a>
					</div>
				</div>
			</div>
			<div class="product-details">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Description</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Additional information</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews (0)</a>
							</li>
						</ul>
						<div class="tab-content">
							<!-- single tab content -->
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
								<p>{{$single_product->product_description}}</p>
							</div>
							<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
							</div>
							<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center rp-title">
				<h5>Related products</h5>
			</div>
			<div class="row">
				@forelse($related_product as $rel_product)
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src="{{ asset('uploads/product_photo') }}/{{$rel_product->product_image}}" alt="photo not found">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="{{ asset('uploads/product_photo') }}/{{$rel_product->product_image}}" alt="photo not found">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="{{ asset('uploads/product_photo') }}/{{$rel_product->product_image}}" alt="photo not found">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>{{$rel_product->product_name}}</h6>
							<p>টাকা - {{$rel_product->product_price}}</p>
							<a href="{{url('product')}}/{{$rel_product->id}}" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>
				@empty
					<div class="alert alert-warning">No Related Product</div>
					@endforelse

			</div>
		</div>
	</div> 
	<!-- Page end -->



@endsection