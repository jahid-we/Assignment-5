<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9;">
    <h1 style="text-align: center; color: #333;">New Car Rental Confirmation</h1>
    <p style="font-size: 16px; color: #555;">Dear Admin,</p>
    <p style="font-size: 16px; color: #555;">A new car rental has been made. Below are the details:</p>

    <h2 style="color: #333; border-bottom: 1px solid #ddd; padding-bottom: 5px;">Customer Details</h2>
    <table style="width: 100%; margin-bottom: 20px; border-collapse: collapse;">
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Name:</td>
            <td style="padding: 10px; color: #555;">{{ $customer->name }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Email:</td>
            <td style="padding: 10px; color: #555;">{{ $customer->email }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Phone:</td>
            <td style="padding: 10px; color: #555;">{{ $customer->phone }}</td>
        </tr>
    </table>

    <h2 style="color: #333; border-bottom: 1px solid #ddd; padding-bottom: 5px;">Car Details</h2>
    <table style="width: 100%; margin-bottom: 20px; border-collapse: collapse;">
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Car Name:</td>
            <td style="padding: 10px; color: #555;">{{ $car->name }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Brand:</td>
            <td style="padding: 10px; color: #555;">{{ $car->brand }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Model:</td>
            <td style="padding: 10px; color: #555;">{{ $car->model }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Year:</td>
            <td style="padding: 10px; color: #555;">{{ $car->year }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Car Type:</td>
            <td style="padding: 10px; color: #555;">{{ $car->car_type }}</td>
        </tr>
    </table>

    <h2 style="color: #333; border-bottom: 1px solid #ddd; padding-bottom: 5px;">Rental Details</h2>
    <table style="width: 100%; margin-bottom: 20px; border-collapse: collapse;">
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Rental Start Date:</td>
            <td style="padding: 10px; color: #555;">{{ $rental->start_date }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Rental End Date:</td>
            <td style="padding: 10px; color: #555;">{{ $rental->end_date }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; font-weight: bold; color: #555;">Total Cost:</td>
            <td style="padding: 10px; color: #555;">${{ $rental->total_cost }}</td>
        </tr>
    </table>

    <p style="font-size: 16px; color: #555;">Regards,</p>
    <p style="font-size: 16px; color: #555;">Your Car Rental System</p>
</div>
