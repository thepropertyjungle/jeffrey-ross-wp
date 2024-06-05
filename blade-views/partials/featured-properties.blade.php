@if(!empty($properties))
<!-- Swiper -->
<div class="swiper swiper__featured">
    <div class="swiper-wrapper">
        @foreach ($properties as $property)
        <div class="swiper-slide">
            @include('partials/swiper-feature-property')
        </div>
        @endforeach
    </div>
</div>
<div class="swiper-button-next" id="swiperHomeNext">
    <svg enable-background="new 0 0 10 6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" class="icon__arrow"><path d="M4.7,5.9L4.4,5.5l0,0L0.1,1.1l0,0C0,0.9,0,0.7,0.1,0.5l0,0l0.3-0.4l0,0C0.6,0,0.9,0,1.1,0.1l0,0L5,4.2l3.9-4.1l0,0C9.1,0,9.4,0,9.5,0.1l0.3,0.4l0,0c0.2,0.2,0.2,0.4,0,0.6l0,0L5.6,5.5l0,0L5.3,5.9l0,0C5.1,6,4.9,6,4.7,5.9C4.7,5.9,4.7,5.9,4.7,5.9L4.7,5.9z"></path></svg>
</div>
<div class="swiper-button-prev" id="swiperHomePrev">
    <svg enable-background="new 0 0 10 6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" class="icon__arrow"><path d="M4.7,5.9L4.4,5.5l0,0L0.1,1.1l0,0C0,0.9,0,0.7,0.1,0.5l0,0l0.3-0.4l0,0C0.6,0,0.9,0,1.1,0.1l0,0L5,4.2l3.9-4.1l0,0C9.1,0,9.4,0,9.5,0.1l0.3,0.4l0,0c0.2,0.2,0.2,0.4,0,0.6l0,0L5.6,5.5l0,0L5.3,5.9l0,0C5.1,6,4.9,6,4.7,5.9C4.7,5.9,4.7,5.9,4.7,5.9L4.7,5.9z"></path></svg>
</div> 
@else
<p>No properties found SWIPER</p>
@endif