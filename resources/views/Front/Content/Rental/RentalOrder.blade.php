@extends('Front.Master.master')
@section('content')
<div class="page-area cart-page spad">
	<div class="container">
		<form action="{{route ('rental.order.store')}}"  method="POST" class="checkout-form">
		@csrf
			<div class="row">
				<div class="col-lg-6">
					<h4 class="checkout-title">Billing Address</h4>
					<div class="row">
						<div class="col-md-12">
							<input type="text" id="Username" name="username" placeholder="Username *">
							<input type="text" id="Address" name="address" placeholder="Address *">

							<!-- <label>Start Date</label> -->
							<input type="date" id="startDate" name="start_date" onchange="calculateDays()">

							<!-- <label>End Date</label> -->
							<input type="date" id="endDate" name="end_date" onchange="calculateDays()">

							<!-- <label>Total Days</label> -->
							<input type="text" id="totalDays" name="total_days" placeholder="Total Days" readonly>

							<input type="text" id="Contact" name="contact" placeholder="Contact *">
						</div>
						<input type="hidden" name="rental_id" value="{{ $rental->id }}"> <!-- Hidden input for rental ID -->
					</div>
				</div>

				<!-- Hidden Input Field for Rent Per Day -->
				<input type="hidden" id="rentPerDay" value="{{ $rental->rent_per_day }}">

				<script>
					function calculateDays() {
						let start = document.getElementById("startDate").value;
						let end = document.getElementById("endDate").value;
						let rentPerDay = document.getElementById("rentPerDay").value; // Rent value hidden input se lena

						if (start && end) {
							let startDate = new Date(start);
							let endDate = new Date(end);
							let timeDiff = endDate - startDate;

							let totalDays = timeDiff / (1000 * 60 * 60 * 24);
							if (totalDays >= 0) {
								// Total Days input field update
								document.getElementById("totalDays").value = totalDays;

								// Your Order section mein Total Days show karna
								document.getElementById("displayTotalDays").innerText = totalDays;

								// Total Amount calculate karna (days * per day rent)
								let totalAmount = totalDays * parseFloat(rentPerDay);
								document.getElementById("displayTotalAmount").innerText = "$" + totalAmount.toFixed(2);
							} else {
								// Invalid date handling
								document.getElementById("totalDays").value = "Invalid Dates";
								document.getElementById("displayTotalDays").innerText = "0";
								document.getElementById("displayTotalAmount").innerText = "$0.00";
							}
						}
					}
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
											<td>{{ $rental->title }}</td>
											<td>${{ number_format($rental->rent_per_day, 2) }}</td>
										</tr>

										<tr>
											<td>Total Days</td>
											<td id="displayTotalDays">0</td> <!-- Yeh dynamically update hoga -->
										</tr>



										<tr class="cart-subtotal">
											<td>Shipping</td>
											<td>Free</td>
										</tr>
									</tbody>
									<tfoot>

										<tr class="order-total">
											<th>Total</th>
											<th id="displayTotalAmount">$0.00</th> <!-- Yeh dynamically update hoga -->
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
