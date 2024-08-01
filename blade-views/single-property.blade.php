@php
    // Set variables from property data for LeadPro form
    // Variables used in book viewing href
    $office_id = $property['branch']['meta']['office_id'] ?? '';
    $advert_address = $property['Address']['display_address'] ?? '';
    // Fetch the summary from the property array with a fallback to an empty string if not set
    $advert_summary = $property['summary'] ?? '';
    // Strip HTML tags from the summary
    $advert_summary = strip_tags($advert_summary);
    // Truncate the summary to 100 characters, handling multibyte characters properly
    $advert_summary = mb_substr($advert_summary, 0, 100, "UTF-8");
    $advert_image = $property['images'][0]['media_url'] ?? '';
    $advert_postcode = $property['Address']['postcode'] ?? '';
    $advert_url = $property['permalink'] ?? '';
@endphp

<div class="brand-primary-background">
    <div class="container">
        <div class="row align-items-end pb-5">
            <div class="col-sm-12 col-lg-5">
                <div class="property__meta">
                    <div class="property-type">
                        <h1>{{ $property['bedrooms'] }} Bed {{ $property['property_type'] }} For @if ($property['instruction_type'] == 'Letting') Rent @else Sale @endif</h1> 
                    </div> 
                    <div class="property__address">
                        {{ $property['Address']['display_address'] ?? '' }}
                    </div>                                  
                    <div class="property-price-rooms-group">
                        <div class="property__price">
                            <span>{{ ($property['price_qualifier'] != 'Default') ? ($property['price_qualifier'] == 'POA' ? 'POA' : $property['price_qualifier']) : '' }}</span>
                            £{{ number_format($property['price']) }} {{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'PW' : 'PCM') : '' }}
                        </div>                                            
                    </div>                             
                </div> 
            </div>
            <div class="col-sm-12 col-lg-7">
                <div class="share-container">
                    <a href="/saved-properties/" class="shortlist-btn">
                        <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__star"><path d="M4.7,0.1L5.9,3l2.9,0.3C8.9,3.3,9,3.4,9,3.5c0,0.1,0,0.1-0.1,0.1L6.8,5.9l0.5,2.9C7.4,8.8,7.3,9,7.2,9c0,0-0.1,0-0.1,0L4.5,7.6L2,9C1.8,9,1.7,9,1.7,8.9c0,0,0-0.1,0-0.1l0.5-2.8L0.1,3.7C0,3.6,0,3.4,0.1,3.3c0,0,0.1-0.1,0.1-0.1L3.1,3l1.2-2.9C4.3,0,4.5,0,4.6,0C4.6,0,4.7,0.1,4.7,0.1z"></path></svg> VIEW SHORTLIST
                    </a>
                    <div class="d-flex align-items-center"><p class="me-3">Share:</p><div class="sharethis-inline-share-buttons"></div>
                    </div>
                </div>              
            </div>
        </div>
    </div>
