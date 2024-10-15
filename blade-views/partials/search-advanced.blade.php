@php
    // Query the URL
    $referrer = $_SERVER['REQUEST_URI'];

    // Initialise default global option
    $default_global_option = $global_options['dynamic_options']['search_results_list']['permalink'] ?? '';

    // Check the $referrer and set $search_permalink accordingly
    if (strpos($referrer, 'grid-search-results') !== false) {
        $search_permalink = $global_options['dynamic_options']['search_results_grid']['permalink'] ?? $default_global_option;
    } elseif (strpos($referrer, 'map-search-results') !== false) {
        $search_permalink = $global_options['dynamic_options']['search_results_map']['permalink'] ?? $default_global_option;
    } elseif (strpos($referrer, 'list-search-results') !== false) {
        $search_permalink = $global_options['dynamic_options']['search_results_list']['permalink'] ?? $default_global_option;
    } else {
        // Default to search_results_list if none of the conditions are met
        $search_permalink = $default_global_option;
    }
@endphp







<div id="search-form--tabbed" class="home-search prop advanced">
   

    <div class="tab-content" id="tabs-search-content">
        <!-- Residential Sales Tab -->
        <div class="tab-pane fade show active" id="sales-tab-pane" role="tabpanel" aria-labelledby="sales-tab" tabindex="0">
            <form data-component="SearchForm" data-prevent-default-submit="false"
                data-subscribe-submit-to-event="SEARCH_CORE"
                action="{{ $global_options['dynamic_options']['search_results_grid']['permalink'] ?? '' }}"
                class="container-fluid">
                <input data-component="FormItem" type="hidden" name="instruction_type" value="sale">
                <input data-component="FormItem" type="hidden" name="showstc" value="on">
                <input data-component="FormItem" data-bind-value-to-events='["ORDER_BY_CHANGE_EVENT"]' name="orderby"
                    type="hidden" value="price_desc">
                <input data-component="FormItem" data-bind-value-to-events='["AVAILABILITY_CHANGE"]' name="availability"
                    type="hidden">
                <input type="hidden" name="department" value="Residential">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 fields-col">
                        <div class="row">
                            <div class="form-group">
                                <div class="radio-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="instruction_type" value="sale" 
                                            @if (($_GET['instruction_type'] ?? '') === 'sale') checked @endif 
                                            data-activate=".sales-prices"> Buy
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="instruction_type" value="letting" 
                                            @if (($_GET['instruction_type'] ?? '') === 'letting') checked @endif 
                                            data-activate=".lettings-prices"> Rent
                                    </label>
                                </div>
                            </div>
                            <div class="location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M19.5 10.5C19.5 17.6421 12 21.75 12 21.75C12 21.75 4.5 17.6421 4.5 10.5C4.5 6.35786 7.85786 3 12 3C16.1421 3 19.5 6.35786 19.5 10.5Z" fill="#0A1A3F" stroke="#0A1A3F" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15 10.5C15 12.1569 13.6569 13.5 12 13.5C10.3431 13.5 9 12.1569 9 10.5C9 8.84315 10.3431 7.5 12 7.5C13.6569 7.5 15 8.84315 15 10.5Z" fill="white"/>
</svg>
                        
                                <input data-component="FormItem" type="text" name="address_keyword"
                                    id="address_keyword-sales" class="form-control"
                                    placeholder="Location or postcode">

                            </div>


                            <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21 21L15.8033 15.8033M15.8033 15.8033C17.1605 14.4461 18 12.5711 18 10.5C18 6.35786 14.6421 3 10.5 3C6.35786 3 3 6.35786 3 10.5C3 14.6421 6.35786 18 10.5 18C12.5711 18 14.4461 17.1605 15.8033 15.8033Z" stroke="#B2B2B2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                            <span>Search</span>
                        </button>


                        </div>
                    </div>
                  

                    <div class=" col-12 fields-col2">


                    <!-- Sales Min Price Dropdown -->
 
    <div class="collapse__search-selects sales-prices">
        <label for="minprice-sales">Min. Price</label>
        <select data-component="FormItem" name="minprice" id="minprice-sales">
            <option value="" selected disabled>Min. Price</option>
            @include('partials/search-prices', ['sales' => 'true'])
        </select>
    </div>
 

<!-- Lettings Min Price Dropdown -->
 
    <div class="collapse__search-selects lettings-prices">
        <label for="minprice-lettings">Min. Price</label>
        <select data-component="FormItem" name="minprice" id="minprice-lettings">
            <option value="" selected disabled>Min. Price</option>
            @include('partials/search-prices', ['lettings' => 'true'])
        </select>
    </div>
 


                  <!-- Sales Max Price Dropdown -->

    <div class="advanced__search-selects sales-prices">
        <label for="maxprice-sales">Max. Price</label>
        <select data-component="FormItem" name="maxprice" id="maxprice-sales">
            <option value="" selected disabled>Max. Price</option>
            @include('partials/search-prices', ['sales' => 'true'])
        </select>
    </div>


<!-- Lettings Max Price Dropdown -->

    <div class="advanced__search-selects  lettings-prices">
        <label for="maxprice-lettings">Max. Price</label>
        <select data-component="FormItem" name="maxprice" id="maxprice-lettings">
            <option value="" selected disabled>Max. Price</option>
            @include('partials/search-prices', ['lettings' => 'true'])
        </select>
    </div>







                            <div class="advanced__search-selects">
                                <label for="bedrooms-lettings">Min. Bed</label>
                                <select
                                    data-component="FormItem"
                                    name="min_bedrooms"
                                    id="bedrooms-lettings"
                                    class="bedrooms-select"
                                >
                                    <option value="" selected disabled>Min. Beds</option>
                                    @include('partials/search-bedrooms')
                                </select>
                            </div>
                      
                        
                        <div class="collapse__search-selects">
                                    <label for="property_type-lettings" >Type</label>
                                    <select
                                        data-component="FormItem"
                                        name="property_type"
                                        id="property_type-lettings"
                                    >
                                        <option value="" selected disabled>All</option>
                                        @include('partials/search-property-types', ['filters' => [
                                            'instruction_type' => 'letting'
                                        ]])
                                    </select>
                                </div> 



                    <a class="advanced__collapse-btn" data-bs-toggle="collapse" data-bs-target=".collapseAdvanced" href="#" role="button" aria-expanded="false" aria-controls="collapseAdvanced">
                        More<span class="d-none d-md-inline"> Filters</span>
                    </a>


                    </div>
                    <div class="collapse collapseAdvanced">
                        <div class="card card-body">
                            <div class="collapse__search-fields">
                                <div class="collapse__search-input">
                                    <div class="formcheck">
                                        <input
                                            data-component="FormItem"
                                            type="checkbox"
                                            name="showstc"
                                            id="lettings-showstc"
                                            class="form-check-input"
                                            value="on"
                                        >
                                        <label for="lettings-showstc" class="form-check-label">
                                            <span class="lettings-prices">Show STC</span>
                                        </label>
                                    </div>                       
                                </div>
                               
                               
                            </div>
                        </div>


                    </div>





                </div>






            </form>
        </div>

      
      
        
    </div>
</div>





