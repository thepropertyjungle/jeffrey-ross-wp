{{-- 
Example usage from another template:
            @include('components/mortgage-calculator', [
                'loan_amount' => 200000, 
                'length_of_loan_in_years' => 25, 
                'interest_rate' => 2.9, 
                'autocalculate_if_preffield' => true, 
                'use_inline_currency_format_on_load' => false, // override default
                'use_inline_currency_format' => false, // override default
                'use_currency_symbol' => '£', // override default
            ])
--}}

<h4>Mortgage calculator</h4>
<form id="mortgage_calculator" data-autocalculate-if-preffield="{{ isset($autocalculate_if_preffield) && $autocalculate_if_preffield === true ? 'true' : '' }}" 
    data-use-inline-currency-format={{ isset($use_inline_currency_format) && $use_inline_currency_format === false ? '' : 'true' }} 
    data-use-currency-symbol={{ isset($use_currency_symbol) ? $use_currency_symbol : '£' }} 
    data-use_inline_currency_format_on_load={{ isset($use_inline_currency_format_on_load) && $use_inline_currency_format_on_load === false ? '' : 'true' }} 
    action="">
    <div>
        <input id="loan_amount" type="text" value="{{ $loan_amount ?? '' }}" placeholder="Amount" required>
    </div>
    <div>
        <input id="length_of_loan_in_years" type="text" value="{{ $length_of_loan_in_years ?? '' }}" placeholder="Length of loan in years" required>
    </div>
    <div>
        <input id="interest_rate" type="text" data-initial="4.9" value="{{ $interest_rate ?? '' }}" placeholder="Interest rate" required>
    </div>
    <input type="submit" value="Calculate">
</form>
{{--By default is display none (additional styles are for testing purposes only)--}}
<div id="mortgage_calculator_success" style="display: none; background: rgb(185, 251, 185); padding: 20px;">
    Here is the result (Monthly)
    {{--mortgage_calculator_success_value will render the result--}}
    <div>£<span id="mortgage_calculator_success_value"></span></div>
</div>
<div id="mortgage_calculator_error" style="display: none; background: rgb(250, 187, 177); padding: 20px;">
    All fields must be numbers
</div>