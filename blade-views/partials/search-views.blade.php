{{--
    ATTENTION
    =========
    /scr/scss/partials/search-views.scss

    If your website is using multiple views for the
    search results, you can build a group of links.

    Pay attention to the global dynamic options within
    this file. Either replace them with your own, or
    use the existing naming conventions for your search
    results pages.
--}}

<div class="btn-group">
    @if(isset($global_options['dynamic_options']['search_results_list']['permalink']))
        <a
            href="{{ $global_options['dynamic_options']['search_results_list']['permalink'] }}@php _e_blade_query_string() @endphp"
        class="btn btn-primary{{ isset($list_search) && $list_search ? ' active' : '' }}"
        >
            List View
        </a>
    @endif

    @if(isset($global_options['dynamic_options']['search_results_load_more']['permalink']))
    <a
        href="{{ $global_options['dynamic_options']['search_results_load_more']['permalink'] }}@php _e_blade_query_string() @endphp"
        class="btn btn-primary{{ isset($load_more) && $load_more ? ' active' : '' }}"
    >
        Load More
    </a>
    @endif

    @if(isset($global_options['dynamic_options']['search_results_grid']['permalink']))
    <a
        href="{{ $global_options['dynamic_options']['search_results_grid']['permalink'] }}@php _e_blade_query_string() @endphp"
        class="btn btn-primary{{ isset($grid_search) && $grid_search ? ' active' : '' }}"
    >
        Grid View
    </a>
    @endif

    @if(isset($global_options['dynamic_options']['search_results_google_map']['permalink']))
    <a
        href="{{ $global_options['dynamic_options']['search_results_google_map']['permalink'] }}@php _e_blade_query_string() @endphp"
        class="btn btn-primary{{ isset($map_search) && $map_search ? ' active' : '' }}"
    >
        Google Map
    </a>
    @endif

    @if(isset($global_options['dynamic_options']['search_results_leafletjs']['permalink']))
    <a
        href="{{ $global_options['dynamic_options']['search_results_leafletjs']['permalink'] }}@php _e_blade_query_string() @endphp"
        class="btn btn-primary{{ isset($leafletjs) && $leafletjs ? ' active' : '' }}"
    >
        LeafletJS Map
    </a>
    @endif

    <a href="/property-shortlist/" class="btn btn-primary{{ isset($shortlist) && $shortlist ? ' active' : '' }}">Shortlist</a>
</div>