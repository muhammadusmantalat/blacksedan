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
        <p>
            We are pleased to inform you that {{ $data['chaffeur_name'] }}, your
            chauffeur is currently en route to your location.
        </p>
    </div>
    <div>
        <p>
            Your {{ $data['vehicle'] }} will be ready and waiting to provide you
            with a comfortable and luxurious ride. 
        </p>
    </div>
     <div>
         <p>
             If you have any questions or need assistance, feel free to contact
             your chauffeur at {{ $data['phone'] }} or Black Sedan
             dispatch services at +1(825) 735-5538. 
         </p>
    </div>
     <div>
         <p>
             Thank you for choosing Black Sedan. We look forward to serving
             you.
         </p>
    </div>
     <div>
         <p>
         Safe travels!
     </p>
    </div>
    <div style="padding-top: 10px;">
        Best regards,<br>
            Black Sedan INC Dispatch Services<br>
            +1(825) 735-5538 <br>
            info@blacksedans.ca
        </div>
@endcomponent
