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
    <p>We hope you are doing well. We have a ride offer available for you to consider:</p>
</div>
    <div>
        <ul style="list-style-type: none; padding: 0;">
            <li><strong>Pickup:</strong> {{ $data['pickup_location'] }}</li>
            <li><strong>Destination:</strong> {{ $data['dropOff_location'] }}</li>
            <li><strong>Date:</strong> {{ $data['pickup_date'] }}</li>
            <li><strong>Time:</strong> {{ $data['pickup_time'] }}</li>
            <li><strong>Special Instructions:</strong> {{ $data['instruction'] }}</li>
        </ul>
        <div style="text-align: center; margin: 20px 0;">
            <a href="{{url('chauffeur-sign-in')}}" style="padding: 10px 20px; color: #fff; background-color: #021642; border-radius: 5px; text-decoration: none;">
                Accept offer
            </a>
        </div>
    </div>

<div style="padding-top: 10px;">
Best regards,<br>
    Black Sedan INC Dispatch Services<br>
    +1(825) 735-5538 <br>
    info@blacksedans.ca
</div>
@endcomponent