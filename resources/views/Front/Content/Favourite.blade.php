@extends('Front.Master.master')

@section('content')
    <div class="container my-5">
        <h3 class="mb-4">Your Favourite Posts</h3>
        <div class="row" id="product-filter">
            @foreach ($favourites as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-item">
                        <figure>
                            @if ($product->type === 'rental')
                                <a href="{{ route('rental.detail', $product->id) }}">
                                    <img style="height:200px; width:auto;" src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->title }}">
                                </a>
                            @else
                                <a href="{{ route('thrift.detail', $product->id) }}">
                                    <img style="height:200px; width:auto;" src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->title }}">
                                </a>
                            @endif

                            <div class="pi-meta" style="height: auto; padding: 10px 0;">
                                <div class="pi-m-left">
                                    <a
                                        href="{{ $product->type === 'rental' ? route('rental.detail', $product->id) : route('thrift.detail', $product->id) }}">
                                        <img src="{{ asset('Front/img/icons/eye.png') }}" alt=""
                                            style="cursor: pointer;">
                                    </a>
                                    <p style="display: inline; cursor: pointer;"
                                        onclick="window.location='{{ $product->type === 'rental' ? route('rental.detail', $product->id) : route('thrift.detail', $product->id) }}';">
                                        Details
                                    </p>
                                </div>
                                <div class="pi-m-right">
                                    <form
                                        action="{{ $product->type === 'rental' ? route('unfavourite.rental', $product->id) : route('unfavourite.thrift', $product->id) }}"
                                        method="POST">
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
                            <h6>{{ $product->title }}
                                <span class="badge {{ $product->type === 'rental' ? 'badge-primary' : 'badge-success' }}">
                                    {{ ucfirst($product->type) }}
                                </span>
                            </h6>
                            <p>
                                {{ $product->type === 'rental' ? number_format($product->rent_per_day, 2) . ' PKR' : number_format($product->price, 2) . ' PKR' }}
                            </p>
                            <a href="{{ $product->type === 'rental' ? route('rental.order', $product->id) : route('thrift.order', $product->id) }}"
                                class="site-btn btn-line">
                                {{ $product->type === 'rental' ? 'BOOK' : 'Order Now' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
