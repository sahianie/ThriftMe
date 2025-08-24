@extends('Front.Master.master')

@section('content')
    <div class="container mt-5 mb-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <!-- Left side: Rental Order Form -->
            <div class="col-md-6">
                <h2 class="mb-4">Billing Address</h2>

                <form action="{{ route('rental.order.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="rental_id" value="{{ $rental->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username"
                            value="{{ old('username') }}">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" name="address" class="form-control" placeholder="Type your complete authentic address here"
                            value="{{ old('address') }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" name="contact" class="form-control" placeholder="Contact"
                            value="{{ old('contact') }}">
                        @error('contact')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="start_date" id="startDate" class="form-control datepicker"
                                placeholder="Start Date" value="{{ old('start_date') }}">
                            @error('start_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="end_date" id="endDate" class="form-control datepicker"
                                placeholder="End Date" value="{{ old('end_date') }}">
                            @error('end_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="number" name="total_days" id="days" class="form-control" placeholder="Total Days"
                            value="{{ old('total_days') }}" readonly>
                        @error('total_days')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="site-btn btn-line">Booked</button>
                    </div>
                </form>
                <!-- Form close after both sides -->
            </div>

            <!-- Right side: Your Order -->
            <div class="col-md-6">
                <div class="order-card">
                    <div class="order-details">
                        <h4 class="checkout-title">Your order</h4>
                        <br>
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $rental->title }}</td>
                                    <td>PKR {{ number_format($rental->rent_per_day, 2) }}</td>
                                </tr>

                                <tr>
                                    <td>Total Days</td>
                                    <td id="displayTotalDays">0</td>
                                </tr>

                                <tr class="cart-subtotal">
                                    <td>Shipping</td>
                                    <td>Free</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <th id="displayTotalAmount">PKR 0.00</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Flatpickr Library -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        let bookedDates = @json(
            $bookings->map(function ($booking) {
                return [
                    'from' => \Carbon\Carbon::parse($booking->start_date)->format('Y-m-d'),
                    'to' => \Carbon\Carbon::parse($booking->end_date)->format('Y-m-d'),
                ];
            }));

        let startPicker = flatpickr("#startDate", {
            minDate: "today",
            dateFormat: "Y-m-d",
            disable: bookedDates.map(function(booking) {
                return {
                    from: booking.from,
                    to: booking.to
                };
            }),
            onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length > 0) {
                    endPicker.set("minDate", dateStr); // prevent selecting before start
                    calculateDays(); // auto-update days
                }
            }
        });

        let endPicker = flatpickr("#endDate", {
            minDate: "today",
            dateFormat: "Y-m-d",
            disable: bookedDates.map(function(booking) {
                return {
                    from: booking.from,
                    to: booking.to
                };
            }),
            onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length > 0) {
                    startPicker.set("maxDate", dateStr); // optional
                    calculateDays(); // auto-update days
                }
            }
        });

        function calculateDays() {
            let start = document.getElementById('startDate').value;
            let end = document.getElementById('endDate').value;

            if (start && end) {
                let startDate = new Date(start);
                let endDate = new Date(end);
                let diffTime = endDate - startDate;
                let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                document.getElementById('days').value = diffDays > 0 ? diffDays : '';

                // Update right side display
                document.getElementById('displayTotalDays').innerText = diffDays;

                let rentPerDay = {{ $rental->rent_per_day }};
                let totalAmount = rentPerDay * diffDays;
                document.getElementById('displayTotalAmount').innerText = `PKR ${totalAmount.toFixed(2)}`;
            }
        }
    </script>
@endsection
