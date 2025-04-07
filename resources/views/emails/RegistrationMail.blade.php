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
    <p>We hope this email finds you well! I’m pleased to welcome you to the Black Sedan 
        team. We are excited to have you on board as a chauffeur and look forward to 
        working with you.</p>
</div>
    <div>
        <p>
            At Black Sedan, we pride ourselves on delivering top-tier service to our clients, 
            and we’re confident that your professionalism and dedication will contribute 
            greatly to our continued success. As part of our team, you’ll be an essential part of providing luxury transportation and ensuring our clients have a memorable 
            experience from start to finish.
        </p>
        <p>
            If you have any questions or need assistance as you get settled, please don't 
            hesitate to reach out to me or any other team member. We’re here to support you 
            every step of the way. 
        </p>
        <p>
            Looking forward to a successful partnership and wishing you a smooth start with 
            us! 
        </p>
    </div>

<div style="padding-top: 10px;">
Best regards,<br>
    Black Sedan INC Dispatch Services<br>
    +1(825) 735-5538 <br>
    info@blacksedans.ca
</div>
@endcomponent