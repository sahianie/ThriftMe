@extends('Front.Master.master')

@section('content')

<!-- Page -->
<div class="page-area product-page spad">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Product Image Section -->
            <div class="col-lg-6 text-center">
                <figure>
                    <img style="height:350px; width: 400px;" class="product-big-img" src="{{ asset('storage/' . $rental->image) }}" alt="{{ $rental->title }}">
                </figure>
            </div>

            <!-- Product Details Section -->
            <div class="col-lg-6 text-center">
                <div class="product-content">
                    <h2>{{ $rental->title }}</h2>
                    
                    <div class="pc-meta">
                        <h4 class="price">PKR {{ $rental->rent_per_day }}</h4>
                    </div>

                    <!-- Rental Details -->
                    <ul class="rental-details" style="display: inline-block; text-align: left; list-style: none; padding: 0;">
                        <li><strong>Category:</strong> {{ ucfirst($rental->type) }}</li>
                        <li><strong>Size:</strong> {{ ucfirst($rental->size) }}</li>
                        <li><strong>Material:</strong> {{ $rental->material }}</li>
                        <li><strong>Condition:</strong> {{ $rental->condition }}</li>
                    </ul>

                    <!-- Booked Dates Section Start -->
                    <div class="booked-dates" style="margin-top: 30px; text-align: left;">
                        <h4>Already Booked Dates:</h4>

                        @if($bookings->count() > 0)
                            <ul style="list-style: none; padding: 0;">
                                @foreach($bookings as $booking)
                                    <li> 
                                        {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }} 
                                        to 
                                        {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p style="color: green;">Currently no bookings! Available for any date.</p>
                        @endif
                    </div>
                    <!-- Booked Dates Section End -->

                    <br><br>
                    <a href="{{ route('rental.order', $rental->id) }}" class="site-btn btn-line">Book</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
