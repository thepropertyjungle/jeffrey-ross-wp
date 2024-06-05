<style>
    /* temp style - to be moved to CSS */
    .property-map {
        min-height: 400px;
    }
</style>

<div data-component="PropertyMap" class="property-map" 
data-lat="{{ $lat ?? '51.5073509' }}" 
data-lng="{{ $lng ?? '-0.1277583' }}" 
data-initial-zoom="{{ $initial_zoom ?? '12' }}" >
</div>