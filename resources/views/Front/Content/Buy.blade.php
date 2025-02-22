@extends('Front.Master.master')
@section('content')


<!-- Page Info -->
<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="">Home</a> /
				<span>Buy</span>
			</div>
			<img src="Front/img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->

    <!-- Product section -->
<section class="product-section spad">
		<div class="container">
		<ul class="product-filter controls">
		@foreach($categories as $category)
       
            <!-- <h3>{{ $category->category_name }}</h3> -->
			<li class="control" >{{ $category->category_name }}</li>
    @endforeach
</ul>

			<div class="row" id="product-filter">
				<div class="mix col-lg-3 col-md-6 best">
					<div class="product-item">
						<figure>
							<img src="Front/img/products/1.jpg" alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="Front/img/icons/eye.png" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="Front/img/icons/heart.png" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>Long red Shirt</h6>
							<p>$39.90</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Product section end -->
    @endsection