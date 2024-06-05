{{--
    ATTENTION
    =========
    /src/scss/components/map-property-single-embedded.scss

    You can use this component in your single-property.blade.php
    file instead of /blade-views/components/map-property-single.blade.php

    This component can also used on:
    /blade-views/single-development.blade.php
    /blade-views/page-branches.blade.php

    This file will use the standard Google Maps iFrame embed method.
--}}

<div class="ratio ratio-16x9 property-map-embedded">
    <iframe loading="lazy" src="https://www.google.com/maps/embed/v1/place?key={{ blade_global_options('google_maps_api_key') }}&q={{ $lat ?? '51.5073509' }},{{ $lng ?? '-0.1277583' }}&zoom={{ $initial_zoom ?? '17' }}" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>