</div>
<div class="property-grey-bg">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="propertySwiper__wrapper">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            @if(is_array($property['images'] ?? false))
                            @foreach ($property['images'] as $property_image)
                            <div class="swiper-slide">
                            @if ($property['availability'] != 'Available')
                                <div class="availability">
                                    <p>{{ $property['availability'] == 'SSTC' ? 'Sold STC' : $property['availability'] }}</p>
                                </div>
                            @endif
                                <img src="{{ $property_image['optimised_image_url'] ?? '' }}/1296" alt="{{ $property['Address']['display_address'] ?? '' }}">
                            </div>            
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="swiper-button-next" id="swiperNext">
                        <svg enable-background="new 0 0 10 6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" class="icon__arrow"><path d="M4.7,5.9L4.4,5.5l0,0L0.1,1.1l0,0C0,0.9,0,0.7,0.1,0.5l0,0l0.3-0.4l0,0C0.6,0,0.9,0,1.1,0.1l0,0L5,4.2l3.9-4.1l0,0C9.1,0,9.4,0,9.5,0.1l0.3,0.4l0,0c0.2,0.2,0.2,0.4,0,0.6l0,0L5.6,5.5l0,0L5.3,5.9l0,0C5.1,6,4.9,6,4.7,5.9C4.7,5.9,4.7,5.9,4.7,5.9L4.7,5.9z"></path></svg>
                    </div>
                    <div class="swiper-button-prev" id="swiperPrev">
                        <svg enable-background="new 0 0 10 6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" class="icon__arrow"><path d="M4.7,5.9L4.4,5.5l0,0L0.1,1.1l0,0C0,0.9,0,0.7,0.1,0.5l0,0l0.3-0.4l0,0C0.6,0,0.9,0,1.1,0.1l0,0L5,4.2l3.9-4.1l0,0C9.1,0,9.4,0,9.5,0.1l0.3,0.4l0,0c0.2,0.2,0.2,0.4,0,0.6l0,0L5.6,5.5l0,0L5.3,5.9l0,0C5.1,6,4.9,6,4.7,5.9C4.7,5.9,4.7,5.9,4.7,5.9L4.7,5.9z"></path></svg>
                    </div>
                    @if(is_array($property['virtual_tours'] ?? null) && count($property['virtual_tours']) > 0)
                        @foreach ($property['virtual_tours'] as $index => $property_virtualtour)
                        <div class="property__medias">
                            <a href="{{ $property_virtualtour['media_url'] ?? '' }}" rel="noopener noreferrer" target="_blank" class="btn-video-modal">
                                <svg enable-background="new 0 0 16 10" viewBox="0 0 16 10" xmlns="http://www.w3.org/2000/svg" class="icon__camera"><path d="M15.728.393V9.568a.282.282,0,0,1-.262.262h-.131c-.131,0-.131,0-.262-.131L11.8,6.422v2.49c0,.262-.131.393-.262.655a1.405,1.405,0,0,1-.786.262h-9.7a1,1,0,0,1-.655-.262C.131,9.306,0,9.175,0,8.913V1.049A1,1,0,0,1,.262.393.934.934,0,0,1,1.049,0h9.83a1,1,0,0,1,.655.262,1.863,1.863,0,0,1,.262.786v2.49L15.2.131C15.2,0,15.335,0,15.466,0,15.6.131,15.728.131,15.728.393Z"></path></svg> Virtual Tour{{ count($property['virtual_tours']) > 1 ? ' ('.($index + 1).')' : '' }}
                            </a>
                        </div>
                        @endforeach
                    @endif
                </div> 
                <div class="thumbnailsSwiper__wrapper">
                    <div thumbsSlider="swiper" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @if(is_array($property['images'] ?? false))
                                @foreach ($property['images'] as $property_image)
                                <div class="swiper-slide">
                                    <img src="{{ $property_image['optimised_image_url'] ?? '' }}/251" alt="{{ $property['Address']['display_address'] ?? '' }}">
                                </div>            
                                @endforeach
                            @endif
                        </div>
                    </div>    
                    <div class="swiper-button-next" id="swiperThumbsNext">
                        <svg enable-background="new 0 0 10 6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" class="icon__arrow"><path d="M4.7,5.9L4.4,5.5l0,0L0.1,1.1l0,0C0,0.9,0,0.7,0.1,0.5l0,0l0.3-0.4l0,0C0.6,0,0.9,0,1.1,0.1l0,0L5,4.2l3.9-4.1l0,0C9.1,0,9.4,0,9.5,0.1l0.3,0.4l0,0c0.2,0.2,0.2,0.4,0,0.6l0,0L5.6,5.5l0,0L5.3,5.9l0,0C5.1,6,4.9,6,4.7,5.9C4.7,5.9,4.7,5.9,4.7,5.9L4.7,5.9z"></path></svg>
                    </div>
                    <div class="swiper-button-prev" id="swiperThumbsPrev">
                        <svg enable-background="new 0 0 10 6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" class="icon__arrow"><path d="M4.7,5.9L4.4,5.5l0,0L0.1,1.1l0,0C0,0.9,0,0.7,0.1,0.5l0,0l0.3-0.4l0,0C0.6,0,0.9,0,1.1,0.1l0,0L5,4.2l3.9-4.1l0,0C9.1,0,9.4,0,9.5,0.1l0.3,0.4l0,0c0.2,0.2,0.2,0.4,0,0.6l0,0L5.6,5.5l0,0L5.3,5.9l0,0C5.1,6,4.9,6,4.7,5.9C4.7,5.9,4.7,5.9,4.7,5.9L4.7,5.9z"></path></svg>
                    </div>                     
                </div> 
            </div>
            <nav class="property-tabs">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-overview-tab" data-bs-toggle="tab" data-bs-target="#nav-Description" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                        Overview
                    </button>
                    <button class="nav-link" id="nav-map-tab" data-bs-toggle="tab" data-bs-target="#nav-Map" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                        Location
                    </button>
                    @if(!empty($property['floor_plans']))
                    <button class="nav-link" id="nav-floorplan-tab" data-bs-toggle="tab" data-bs-target="#nav-Floorplan" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                        Floorplan
                    </button>
                    @endif
                    @if(!empty($property['epc_doc_urls']) || !empty($property['epc_urls']))
                        @if(!empty($property['epc_doc_urls']))
                            @foreach($property['epc_doc_urls'] as $epc_doc)
                                <a href="{{ $epc_doc['media_url'] }}" class="nav-link" rel="noopener noreferrer" target="_blank" title="View EPC Document for {{ $property['Address']['display_address'] ?? '' }}">EPC Document</a>
                            @endforeach
                        @elseif(!empty($property['epc_urls']))
                            <button class="nav-link" id="nav-epc-tab" data-bs-toggle="tab" data-bs-target="#nav-EPC" type="button" role="tab" aria-controls="nav-EPC" aria-selected="false">
                                EPC
                            </button>
                        @endif
                    @endif
                    @if(is_array($property['virtual_tours'] ?? null) && count($property['virtual_tours']) > 0)
                        @foreach ($property['virtual_tours'] as $index => $property_virtualtour)
                        <a href="{{ $property_virtualtour['media_url'] ?? '' }}" rel="noopener noreferrer" target="_blank" class="nav-link">
                            Virtual Tour{{ count($property['virtual_tours']) > 1 ? ' ('.($index + 1).')' : '' }}
                        </a>
                        @endforeach
                    @endif
                </div>
            </nav>        
        </div>
    </div>
