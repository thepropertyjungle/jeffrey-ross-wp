{{--
    ATTENTION
    =========
    /src/scss/partials/search-core-example.scss

    This is your starting place to understand how property searches are built.

    There is Blade logic included within this form. You'll see $map_search referenced
    a few times, which is a way to determine if the search form is included on a map
    search or not. Other logic used is to display sales or lettings prices.

    Please make sure you have set your search pages within your website and created
    your Global Dynamic Options.

    You'll need to add your main search page to the forms action="" attribute.

    E.g. {{ $global_options['dynamic_options']['_replace_this_']['permalink'] }}

    If in doubt, please refer to:
    https://tpjwiki.wpengine.com/wordpress/tpj-plugin-global-options-explained/
--}}

@php
    $searchFormID = 'search-core-example';
@endphp

<section class="card">
    <div class="card-header text-center">
        <p class="card-title"><strong>Property Search</strong></p>
    </div>
    <form
        data-component="SearchForm"
        data-prevent-default-submit="false"
        data-subscribe-submit-to-event="SEARCH_CORE"
        id="{{ $searchFormID }}"
        action="{{ isset($global_options['dynamic_options']['search_results_list']['permalink']) ? $global_options['dynamic_options']['search_results_list']['permalink'] : '' }}"
    >
        <input
            type="hidden"
            data-component="FormItem" 
            data-bind-value-to-events='["ORDER_BY_CHANGE_EVENT"]'
            name="orderby"
        >
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <label for="department" class="form-label visually-hidden-focusable">Department</label>
                    <select
                        data-component="FormItem"
                        @if(isset($map_search) && $map_search)
                        data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                        @endif
                        name="department"
                        id="department"
                        class="form-control"
                    >
                        <option value="residential" selected>Choose a Department</option>
                        <option value="residential">Residential</option>
                        <option value="student">Student</option>
                        <option value="commercial">Commercial</option>
                    </select>
                </div>
                <div class="col">
                    <label for="instruction-type" class="form-label visually-hidden-focusable">Buying or Renting?</label>
                    <select
                        data-component="FormItem"
                        @if(isset($map_search) && $map_search)
                        data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                        @endif
                        name="instruction_type"
                        id="instruction-type"
                        class="form-control options-activate-selectors"
                    >
                        <option value="sale" @if (($_GET['instruction_type'] ?? '') === 'sale') selected @else selected @endif data-activate=".sales-prices">Buying</option>
                        <option value="letting" @if (($_GET['instruction_type'] ?? '') === 'letting') selected @endif data-activate=".lettings-prices">Renting</option>
                    </select>
                </div>
                <div class="col">
                    @include('components/location-autocomplete', ['parent_form_id' => '$searchFormID'])
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="property-type-sales" class="form-label visually-hidden-focusable">Property Type</label>
                    <select 
                        data-component="FormItem"
                        @if(isset($map_search) && $map_search)
                        data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                        @endif
                        name="property_type"
                        id="property-type-sales"
                        class="form-control"
                    >
                        <option value="" selected disabled>Property Type</option>
                        @include('partials/search-property-types', ['filters' => [
                            // 'instruction_type' => 'Letting',
                            // 'department' => 'Commercial'
                        ]])
                    </select>
                </div>
                <div class="col">
                    <div class="sales-prices">
                        <label for="minprice-sales" class="form-label visually-hidden-focusable">Minimum Price</label>
                        <select
                            data-component="FormItem"
                            @if(isset($map_search) && $map_search)
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            @endif
                            name="minprice"
                            id="minprice-sales"
                            class="form-control"
                        >
                            <option value="" selected disabled>Minimum Price</option>
                            @include('partials/search-prices', ['sales' => 'true'])
                        </select>
                    </div>
                    <div class="lettings-prices">
                        <label for="minprice-lettings" class="form-label visually-hidden-focusable">Minimum Price</label>
                        <select
                            data-component="FormItem"
                            @if(isset($map_search) && $map_search)
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            @endif
                            name="minprice"
                            id="minprice-lettings"
                            class="form-control"
                        >
                            <option value="" selected disabled>Minimum Price</option>
                            @include('partials/search-prices', ['lettings' => 'true'])
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="sales-prices">
                        <label for="maxprice-sales" class="form-label visually-hidden-focusable">Maximum Price</label>
                        <select
                            data-component="FormItem"
                            @if(isset($map_search) && $map_search)
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            @endif
                            name="maxprice"
                            id="maxprice-sales"
                            class="form-control"
                        >
                            <option value="" selected disabled>Maximum Price</option>
                            @include('partials/search-prices', ['sales' => 'true'])
                        </select>
                    </div>
                    <div class="lettings-prices">
                        <label for="maxprice-lettings" class="form-label visually-hidden-focusable">Maximum Price</label>
                        <select
                            data-component="FormItem"
                            @if(isset($map_search) && $map_search)
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            @endif
                            name="maxprice"
                            id="maxprice-lettings"
                            class="form-control"
                        >
                            <option value="" selected disabled>Maximum Price</option>
                            @include('partials/search-prices', ['lettings' => 'true'])
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="bedrooms" class="form-label visually-hidden-focusable">Minimum Bedrooms</label>
                    <select
                        data-component="FormItem"
                        @if(isset($map_search) && $map_search)
                        data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                        @endif
                        name="bedrooms"
                        id="bedrooms"
                        class="form-control"
                    >
                        <option value="" selected disabled>Minimum Bedrooms</option>
                        @include('partials/search-bedrooms')
                    </select>
                </div>
                <div class="col">
                    <label for="max-bedrooms" class="form-label visually-hidden-focusable">Maximum Bedrooms</label>
                    <select
                        data-component="FormItem"
                        @if(isset($map_search) && $map_search)
                        data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                        @endif
                        name="max_bedrooms"
                        id="max-bedrooms"
                        class="form-control"
                    >
                        <option value="" selected disabled>Maximum Bedrooms</option>
                        @include('partials/search-bedrooms')
                    </select>
                </div>
                <div class="col">
                    <label for="exact-bedrooms" class="form-label visually-hidden-focusable">Exact Bedrooms</label>
                    <select
                        data-component="FormItem"
                        @if(isset($map_search) && $map_search)
                        data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                        @endif
                        name="exact_bedrooms"
                        id="exact-bedrooms"
                        class="form-control"
                    >
                        <option value="" selected disabled>Exact Bedrooms</option>
                        @include('partials/search-bedrooms', ['bedrooms_type' => 'exact'])
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="formcheck">
                        <input
                            data-component="FormItem"
                            @if(isset($map_search) && $map_search)
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            @endif
                            type="checkbox"
                            name="new_home"
                            id="new-homes"
                            class="form-check-input"
                            value="1"
                        >
                        <label for="new-homes" class="form-check-label">Only New Homes</label>
                    </div>
                </div>
                <div class="col">
                    <div class="formcheck">
                        <input
                            data-component="FormItem"
                            @if(isset($map_search) && $map_search)
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            @endif
                            type="checkbox"
                            name="featured"
                            id="featured"
                            class="form-check-input"
                            value="1"
                        >
                        <label for="featured" class="form-check-label">Only Featured Properties</label>
                    </div>
                </div>
                <div class="col">
                    <div class="formcheck">
                        <input
                            data-component="FormItem"
                            @if(isset($map_search) && $map_search)
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            @endif
                            type="checkbox"
                            name="showstc"
                            id="showstc"
                            class="form-check-input"
                            value="on"
                        >
                        <label for="showstc" class="form-check-label">
                            <span class="sales-prices">Show STC?</span>
                            <span class="lettings-prices">Show Let Agreed?</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        @if(!isset($map_search) || !$map_search)
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-success btn-lg">Search</button>
            </div>
        @endif
    </form>
</section>