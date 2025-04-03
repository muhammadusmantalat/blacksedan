@component('mail::message')
<div style="text-align: center; margin-bottom: 20px;">
    <img src="https://blacksedans.ca/wp-content/uploads/2020/10/Black_Sedan_logo.png" alt="Company Logo" 
        style="height: 100px; margin-bottom: 20px;">
    <h3><strong>Welcome to <span>Black Sedan</span></strong></h3>
</div>
<p>Dear {{ $data['name'] }},</p>
<div>
@if ($data['reason'] !== null)
<div>
    <p>Your account has been blocked by the admin.</p>
</div>
    <div>
        <p>
            Below is the reason for blocking your account:
        </p>
        <p style="width: 160px; margin: auto;">
            {{ $data['reason'] }}
        </p>
    </div>
@else
<div>
    <p>Your account has been unblocked by the admin.</p>
</div>
    <div>
        <p>
            You can now log in to your account.
        </p>
    </div>
@endif
</div>
<div style="padding-top: 10px;">
Best regards,<br>
    Black Sedan INC Dispatch Services<br>
    +1(825) 735-5538 <br>
    info@blacksedans.ca
</div>
@endcomponent