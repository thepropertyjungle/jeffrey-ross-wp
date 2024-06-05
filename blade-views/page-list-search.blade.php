<div class="container-fluid">
    <div class="row p-0">
        <div class="col p-0">
            <div class="search-hero">
                <h2 class="search-hero__heading">Property Search</h2>
                <p class="total-posts__count m-0">We've found <b>{{ $total_posts }}</b> properties @if(($_GET['instruction_type'] ?? '') === 'sale') for Sale @elseif(($_GET['instruction_type'] ?? '') === 'letting') for Rent @endif</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            @include('partials/search-advanced')
        </div>
    </div>
    <div class="row sort-options my-4 py-3 d-flex align-items-center">
    <div class="col-sm-12 col-md-3  pb-5 pb-md-0">
            <label for="orderby" class="sr-only">Highest or Lowest Price</label>
            <span class="styled-select">
                <select
                    data-component="FormItem"
                    
                    @if (($_GET['instruction_type'] ?? '') === 'sale')

                    data-form-url="{{ $global_options['dynamic_options']['search_results_grid']['permalink'] ?? '' }}"
                    data-onvaluechange-trigger-events='["ORDER_BY_CHANGE_EVENT", "SALE_FORM_SUBMIT_EVENT"]'

                    @elseif (($_GET['instruction_type'] ?? '') === 'letting')
                    
                    data-form-url="{{ $global_options['dynamic_options']['search_results_grid']['permalink'] ?? '' }}"
                    data-onvaluechange-trigger-events='["ORDER_BY_CHANGE_EVENT", "LETTING_FORM_SUBMIT_EVENT"]'
                    
                    @endif

                    name="orderby"
                    id="orderby"
                >
                    <option value="" selected disabled>Order by price:</option>
                    <option value="price_desc">Highest Price</option>
                    <option value="price_asc">Lowest Price</option>
                </select>
            </span>            
        </div>
        <div class="col-12 col-md">
            <div class="px-5 px-md-0 d-flex align-items-center justify-content-between justify-content-md-end">
                <a href="{{ $global_options['dynamic_options']['search_results_list']['permalink'] ?? '' }}@php _e_blade_query_string() @endphp" class="view-btn active">
                    <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><path d="M9,2H0V0h9V2z"></path><path d="M9,9H0V7h9V9z"></path><path d="M9,5.5H0v-2h9V5.5z"></path></svg>
                    <span class="d-none d-sm-inline">List<span class="d-none d-lg-inline"> View</span></span>
                </a>
                <span class="line-divide"></span>
                <a href="{{ $global_options['dynamic_options']['search_results_grid']['permalink'] ?? '' }}@php _e_blade_query_string() @endphp" class="view-btn">
                    <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><path d="M2,2H0V0h2V2z"></path><path d="M9,2H7V0h2V2z"></path><path d="M5.5,2h-2V0h2V2z"></path><path d="M2,9H0V7h2V9z"></path><path d="M9,9H7V7h2V9z"></path><path d="M5.5,9h-2V7h2V9z"></path><path d="M2,5.5H0v-2h2V5.5z"></path><path d="M9,5.5H7v-2h2V5.5z"></path><path d="M5.5,5.5h-2v-2h2V5.5z"></path></svg>
                    <span class="d-none d-sm-inline">Grid<span class="d-none d-lg-inline"> View</span></span>
                </a>
                <span class="line-divide"></span>
                <a href="{{ $global_options['dynamic_options']['search_results_map']['permalink'] ?? '' }}@php _e_blade_query_string() @endphp" class="view-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.2" overflow="visible" preserveAspectRatio="none" viewBox="0 0 33 38.900001525878906" xml:space="preserve" y="0px" x="0px"><g transform="translate(1, 1)"><g><g><path d="M15.4,21.5c3.4,0,6.2-2.7,6.2-6.1c0,0,0,0,0,0c0-3.4-2.7-6.3-6.2-6.4c-3.4,0-6.2,2.7-6.2,6.1 c0,0,0,0,0,0C9.3,18.5,12,21.3,15.4,21.5z M5,4.8c5.7-5.7,15-5.6,20.7,0.1c5.6,5.7,5.6,14.9,0,20.5L15.4,35.8L5,25.4 C-0.5,19.7-0.5,10.6,5,4.8z" vector-effect="non-scaling-stroke"/></g></g></g></svg>
                    <span class="d-none d-sm-inline">Map<span class="d-none d-lg-inline"> View</span></span>
                </a>
                <span class="line-divide"></span>
                <a href="/saved-properties/" class="view-btn">
                    <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><path d="M4.7,0.1L5.9,3l2.9,0.3C8.9,3.3,9,3.4,9,3.5c0,0.1,0,0.1-0.1,0.1L6.8,5.9l0.5,2.9C7.4,8.8,7.3,9,7.2,9c0,0-0.1,0-0.1,0L4.5,7.6L2,9C1.8,9,1.7,9,1.7,8.9c0,0,0-0.1,0-0.1l0.5-2.8L0.1,3.7C0,3.6,0,3.4,0.1,3.3c0,0,0.1-0.1,0.1-0.1L3.1,3l1.2-2.9C4.3,0,4.5,0,4.6,0C4.6,0,4.7,0.1,4.7,0.1z"></path></svg>
                    <span class="d-none d-sm-inline">Shortlist</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @if(count($properties) > 0)
                @foreach ($properties as $property)
                @if($loop->iteration % 6 == 0)
                {{-- Valuation Elementor Block --}}
                <div class="callout-different">
                    <div class="callout__inner">
                        <div class="callout__content">
                            <div class="callout__icon">
                                <svg enable-background="new 0 0 53 53" viewBox="0 0 53 53" xmlns="http://www.w3.org/2000/svg" class="icon__house-smile"><path d="M42.7,52.9H10.3c-2.2,0-4-1.8-4-4V28.5h2v20.3c0,1.1,0.9,2,2,2h32.5c1.1,0,2-0.9,2-2V28.5h2v20.3C46.8,51.1,45,52.9,42.7,52.9z"></path><path d="M47.8,31.6c-0.3,0-0.5-0.1-0.7-0.3L26.5,10.7L5.9,31.3c-0.4,0.4-1,0.4-1.4,0l-4.1-4.1c-0.2-0.2-0.3-0.4-0.3-0.7s0.1-0.5,0.3-0.7L25.8,0.4c0.4-0.4,1-0.4,1.4,0l9.5,9.5V5.2c0-0.6,0.4-1,1-1h6.1c0.6,0,1,0.4,1,1V18l7.8,7.8c0.2,0.2,0.3,0.4,0.3,0.7s-0.1,0.5-0.3,0.7l-4.1,4.1C48.3,31.5,48.1,31.6,47.8,31.6z M2.5,26.5l2.6,2.6L25.8,8.5c0.4-0.4,1-0.4,1.4,0l20.6,20.6l2.6-2.6l-7.4-7.4c-0.2-0.2-0.3-0.4-0.3-0.7V6.2h-4.1v6.1c0,0.4-0.2,0.8-0.6,0.9c-0.4,0.2-0.8,0.1-1.1-0.2L26.5,2.5L2.5,26.5z"></path><path d="M26.5,44.8c-3.9,0-7.8-1.4-10.8-4.3c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0C22.3,44,30.7,44,36,39c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4C34.3,43.3,30.4,44.8,26.5,44.8z"></path><path d="M19.4,32.6c-0.6,0-1-0.4-1-1v-4.1c0-0.6,0.4-1,1-1s1,0.4,1,1v4.1C20.4,32.1,19.9,32.6,19.4,32.6z"></path><path d="M33.6,32.6c-0.6,0-1-0.4-1-1v-4.1c0-0.6,0.4-1,1-1s1,0.4,1,1v4.1C34.6,32.1,34.2,32.6,33.6,32.6z"></path></svg>
                            </div>
                            <div class="callout__entry">
                                <div class="callout__entry-inner">
                                    <h4 class="callout__title">Market your property with <?php bloginfo( 'name' ); ?></h4>
                                    <p>Book a market appraisal for your property today. Our virtual options are still available if you prefer.</p>
                                </div>
                                <div class="callout__actions">
                                    <a href="/request-a-valuation/">
                                        <span>Book Now</span>
                                        <svg enable-background="new 0 0 10 6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" class="icon__arrow"><path d="M4.7,5.9L4.4,5.5l0,0L0.1,1.1l0,0C0,0.9,0,0.7,0.1,0.5l0,0l0.3-0.4l0,0C0.6,0,0.9,0,1.1,0.1l0,0L5,4.2l3.9-4.1l0,0C9.1,0,9.4,0,9.5,0.1l0.3,0.4l0,0c0.2,0.2,0.2,0.4,0,0.6l0,0L5.6,5.5l0,0L5.3,5.9l0,0C5.1,6,4.9,6,4.7,5.9C4.7,5.9,4.7,5.9,4.7,5.9L4.7,5.9z"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                    {{-- Include property list partial --}}
                    @include('partials/list-property')
                @endforeach
                <div class="row pb-5">
                    <div class="col d-flex justify-content-center pb-5">
                        {{-- Include pagination partial --}}
                        @include('partials/pagination')
                    </div>
                </div>
            @else
                <p>No properties found within that search criteria.</p>
            @endif
        </div>
    </div>
</div>

@include('debug/debug')