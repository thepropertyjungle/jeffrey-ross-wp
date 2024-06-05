@php
    $instructionType = sanitize_text_field(wp_unslash($_GET['instruction_type'] ?? ''));
    $pageName = basename(get_permalink());
@endphp

<div class="container">   
    @if(count($properties) > 0)
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($properties as $property)
        @if($loop->iteration % 4 == 0)
        {{-- Valuation Elementor Block --}}
        <div class="callout-grid">
        <div class="callout-grid__icon">
            <svg enable-background="new 0 0 53 53" viewBox="0 0 53 53" xmlns="http://www.w3.org/2000/svg" class="icon__house-smile"><path d="M42.7,52.9H10.3c-2.2,0-4-1.8-4-4V28.5h2v20.3c0,1.1,0.9,2,2,2h32.5c1.1,0,2-0.9,2-2V28.5h2v20.3C46.8,51.1,45,52.9,42.7,52.9z"></path><path d="M47.8,31.6c-0.3,0-0.5-0.1-0.7-0.3L26.5,10.7L5.9,31.3c-0.4,0.4-1,0.4-1.4,0l-4.1-4.1c-0.2-0.2-0.3-0.4-0.3-0.7s0.1-0.5,0.3-0.7L25.8,0.4c0.4-0.4,1-0.4,1.4,0l9.5,9.5V5.2c0-0.6,0.4-1,1-1h6.1c0.6,0,1,0.4,1,1V18l7.8,7.8c0.2,0.2,0.3,0.4,0.3,0.7s-0.1,0.5-0.3,0.7l-4.1,4.1C48.3,31.5,48.1,31.6,47.8,31.6z M2.5,26.5l2.6,2.6L25.8,8.5c0.4-0.4,1-0.4,1.4,0l20.6,20.6l2.6-2.6l-7.4-7.4c-0.2-0.2-0.3-0.4-0.3-0.7V6.2h-4.1v6.1c0,0.4-0.2,0.8-0.6,0.9c-0.4,0.2-0.8,0.1-1.1-0.2L26.5,2.5L2.5,26.5z"></path><path d="M26.5,44.8c-3.9,0-7.8-1.4-10.8-4.3c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0C22.3,44,30.7,44,36,39c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4C34.3,43.3,30.4,44.8,26.5,44.8z"></path><path d="M19.4,32.6c-0.6,0-1-0.4-1-1v-4.1c0-0.6,0.4-1,1-1s1,0.4,1,1v4.1C20.4,32.1,19.9,32.6,19.4,32.6z"></path><path d="M33.6,32.6c-0.6,0-1-0.4-1-1v-4.1c0-0.6,0.4-1,1-1s1,0.4,1,1v4.1C34.6,32.1,34.2,32.6,33.6,32.6z"></path></svg>
        </div>
        <div class="callout-grid__entry">
            <div class="callout-grid__entry-inner">
                <h4 class="callout-grid__title">Market your property with <?php bloginfo( 'name' ); ?></h4>
                <p>Book a market appraisal for your property today. Our virtual options are still available if you prefer.</p>
            </div>
            <div class="callout-grid__actions">
                <a href="/request-a-valuation/">
                    <span>Book Now</span>
                    <svg enable-background="new 0 0 10 6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" class="icon__arrow"><path d="M4.7,5.9L4.4,5.5l0,0L0.1,1.1l0,0C0,0.9,0,0.7,0.1,0.5l0,0l0.3-0.4l0,0C0.6,0,0.9,0,1.1,0.1l0,0L5,4.2l3.9-4.1l0,0C9.1,0,9.4,0,9.5,0.1l0.3,0.4l0,0c0.2,0.2,0.2,0.4,0,0.6l0,0L5.6,5.5l0,0L5.3,5.9l0,0C5.1,6,4.9,6,4.7,5.9C4.7,5.9,4.7,5.9,4.7,5.9L4.7,5.9z"></path></svg>
                </a>
            </div>
        </div>
    </div>
    @endif
        <div class="col">
                @include('partials/grid-property')
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
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