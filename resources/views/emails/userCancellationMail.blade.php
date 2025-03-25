@component('mail::message')
    <div style="background: #fff; padding: 20px; width:700px">
        <div style="margin-bottom: 12px;">
            <img src="https://blacksedans.ca/wp-content/uploads/2020/10/Black_Sedan_logo.png" alt="Company Logo" height="50"
                width="auto">
        </div>
        <div style="display: flex; width:100%">
            <div style="width: 44%">
                <h5 style="color: #000; font-size: 1.25rem; font-weight: bold; margin-bottom: 14px;">Black Sedan</h5>
                <p style="margin: 8px 0px; color:#000;">1608 Marlyn way NE, Calgary</p>
                <p style="margin: 8px 0px; color:#000;">+1 825-735-5538</p>
                <p style="margin: 8px 0px; color:#000;">info@blacksedans.ca</p>
                <p style="margin: 8px 0px; color:#000;">https://blacksedans.ca/</p>
                <p style="margin: 8px 0px; color:#000;">GST: 89950 4831 RT 0001</p>
            </div>
            <div style="width:56%; margin-top: 2.57em;">
                <p>Dear {{ $booking->first_name }},</p>
                <p>This is to inform you that your booking with the following details has been cancelled:</p>
                <ul>
                    <li><strong>Vehicle:</strong> {{ $booking->vehicle->name }}</li>
                    <li><strong>Job Type:</strong> {{ $booking->trip_type == 'by_hour' ? 'By Hour' : 'One Way' }}</li>
                    <li><strong>Airport Pick-up:</strong> {{ $booking->airport_pickup == 'yes' ? 'Yes' : 'No' }}</li>
                    <li><strong>Pickup Date:</strong> {{ $booking->pickup_date }}</li>
                    <li><strong>Pickup Time:</strong> {{ $booking->pickup_time }}</li>
                    <li><strong>Pickup Location:</strong> {{ $booking->pickup_location }}</li>
                    <li><strong>Drop-off Location:</strong> {{ $booking->dropOff_location ?? 'No DropOff location Found' }}
                    </li>
                    <li><strong>Reason:</strong> {{ $booking->reason }}</li>
                </ul>
                <p>If you have any questions, please contact us at info@blacksedans.ca or call us at +1 825-735-5538.</p>
            </div>
        </div>
    </div>
@endcomponent
