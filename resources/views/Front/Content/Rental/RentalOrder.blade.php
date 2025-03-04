@extends('Front.Master.master')
@section('content')
<div class="page-area cart-page spad">
		<div class="container">
			<form class="checkout-form">
				<div class="row">
					<div class="col-lg-6">
    <h4 class="checkout-title">Billing Address</h4>
    <div class="row">
        <div class="col-md-12">
            <input type="text" id="Username" name="Username" placeholder="Username *">
            <input type="text" id="Address" name="Address" placeholder="Address *">

            <!-- <label>Start Date</label> -->
            <input type="date" id="startDate" name="startDate" onchange="calculateDays()">

            <!-- <label>End Date</label> -->
            <input type="date" id="endDate" name="endDate" onchange="calculateDays()">

            <!-- <label>Total Days</label> -->
            <input type="text" id="totalDays" name="totalDays" placeholder="Total Days" readonly>

            <input type="text" id="Contact" name="Contact" placeholder="Contact *">
        </div>
    </div>
</div>

<script>
    function calculateDays() {
        let start = document.getElementById("startDate").value;
        let end = document.getElementById("endDate").value;

        if (start && end) {
            let startDate = new Date(start);
            let endDate = new Date(end);
            let timeDiff = endDate - startDate;

            let totalDays = timeDiff / (1000 * 60 * 60 * 24);
            if (totalDays >= 0) {
                document.getElementById("totalDays").value = totalDays;
            } else {
                document.getElementById("totalDays").value = "Invalid Dates";
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
												<td>59.90</td>
											</tr>
											
											<tr class="cart-subtotal">
												<td>Shipping</td>
												<td>Free</td>
											</tr>
										</tbody>
										<tfoot>
											<tr class="order-total">
												<th>Total</th>
												<th>59.90</th>
											</tr>
										</tfoot>
									</table>
								</div>
								
							</div>
							<button class="site-btn btn-full">Booked</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
    @endsection