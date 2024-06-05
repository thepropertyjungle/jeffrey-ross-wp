<div id="search-form--tabbed">
    <ul id="tabs-search" class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button id="sales-tab" class="nav-link active" data-bs-toggle="tab" data-bs-target="#sales-tab-pane" type="button" role="tab" aria-controls="sales-tab-pane" aria-selected="true">To Buy</button>
        </li>
        <li class="nav-item" role="presentation">
            <button id="lettings-tab" class="nav-link" data-bs-toggle="tab" data-bs-target="#lettings-tab-pane" type="button" role="tab" aria-controls="lettings-tab-pane" aria-selected="true">To Rent</button>
        </li>
        <li class="nav-item" >
            <a href="{{ $global_options['dynamic_options']['search_results_map']['permalink'] ?? '' }}" class="draw-search-btn">
                <svg enable-background="new 0 0 14 14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" class="icon__draw-search"><path d="M10.5,2.8C8.6,2.8,7,4.4,7,6.2c0,1.7,2.9,6.5,3.2,6.9c0.1,0.1,0.2,0.2,0.3,0.2s0.2-0.1,0.3-0.2c0.3-0.5,3.2-5.3,3.2-6.9C14,4.4,12.5,2.8,10.5,2.8z M10.5,12.3c-1-1.7-2.8-4.9-2.8-6.1c0-1.5,1.2-2.7,2.8-2.7s2.8,1.2,2.8,2.7C13.3,7.4,11.5,10.6,10.5,12.3z"></path><path d="M10.5,4.6c-0.9,0-1.7,0.7-1.7,1.7C8.8,7.2,9.5,8,10.5,8c0.9,0,1.8-0.7,1.8-1.7C12.2,5.3,11.4,4.6,10.5,4.6z M10.5,7.2c-0.5,0-0.9-0.4-0.9-0.9s0.4-0.9,0.9-0.9s0.9,0.4,0.9,0.9C11.5,6.8,11,7.2,10.5,7.2z"></path><path d="M9.2,12.6H2.5c-0.9,0-1.7-0.8-1.7-1.7v-0.2C0.7,9.8,1.5,9,2.5,9h1.9c0.8,0,1.5-0.7,1.5-1.5V7.2c0-0.8-0.7-1.5-1.5-1.5H3.5C3.4,5.8,3.3,6.1,3.1,6.4h1.2c0.4,0,0.8,0.4,0.8,0.8v0.4c0,0.4-0.4,0.8-0.8,0.8H2.5C1.1,8.4,0,9.5,0,10.8V11c0,1.3,1.1,2.4,2.5,2.4h7.1l0,0C9.5,13.2,9.4,13,9.2,12.6z"></path><path d="M2.2,6.4c0.1,0,0.2-0.1,0.3-0.2c0.2-0.3,1.8-2.9,1.8-3.9c0-1.1-0.9-2-2.1-2s-2.1,0.9-2.1,2c0,1,1.6,3.6,1.8,3.9C2,6.3,2.1,6.4,2.2,6.4z M2.2,0.9c0.7,0,1.3,0.6,1.3,1.3c0,0.5-0.7,2-1.3,3c-0.6-1-1.3-2.5-1.3-3C0.8,1.5,1.4,0.9,2.2,0.9z"></path><path d="M2.7,1.9C2.6,1.7,2.3,1.5,2,1.6C1.8,1.7,1.5,2,1.6,2.3c0.1,0.3,0.4,0.4,0.7,0.3C2.7,2.5,2.8,2.2,2.7,1.9z"></path></svg>
                Draw<span class="d-none d-sm-inline"> Search</span>
            </a>
        </li>
    </ul>

    <div class="tab-content" id="tabs-search-content">
        <div class="tab-pane fade show active" id="sales-tab-pane" role="tabpanel" aria-labelledby="sales-tab" tabindex="0">
            <form data-component="SearchForm" 
                data-prevent-default-submit="false"         
                data-subscribe-submit-to-event="SEARCH_CORE"
                action="{{ $global_options['dynamic_options']['search_results_list']['permalink'] ?? '' }}" 
                class="container-fluid"
            >
                <input data-component="FormItem" type="hidden" name="instruction_type" value="sale">
                <input data-component="FormItem" type="hidden" name="showstc" value="on">
                <input
                data-component="FormItem"
                data-bind-value-to-events='["ORDER_BY_CHANGE_EVENT"]'
                name="orderby"
                type="hidden"
                >
                <input
                data-component="FormItem"
                data-bind-value-to-events='["AVAILABILITY_CHANGE"]'
                name="availability"
                type="hidden"
                >

                <div class="row">
                    <div class="col-sm-12 col-lg-10 fields-col">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <label for="address_keyword-sales" >Location</label>
                                <input data-component="FormItem" type="text" name="address_keyword" id="address_keyword-sales" class="form-control" placeholder="Town, street and postcode">
                            </div>
                            <div class="col-sm-12 col-lg select-col">
                                <label for="maxprice-sales" >Maximum Price</label>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 407.437 407.437" style="enable-background:new 0 0 407.437 407.437;" xml:space="preserve"> <polygon points="386.258,91.567 203.718,273.512 21.179,91.567 0,112.815 203.718,315.87 407.437,112.815 "/> </svg>
                                <select data-component="FormItem" name="maxprice" id="maxprice-sales" class="form-control">
                                    <option value="" selected disabled>Please choose</option>
                                    @include('partials/search-prices', ['sales' => 'true'])
                                </select>
                            </div>
                            <div class="col-sm-12 col-lg select-col">
                                <label for="bedrooms-sales" >Minimum Beds</label>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 407.437 407.437" style="enable-background:new 0 0 407.437 407.437;" xml:space="preserve"> <polygon points="386.258,91.567 203.718,273.512 21.179,91.567 0,112.815 203.718,315.87 407.437,112.815 "/> </svg>
                                <select data-component="FormItem" name="min_bedrooms" id="bedrooms-sales" class="form-control">
                                    <option value="" selected disabled>Please choose</option>
                                    @include('partials/search-bedrooms')
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 p-0">
                        <button type="submit">
                            <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="icon__search"><path d="M1.5,15.9l3.3-3.3C6,13.5,7.5,14,9,14c3.8,0,7-3.1,7-6.9c0,0,0-0.1,0-0.1c0-3.8-3.1-7-6.9-7C9.1,0,9,0,9,0C5.2,0,2,3.1,2,6.9C2,6.9,2,7,2,7c0,1.5,0.5,3,1.4,4.2l-3.3,3.3L1.5,15.9z M9,2c2.7,0,5,2.2,5,4.9c0,0,0,0.1,0,0.1c0,2.7-2.2,5-4.9,5c0,0-0.1,0-0.1,0c-2.7,0-5-2.2-5-4.9C4,7.1,4,7,4,7C4,4.3,6.2,2,9,2C8.9,2,9,2,9,2z"></path></svg>
                            <span>Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="tab-pane fade" id="lettings-tab-pane" role="tabpanel" aria-labelledby="lettings-tab" tabindex="0">
            <form data-component="SearchForm" 
                data-prevent-default-submit="false" 
                data-subscribe-submit-to-event="SEARCH_CORE"
                action="{{ $global_options['dynamic_options']['search_results_list']['permalink'] ?? '' }}" 
                class="container-fluid"
            >
                <input data-component="FormItem" type="hidden" name="instruction_type" value="letting">
                <input data-component="FormItem" type="hidden" name="showstc" value="on">

                <div class="row">
                    <div class="col-lg-10 fields-col">
                        <div class="row">
                            <div class="col-12 col-lg-5 ">
                                <label for="address_keyword-lettings" >Location</label>
                                <input data-component="FormItem" type="text" name="address_keyword" id="address_keyword-lettings" class="form-control" placeholder="Town, street and postcode">
                            </div>
                            <div class="col-sm-12 col-lg select-col">
                                <label for="maxprice-lettings" >Maximum Price</label>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 407.437 407.437" style="enable-background:new 0 0 407.437 407.437;" xml:space="preserve"> <polygon points="386.258,91.567 203.718,273.512 21.179,91.567 0,112.815 203.718,315.87 407.437,112.815 "/> </svg>
                                <select data-component="FormItem" name="maxprice" id="maxprice-lettings" class="form-control">
                                    <option value="" selected disabled>Please choose</option>
                                    @include('partials/search-prices', ['lettings' => 'true'])
                                </select>
                            </div>
                            <div class="col-sm-12 col-lg select-col">
                                <label for="bedrooms-lettings" >Minimum Beds</label>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 407.437 407.437" style="enable-background:new 0 0 407.437 407.437;" xml:space="preserve"> <polygon points="386.258,91.567 203.718,273.512 21.179,91.567 0,112.815 203.718,315.87 407.437,112.815 "/> </svg>
                                <select data-component="FormItem" name="min_bedrooms" id="bedrooms-lettings" class="form-control">
                                    <option value="" selected disabled>Please choose</option>
                                    @include('partials/search-bedrooms')
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 p-0">
                        <button type="submit">
                            <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="icon__search"><path d="M1.5,15.9l3.3-3.3C6,13.5,7.5,14,9,14c3.8,0,7-3.1,7-6.9c0,0,0-0.1,0-0.1c0-3.8-3.1-7-6.9-7C9.1,0,9,0,9,0C5.2,0,2,3.1,2,6.9C2,6.9,2,7,2,7c0,1.5,0.5,3,1.4,4.2l-3.3,3.3L1.5,15.9z M9,2c2.7,0,5,2.2,5,4.9c0,0,0,0.1,0,0.1c0,2.7-2.2,5-4.9,5c0,0-0.1,0-0.1,0c-2.7,0-5-2.2-5-4.9C4,7.1,4,7,4,7C4,4.3,6.2,2,9,2C8.9,2,9,2,9,2z"></path></svg>
                            <span>Search</span>
                        </button>
                    </div>
                </div>                
            </form>
        </div>
    </div>
</div>