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

<div class="form__main-search">
    @if(isset($map_search) && $map_search)
    <div id="form__map-search">
        <a class="advanced__collapse-btn" data-bs-toggle="collapse" data-bs-target=".collapseAdvanced" href="#" role="button" aria-expanded="false" aria-controls="collapseAdvanced">
            <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__plus"><path d="M5.2,9H3.8V0h1.5V9z"></path><path d="M9,5.3H0V3.8h9V5.3z"></path></svg>
            Advanced<span class="d-none d-md-inline"> Search</span>
        </a>
        <form
            data-component="SearchForm"
            data-prevent-default-submit="true"
        >
            <div class="advanced__search">
                <div class="advanced__search-fields">
                    <div class="advanced__search-location">
                        <label for="address-keyword">Location</label>
                        <input
                                    data-component="FormItem"
                                    type="text"
                                    name="address_keyword"
                                    id="address-keyword-sales"
                                    placeholder="Town, street or postcode"
                                >
                    </div>
                    <div class="advanced__search-selects">
                        <label for="instruction-type">Buying or Renting?</label>
                        <select
                            data-component="FormItem"
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            name="instruction_type"
                            id="instruction-type"
                            class="options-activate-selectors"
                        >
                            <option value="">Please Select</option>
                            <option value="sale" @if (($_GET['instruction_type'] ?? '') === 'sale') selected @else selected @endif data-activate=".sales-prices">Buying</option>
                            <option value="letting" @if (($_GET['instruction_type'] ?? '') === 'letting') selected @endif data-activate=".lettings-prices">Renting</option>
                        </select>
                    </div>
                    <div class="advanced__search-selects">
                        <span class="sales-prices">
                            <label for="maxprice-sales">Maximum Price</label>
                            <select
                                data-component="FormItem"
                                data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                                name="maxprice"
                                id="maxprice-sales"
                            >
                                <option value="" selected disabled>Max Price</option>
                                @include('partials/search-prices', ['sales' => 'true'])
                            </select>
                        </span>
                        <span class="lettings-prices">
                            <label for="maxprice-lettings">Max Price</label>
                            <select
                                data-component="FormItem"
                                data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                                name="maxprice"
                                id="maxprice-lettings"
                            >
                                <option value="" selected disabled>Max Price</option>
                                @include('partials/search-prices', ['lettings' => 'true'])
                            </select>
                        </span>
                    </div>
                    <div class="advanced__search-selects">
                        <label for="min_bedrooms">Min Bed</label>
                        <select
                            data-component="FormItem"
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            name="min_bedrooms"
                            id="min_bedrooms"
                        >
                            <option value="" selected disabled>Min Beds</option>
                            @include('partials/search-bedrooms')
                        </select>
                    </div>
                </div>
            </div>
            <div class="collapse collapseAdvanced">
                <div class="card card-body">
                    <div class="collapse__search-fields">
                        <div class="collapse__search-input">
                            <div class="formcheck">
                                <input
                                    data-component="FormItem"
                                    data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                                    type="checkbox"
                                    name="showstc"
                                    id="showstc"
                                    class="form-check-input"
                                    value="on"
                                >
                                <label for="showstc" class="form-check-label">
                                    <span class="sales-prices">Show STC</span>
                                    <span class="lettings-prices">Show Let Agreed</span>
                                </label>
                            </div>                           
                        </div>
                        <div class="collapse__search-selects">
                            <span class="sales-prices">
                                <label for="minprice-sales">Min Price</label>
                                <select
                                    data-component="FormItem"
                                    data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                                    name="minprice"
                                    id="minprice-sales"
                                >
                                    <option value="" selected disabled>Min Price</option>
                                    @include('partials/search-prices', ['sales' => 'true'])
                                </select>
                            </span>
                            <span class="lettings-prices">
                                <label for="minprice-lettings">Min Price</label>
                                <select
                                    data-component="FormItem"
                                    data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                                    name="minprice"
                                    id="minprice-lettings"
                                >
                                    <option value="" selected disabled>Min Price</option>
                                    @include('partials/search-prices', ['lettings' => 'true'])
                                </select>
                            </span>
                        </div>                           
                        <div class="collapse__search-selects">
                            <span class="sales-prices">
                                <label for="property_type-sales">Property Type</label>
                                <select
                                    data-component="FormItem"
                                    data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                                    name="property_type"
                                    id="property_type-sales"
                                >
                                    <option value="" selected disabled>Property Type</option>
                                    @include('partials/search-property-types', ['filters' => [
                                        'instruction_type' => 'Sale',
                                    ]])
                                </select>
                            </span>
                            <span class="lettings-prices">
                                <label for="property_type-lettings">Property Type</label>
                                <select
                                    data-component="FormItem"
                                    data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                                    name="property_type"
                                    id="property_type-lettings"
                                >
                                    <option value="" selected disabled>Property Type</option>
                                    @include('partials/search-property-types', ['filters' => [
                                        'instruction_type' => 'Letting',
                                    ]])
                                </select>
                            </span>
                        </div> 
                    </div>
                </div>
            </div>                    
        </form>
    </div>
    @else
    <div class="form__tabbed-content">
        <div>
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link target_nav_map_sale @if( (($_GET['instruction_type'] ?? '') === 'sale' || ($_GET['instruction_type'] ?? '') !== 'letting')) active @endif" id="pills-sale-tab" data-bs-toggle="pill" data-bs-target="#pills-sale" type="button" role="tab" aria-controls="pills-sale" aria-selected="true">To buy</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link target_nav_map_letting @if(($_GET['instruction_type'] ?? '') === 'letting') active @endif" id="pills-let-tab" data-bs-toggle="pill" data-bs-target="#pills-let" type="button" role="tab" aria-controls="pills-let" aria-selected="false">To rent</button>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="advanced__collapse-btn" data-bs-toggle="collapse" data-bs-target=".collapseAdvanced" href="#" role="button" aria-expanded="false" aria-controls="collapseAdvanced">
                        <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__plus"><path d="M5.2,9H3.8V0h1.5V9z"></path><path d="M9,5.3H0V3.8h9V5.3z"></path></svg>
                        Advanced<span class="d-none d-md-inline"> Search</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-search">
            <!-- Sales Options -->
            <div class="tab-pane @if( (($_GET['instruction_type'] ?? '') === 'sale' || ($_GET['instruction_type'] ?? '') !== 'letting')) show active @endif" id="pills-sale" role="tabpanel" aria-labelledby="pills-sale-tab">
                <form
                    data-component="SearchForm"
                    data-subscribe-submit-to-event="SALE_FORM_SUBMIT_EVENT" 
                    data-prevent-default-submit="false"
                >
                    <input
                        type="hidden"
                        name="instruction_type"
                        value="sale"
                    >
                    <input
                        type="hidden"
                        data-component="FormItem" 
                        data-bind-value-to-events='["ORDER_BY_CHANGE_EVENT"]'
                        name="orderby"
                    >
                    <div class="advanced__search">
                        <div class="advanced__search-fields">
                            <div class="advanced__search-location">
                                <label for="address-keyword-sales">Location</label>
                                <input
                                    data-component="FormItem"
                                    type="text"
                                    name="address_keyword"
                                    id="address-keyword-sales"
                                    placeholder="Town, street or postcode"
                                >
                            </div>
                            <div class="advanced__search-selects">
                                <label for="maxprice-sales">Max Price</label>
                                <select
                                    data-component="FormItem"
                                    name="maxprice"
                                    id="maxprice-sales"
                                >
                                    <option value="" selected disabled>Max Price</option>
                                    @include('partials/search-prices', ['sales' => 'true'])
                                </select>
                            </div>
                            <div class="advanced__search-selects">
                                <label for="bedrooms-sales">Min Bed</label>
                                <select
                                    data-component="FormItem"
                                    name="min_bedrooms"
                                    id="bedrooms-sales"
                                    class="bedrooms-select"
                                >
                                    <option value="" selected disabled>Min Beds</option>
                                    @include('partials/search-bedrooms')
                                </select>
                            </div>
                        </div>
                        <div class="advanced__search-submit">
                            <button
                                type="submit"
                                data-component="FormItem"
                                data-form-url="{{ $search_permalink }}"
                                data-onclick-trigger-events='["LETTING_FORM_SUBMIT_EVENT"]'
                            >
                                <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="icon__search"><path d="M1.5,15.9l3.3-3.3C6,13.5,7.5,14,9,14c3.8,0,7-3.1,7-6.9c0,0,0-0.1,0-0.1c0-3.8-3.1-7-6.9-7C9.1,0,9,0,9,0C5.2,0,2,3.1,2,6.9C2,6.9,2,7,2,7c0,1.5,0.5,3,1.4,4.2l-3.3,3.3L1.5,15.9z M9,2c2.7,0,5,2.2,5,4.9c0,0,0,0.1,0,0.1c0,2.7-2.2,5-4.9,5c0,0-0.1,0-0.1,0c-2.7,0-5-2.2-5-4.9C4,7.1,4,7,4,7C4,4.3,6.2,2,9,2C8.9,2,9,2,9,2z"></path></svg> Search
                            </button>
                        </div>
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
                                            id="sales-showstc"
                                            class="form-check-input"
                                            value="on"
                                        >
                                        <label for="sales-showstc" class="form-check-label">
                                            <span class="sales-prices">Show STC</span>
                                        </label>
                                    </div>                           
                                </div>
                                <div class="collapse__search-selects">
                                    <label for="minprice-sales" >Min Price</label>
                                    <select
                                        data-component="FormItem"
                                        name="minprice"
                                        id="minprice-sales"
                                    >
                                        <option value="" selected disabled>Min Price</option>
                                        @include('partials/search-prices', ['sales' => 'true'])
                                    </select>
                                </div>                           
                                <div class="collapse__search-selects">
                                    <label for="property_type-sales">Property Type</label>
                                    <select
                                        data-component="FormItem"
                                        name="property_type"
                                        id="property_type-sales"
                                    >
                                        <option value="" selected disabled>Property Type</option>
                                        @include('partials/search-property-types', ['filters' => [
                                            'instruction_type' => 'sale'
                                        ]])
                                    </select>
                                </div> 
                            </div>
                        </div>
                    </div>  
                    <div class="advanced__search-submit advanced__search-submit-sm">
                            <button
                                type="submit"
                                data-component="FormItem"
                                data-form-url="{{ $search_permalink }}"
                                data-onclick-trigger-events='["LETTING_FORM_SUBMIT_EVENT"]'
                            >
                                <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="icon__search"><path d="M1.5,15.9l3.3-3.3C6,13.5,7.5,14,9,14c3.8,0,7-3.1,7-6.9c0,0,0-0.1,0-0.1c0-3.8-3.1-7-6.9-7C9.1,0,9,0,9,0C5.2,0,2,3.1,2,6.9C2,6.9,2,7,2,7c0,1.5,0.5,3,1.4,4.2l-3.3,3.3L1.5,15.9z M9,2c2.7,0,5,2.2,5,4.9c0,0,0,0.1,0,0.1c0,2.7-2.2,5-4.9,5c0,0-0.1,0-0.1,0c-2.7,0-5-2.2-5-4.9C4,7.1,4,7,4,7C4,4.3,6.2,2,9,2C8.9,2,9,2,9,2z"></path></svg> Search
                            </button>
                        </div>    
                </form>
            </div>
            <!-- Lettings Options -->
            <div class="tab-pane @if(($_GET['instruction_type'] ?? '') === 'letting') show active @endif" id="pills-let" role="tabpanel" aria-labelledby="pills-let-tab">
                <form
                    data-component="SearchForm"
                    data-subscribe-submit-to-event="LETTING_FORM_SUBMIT_EVENT" 
                    data-prevent-default-submit="false"
                >
                    <input
                        type="hidden"
                        name="instruction_type"
                        value="letting"
                    >
                    <input
                        type="hidden"
                        data-component="FormItem" 
                        data-bind-value-to-events='["ORDER_BY_CHANGE_EVENT"]'
                        name="orderby"
                    >
                    <div class="advanced__search">
                        <div class="advanced__search-fields">
                            <div class="advanced__search-location">
                                <label for="address-keyword-lettings">Location</label>
                                <input
                                    data-component="FormItem"
                                    type="text"
                                    name="address_keyword"
                                    id="address-keyword-lettings"
                                    placeholder="Town, street or postcode"
                                >
                            </div>
                            <div class="advanced__search-selects">
                                <label for="maxprice-lettings">Max Price</label>
                                <select
                                    data-component="FormItem"
                                    name="maxprice"
                                    id="maxprice-lettings"
                                >
                                    <option value="" selected disabled>Max Price</option>
                                    @include('partials/search-prices', ['lettings' => 'true'])
                                </select>
                            </div>
                            <div class="advanced__search-selects">
                                <label for="bedrooms-lettings">Min Bed</label>
                                <select
                                    data-component="FormItem"
                                    name="min_bedrooms"
                                    id="bedrooms-lettings"
                                    class="bedrooms-select"
                                >
                                    <option value="" selected disabled>Min Beds</option>
                                    @include('partials/search-bedrooms')
                                </select>
                            </div>
                        </div>
                        <div class="advanced__search-submit">
                            <button
                                type="submit"
                                data-component="FormItem"
                                data-form-url="{{ $search_permalink }}"
                                data-onclick-trigger-events='["LETTING_FORM_SUBMIT_EVENT"]'
                            >
                                <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="icon__search"><path d="M1.5,15.9l3.3-3.3C6,13.5,7.5,14,9,14c3.8,0,7-3.1,7-6.9c0,0,0-0.1,0-0.1c0-3.8-3.1-7-6.9-7C9.1,0,9,0,9,0C5.2,0,2,3.1,2,6.9C2,6.9,2,7,2,7c0,1.5,0.5,3,1.4,4.2l-3.3,3.3L1.5,15.9z M9,2c2.7,0,5,2.2,5,4.9c0,0,0,0.1,0,0.1c0,2.7-2.2,5-4.9,5c0,0-0.1,0-0.1,0c-2.7,0-5-2.2-5-4.9C4,7.1,4,7,4,7C4,4.3,6.2,2,9,2C8.9,2,9,2,9,2z"></path></svg> Search
                            </button>
                        </div>    
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
                                <div class="collapse__search-selects">
                                    <label for="minprice-lettings">Min Price</label>
                                    <select
                                        data-component="FormItem"
                                        name="minprice"
                                        id="minprice-lettings"
                                    >
                                        <option value="" selected disabled>Min Price</option>
                                        @include('partials/search-prices', ['lettings' => 'true'])
                                    </select>
                                </div>
                                <div class="collapse__search-selects">
                                    <label for="property_type-lettings" >Property Type</label>
                                    <select
                                        data-component="FormItem"
                                        name="property_type"
                                        id="property_type-lettings"
                                    >
                                        <option value="" selected disabled>Property Type</option>
                                        @include('partials/search-property-types', ['filters' => [
                                            'instruction_type' => 'letting'
                                        ]])
                                    </select>
                                </div> 
                            </div>
                        </div>
                        <div class="advanced__search-submit d-block d-md-none">
                            <button
                                type="submit"
                                data-component="FormItem"
                                data-form-url="{{ $search_permalink }}"
                                data-onclick-trigger-events='["LETTING_FORM_SUBMIT_EVENT"]'
                            >
                                <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="icon__search"><path d="M1.5,15.9l3.3-3.3C6,13.5,7.5,14,9,14c3.8,0,7-3.1,7-6.9c0,0,0-0.1,0-0.1c0-3.8-3.1-7-6.9-7C9.1,0,9,0,9,0C5.2,0,2,3.1,2,6.9C2,6.9,2,7,2,7c0,1.5,0.5,3,1.4,4.2l-3.3,3.3L1.5,15.9z M9,2c2.7,0,5,2.2,5,4.9c0,0,0,0.1,0,0.1c0,2.7-2.2,5-4.9,5c0,0-0.1,0-0.1,0c-2.7,0-5-2.2-5-4.9C4,7.1,4,7,4,7C4,4.3,6.2,2,9,2C8.9,2,9,2,9,2z"></path></svg> Search
                            </button>
                        </div>
                    </div>
                    <div class="advanced__search-submit advanced__search-submit-sm">
                            <button
                                type="submit"
                                data-component="FormItem"
                                data-form-url="{{ $search_permalink }}"
                                data-onclick-trigger-events='["LETTING_FORM_SUBMIT_EVENT"]'
                            >
                                <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="icon__search"><path d="M1.5,15.9l3.3-3.3C6,13.5,7.5,14,9,14c3.8,0,7-3.1,7-6.9c0,0,0-0.1,0-0.1c0-3.8-3.1-7-6.9-7C9.1,0,9,0,9,0C5.2,0,2,3.1,2,6.9C2,6.9,2,7,2,7c0,1.5,0.5,3,1.4,4.2l-3.3,3.3L1.5,15.9z M9,2c2.7,0,5,2.2,5,4.9c0,0,0,0.1,0,0.1c0,2.7-2.2,5-4.9,5c0,0-0.1,0-0.1,0c-2.7,0-5-2.2-5-4.9C4,7.1,4,7,4,7C4,4.3,6.2,2,9,2C8.9,2,9,2,9,2z"></path></svg> Search
                            </button>
                        </div>    
                </form>
            </div>
        </div>
    </div>
    @endif
</div>