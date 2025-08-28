@extends('Front.Master.master')
@section('content')
    <style>
        .hero-section {
            background-image: url("{{ asset('assets/admin/img/home.jpg') }}");
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .hero-content .btn {
            padding: 12px 30px;
            background: #ff6b6b;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }
        }
    </style>

    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 style="color: #fcf8f8ff;">Discover Amazing Thrift Deals</h1>
            <h4 style="color: #ff0582ff;">Clothes, Shoes & Bags at Unbeatable Prices</p>
        </div>
    </section>

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
                            <figure
                                style="display: flex; align-items: center; justify-content: center; height:300px; width:100%; overflow:hidden;">
                                <img src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->title ?? 'Product' }}"
                                    style="max-height: 100%; max-width: 100%; object-fit: contain;">
                            </figure>

                            <div class="product-info">
                                <h5>{{ $product->title }}</h5>

                                @if (isset($product->rent_per_day))
                                    <p>PKR {{ number_format($product->rent_per_day, 2) }} per day</p>
                                    <a href="{{ route('rental.detail', $product->id) }}" class="site-btn btn-line">View
                                        Rental</a>
                                @elseif (isset($product->price))
                                    <p>PKR {{ number_format($product->price, 2) }}</p>
                                    <a href="{{ route('thrift.detail', $product->id) }}" class="site-btn btn-line">View
                                        Buy</a>
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
