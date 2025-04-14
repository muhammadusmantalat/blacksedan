@component('mail::message')
<div style="text-align: center; margin-bottom: 20px;">
    <img src="https://blacksedans.ca/wp-content/uploads/2020/10/Black_Sedan_logo.png" alt="Company Logo" 
        style="height: 100px; margin-bottom: 20px;">
    <h3><strong>Welcome to <span>Black Sedan</span></strong></h3>
</div>

<p>Dear Customer,</p>

<p>We have received a reset password request. Please click the button below to reset your password.</p>

@component('mail::button', ['url' => $detail['url']])
Reset Password
@endcomponent

<div style="padding-top: 10px;">
    Best regards,<br>
    Black Sedan INC Dispatch Services<br>
    +1(825) 735-5538 <br>
    info@blacksedans.ca
</div>
@endcomponent
