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
			<h2>Latest Rental Products</h2>
			<p>We recommend</p>
		</div>
		<div class="intro-slider">
    <ul class="slidee">
        @foreach ($products as $product)
            <li>
                <div class="intro-item">
                    <figure>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                    </figure>
                    <div class="product-info">
                        <h5>{{ $product->title }}</h5>
                        <p>{{ number_format($product->rent_per_day, 2) }} per day</p>
                        <a href="{{ route('rental.detail', $product->id) }}" class="site-btn btn-line">View Details</a>
                    </div>
                </div>
            </li>
        @endforeach
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


	


	


	
    @endsection