@component('mail::message')
    <div style="background: #fff; padding: 20px; width:700px">
        <div style="margin-bottom: 12px; text-align: center;">
            <img src="https://blacksedans.ca/wp-content/uploads/2020/10/Black_Sedan_logo.png" alt="Company Logo" height="50"
                width="auto">
        </div>
        <div style="display: flex; width:100%">
            <div style="width:100%">
                <p>Dear Admin,</p>
                <p>We inform you that a booking with the following details has been cancelled:</p>
                <ul>
                    <li><strong>Customer Name:</strong> {{ $booking->first_name }} {{ $booking->last_name }}</li>
                    <li><strong>Job Type:</strong> {{ $booking->trip_type == 'by_hour' ? 'By Hour' : 'One Way' }}</li>
                    <li><strong>Airport Pick-up:</strong> {{ $booking->airport_pickup == 'yes' ? 'Yes' : 'No' }}</li>
                    <li><strong>Email Address:</strong> {{ $booking->email }}</li>
                    <li><strong>Phone:</strong> {{ $booking->phone_number }}</li>
                    <li><strong>Vehicle:</strong> {{ $booking->vehicle->name }}</li>
                    <li><strong>Pickup Date:</strong> {{ $booking->pickup_date }}</li>
                    <li><strong>Pickup Time:</strong> {{ $booking->pickup_time }}</li>
                    <li><strong>Pickup Location:</strong> {{ $booking->pickup_location }}</li>
                    <li><strong>Drop-off Location:</strong> {{ $booking->dropOff_location ?? 'No Data Found!' }}</li>
                    <li><strong>Reason:</strong> {{ $booking->reason }}</li>
                </ul>
            </div>
        </div>
    </div>
@endcomponent
