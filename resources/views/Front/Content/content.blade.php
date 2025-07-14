@extends('Front.Master.master')
@section('content')

<!-- Hero section -->
<section class="hero-section" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQQBV2jMDlc8vxdXXlmnYo8Y_qFvDVjFgNFQ&s'); background-size: cover; background-position: center; height: 100vh;">
</section>

<!-- Hero section end -->

<section class="intro-section spad pb-0">
 <div class="section-title">
  <h2>Latest Products</h2>
  <p>We recommend</p>
 </div>

 <div class="intro-slider">
  <ul class="slidee">
   @foreach ($products as $product)
    <li>
     <div class="intro-item">
      <figure>
       <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title ?? 'Product' }}" style="height:300px; width:100%; object-fit:cover;">
      </figure>
      <div class="product-info">
       <h5>{{ $product->title }}</h5>

       @if (isset($product->rent_per_day))
        <p>PKR {{ number_format($product->rent_per_day, 2) }} per day</p>
        <a href="{{ route('rental.detail', $product->id) }}" class="site-btn btn-line">View Rental</a>
       @elseif (isset($product->price))
        <p>PKR {{ number_format($product->price, 2) }}</p>
        <a href="{{ route('thrift.detail', $product->id) }}" class="site-btn btn-line">View Thrift</a>
       @endif

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

@endsection