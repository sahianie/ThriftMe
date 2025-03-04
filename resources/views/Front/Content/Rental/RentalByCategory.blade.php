@extends('Front.Master.master')
@section('content')

    <!-- Product section -->
<section class="product-section spad">
		<div class="container">
		<ul class="product-filter controls">
		@foreach($categories as $category)
       
            <!-- <h3>{{ $category->category_name }}</h3> -->
			<li class="control" > <a href="{{ route('rentals.bycategory', ['category_id' => $category->id]) }}">{{ $category->category_name }}</a></li>
    @endforeach
</ul>


<div class="row" id="product-filter">
    @foreach ($products as $product)
        <div class="mix col-lg-3 col-md-6 best">
            <div class="product-item">
                <figure>
                <img style="height:200px; width: 30px;" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">

                    <div class="pi-meta">
                        <div class="pi-m-left">
                            <img src="{{ asset('Front/img/icons/eye.png') }}" alt="">
                            <p>quick view</p>
                        </div>
                        <div class="pi-m-right">
                            <img src="{{ asset('Front/img/icons/heart.png') }}" alt="">
                            <p>save</p>
                        </div>
                    </div>
                </figure>
                <div class="product-info">
                    <h6>{{ $product->title }}</h6>
                    <p>{{ number_format($product->rent_per_day, 2) }}</p>
                    <a href="{{ route('rental.detail', $product->id) }}" class="site-btn btn-line">DETAIL</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

		</div>
	</section>
	<!-- Product section end -->
    @endsection