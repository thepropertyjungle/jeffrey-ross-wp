@php
    $hasImages = is_array($property['images'] ?? '') && count($property['images']) > 0;
@endphp

<div class="property-grid{{ $property['featured'] ?? false ? ' property-grid__featured' : '' }}">
    <a href="{{ $property['permalink'] }}">
        @if ($hasImages)
            <img src="{{ $property['images'][0]['media_url'] ?? '' }}" class="img-fluid" alt="{{ $property['Address']['display_address'] ?? '' }}">
        @else
            <img src="" alt="Awaiting Images for {{ $property['Address']['display_address'] }}">
        @endif
    </a>
    <div class="property-grid__meta">
        <div class="property-grid__price">
            {{ ($property['price_qualifier'] != 'Default') ? ($property['price_qualifier'] == 'POA' ? 'POA' : $property['price_qualifier']) : '' }}
            £{{ number_format($property['price']) }} {{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'PW' : 'PCM, Fees Apply'') : '' }} | {{ $property['availability'] }}
        </div>
        <div class="property-grid__address">
            {{ $property['Address']['display_address'] ?? '' }}
        </div>
        <ul class="property-grid__rooms">
            @if (!empty($property['bedrooms']))
            <li>{{ $property['bedrooms'] }} Bed</li>
            @endif
            @if (!empty($property['bathrooms']))
            <li>{{ $property['bathrooms'] }} Bath</li>
            @endif
            @if (!empty($property['internal_area']))
            <li>{{ number_format($property['internal_area']) }} sq.ft</li>
            @endif
        </ul>
        <a href="{{ $property['permalink'] }}" class="d-flex btn btn-primary">View Details</a>
        <div data-component="ShortlistButtons" data-property-id="{{ $property['ID'] }}" class="shortlist__btns">
            <i class="tpj_add_to_shortlist">
                <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 3334 3334" xmlns="http://www.w3.org/2000/svg"><path d="m2938.33 1580.98-1272.16 1193.33-1269.41-1190.59c-268.431-272.352-268.431-715.489 0-987.842 129.413-131.177 301.569-203.529 484.903-203.529h.196c183.137 0 355.295 72.352 484.51 203.529l.196.196c129.804 131.568 201.568 307.058 201.568 493.724h196.078c0-186.666 71.57-362.156 201.57-493.92 129.215-131.177 301.371-203.529 484.705-203.529h.196c183.137 0 355.491 72.352 484.705 203.529 268.432 272.353 268.432 715.49 2.942 985.097m136.863-1122.74c-166.47-169.02-388.432-261.962-624.51-261.962h-.196c-236.275 0-458.039 92.942-624.313 261.765-65.295 66.079-118.825 140.589-160 221.177-41.177-80.59-94.903-155.098-160-220.98-166.274-169.02-388.038-261.962-624.314-261.962h-.196c-236.078 0-458.039 92.942-624.705 261.962-343.139 348.43-343.139 914.901 2.941 1265.68l1406.27 1319.22 1409.02-1321.96c343.137-348.039 343.137-914.511 0-1262.94"/></svg>
            </i>
            <i class="tpj_remove_from_shortlist">
                <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 3334 3334" xmlns="http://www.w3.org/2000/svg"><path d="m3075.92 505.273c-166.705-169.059-388.519-262.217-624.849-262.217h-.196c-236.328 0-457.946 93.159-624.259 262.02-65.309 66.094-119.047 140.62-160.233 221.226-40.989-80.606-94.727-155.132-159.84-221.029-166.51-169.059-388.128-262.217-624.653-262.217h-.196c-236.132 0-457.946 93.159-624.653 262.217-343.213 348.314-343.213 915.109 2.943 1265.78l1406.4 1319.71 1409.54-1322.46c343.215-347.922 343.215-914.717 0-1263.03"/></svg>
            </i>
        </div>
    </div>
</div>
@include('debug/debug')