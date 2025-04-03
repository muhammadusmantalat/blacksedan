@component('mail::message')
<div style="text-align: center; margin-bottom: 20px;">
    <img src="https://blacksedans.ca/wp-content/uploads/2020/10/Black_Sedan_logo.png" alt="Company Logo" 
    style="height: 100px; margin-bottom: 20px;">
    <h3><strong>Welcome to <span>Black Sedan</span></strong></h3>
</div>
<p>Dear {{ $data['name'] }},</p>
<div>
    <p>Welcome to Black Sedan! We’re thrilled to have you onboard. Your account has 
        been successfully created, and you're all set to enjoy our premium limo services.</p>
</div>
    <div>
        <p>
            Here’s what you can expect from us:
        </p>
        <ul>
            <li>Easy booking for all your transportation needs.</li>
            <li>Access to our fleet of luxurious vehicles.</li>
            <li>Special deals and discounts just for you!</li>
        </ul>
        <p>
            To get started, simply log in to your account at www.blacksedans.ca, where you can book a ride, update your details, or explore our services. 
            If you need assistance or have any questions, our customer support team is ready to help at info@blacksedans.ca or call us at +1(825) 735-5538.  
        </p>
        <p>
            Thank you for choosing Black Sedan! We look forward to serving you soon. 
        </p>
    </div>
    <div style="text-align: center; margin: 20px 0;">
        <a href="https://ranglerzbeta.in/bs-reservation/" style="padding: 10px 20px; color: #fff; background-color: #021642; border-radius: 5px; text-decoration: none;">
            READY TO BOOK!
        </a>
    </div>

<div style="padding-top: 10px;">
Best regards,<br>
    Black Sedan INC Dispatch Services<br>
    +1(825) 735-5538 <br>
    info@blacksedans.ca
</div>
<div>
    <p>P.S. Don’t forget to follow us on our social media for the latest updates and 
        exclusive offers! </p>
</div>
@endcomponent