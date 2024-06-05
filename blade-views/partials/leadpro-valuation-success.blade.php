{{--
    ATTENTION
    =========
    /src/scss/partials/leadpro-valuation-success.scss

    This is the success message from a successful LeadPro
    Online valuation request.
--}}

<div id="leadPro-val__success">
    <div>{{ $lead_pro_result['type'] ?? '' }}</div>
    <div><strong>minimum_sale_estimation:</strong> {{ $lead_pro_result['minimum_sale_estimation'] ?? '' }}</div>
    <div><strong>maximum_sale_estimation:</strong> {{ $lead_pro_result['maximum_sale_estimation'] ?? '' }}</div>
</div>