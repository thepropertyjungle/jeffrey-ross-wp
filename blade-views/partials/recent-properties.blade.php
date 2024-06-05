{{--
    ATTENTION
    =========
    By default, search results will show the most recently added properties
    in descending order. To display the most recently added properties as a
    section on your website, you can use the following shortcode.

    [blade_list_search results_per_page="3" instruction_type="sale" view_name="partials/recent-properties"]

    Please see https://tpjwiki.wpengine.com/wordpress/basic-search-query-parameters/ for a list of search parameters that you
    can use in the above shortcode.
--}}

@if(count($properties) > 0)
    <div class="container">
        <div class="row">
            @foreach ($properties as $property)
                {{-- Include property list partial --}}
                <div class="col-md-4">
                    @include('partials/list-property')
                </div>
            @endforeach
        </div>
    </div>
@else
    <p>There are recent properties to display</p>
@endif