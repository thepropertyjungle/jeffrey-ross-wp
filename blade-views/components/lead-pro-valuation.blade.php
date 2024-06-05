<h1>Free online valuation</h1>
<div 
    data-component="LeadProInstantValuation" 
    data-success-view="partials/lead-pro-valuation-success" 
    >
    
    <!--Style to be removed-->
    <style>
        .valuation_entry {
            margin-bottom: 20px;
        }
        .valuation_entry input[type="text"] {
            width: 100%;
        }
        /* used within the JS */
        .tpj-postcode-error {
            color: red;
            display: none;
        }
        .tpj-form-general-errors p {
            color: red;
        }
    </style>
    <form action="">
        <div class="valuation_entry">
            <div><strong>Vendor *</strong></div>
            <input name="type" type="text" value="vendor" required>
        </div>
        <div class="valuation_entry">
            <div><strong>Phone *</strong></div>
            <input name="phone" type="text" value="1234567812" required>
        </div>
        <div class="valuation_entry">
            <div><strong>Bedrooms *</strong></div>
            <input name="property_bedrooms" type="text" value="2" required>
        </div>
        <div class="valuation_entry">
            <div><strong>First name *</strong></div>
            <input name="first_name" type="text" value="Fluffy" required>
        </div>
        <div class="valuation_entry">
            <div><strong>Last name *</strong></div>
            <input name="last_name" type="text" value="Cloud" required>
        </div>
        <div class="valuation_entry">
            <div><strong>Email *</strong></div>
            <input name="email" type="email" value="cloud9@cloud.com" required>
        </div>
        <div class="valuation_entry">
            <div><strong>Title</strong></div>
            <input name="title" type="text" value="Mr">
        </div>
        <div class="valuation_entry">
            <div><strong>Address *</strong></div>
            <input name="address" type="text" value="51 Asimov Place, Starbridge" required>
        </div>
        <div class="valuation_entry">
            <div><strong>Postcode *</strong></div>
            <input name="postcode" type="text" value="N1 3JY" required>
            <div class="tpj-postcode-error">Invalid UK postcode</div>
        </div>
        <div class="valuation_entry">
            <div><strong>Message</strong></div>
            <input name="message" type="text" value="Test message">
        </div>
        <div class="valuation_entry">
            <div><strong>Appointment availability</strong></div>
            @php
            $date = new DateTime();
            $date_iso = $date->format('Y-m-d\TH:i:sO');
            @endphp
            <input type="datetime-local" name="appointment_availability" value="" min="{{ $date_iso }}" max="">
        </div>
        <div class="valuation_entry">
            <div><strong>GDPR</strong></div>
            <input type="checkbox" id="gdpr" name="gdpr_checkbox" value="on">
            <label for="gdpr">I agree</label>
        </div>
        <div class="tpj-form-general-errors"></div>
        <input type="submit" value="Find out">
    </form>
</div>
@include('debug/debug')