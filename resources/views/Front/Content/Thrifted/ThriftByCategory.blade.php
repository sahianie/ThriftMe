@extends('Front.Master.master')
@section('content')
    <section class="product-section spad">
        <div class="container">
            <ul class="product-filter controls">
                @foreach ($categories as $category)
                    <li class="control">
                        <a href="{{ route('thrifts.bycategory', ['category_id' => $category->id]) }}">
                            {{ $category->category_name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="row" id="product-filter">
                @foreach ($products as $product)
                    <div class="mix col-lg-4 col-md-6 mb-4">
                        <div class="product-item">
                            <figure>
                                <img style="height:200px; width:auto;" src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->title }}">
                                <div class="pi-meta d-flex justify-content-between align-items-center px-3"
                                    style="height: 50px;">
                                    <div class="pi-m-left d-flex align-items-center">
                                        <a href="{{ route('thrift.detail', $product->id) }}"
                                            style="text-decoration: none; color: inherit;">
                                            <img src="{{ asset('Front/img/icons/eye.png') }}" alt="Quick View">
                                            <p class="mb-0 ms-2">Details</p>
                                        </a>
                                    </div>


                                    <div class="pi-m-right">
                                        @auth
                                            @php
                                                $isFavourite = Auth::user()->thriftFavourites->contains($product->id);
                                            @endphp

                                            <form
                                                action="{{ $isFavourite ? route('unfavourite.thrift', $product->id) : route('favourite.thrift', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @if ($isFavourite)
                                                    @method('DELETE')
                                                @endif

                                                <button type="submit" style="background: none; border: none; padding: 0;">
                                                    <img src="{{ $isFavourite ? asset('Front/img/icons/heart-filled.png') : asset('Front/img/icons/heart.png') }}"
                                                        alt="Favourite">
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('login') }}">
                                                <img src="{{ asset('Front/img/icons/heart.png') }}" alt="Login to save">
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </figure>
                            <div class="product-info text-center mt-2">
                                <h6>{{ $product->title }}</h6>
                                <p>{{ number_format($product->price, 2) }} PKR</p>
                                <a href="{{ route('thrift.order', $product->id) }}" class="site-btn btn-line">Order Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
