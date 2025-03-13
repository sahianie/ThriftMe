<!DOCTYPE html>
<html>
<head>
    <title>New Rental Order Placed</title>
</head>
<body>
    <h1>New Rental Order</h1>
    <p>A new rental has been placed with the following details:</p>
    <ul>
        <li><strong>Username:</strong> {{ $rental->username }}</li>
        <li><strong>Address:</strong> {{ $rental->address }}</li>
        <li><strong>Start Date:</strong> {{ $rental->start_date }}</li>
        <li><strong>End Date:</strong> {{ $rental->end_date }}</li>
        <li><strong>Total Days:</strong> {{ $rental->total_days }}</li>
        <li><strong>Contact Number:</strong> {{ $rental->contact_number }}</li>
    </ul>
</body>
</html>
