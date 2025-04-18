@component('mail::message')
<div style="text-align: center; margin-bottom: 20px;">
    <img src="https://blacksedans.ca/wp-content/uploads/2020/10/Black_Sedan_logo.png" alt="Company Logo" 
        style="height: 100px; margin-bottom: 20px;">
    <h3><strong>Welcome to <span>Black Sedan</span></strong></h3>
</div>
<div>
    <p>Dear {{ $data['name'] }},</p>
</div>
<div>  
    <p>I hope this email finds you well.
        <br>
        Please be informed that the customer has made some changes to their upcoming ride details. Kindly see the updated information below:
        </p>
        <p>
            Updated Ride Details:
        </p>
</div>
    <div>
        <ul style="list-style-type: none; padding: 0;">
            <li><strong>New Pickup:</strong> {{ $data['pickup_location'] }}</li>
            @if ($data['trip_type'] == 'one_way')
                <li><strong>New Destination:</strong> {{ $data['dropOff_location'] }}</li>  
            @elseif ($data['trip_type'] == 'by_hour')
                <li><strong>New Hours:</strong> {{ $data['duration_hours'] }}</li>
            @endif
            <li><strong>New Date:</strong> {{ $data['pickup_date'] }}</li>
            <li><strong>New Time:</strong> {{ $data['pickup_time'] }}</li>
            <li><strong>Special Instructions:</strong> {{ $data['instruction'] }}</li>
        </ul>
    </div>

<div style="padding-top: 10px;">
Best regards,<br>
    Black Sedan INC Dispatch Services<br>
    +1(825) 735-5538 <br>
    info@blacksedans.ca
</div>
@endcomponent