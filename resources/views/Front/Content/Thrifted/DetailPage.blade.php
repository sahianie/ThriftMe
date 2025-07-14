@extends('Front.Master.master')

@section('content')

<!-- Page -->
<div class="page-area product-page spad">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Product Image Section -->
            <div class="col-lg-6 text-center">
                <figure>
                    <img style="height:350px; width: 400px;" class="product-big-img" src="{{ asset('storage/' . $thrift->image) }}" alt="{{ $thrift->title }}">
                </figure>
            </div>

            <!-- Product Details Section -->
            <div class="col-lg-6 text-center">
                <div class="product-content">
                    <h2>{{ $thrift->title }}</h2>
                    
                    <div class="pc-meta">
                        <h4 class="price">PKR {{ $thrift->price }}</h4>
                    </div>

                    <!-- Thrift Details -->
                    <ul class="thrift-details" style="display: inline-block; text-align: left; list-style: none; padding: 0;">
                        <li><strong>Category:</strong> {{ ucfirst($thrift->type) }}</li>
                        <li><strong>Size:</strong> {{ ucfirst($thrift->size) }}</li>
                        <li><strong>Material:</strong> {{ $thrift->material }}</li>
                        <li><strong>Condition:</strong> {{ $thrift->condition }}</li>
                    </ul>
                    <br>
                    <br>
                    <a href="{{ route('thrift.order', $thrift->id) }}" class="site-btn btn-line">Order Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
