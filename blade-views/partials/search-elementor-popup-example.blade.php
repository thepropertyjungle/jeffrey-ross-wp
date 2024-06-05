<section class="modal-search">
        <div class="row">
            <div class="col">
            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="nav-sale-tab" data-bs-toggle="tab" data-bs-target="#pills-sale" type="button" role="tab" aria-controls="pills-sale" aria-selected="true">For Sale</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="nav-let-tab" data-bs-toggle="tab" data-bs-target="#pills-let" type="button" role="tab" aria-controls="pills-sale" aria-selected="false">To Let</button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="/search-map/" >
                        <svg enable-background="new 0 0 14 14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" class="icon__draw-search"><path d="M10.5,2.8C8.6,2.8,7,4.4,7,6.2c0,1.7,2.9,6.5,3.2,6.9c0.1,0.1,0.2,0.2,0.3,0.2s0.2-0.1,0.3-0.2c0.3-0.5,3.2-5.3,3.2-6.9C14,4.4,12.5,2.8,10.5,2.8z M10.5,12.3c-1-1.7-2.8-4.9-2.8-6.1c0-1.5,1.2-2.7,2.8-2.7s2.8,1.2,2.8,2.7C13.3,7.4,11.5,10.6,10.5,12.3z"></path><path d="M10.5,4.6c-0.9,0-1.7,0.7-1.7,1.7C8.8,7.2,9.5,8,10.5,8c0.9,0,1.8-0.7,1.8-1.7C12.2,5.3,11.4,4.6,10.5,4.6z M10.5,7.2c-0.5,0-0.9-0.4-0.9-0.9s0.4-0.9,0.9-0.9s0.9,0.4,0.9,0.9C11.5,6.8,11,7.2,10.5,7.2z"></path><path d="M9.2,12.6H2.5c-0.9,0-1.7-0.8-1.7-1.7v-0.2C0.7,9.8,1.5,9,2.5,9h1.9c0.8,0,1.5-0.7,1.5-1.5V7.2c0-0.8-0.7-1.5-1.5-1.5H3.5C3.4,5.8,3.3,6.1,3.1,6.4h1.2c0.4,0,0.8,0.4,0.8,0.8v0.4c0,0.4-0.4,0.8-0.8,0.8H2.5C1.1,8.4,0,9.5,0,10.8V11c0,1.3,1.1,2.4,2.5,2.4h7.1l0,0C9.5,13.2,9.4,13,9.2,12.6z"></path><path d="M2.2,6.4c0.1,0,0.2-0.1,0.3-0.2c0.2-0.3,1.8-2.9,1.8-3.9c0-1.1-0.9-2-2.1-2s-2.1,0.9-2.1,2c0,1,1.6,3.6,1.8,3.9C2,6.3,2.1,6.4,2.2,6.4z M2.2,0.9c0.7,0,1.3,0.6,1.3,1.3c0,0.5-0.7,2-1.3,3c-0.6-1-1.3-2.5-1.3-3C0.8,1.5,1.4,0.9,2.2,0.9z"></path><path d="M2.7,1.9C2.6,1.7,2.3,1.5,2,1.6C1.8,1.7,1.5,2,1.6,2.3c0.1,0.3,0.4,0.4,0.7,0.3C2.7,2.5,2.8,2.2,2.7,1.9z"></path></svg>
                        Draw Search
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-sale" role="tabpanel" aria-labelledby="pills-sale-tab">
                    <form data-component="SearchForm" 
                    data-prevent-default-submit="false"         
                    data-subscribe-submit-to-event="SEARCH_CORE"
                    action="{{ $global_options['dynamic_options']['search_results_list'] }}" 
                    class="container-fluid">
                    <input data-component="FormItem" type="hidden" name="instruction_type" value="sale">
                    <div class="row">
                        <div class="col">
                            @include('components/google-places-elementor-popup', ['parent_form_id' => 'elementor-popup-form'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="sales-prices">
                                <label for="minprice-sales">Minimum Price</label>
                                <select
                                data-component="FormItem"
                                data-ison-elementor-popup="true"
                                name="minprice"
                                id="minprice-sales"
                                class="form-control"
                                >
                                <option value="" selected disabled>Minimum Price</option>
                                @include('partials/search-prices', ['sales' => 'true'])
                            </select>
                        </div>
                        </div>
                        <div class="col">
                            <div class="sales-prices">
                                <label for="maxprice-sales">Maximum Price</label>
                                <select
                                data-component="FormItem"
                                data-ison-elementor-popup="true"
                                name="maxprice"
                                id="maxprice-sales"
                                class="form-control"
                                >
                                <option value="" selected disabled>Maximum Price</option>
                                @include('partials/search-prices', ['sales' => 'true'])
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col select-bed">
                            <label for="bedrooms">Minimum Bedrooms</label>
                            <select
                            data-component="FormItem"
                            data-ison-elementor-popup="true"
                            name="min_bedrooms"
                            id="bedrooms"
                            class="form-control"
                            >
                            <option value="" selected disabled>Minimum Bedrooms</option>
                            @include('partials/search-bedrooms')
                        </select>
                        </div>
                        <div class="col select-type">
                            <label for="property-type-sales">Property Type</label>
                            <select
                            data-component="FormItem"
                            data-ison-elementor-popup="true"
                            name="property_type"
                            class="form-control"
                            >
                            <option value="" selected disabled>Property Type</option>
                            @include('partials/search-property-types')
                        </select>
                       </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center my-4">
                        <p class="stc-label">Show STC</p>
                        <div class="on-off-toggle">
                            <input 
                                class="on-off-toggle__input" 
                                autocomplete="off"
                                data-component="FormItem"
                                data-ison-elementor-popup="true"
                                type="checkbox"
                                name="showstc"
                                id="showstc"
                                value="on"
                            >
                            <label for="showstc" class="on-off-toggle__slider"></label>
                        </div>                                               
                            <!-- <div class="formcheck">
                                <label for="featured" class="form-check-label">
                                <span class="sales-prices">Show STC?</span>
                                </label>                                
                                <input
                                data-component="FormItem"
                                data-ison-elementor-popup="true"
                                type="checkbox"
                                name="showstc"
                                id="showstc"
                                class="form-check-input"
                                value="on"
                                >
                            </div> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <input type="submit" class="btn btn-modal" value="Search">
                        </div>
                    </div>
                </form>
                </div>

                <div class="tab-pane fade" id="pills-let" role="tabpanel" aria-labelledby="pills-let-tab">
                    <form data-component="SearchForm" 
                    data-prevent-default-submit="false"         
                    data-subscribe-submit-to-event="SEARCH_CORE"
                    action="{{ $global_options['dynamic_options']['search_results_list'] }}" 
                    class="container-fluid">
                    <input data-component="FormItem" type="hidden" name="instruction_type" value="letting">
                    <div class="row">
                        <div class="col">
                            @include('components/google-places-elementor-popup', ['parent_form_id' => 'elementor-popup-form'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <div class="lettings-prices">
                            <label for="minprice-lettings">Minimum Price</label>
                            <select
                            data-component="FormItem"
                            data-ison-elementor-popup="true"
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
                        <div class="lettings-prices">
                            <label for="maxprice-lettings">Maximum Price</label>
                            <select
                            data-component="FormItem"
                            data-ison-elementor-popup="true"
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

                    <div class="row">
                        <div class="col select-bed">
                            <label for="bedrooms">Minimum Bedrooms</label>
                            <select
                            data-component="FormItem"
                            data-ison-elementor-popup="true"
                            name="min_bedrooms"
                            id="bedrooms"
                            class="form-control"
                            >
                            <option value="" selected disabled>Minimum Bedrooms</option>
                            @include('partials/search-bedrooms')
                        </select>
                        </div>
                        <div class="col select-type">
                            <label for="property-type-sales">Property Type</label>
                            <select
                            data-component="FormItem"
                            data-ison-elementor-popup="true"
                            name="property_type"
                            class="form-control"
                            >
                            <option value="" selected disabled>Property Type</option>
                            @include('partials/search-property-types')
                        </select>
                       </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center my-4">
                        <p class="stc-label">Show Let Agreed</p>
                        <div class="on-off-toggle">
                            <input 
                                class="on-off-toggle__input" 
                                autocomplete="off"
                                data-component="FormItem"
                                data-ison-elementor-popup="true"
                                type="checkbox"
                                name="letagreed"
                                id="letagreed"
                                value="on"
                            >
                            <label for="letagreed" class="on-off-toggle__slider"></label>
                        </div>                                               
                            <!-- <div class="formcheck">
                                <label for="featured" class="form-check-label">
                                <span class="sales-prices">Show STC?</span>
                                </label>                                
                                <input
                                data-component="FormItem"
                                data-ison-elementor-popup="true"
                                type="checkbox"
                                name="showstc"
                                id="showstc"
                                class="form-check-input"
                                value="on"
                                >
                            </div> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <input type="submit" class="btn btn-modal" value="Search">
                        </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </form>
</section>


