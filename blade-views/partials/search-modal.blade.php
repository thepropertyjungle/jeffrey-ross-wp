<div id="search-form--modal" class="search-modal">

<h4 class="text-center property-search-title"> PROPERTY SEARCH </h4>
<div class="row">
        <div class="col-12 text-center fields-col">
            {{-- Tabs --}}
            <ul id="tabs-search-modal" class="nav nav-tabs justify-content-center" role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="sales-tab-modal" class="nav-link @if( (($_GET['instruction_type'] ?? '') === 'sale' || ($_GET['instruction_type'] ?? '') !== 'letting')) active @endif" data-bs-toggle="tab" data-bs-target="#sales-tab-pane-modal" type="button" role="tab" aria-controls="sales-tab-pane-modal" aria-selected="true">For Sale</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="lettings-tab-modal" class="nav-link @if(($_GET['instruction_type'] ?? '') === 'letting')) active @endif" data-bs-toggle="tab" data-bs-target="#lettings-tab-pane-modal" type="button" role="tab" aria-controls="lettings-tab-pane-modal" aria-selected="true">For Rent</button>
                </li>
            </ul>
        </div>
    </div>

    {{-- Tab content --}}
    <div class="tab-content" id="tabs-search-content-modal">

        {{-- Sales Tab --}}
        <div class="tab-pane  @if( (($_GET['instruction_type'] ?? '') === 'sale' || ($_GET['instruction_type'] ?? '') !== 'letting')) show active @endif" id="sales-tab-pane-modal" role="tabpanel" aria-labelledby="sales-tab-modal" tabindex="0">
            <form
                data-component="SearchForm"
                data-subscribe-submit-to-event="SALE_FORM_SUBMIT_EVENT"
                data-ison-elementor-popup="true"
                data-prevent-default-submit="false"
                action="{{ $global_options['dynamic_options']['search_results_list']['permalink'] ?? '' }}"
                class="container-fluid"
            >
                <input
                    type="hidden"
                    name="instruction_type"
                    value="sale"
                >
                <input
                    type="hidden"
                    name="showstc"
                    value="off"
                >
                <input
                    type="hidden" 
                    data-component="FormItem"
                    data-bind-value-to-events='["ORDER_BY_CHANGE_EVENT"]'
                    name="orderby"
                >

                {{-- Sales basic search facility --}}
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 fields-col">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="form-group">
                                <label for="address_keyword-sales-modal" class="sr-only">Type town, street or postcode</label>
                                <input
                                    data-component="FormItem"
                                    type="text"
                                    name="address_keyword"
                                    id="address_keyword-sales-modal"
                                    class="form-control"
                                    placeholder="Town, street or postcode"
                                >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 select-col">
                                <div class="form-group">
                                <label for="minprice-sales-modal" class="sr-only">Minimum Price</label>                               
                                <select
                                    data-component="FormItem"
                                    name="minprice"
                                    id="minprice-sales-modal"
                                    class="form-control"
                                >
                                    <option value="" selected disabled>Minimum Price</option>
                                    @include('partials/search-prices', ['sales' => 'true'])
                                </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 select-col">
                                <div class="form-group">
                                <label for="maxprice-sales-modal" class="sr-only">Maximum Price</label>                               
                                <select
                                    data-component="FormItem"
                                    name="maxprice"
                                    id="maxprice-sales-modal"
                                    class="form-control"
                                >
                                    <option value="" selected disabled>Maximum Price</option>
                                    @include('partials/search-prices', ['sales' => 'true'])
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 select-col">
                                <div class="form-group">
                                <label for="bedrooms-sales-modal" class="sr-only">Minimum Bedrooms</label>
                                <select
                                    data-component="FormItem"
                                    name="min_bedrooms"
                                    id="bedrooms-sales-modal"
                                    class="form-control"
                                >
                                    <option value="" selected disabled>Minimum Bedrooms</option>
                                    @include('partials/search-bedrooms')
                                </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 select-col">
                                <div class="form-group">
                                <label for="property-type-sales-modal" class="sr-only">Property Type</label>
                                <select
                                    data-component="FormItem"
                                    name="property_type"
                                    id="property-type-sales-modal"
                                    class="form-control"
                                >
                                    <option value="" selected disabled>Property Type</option>
                                    @include('partials/search-property-types')
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
							<div class="col-lg-12 my-5 d-flex justify-content-center align-items-center">
								<span class="sales-prices">Show Sold STC</span>
								<div class="sales-showstc">  
									<input type="checkbox" data-component="FormItem" data-onvaluechange-trigger-events='["AVAILABILITY_CHANGE", "SALE_FORM_SUBMIT_EVENT"]' name="showstc" id="sales-showstc-modal" value="on" checked />
									<label for="sales-showstc-modal" class="form-check-label"></label>
								</div>
							</div>
						</div>

                        <div class="row my-3 justify-content-center">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit">
                                <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="icon__search"><path d="M1.5,15.9l3.3-3.3C6,13.5,7.5,14,9,14c3.8,0,7-3.1,7-6.9c0,0,0-0.1,0-0.1c0-3.8-3.1-7-6.9-7C9.1,0,9,0,9,0C5.2,0,2,3.1,2,6.9C2,6.9,2,7,2,7c0,1.5,0.5,3,1.4,4.2l-3.3,3.3L1.5,15.9z M9,2c2.7,0,5,2.2,5,4.9c0,0,0,0.1,0,0.1c0,2.7-2.2,5-4.9,5c0,0-0.1,0-0.1,0c-2.7,0-5-2.2-5-4.9C4,7.1,4,7,4,7C4,4.3,6.2,2,9,2C8.9,2,9,2,9,2z"></path></svg>
                                    <span>Property Search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        {{-- Lettings tab --}}
        <div class="tab-pane @if(($_GET['instruction_type'] ?? '') === 'letting') show active @endif" id="lettings-tab-pane-modal" role="tabpanel" aria-labelledby="lettings-tab-modal" tabindex="0">
            <form
                data-component="SearchForm"
                data-prevent-default-submit="false"
                data-subscribe-submit-to-event="LETTING_FORM_SUBMIT_EVENT"
                action="{{ $global_options['dynamic_options']['search_results_list']['permalink'] ?? '' }}"
                class="container-fluid"
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

                {{-- Lettings basic search functionality --}}
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 fields-col">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="form-group">
                                <label for="address_keyword-lettings-modal" class="sr-only">Location</label>
                                <input
                                    data-component="FormItem"
                                    type="text"
                                    name="address_keyword"
                                    id="address_keyword-lettings-modal"
                                    class="form-control"
                                    placeholder="Town, street or postcode"
                                >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 select-col">
                                <div class="form-group">
                                <label for="minprice-lettings-modal" class="sr-only">Minimum Price</label>                               
                                <select
                                    data-component="FormItem"
                                    name="minprice"
                                    id="minprice-lettings-modal"
                                    class="form-control"
                                >
                                    <option value="" selected disabled>Minimum Price</option>
                                    @include('partials/search-prices', ['lettings' => 'true'])
                                </select>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 select-col">
                                <div class="form-group">
                                <label for="maxprice-lettings-modal" class="sr-only">Maximum Price</label>                               
                                <select
                                    data-component="FormItem"
                                    name="maxprice"
                                    id="maxprice-lettings-modal"
                                    class="form-control"
                                >
                                    <option value="" selected disabled>Maximum Price</option>
                                    @include('partials/search-prices', ['lettings' => 'true'])
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 select-col">
                                <div class="form-group">
                                <label for="bedrooms-lettings-modal" class="sr-only">Minimum Bedrooms</label>
                                <select
                                    data-component="FormItem"
                                    name="min_bedrooms"
                                    id="bedrooms-lettings-modal"
                                    class="form-control"
                                >
                                    <option value="" selected disabled>Minimum Bedrooms</option>
                                    @include('partials/search-bedrooms')
                                </select>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 select-col">
                                <div class="form-group">
                                <label for="property-type-lettings-modal" class="sr-only">Property Type</label>
                                <select
                                    data-component="FormItem"
                                    name="property_type"
                                    id="property-type-lettings-modal"
                                    class="form-control"
                                >
                                    <option value="" selected disabled>Property Type</option>
                                    @include('partials/search-property-types')
                                </select>
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">
							<div class="col-lg-12 my-5 d-flex justify-content-center align-items-center">
								<span class="lettings-prices">Show Let Agreed</span>
								<div class="lettings-showstc">  
									<input type="checkbox" data-component="FormItem" data-onvaluechange-trigger-events='["AVAILABILITY_CHANGE", "LETTING_FORM_SUBMIT_EVENT"]' name="showstc" id="lettings-showstc-modal" value="on" checked />
									<label for="lettings-showstc-modal" class="form-check-label"></label>
								</div>
							</div>
						</div>

                        <div class="row my-3 justify-content-center">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit">
                                <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="icon__search"><path d="M1.5,15.9l3.3-3.3C6,13.5,7.5,14,9,14c3.8,0,7-3.1,7-6.9c0,0,0-0.1,0-0.1c0-3.8-3.1-7-6.9-7C9.1,0,9,0,9,0C5.2,0,2,3.1,2,6.9C2,6.9,2,7,2,7c0,1.5,0.5,3,1.4,4.2l-3.3,3.3L1.5,15.9z M9,2c2.7,0,5,2.2,5,4.9c0,0,0,0.1,0,0.1c0,2.7-2.2,5-4.9,5c0,0-0.1,0-0.1,0c-2.7,0-5-2.2-5-4.9C4,7.1,4,7,4,7C4,4.3,6.2,2,9,2C8.9,2,9,2,9,2z"></path></svg>
                                    <span>Property Search</span>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>
