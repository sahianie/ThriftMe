@extends('Front.Master.master')

@section('content')
<div class="page-area cart-page spad">
    <div class="container">
        <form action="{{ route('thrift.order.store') }}" method="POST" class="checkout-form">
            @csrf
            <div class="row">
                <!-- Left Side - Billing Address -->
                <div class="col-lg-6">
                    <h4 class="checkout-title">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input style="background-color: #f3f4f6; border: 1px solid #ccc;" type="text" id="Username" name="username" placeholder="Username *" value="{{ old('username') }}">
                            @error('username')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <input style="background-color: #f3f4f6; border: 1px solid #ccc;" type="text" id="Address" name="address" placeholder="Address *" value="{{ old('address') }}">
                            @error('address')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <input style="background-color: #f3f4f6; border: 1px solid #ccc;" type="text" id="Contact" name="contact" placeholder="Contact *" value="{{ old('contact') }}">
                            @error('contact')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <input type="hidden" name="thrift_id" value="{{ $thrift->id }}">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="site-btn btn-line">Sold</button>
                    </div>
                </div>

                <!-- Right Side - Order Details -->
                <div class="col-lg-6">
                    <div class="order-card" style="background-color: #f3f4f6; padding: 20px;">
                        <div class="order-details">
                            <h4 class="checkout-title">Your order</h4>
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
        </form>
    </div>
</div>

<style>
    .checkout-form input[type="text"] {
        height: 45px;
        padding-left: 15px;
        font-size: 14px;
        width: 100%;
    }
    .site-btn.btn-line {
        background: transparent;
        padding: 10px 30px;
        font-weight: 600;
        transition: 0.3s;
    }
</style>
@endsection
