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

        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <h2 class="mb-4">Billing Address</h2>

                <form action="{{ route('thrift.order.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="thrift_id" value="{{ $thrift->id }}">

                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username"
                            value="{{ old('username') }}">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" name="address" class="form-control"
                            placeholder="Type your complete authentic address here" value="{{ old('address') }}">
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

                    <div class="text-center mt-4">
                        <button type="submit" class="site-btn btn-line">Buy Now</button>
                    </div>
                </form>
            </div>

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
                                    <td>{{ $thrift->title }}</td>
                                    <td>PKR {{ number_format($thrift->price, 2) }}</td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <td>Shipping</td>
                                    <td>Free</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <th id="displayTotalAmount">PKR {{ number_format($thrift->price, 2) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
