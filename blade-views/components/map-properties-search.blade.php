<div
    data-component="PropertiesMap"
    data-initial-lat="{{ $initial_lat ?? '51.5073509' }}"
    data-initial-lng="{{ $initial_lng ?? '-0.1277583' }}"
    data-initial-zoom="{{ $initial_zoom ?? '3' }}"
    data-view-name="{{ $marker_view_name ?? 'partials/rest/map-info-window' }}"
    data-map-initial-query='{{ isset($initial_query) ? $initial_query : '' }}'
    data-map-bind-query-to-events='["MAP_CHANGE_FILTERS"]'
    data-map-emit-shape-draw-change-events='["MAP_POLY_CHANGE"]'
    data-supports-drawing-mode="{{ $supports_drawing_mode ?? 'false' }}"
    data-map-drawing-options='{"fillColor":"#33aa7e","fillOpacity":0.4,"strokeWeight":2,"strokeColor":"#33aa7e"}'
    data-updates-window-query-vars={{ $updates_window_query_vars ?? 'true' }} 
    data-small-cluster-background={{ $small_cluster_background ?? '#0000ff' }} 
    data-large-cluster-background={{ $large_cluster_background ?? '#ff0000' }} 
    data-hide-map-if-no-results={{ $hide_map_if_no_results ?? 'false' }} 
    data-use-seo-permalinks={{ isset($use_seo_permalinks) && $use_seo_permalinks === true ? 'true' : 'false' }}
    id="search-map-results"
    class="search-map-results"
>

    <div class="tpj_load_info map-info">
        <div><strong>Loading Search Results...</strong></div>
    </div>

    <div class="tpj_map_no_results map-info">
        <div><strong>We couldn't find any properties with that search criteria.</strong></div>
    </div>
    
    @if(isset($supports_drawing_mode) && $supports_drawing_mode === true)
    <a href="#" class="tpj_draw_on_map_btn btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/></svg> Draw an Area
    </a>
    <a href="#" class="tpj_exit_draw_btn btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/></svg> Exit Draw Mode
    </a>
    <a href="#" class="tpj_clear_drawing_on_map_btn btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/></svg> Clear Drawing
    </a>
    <a href="#" class="tpj_clear_bounds_shape_btn btn">Clear Selection</a>
    @endif
</div>

<div class="tpj_map_no_results_map_html_replacement" style="display: none;">
    <p>We couldn't find any properties with that search criteria.</p>
</div>