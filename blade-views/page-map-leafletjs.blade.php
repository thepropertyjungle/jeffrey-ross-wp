{{--
    ATTENTION
    =========
    /src/scss/search-results/map-leafletjs.scss

    This is the parent page for using LeafletJS maps
    as a free alternative to Google Maps for your
    search results.

    Please see component page: /blade-views/page-map-leafletjs.blade.php
--}}

<div class="container">
    <div class="row mb-3">
        <div class="col">
            @include('partials/search-core-example', ['map_search' => 'true'])
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <p>Displaying <span class="map_properties_no"></span> properties</p>
        </div>
        <div class="col d-flex justify-content-end">
            @include ('partials/search-views', ['leafletjs' => 'true'])
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input
                data-component="FormItem"
                data-bind-value-to-events='["MAP_POLY_CHANGE"]'
                name="bounds"
                type="hidden"
            >
            @include('components/map-leafletjs-search', [
                'initial_lat'           => '51.5073509',
                'initial_lng'           => '-0.1277583',
                'enable_marker_cluster' =>  true,
            ])
        </div>
    </div>
</div>

@include('debug/debug')