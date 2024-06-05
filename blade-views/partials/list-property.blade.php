@php
    // Does this property have images?
    $imageCount = is_array($property['images'] ?? null) ? count($property['images']) : 0;
@endphp

@php
    $property_sum = $property['summary'];
    $property_sum_stripped = strip_tags($property_sum);
    $property_sum_stripped = str_replace('&nbsp;', ' ', $property_sum_stripped);
    $property_sum_sanitised = substr($property_sum_stripped, 0, 200);
@endphp

<div class="property{{ $property['featured'] ?? false ? ' property__featured' : '' }}  list-property-card">
    <div class="row">
        <div class="col-lg-7">
            <div class="list__grid-image-container">
            @if ($imageCount == 1)
                    {{-- HTML layout for one image --}}
                    <div class="parent">
                        <div class="div1"> 
                        <a href="{{ $property['permalink'] }}">
                            <img intrinsicsize="557 x 375" src="{{ $property['images'][0]['optimised_image_url'] ?? '' }}/557" class="img-fluid property-list-img" alt="{{ $property['Address']['display_address'] ?? '' }}">
                        </a>
                        </div>
                    </div>
                @elseif ($imageCount == 2)
                    {{-- HTML layout for two images --}}
                    <div class="parent">
                        <div class="div1">
                        <a href="{{ $property['permalink'] }}"> 
                            <img intrinsicsize="557 x 375" src="{{ $property['images'][0]['optimised_image_url'] ?? '' }}/557" class="img-fluid property-list-img" alt="{{ $property['Address']['display_address'] ?? '' }}">
                        </a>
                        </div>
                        <div class="div2">
                        <a href="{{ $property['permalink'] }}"> 
                            <img intrinsicsize="274 x 183" src="{{ $property['images'][1]['optimised_image_url'] ?? '' }}/274" class="img-fluid property-list-img-small" alt="{{ $property['Address']['display_address'] ?? '' }}">
                        </a>
                        </div>
                    </div>
                @elseif ($imageCount >= 3)
                    {{-- HTML layout for three images (or more, but only display three) --}}
                    {{-- Ensure that you only display the first three images --}}
                    <div class="parent">
                        <div class="div1"> 
                            <a href="{{ $property['permalink'] }}">
                                <img intrinsicsize="557 x 375" src="{{ $property['images'][0]['optimised_image_url'] ?? '' }}/557" class="img-fluid property-list-img" alt="{{ $property['Address']['display_address'] ?? '' }}">
                            </a>
                        </div>
                        <div class="div2"> 
                            <a href="{{ $property['permalink'] }}">
                                <img intrinsicsize="274 x 183" src="{{ $property['images'][1]['optimised_image_url'] ?? '' }}/274" class="img-fluid property-list-img-small" alt="{{ $property['Address']['display_address'] ?? '' }}">
                            </a>
                            <a href="{{ $property['permalink'] }}">
                                <img intrinsicsize="274 x 183" src="{{ $property['images'][2]['optimised_image_url'] ?? '' }}/274" class="img-fluid property-list-img-small" alt="{{ $property['Address']['display_address'] ?? '' }}">
                            </a>
                        </div>
                    </div>
                @else
                <img src="/wp-content/uploads/2022/06/Screenshot-2023-02-14-at-17.55.37.png" style="object-fit: contain;" alt="Awaiting Images for {{ $property['Address']['display_address'] }}">
                @endif
                
                <div class="features-banner">
                    <div class="feature-icon">
                        <p>
                            <svg enable-background="new 0 0 9 8" viewBox="0 0 9 8" xmlns="http://www.w3.org/2000/svg" class="icon__photo"><path d="M2.3,0.4h-1c-0.1,0-0.2,0.1-0.2,0.2v0.5L1,1.2c-0.1,0-0.1,0-0.2,0.1C0.3,1.3,0,1.7,0,2.2v4.8c0,0.5,0.4,0.9,0.9,0.9h7.1C8.6,7.9,9,7.5,9,6.9V2.2c0-0.5-0.4-0.9-0.9-0.9H7.2L7,0.5C7,0.3,6.8,0.1,6.5,0.1H3.9c-0.2,0-0.4,0.2-0.5,0.4L3.2,1.2l-0.3,0c-0.1,0-0.2,0-0.3-0.1l-0.1,0V0.6C2.5,0.5,2.4,0.4,2.3,0.4z M5.1,2.1c1.3,0,2.4,1.1,2.4,2.4S6.4,6.9,5.1,6.9S2.7,5.8,2.7,4.5S3.8,2.1,5.1,2.1z"></path></svg>
                            {{ count($property['images'] ?? []) }}
                        </p>
                    </div>
                    @if(!empty($property['floor_plans']))
                    <div class="feature-icon">
                        <p>
                            <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__floorplan"><path d="M0,9h2.6V8.1H0.9V6.8h1.8V6H0.9V0.9h3.2v5.8h0.9V0.9h3.2v3.2H6.3v2.7h0.9V4.9h1v3.2H4.2V9H9V0H0L0,9z"></path></svg>
                        </p>
                    </div>
                    @endif
                    @if(!empty($property['virtual_tours']))
                    <div class="feature-icon">
                        <p>
                            <svg enable-background="new 0 0 9 6" viewBox="0 0 9 6" xmlns="http://www.w3.org/2000/svg" class="icon__video"><path d="M8.4,0.5L5.8,2.2V0.7c0-0.3-0.3-0.6-0.6-0.6H0.6C0.3,0.1,0,0.4,0,0.7v4.6c0,0.3,0.3,0.6,0.6,0.6h4.6c0.3,0,0.6-0.3,0.6-0.6V3.8l2.6,1.7C8.6,5.7,9,5.5,9,5.2V0.9C9,0.6,8.7,0.4,8.4,0.5z"></path></svg>
                        </p>
                    </div>
                     @endif
                </div>
                @if ($property['availability'] == 'Available')
                 <!-- EMPTY VALUE -->
                  @else
                <div class="availability">
                    <p>@if ($property['availability'] == 'SSTC') Sold STC @else {{ $property['availability'] }} @endif</p>
                </div>
                @endif 
            </div>
        </div>

        <div class="col-lg-5">
            <div class="property__meta">
                <div class="property__address">
                    {{ $property['Address']['display_address'] ?? '' }}
                </div>                
                <div class="property__price">
                    <span>{{ ($property['price_qualifier'] != 'Default') ? ($property['price_qualifier'] == 'POA' ? 'POA' : $property['price_qualifier']) : 'Asking Price Of' }}</span>
                    £{{ number_format($property['price']) }} {{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'Per Week' : 'PCM') : '' }}
                </div>                       
                <ul class="property__rooms">
            @if (!empty($property['bedrooms']))
            <li>
                <svg enable-background="new 0 0 22 16" viewBox="0 0 22 16" xmlns="http://www.w3.org/2000/svg" class="icon__bed"><path d="M21.1,7.3c-0.1,0-0.2-0.1-0.2-0.2V0.4c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0H1.5C1.3,0,1.1,0.2,1.1,0.4c0,0,0,0,0,0v6.7c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.4C0.2,7.3,0,7.4,0,7.6c0,0,0,0,0,0v5.8c0,0.2,0.2,0.4,0.4,0.4c0,0,0,0,0,0h0.5c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v1.6c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V14c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h18c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v1.6c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V14c0-0.1,0.1-0.2,0.2-0.2l0,0h0.5c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V7.6c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0L21.1,7.3z M1.8,0.9c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h18c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v6.2c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.4c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0h-7.3c-0.2,0-0.4,0.2-0.4,0.4c0,0,0,0,0,0v3.1c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.4c-0.1,0-0.2-0.1-0.2-0.2l0,0V4c0-0.2-0.2-0.4-0.4-0.4H2.9C2.7,3.6,2.6,3.8,2.6,4c0,0,0,0,0,0v3.1c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H2c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0L1.8,0.9z M18.5,4.4c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-6.2c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4.5c0-0.1,0.1-0.2,0.2-0.2l0,0H18.5z M9.7,4.4c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H3.5c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4.5c0-0.1,0.1-0.2,0.2-0.2l0,0H9.7z M21.3,12.9c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0v-1.1c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h20.2c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0V12.9z M21.3,10.7c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V8.2C0.7,8.1,0.8,8,0.9,8c0,0,0,0,0,0h20.2c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0V10.7z"></path></svg>
                {{ $property['bedrooms'] }} </li>
            @endif
            @if (!empty($property['reception_rooms']))
            <li>
                <svg enable-background="new 0 0 22 14" viewBox="0 0 22 14" xmlns="http://www.w3.org/2000/svg" class="icon__reception"><path d="M20.2,4.5h-0.4c-0.3,0-0.6,0.1-0.9,0.3c-0.1,0-0.2,0-0.2-0.1V1.9c0-1-0.8-1.9-1.8-1.9H5.1c-1,0-1.8,0.8-1.8,1.9v2.8c0,0.1-0.1,0.1-0.2,0.1C2.8,4.6,2.5,4.5,2.2,4.5H1.8C0.8,4.5,0,5.4,0,6.4v3.8c0,1,0.8,1.9,1.8,1.9h0.5c0.1,0,0.2,0.1,0.2,0.2l0,0v1.3c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0v-1.3c0-0.1,0.1-0.2,0.2-0.2l0,0h15c0.1,0,0.2,0.1,0.2,0.2l0,0v1.3c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0v-1.3c0-0.1,0.1-0.2,0.2-0.2l0,0h0.5c1,0,1.8-0.8,1.8-1.9V6.4C22,5.4,21.2,4.5,20.2,4.5z M4,1.9c0-0.6,0.5-1.1,1.1-1.1h11.7c0.6,0,1.1,0.5,1.1,1.1v5.3c0,0.2-0.2,0.4-0.4,0.4c0,0,0,0,0,0H4.4C4.2,7.6,4,7.4,4,7.2c0,0,0,0,0,0L4,1.9z M21.3,10.2c0,0.6-0.5,1.1-1.1,1.1H1.8c-0.6,0-1.1-0.5-1.1-1.1V6.4c0-0.6,0.5-1.1,1.1-1.1h0.4c0.6,0,1.1,0.5,1.1,1.1v0.8c0,0.6,0.5,1.1,1.1,1.1h13.2c0.6,0,1.1-0.5,1.1-1.1V6.4c0-0.6,0.5-1.1,1.1-1.1h0.4c0.6,0,1.1,0.5,1.1,1.1L21.3,10.2z"></path></svg>
                {{ $property['reception_rooms'] }}</li>
            @endif            
            @if (!empty($property['bathrooms']))
            <li>
                <svg enable-background="new 0 0 21 21" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" class="icon__bath"><path d="M2.3,11.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V2.6c0-0.9,0.7-1.6,1.6-1.6c0.1,0,0.1,0,0.2,0C4,1.1,4,1.2,4,1.2c0,0,0,0,0,0.1C3.7,1.7,3.5,2.1,3.5,2.6c0,0.7,0.2,1.3,0.7,1.8c0.1,0.1,0.4,0.1,0.5,0l3.1-3.1c0.1-0.1,0.1-0.4,0-0.5c0,0,0,0,0,0C7.4,0.3,6.8,0,6.2,0c-0.5,0-1,0.2-1.4,0.5c-0.1,0.1-0.2,0.1-0.3,0C4.2,0.4,3.9,0.4,3.7,0.4c-1.2,0-2.2,0.9-2.3,2.1c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0v9.3c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.3c-0.2,0-0.3,0.2-0.3,0.4c0,0.2,0.2,0.3,0.3,0.3h0.9c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.6c0,1.4,0.7,2.6,1.9,3.3c0.1,0.1,0.2,0.2,0.2,0.3v1.6c0,0.2,0.1,0.4,0.3,0.4c0.2,0,0.4-0.1,0.4-0.3c0,0,0,0,0,0v-1.4c0-0.1,0.1-0.1,0.2-0.1c0,0,0,0,0,0c0.3,0.1,0.6,0.1,0.9,0.1h10.5c0.3,0,0.6,0,0.9-0.1c0.1,0,0.2,0,0.2,0.1c0,0,0,0,0,0v1.4c0,0.2,0.2,0.3,0.4,0.3s0.4-0.2,0.4-0.3l0,0V19c0-0.1,0.1-0.2,0.2-0.3c1.2-0.7,1.9-2,1.9-3.3v-2.6c0-0.1,0.1-0.2,0.2-0.2h0.9c0.2,0,0.3-0.2,0.3-0.4c0-0.2-0.2-0.3-0.3-0.3L2.3,11.9z M4.8,1.3C5.2,1,5.7,0.7,6.2,0.7c0.2,0,0.5,0.1,0.7,0.2C7,0.9,7,1,6.9,1.1c0,0,0,0,0,0L4.6,3.4c-0.1,0.1-0.1,0-0.2,0c0,0,0,0,0,0C4.2,3.1,4.2,2.9,4.2,2.6C4.2,2.1,4.5,1.7,4.8,1.3z M18.9,15.4c0,1.7-1.4,3.1-3.2,3.1H5.2c-1.7,0-3.1-1.4-3.2-3.1v-2.6c0-0.1,0.1-0.2,0.2-0.2h16.5c0.1,0,0.2,0.1,0.2,0.2L18.9,15.4z"></path></svg>
                {{ $property['bathrooms'] }} </li>
            @endif
                </ul>                        
                <p class="property__summary">{!! $property_sum_sanitised . '...' ?? '' !!}</p>           
                <div class="list-card-btns">    
                <a href="{{ $property['permalink'] }}" class="list-details-btn">
                    <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__plus"><path d="M5.2,9H3.8V0h1.5V9z"></path><path d="M9,5.3H0V3.8h9V5.3z"></path></svg>
                    More Details
                </a>
                <div data-component="ShortlistButtons" data-property-id="{{ $property['ID'] }}" class="shortlist__btns">
                    <i class="tpj_add_to_shortlist">
                        <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__star"><path d="M4.7,0.1L5.9,3l2.9,0.3C8.9,3.3,9,3.4,9,3.5c0,0.1,0,0.1-0.1,0.1L6.8,5.9l0.5,2.9C7.4,8.8,7.3,9,7.2,9c0,0-0.1,0-0.1,0L4.5,7.6L2,9C1.8,9,1.7,9,1.7,8.9c0,0,0-0.1,0-0.1l0.5-2.8L0.1,3.7C0,3.6,0,3.4,0.1,3.3c0,0,0.1-0.1,0.1-0.1L3.1,3l1.2-2.9C4.3,0,4.5,0,4.6,0C4.6,0,4.7,0.1,4.7,0.1z"></path></svg>
                        Save to shortlist
                    </i>
                    <i class="tpj_remove_from_shortlist">
                        <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__star"><path d="M4.7,0.1L5.9,3l2.9,0.3C8.9,3.3,9,3.4,9,3.5c0,0.1,0,0.1-0.1,0.1L6.8,5.9l0.5,2.9C7.4,8.8,7.3,9,7.2,9c0,0-0.1,0-0.1,0L4.5,7.6L2,9C1.8,9,1.7,9,1.7,8.9c0,0,0-0.1,0-0.1l0.5-2.8L0.1,3.7C0,3.6,0,3.4,0.1,3.3c0,0,0.1-0.1,0.1-0.1L3.1,3l1.2-2.9C4.3,0,4.5,0,4.6,0C4.6,0,4.7,0.1,4.7,0.1z"></path></svg>
                        Remove from shortlist
                    </i>
                </div>
                </div>
            </div>            
        </div>
    </div>
</div>