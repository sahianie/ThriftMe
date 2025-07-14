@extends('Front.Master.master') {{-- ya apna layout jo use krty ho --}}

@section('content')
<div class="container my-5">
    <h3 class="mb-4">Your Favourite Posts</h3>
    <div class="row" id="product-filter">
        {{-- Rental Favourites --}}
        @foreach ($rentalFavourites as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="product-item">
                <figure>
                    <a href="{{ route('rental.detail', $product->id) }}">
                        <img style="height:200px; width:auto;" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                    </a>
                    <div class="pi-meta" style="height: auto; padding: 10px 0;"> <!-- Adjust height here -->
                        <div class="pi-m-left">
                            <a href="{{ route('rental.detail', $product->id) }}">
                                <img src="{{ asset('Front/img/icons/eye.png') }}" alt="" style="cursor: pointer;"> <!-- Added cursor pointer -->
                            </a>
                            <p style="display: inline; cursor: pointer;" onclick="window.location='{{ route('rental.detail', $product->id) }}';">Details</p> <!-- Made text clickable -->
                        </div>
                        <div class="pi-m-right">
                            <form action="{{ route('unfavourite.rental', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; padding: 0;">
                                    <img src="{{ asset('Front/img/icons/heart-filled.png') }}" alt="Unsave">
                                </button>
                            </form>
                        </div>
                    </div>
                </figure>
                <div class="product-info">
                    <h6>{{ $product->title }} <span class="badge badge-primary">Rental</span></h6>
                    <p>{{ number_format($product->rent_per_day, 2) }} PKR</p>
                    <a href="{{ route('rental.order', $product->id) }}" class="site-btn btn-line">BOOK</a>
                </div>
            </div>
        </div>
        @endforeach

        {{-- Thrift Favourites --}}
        @foreach ($thriftFavourites as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="product-item">
            <figure>
                    <a href="{{ route('thrift.detail', $product->id) }}">
                        <img style="height:200px; width:auto;" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                    </a>
                    <div class="pi-meta" style="height: auto; padding: 10px 0;"> <!-- Adjust height here -->
                        <div class="pi-m-left">
                            <a href="{{ route('rental.detail', $product->id) }}">
                                <img src="{{ asset('Front/img/icons/eye.png') }}" alt="" style="cursor: pointer;"> <!-- Added cursor pointer -->
                            </a>
                            <p style="display: inline; cursor: pointer;" onclick="window.location='{{ route('thrift.detail', $product->id) }}';">Details</p> <!-- Made text clickable -->
                        </div>
                        <div class="pi-m-right">
                            <form action="{{ route('unfavourite.thrift', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; padding: 0;">
                                    <img src="{{ asset('Front/img/icons/heart-filled.png') }}" alt="Unsave">
                                </button>
                            </form>
                        </div>
                    </div>
                </figure>
                <div class="product-info">
                    <h6>{{ $product->title }} <span class="badge badge-success">Thrift</span></h6>
                    <p>{{ number_format($product->price, 2) }} PKR</p>
                    <a href="{{ route('thrift.order', $product->id) }}" class="site-btn btn-line">Order Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection