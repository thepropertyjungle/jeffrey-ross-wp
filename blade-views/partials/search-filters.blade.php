{{--
    ATTENTION
    =========
    /src/scss/partials/search-filters.scss

    You can sort your search results using these options.
    Just make sure your search form has an hidden input
    for the 'orderby' name.
--}}

<label for="orderby" class="visually-hidden-focusable">Filter Search Results</label>
<select
    data-component="FormItem"
    {{--data-form-url=""--}}
    data-onvaluechange-trigger-events='["ORDER_BY_CHANGE_EVENT", "SEARCH_CORE"]'
    name="orderby"
    class="form-control"
>
    <option value="" selected disabled>Sort By</option>
    <option value="price_desc">Highest Price</option>
    <option value="price_asc">Lowest Price</option>
    <option value="instructed_desc">Most Recent</option>
    <option value="instructed_asc">Least Recent</option>
</select>