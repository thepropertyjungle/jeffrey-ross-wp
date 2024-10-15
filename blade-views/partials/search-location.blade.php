<div id="search-form--tabbed" class="home-search">
   

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
                    <div class="col-sm-12 col-md-10 col-lg-10 fields-col">
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
                        </div>
                    </div>
                    <div class="col-12 col-sm-2 col-lg-2 p-0">
                        <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M21 21L15.8033 15.8033M15.8033 15.8033C17.1605 14.4461 18 12.5711 18 10.5C18 6.35786 14.6421 3 10.5 3C6.35786 3 3 6.35786 3 10.5C3 14.6421 6.35786 18 10.5 18C12.5711 18 14.4461 17.1605 15.8033 15.8033Z" stroke="#B2B2B2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                            <span>Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

      
      
        
    </div>
</div>
