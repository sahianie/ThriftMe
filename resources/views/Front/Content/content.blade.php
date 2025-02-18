@extends('Front.Master.master')
@section('content')

<!-- Hero section -->
<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="hs-left"><img src="Front/img/slider-img.png" alt=""></div>
				<div class="hs-right">
					<div class="hs-content">
						<div class="price">from $19.90</div>
						<h2><span>2018</span> <br>summer collection</h2>
						<a href="" class="site-btn">Shop NOW!</a>
					</div>	
				</div>
			</div>
			<div class="hs-item">
				<div class="hs-left"><img src="Front/img/slider-img.png" alt=""></div>
				<div class="hs-right">
					<div class="hs-content">
						<div class="price">from $19.90</div>
						<h2><span>2018</span> <br>summer collection</h2>
						<a href="" class="site-btn">Shop NOW!</a>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	
	<!-- Intro section -->
	<section class="intro-section spad pb-0">
		<div class="section-title">
			<h2>pemium products</h2>
			<p>We recommend</p>
		</div>
		<div class="intro-slider">
			<ul class="slidee">
				<li>
					<div class="intro-item">
						<figure>
							<img src="Front/img/intro/1.jpg" alt="#">
						</figure>
						<div class="product-info">
							<h5>Pink Sunglasses</h5>
							<p>$319.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
				<li>
					<div class="intro-item">
						<figure>
							<img src="Front/img/intro/2.jpg" alt="#">
						</figure>
						<div class="product-info">
							<h5>Black Nighty</h5>
							<p>$319.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
				<li>
					<div class="intro-item">
						<figure>
							<img src="Front/img/intro/3.jpg" alt="#">
							<div class="bache">NEW</div>
						</figure>
						<div class="product-info">
							<h5>Yellow Sholder bag</h5>
							<p>$319.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
				<li>
					<div class="intro-item">
						<figure>
							<img src="Front/img/intro/4.jpg" alt="#">
						</figure>
						<div class="product-info">
							<h5>Yellow Sunglasses</h5>
							<p>$319.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
				<li>
					<div class="intro-item">
						<figure>
							<img src="Front/img/intro/5.jpg" alt="#">
						</figure>
						<div class="product-info">
							<h5>Black Sholder bag</h5>
							<p>$319.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="container">
			<div class="scrollbar">
				<div class="handle">
					<div class="mousearea"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->


	<!-- Featured section -->
	<div class="featured-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="featured-item">
						<img src="Front/img/featured/featured-1.jpg" alt="">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="featured-item mb-0">
						<img src="Front/img/featured/featured-2.jpg" alt="">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Featured section end -->


	


	<!-- Blog section -->	
	<section class="blog-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="featured-item">
						<img src="img/featured/featured-3.jpg" alt="">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
				<div class="col-lg-7">
					<h4 class="bgs-title">from the blog</h4>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="img/blog-thumb/1.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>10 tips to dress like a queen</h5>
							<div class="bi-meta">July 02, 2018   |   By maria deloreen</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="img/blog-thumb/2.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>Fashion Outlet products</h5>
							<div class="bi-meta">July 02, 2018   |   By Jessica Smith</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="img/blog-thumb/3.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>the little black dress just for you</h5>
							<div class="bi-meta">July 02, 2018   |   By maria deloreen</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->	
    @endsection