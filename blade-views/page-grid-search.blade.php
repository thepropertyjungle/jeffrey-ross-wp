<div class="container-fluid">
    <div class="row p-0">
        <div class="col p-0">
            <div class="search-hero">
            @include('partials/search-advanced')
            </div>
        </div>
    </div>
</div>
<div class="container">
    
    <div class="row sort-options my-4 py-5 text-center d-flex align-items-center">
        
    <div class="col p-0">
            <div class="search">
                <h2 class="search-hero__heading">Properties for sale</h2>
                <p class="total-posts__count m-0"> {{ $total_posts }} matching results @if(($_GET['instruction_type'] ?? '') === 'sale') for Sale @elseif(($_GET['instruction_type'] ?? '') === 'letting') for Rent @endif</p>
            </div>
        </div>
    
    <div class="col-sm-12 col-md-12 d-flex justify-content-end pb-5 pb-md-0">
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
        
    </div>
    @if(count($properties) > 0)
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4">
        @foreach ($properties as $property)
       
        <div class="col">
                @include('partials/swiper-feature-property')
            </div>
        @endforeach
    </div>
    <div class="row pb-5">
        <div class="col d-flex justify-content-center pb-5">
            @include('partials/pagination')
        </div>
    </div>
    @else
    <div class="row">
        <div class="col">
            <p>No properties found within that search criteria.</p>
        </div>
    </div>
    @endif
</div>

@include('debug/debug')