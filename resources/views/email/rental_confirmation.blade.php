<div>
    <h1>Car Rental Confirmation</h1>
    <p>Dear Customer,</p>
    <p>Your car rental has been confirmed. Below are the details:</p>
    <ul>
        <li><strong>Car Name:</strong> {{ $car->name }}</li>
        <li><strong>Brand:</strong> {{ $car->brand }}</li>
        <li><strong>Model:</strong> {{ $car->model }}</li>
        <li><strong>Year:</strong> {{ $car->year }}</li>
        <li><strong>Car Type:</strong> {{ $car->car_type }}</li>
        <li><strong>Rental Start Date:</strong> {{ $rental->start_date }}</li>
        <li><strong>Rental End Date:</strong> {{ $rental->end_date }}</li>
        <li><strong>Total Cost:</strong> ${{ $rental->total_cost }}</li>
    </ul>
    <p>Thank you for choosing us!</p>
</div>

