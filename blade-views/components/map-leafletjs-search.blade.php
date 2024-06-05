{{--
    ATTENTION
    =========
    /src/scss/components/map-leafletjs-search.scss

    This is the map component for using LeafletJS maps
    as a free alternative to Google Maps for your
    search results.

    Please see parent page: /blade-views/page-map-leafletjs.blade.php
--}}

@php _e_tpj_css_link('leaflet') @endphp
@php _e_tpj_script('leaflet') @endphp

@if (isset($enable_marker_cluster) && $enable_marker_cluster)
    @php _e_tpj_script('leaflet_marker_cluster') @endphp
    @php _e_tpj_css_link('leaflet_marker_cluster') @endphp
@endif

<div
    id="leaflet-map-container"
    data-component="PropertiesMapLeaflet"
    data-initial-lat="{{ $initial_lat ?? '51.5073509' }}"
    data-initial-lng="{{ $initial_lng ?? '-0.1277583' }}"
    data-initial-zoom="{{ $initial_zoom ?? '15' }}"
    data-max-zoom="{{ $max_zoom ?? '18' }}"
    data-min-zoom="{{ $min_zoom ?? '6' }}"
    data-view-name="{{ $marker_view_name ?? 'partials/rest/map-info-window' }}"
    data-map-initial-query='{{ $initial_query ?? '{ "address_keyword_test": "" }' }}'
    data-map-bind-query-to-events='["MAP_CHANGE_FILTERS"]'
    data-updates-window-query-vars="{{ $updates_window_query_vars ?? 'true' }}"
    data-enable-marker-cluster="{{ isset($enable_marker_cluster) && $enable_marker_cluster === true ? 'true' : 'false' }}"
    data-use-custom-marker-icon="{{ isset($use_custom_marker_icon) && $use_custom_marker_icon === true ? 'true' : 'false' }}"
    data-custom-marker-icon-url="{{ $custom_marker_icon_url ?? _tpj_get_asset_url('leaflet_custom_marker.png') }}"
    data-custom-marker-icon-size-width="{{ $custom_marker_icon_size_width ?? '50' }}"
    data-custom-marker-icon-size-height="{{ $custom_marker_icon_size_height ?? '50' }}"
    data-hide-map-if-no-results="{{ isset($hide_map_if_no_results) ?? 'false' }}" 
>
    <div class="tpj_load_info map-info">
        <div><strong>Loading...</strong></div>
    </div>

    <div class="tpj_map_no_results map-info">
        <div><strong>No results</strong></div>
    </div>
</div>

<div class="tpj_map_no_results_map_html_replacement" style="display: none;">
    <p>We couldn't find any properties with that search criteria.</p>
</div>