{{--
    ATTENTION
    =========
    /src/scss/components/map-leafletjs-property-single.scss

    You can swap Google Maps out with a Leaflet Map using this component.

    This component can also used on:
    /blade-views/single-development.blade.php
    /blade-views/page-branches.blade.php

    Please see /blade-views/single-property.blade.php
--}}

@php _e_tpj_css_link('leaflet') @endphp
@php _e_tpj_script('leaflet') @endphp

<div
    id="leaflet-map-single-property-container"
    data-component="PropertyMapLeaflet"
    data-lat="{{ $lat ?? '51.5073509' }}"
    data-lng="{{ $lng ?? '-0.1277583' }}"
    data-initial-zoom="{{ $initial_zoom ?? '12' }}"
    data-max-zoom="{{ $max_zoom ?? '18' }}"
    data-min-zoom="{{ $min_zoom ?? '6' }}"
    data-use-custom-marker-icon="{{ isset($use_custom_marker_icon) && $use_custom_marker_icon === true ? 'true' : 'false' }}"
    data-custom-marker-icon-url="{{ $custom_marker_icon_url ?? _tpj_get_asset_url('leaflet_custom_marker.png') }}"
    data-custom-marker-icon-size-width="{{ $custom_marker_icon_size_width ?? '50' }}"
    data-custom-marker-icon-size-height="{{ $custom_marker_icon_size_height ?? '50' }}"
>
</div>