{{--
    ATTENTION
    =========
    /src/scss/components/leadpro-valuation.scss

    Providing you have a valid LeadPro API Key added to your websites
    credentials, you can use their online valuation form and embed it
    on your pages using a simple shortcode.

    [blade_dynamic_shortcode view_name="components/lead-pro-valuation"]

    Please refer to /blade-views/partials/leadpro-valuation-success.blade.php
    for the custom success message. 
--}}

<div 
    data-component="LeadProInstantValuation"
    data-success-view="partials/leadpro-valuation-success"
    id="leadPro-val"
    class="container"
>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="">
                <div class="row mb-3">
                    <div class="col">
                        <label for="leadPro_first_name" class="visually-hidden-focusable">First Name<sup>*</sup></label>
                        <input id="leadPro_first_name" class="form-control" name="first_name" type="text" placeholder="First Name*" required>
                    </div>
                    <div class="col">
                        <label for="leadPro_last_name" class="visually-hidden-focusable">Last Name<sup>*</sup></label>
                        <input id="leadPro_last_name" class="form-control" name="last_name" type="text" placeholder="Last Name*" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="leadPro_phone" class="visually-hidden-focusable">Your Phone Number<sup>*</sup></label>
                        <input id="leadPro_phone" class="form-control" name="phone" type="text" placeholder="Phone Number*" required>
                    </div>
                    <div class="col">
                        <label for="leadPro_email" class="visually-hidden-focusable">Email Address<sup>*</sup></label>
                        <input id="leadPro_email" class="form-control" name="email" type="email" placeholder="Email Address*" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="leadPro_postcode"class="visually-hidden-focusable">Postcode<sup>*</sup></label>
                        <input id="leadPro_postcode" class="form-control" name="postcode" type="text" placeholder="Enter Postcode*" required>
                        <div class="tpj-postcode-error">Invalid UK postcode</div>
                    </div>
                    <div class="col">
                        <label for="leadPro_vendor" class="visually-hidden-focusable">Selling or Letting?<sup>*</sup></label>
                        <select id="leadPro_vendor" class="form-control" name="type" required>
                            <option value="" selected disabled>Selling or Letting?</option>
                            <option value="vendor">Selling a Property</option>
                            <option value="landlord">Letting a Property</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="leadPro_property_bedrooms" class="visually-hidden-focusable">Number of Bedrooms<sup>*</sup></label>
                        <select name="property_bedrooms" id="leadPro_property_bedrooms" class="form-control" required>
                            <option value="" selected disabled>Number of Bedrooms?</option>
                            <option value="1">1 Bedroom/Studio</option>
                            <option value="2">2 Bedrooms</option>
                            <option value="3">3 Bedrooms</option>
                            <option value="4">4 Bedrooms</option>
                            <option value="5">5 Bedrooms</option>
                            <option value="6">6 Bedrooms</option>
                            <option value="7">7 Bedrooms</option>
                            <option value="8">8 Bedrooms</option>
                            <option value="9">9 Bedrooms</option>
                            <option value="10">10 Bedrooms</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="leadPro_address" class="visually-hidden-focusable">Please add the address of the property you wish to be valued<sup>*</sup></label>
                        <textarea id="leadPro_address" class="form-control" name="address" required placeholder="Please add the address of the property you wish to be valued*"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p><strong>Your Explicit Consent</strong></p>
                        <div class="form-check">
                            <input id="leadPro_gdpr" class="form-check-input" type="checkbox" name="gdpr_checkbox" value="on">
                            <label for="leadPro_gdpr" class="form-check-label">By submitting this form, I agree to have my data to be processed by LeadPro who provide this valuation service. Please see our <a href="{{ isset($global_options['privacy_policy']['permalink']) && $global_options['privacy_policy']['permalink'] !== '' ? $global_options['privacy_policy']['permalink'] : '/privacy-policy/' }}" rel="noopener noreferrer" target="_blank">Privacy Policy</a> for more details.</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="tpj-form-general-errors"></div>
                        <button type="submit" class="btn btn-primary w-100">Request Valuation</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('debug/debug')