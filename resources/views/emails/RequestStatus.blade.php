@component('mail::message')
<div style="text-align: center; margin-bottom: 20px;">
    <img src="https://blacksedans.ca/wp-content/uploads/2020/10/Black_Sedan_logo.png" alt="Company Logo" 
        style="height: 100px; margin-bottom: 20px;">
    <h3><strong>Welcome to <span>Black Sedan</span></strong></h3>
</div>
<p>Dear {{ $data['name'] }},</p>

<div>
@if ($data['url'] !== null)
    <div>
        <p>Your registration request has been approved.</p>
    </div>
    <div>
        <p>
            Please click the link below to complete your registration and become a part of our community.
        </p>
    </div>
     <div>
        @component('mail::button', ['url' => route('chauffeur.signUp', ['email' => $data['email']]), 'color' => 'primary'])
            Sign Up
        @endcomponent
    </div>
@else
    <p>Your registration request has been rejected.</p>
    <div>
        <p>
            Below is the reason for rejecting your request:
        </p>
        <p style="width: 160px; margin: auto;">
            {{ $data['reason'] }}
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