</div>
<div class="container px-4 px-sm-0" id="property-details">
    <div class="row">
        <div class="col-sm-12 col-lg-7">
            <div class="tab-content property-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-Description" role="tabpanel" aria-labelledby="nav-Description-tab">
                    <h2 class="tab-headings">Description</h2>
                    @if(!empty($property['features']))
                    <ul id="property__features">
                        @foreach ($property['features'] as $index => $feature)
                        <li>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Component_149_21" x="0px" y="0px" viewBox="0 0 13.9 9.9" style="enable-background:new 0 0 13.9 9.9;" xml:space="preserve"> <style type="text/css"> .st0{fill:#FFFFFF;}</style><path id="Checkbox_00000093178765735361912690000002230998177314406834_" class="st0" d="M5.4,9.5L0.2,4.6l1.2-1.1l3.9,3.6l7-6.6  l1.2,1.1L5.4,9.5z"/></svg>
                                {!! $feature !!}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                    @endif  
                    <div class="property-single__description">{!! $property['description'] ?? '' !!}</div>
                </div>
                <div class="tab-pane fade" id="nav-Map" role="tabpanel" aria-labelledby="nav-Map-tab">
                    <h2 class="tab-headings">Location</h2>
                    @include('components/map-property-single-embedded', [
                        // Latitude
                        'lat'   => $property['Latitude'] ?? '',
                        // Longitude
                        'lng'   => $property['Longitude'] ?? '',
                        // Initial zoom level - values can range from 0 to 22
                        'initial_zoom'  => 17
                    ])
                </div>
                @if(is_array($property['floor_plans'] ?? false))
                <div class="tab-pane fade" id="nav-Floorplan" role="tabpanel" aria-labelledby="nav-Floorplan-tab">
                    @foreach ($property['floor_plans'] as $property_floorplan)
                    <div class="swiper-slide">
                        <img src="{{ $property_floorplan['media_url'] ?? '' }}" class="img-fluid" alt="Floorplan for {{ $property['Address']['display_address'] ?? '' }}">
                    </div>            
                    @endforeach
                </div>
                @endif
                @if(!empty($property['epc_doc_urls']) || !empty($property['epc_urls']))
                <div class="tab-pane fade" id="nav-EPC" role="tabpanel" aria-labelledby="nav-epc-tab">
                    @if(!empty($property['epc_doc_urls']))
                        @foreach($property['epc_doc_urls'] as $epc_doc)
                            <a href="{{ $epc_doc['media_url'] }}" rel="noopener noreferrer" target="_blank" title="View EPC Document for {{ $property['Address']['display_address'] ?? '' }}">View EPC Document</a>
                        @endforeach
                    @elseif(!empty($property['epc_urls']))
                        @foreach($property['epc_urls'] as $epc_image)
                            <img loading="lazy" src="{{ $epc_image['media_url'] }}" class="img-fluid" alt="EPC for {{ $property['Address']['display_address'] ?? '' }}">
                        @endforeach
                    @endif
                </div>
                @endif
                @if(is_array($property['virtual_tours'] ?? false))
                <div class="tab-pane fade" id="nav-Virtualtour" role="tabpanel" aria-labelledby="nav-Virtualtour-tab">
                    @foreach ($property['virtual_tours'] as $property_virtualtour)
                    <iframe width="100%" height="550" src="{{ $property_virtualtour['media_url'] ?? '' }}" autoplay=1 frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-lg-5">
            <div class="enquiry-box">
                <h3>To discuss this property call our friendly team</h3>
                <h2><a href="tel:" target="_blank" rel="noopener noreferrer">01624 61 99 66</a></h2>
                <a class="viewing-request-btn" href="/contact/arrange-viewing/?office_id={{ $office_id }}&advert_address={{ $advert_address }}&advert_summary={{ $advert_summary }}&advert_image={{ $advert_image }}&advert_postcode{{ $advert_postcode }}=&advert_url={{ $advert_url }}&type=@if($property['instruction_type'] == 'Sale') sale @elseif($property['instruction_type'] == 'Letting') let @endif">or <span>Book a viewing</span></a>
                <div class="enquiry-box__cta">
                    @if(!empty($property['brochures']))
                    <div class="brochure">
                        @if(is_array($property['brochures'] ?? false))
                        @foreach ($property['brochures'] as $property_brochure)
                        <a href="{{ $property_brochure['media_url'] ?? '' }}" class="brochure-download">
                            <svg enable-background="new 0 0 16 16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path id="login" d="M8,11.4l4.3-5.2H9.7v-6H6.3v6H3.7L8,11.4z M2,14V7.1H0.3V14c0,0.9,0.7,1.7,1.7,1.7c0,0,0,0,0,0H14c0.9,0,1.7-0.7,1.7-1.7c0,0,0,0,0,0V7.1H14V14L2,14z"></path></svg>
                            Download Brochure
                        </a>                    
                        @endforeach
                        @endif                    
                    </div>
                    @endif
                    <div class="add-to-shortlist">
                        <div data-component="ShortlistButtons" data-property-id="{{ $property['ID'] }}" class="shortlist__btns">
                            <i class="tpj_add_to_shortlist">
                                <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__star"><path d="M4.7,0.1L5.9,3l2.9,0.3C8.9,3.3,9,3.4,9,3.5c0,0.1,0,0.1-0.1,0.1L6.8,5.9l0.5,2.9C7.4,8.8,7.3,9,7.2,9c0,0-0.1,0-0.1,0L4.5,7.6L2,9C1.8,9,1.7,9,1.7,8.9c0,0,0-0.1,0-0.1l0.5-2.8L0.1,3.7C0,3.6,0,3.4,0.1,3.3c0,0,0.1-0.1,0.1-0.1L3.1,3l1.2-2.9C4.3,0,4.5,0,4.6,0C4.6,0,4.7,0.1,4.7,0.1z"></path></svg>
                                SAVE TO SHORTLIST
                            </i>
                            <i class="tpj_remove_from_shortlist">
                                <svg enable-background="new 0 0 9 9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" class="icon__star"><path d="M4.7,0.1L5.9,3l2.9,0.3C8.9,3.3,9,3.4,9,3.5c0,0.1,0,0.1-0.1,0.1L6.8,5.9l0.5,2.9C7.4,8.8,7.3,9,7.2,9c0,0-0.1,0-0.1,0L4.5,7.6L2,9C1.8,9,1.7,9,1.7,8.9c0,0,0-0.1,0-0.1l0.5-2.8L0.1,3.7C0,3.6,0,3.4,0.1,3.3c0,0,0.1-0.1,0.1-0.1L3.1,3l1.2-2.9C4.3,0,4.5,0,4.6,0C4.6,0,4.7,0.1,4.7,0.1z"></path></svg>
                                REMOVE FROM SHORTLIST
                            </i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="appraisal-box">
                <div class="box__inner">
                    <div class="box__icon">
                        <svg enable-background="new 0 0 53 53" viewBox="0 0 53 53" xmlns="http://www.w3.org/2000/svg" class="icon__house-smile"><path d="M42.7,52.9H10.3c-2.2,0-4-1.8-4-4V28.5h2v20.3c0,1.1,0.9,2,2,2h32.5c1.1,0,2-0.9,2-2V28.5h2v20.3C46.8,51.1,45,52.9,42.7,52.9z"></path><path d="M47.8,31.6c-0.3,0-0.5-0.1-0.7-0.3L26.5,10.7L5.9,31.3c-0.4,0.4-1,0.4-1.4,0l-4.1-4.1c-0.2-0.2-0.3-0.4-0.3-0.7s0.1-0.5,0.3-0.7L25.8,0.4c0.4-0.4,1-0.4,1.4,0l9.5,9.5V5.2c0-0.6,0.4-1,1-1h6.1c0.6,0,1,0.4,1,1V18l7.8,7.8c0.2,0.2,0.3,0.4,0.3,0.7s-0.1,0.5-0.3,0.7l-4.1,4.1C48.3,31.5,48.1,31.6,47.8,31.6z M2.5,26.5l2.6,2.6L25.8,8.5c0.4-0.4,1-0.4,1.4,0l20.6,20.6l2.6-2.6l-7.4-7.4c-0.2-0.2-0.3-0.4-0.3-0.7V6.2h-4.1v6.1c0,0.4-0.2,0.8-0.6,0.9c-0.4,0.2-0.8,0.1-1.1-0.2L26.5,2.5L2.5,26.5z"></path><path d="M26.5,44.8c-3.9,0-7.8-1.4-10.8-4.3c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0C22.3,44,30.7,44,36,39c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4C34.3,43.3,30.4,44.8,26.5,44.8z"></path><path d="M19.4,32.6c-0.6,0-1-0.4-1-1v-4.1c0-0.6,0.4-1,1-1s1,0.4,1,1v4.1C20.4,32.1,19.9,32.6,19.4,32.6z"></path><path d="M33.6,32.6c-0.6,0-1-0.4-1-1v-4.1c0-0.6,0.4-1,1-1s1,0.4,1,1v4.1C34.6,32.1,34.2,32.6,33.6,32.6z"></path></svg>
                    </div>
                    <h4 class="box__title">Market your property <br>with <?php bloginfo( 'name' ); ?></h4>
                    <p>Book a market appraisal for your property today. Our virtual options are still available if you prefer.</p>
                    <div class="box__actions">
                        <a href="/request-a-valuation/">
                            <span>Book Now</span><svg enable-background="new 0 0 10 6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" class="icon__arrow"><path d="M4.7,5.9L4.4,5.5l0,0L0.1,1.1l0,0C0,0.9,0,0.7,0.1,0.5l0,0l0.3-0.4l0,0C0.6,0,0.9,0,1.1,0.1l0,0L5,4.2l3.9-4.1l0,0C9.1,0,9.4,0,9.5,0.1l0.3,0.4l0,0c0.2,0.2,0.2,0.4,0,0.6l0,0L5.6,5.5l0,0L5.3,5.9l0,0C5.1,6,4.9,6,4.7,5.9C4.7,5.9,4.7,5.9,4.7,5.9L4.7,5.9z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>              
        </div>
    </div>
</div>

@if(isset($property['related_blog_posts']) && is_array($property['related_blog_posts']) && sizeof($property['related_blog_posts']) > 0)
    <h4>Related blog posts</h4>
    @foreach ($property['related_blog_posts'] as $blog_post)
    <a href="{{ $blog_post['permalink'] }}">
        @if($blog_post['featured_image_url'])
        <img src="{{ $blog_post['featured_image_url'] }}" alt="">
        @endif
        {{ $blog_post['post_title'] }}
    </a>
    @endforeach
@endif

@include('partials/related-properties')



<?php echo do_shortcode('[elementor-template id="2185"]'); ?>


@include('debug/debug')