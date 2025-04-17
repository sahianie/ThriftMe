@extends('Front.Master.master')

@section('content')
<div class="page-area cart-page spad">
	<div class="container">
		<form action="{{route('sold.order.store')}}" method="POST" class="checkout-form">
		@csrf
			<div class="row">
				<div class="col-lg-6">
					<h4 class="checkout-title">Billing Address</h4>
					<div class="row">
						<div class="col-md-12">
							<input type="text" id="Username" name="username" placeholder="Username *">
							<input type="text" id="Address" name="address" placeholder="Address *">
							<input type="text" id="Contact" name="contact" placeholder="Contact *">
						</div>
						<input type="hidden" name="thrift_id" value="{{ $thrift->id }}"> <!-- Hidden input for thrift ID -->
					</div>
				</div>

				<!-- Hidden Input Field for Total Amount -->
				<input type="hidden" id="totalAmount" value="{{ $thrift->price }}">

				<script>
					// You can add any necessary scripts if required for price calculation or other functionalities
				</script>

				<div class="col-lg-6">
					<div class="order-card">
						<div class="order-details">
							<div class="od-warp">
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
											<td>${{ number_format($thrift->price, 2) }}</td>
										</tr>

										<tr class="cart-subtotal">
											<td>Shipping</td>
											<td>Free</td>
										</tr>
									</tbody>
									<tfoot>
										<tr class="order-total">
											<th>Total</th>
											<th id="displayTotalAmount">${{ number_format($thrift->price, 2) }}</th> <!-- Total Amount -->
										</tr>
									</tfoot>
								</table>
							</div>
						</div>

						<button type="submit" class="site-btn btn-full">Booked</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
