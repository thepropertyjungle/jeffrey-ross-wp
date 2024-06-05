{{--
    ATTENTION
    =========
    /src/scss/components/location-autocomplete.scss

    The location autocomplete uses property address
    data within the website to autocomplete the
    address_keyword within your search form(s).

    @include('components/location-autocomplete')

    This provides a similar function to Google Places
    without using any Google APIs. It does not include
    any geospatial functionality, so do not get it
    confused. This feature cannot use bounding boxes,
    centre points or radius features.
--}}

<div
    data-component="LocationAutocomplete"
    style="position: relative;"
    data-parent-form-id="{{ isset($parent_form_id) ? $parent_form_id : '' }}"
    data-include-properties-no="true"
    data-entry-template="{{ esc_html('<span class="location-name"></span><span>(<span class="properties-count"></span>)</span>') }}" 
    data-max-results="5" 
    data-debounce-milliseconds="250" 
    data-onvaluechange-trigger-events='{{ isset($onvaluechange_trigger_events) ? $onvaluechange_trigger_events : '' }}'
    data-debug-mode="false" 
>
    <label for="address-keyword" class="form-label visually-hidden-focusable">Location, area or postcode</label>
    <input
        id="address-keyword" 
        data-component="FormItem"
        type="text"
        name="address_keyword"
        class="tpj_location_search_input form-control"
        placeholder="Autocomplete Address Keyword"
    >
</div>