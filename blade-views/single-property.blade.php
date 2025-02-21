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
// Are there images for this property?
$propertyImages = $property['images'] ?? [];

$rental = $property['instruction_type'] ?? '';


// Define embeddable URL function
function isEmbeddableVideo($url) {
if (strpos($url, 'youtu.be') !== false ||
strpos($url, 'youtube.com') !== false ||
strpos($url, 'vimeo.com') !== false ||
strpos($url, 'youriguide.com') !== false ||
preg_match('/\.(mp4)$/', parse_url($url, PHP_URL_PATH))) {
return true; // URL is embeddable
}
return false; // URL is not embeddable
}

// Video embed function, covers YouTube, Vimeo and .mp4
function getVideoEmbedCode($url)
{
// Initialise the embed code variable
$embedCode = '';

// Check for YouTube URLs
if (strpos($url, 'youtu.be') !== false || strpos($url, 'youtube.com') !== false) {
preg_match('/(?:youtu.be\/|youtube.com(?:\/embed\/|\/v\/|\/watch\?v=|\/watch\?.+&v=))([^\s&]+)/', $url, $match);
$videoId = $match[1];
$embedCode = '<div class="ratio ratio-16x9 mb-3"><iframe
        src="https://www.youtube.com/embed/' . $videoId . '?controls=0&rel=0&playsinline=1" allowfullscreen></iframe>
</div>';
}
// Check for Vimeo URLs
elseif (strpos($url, 'vimeo.com') !== false) {
preg_match('/vimeo\.com\/(?:video\/)?((\d+)\?h=(.+))/', $url, $match);
$videoId = $match[1];
$embedCode = '<div class="ratio ratio-16x9 mb-3"><iframe src="https://player.vimeo.com/video/' . $videoId . '"
        allowfullscreen></iframe></div>';
}

// Check for iGUIDE links
elseif (strpos($url, 'youriguide.com') !== false) {
preg_match('/youriguide\.com\/([a-zA-Z0-9_]+)/', $url, $match);
$guideId = $match[1];
$embedCode = '<div class="ratio ratio-16x9 mb-3"><iframe src="https://youriguide.com/' . $guideId . '"
        allowfullscreen></iframe></div>';
}
// Direct MP4 links
elseif (preg_match('/\.(mp4)$/', parse_url($url, PHP_URL_PATH))) {
$embedCode = '<div class="ratio ratio-16x9 mb-3"><video src="' . $url . '" controls allowfullscreen></video></div>';
}

return $embedCode;
}

@endphp

<div class="brand-primary-background">
    <div class="container">
        <div class="row align-items-end pb-5">


        </div>
    </div>
</div>
<div class="property-grey-bg box">
    <div class="container">
        <div class="row">
            <div class="col">


            </div>
            <nav class="property-tabs">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-overview-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-Description" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true">
                        Overview
                    </button>


                    <!-- gallery -->
                    <a href="#gallery-1" class="nav-link">

                        Gallery</a>





                    <a class="nav-link" id="nav-map-tab" href="#nav-Map">
                        Location
                    </a>


                    @if(!empty($property['floor_plans']))
                    <a class="nav-link" id="nav-floorplan-tab" href="#nav-Floorplan">
                        Floorplan
                    </a>

                    @endif
                    @if(!empty($property['epc_doc_urls']) || !empty($property['epc_urls']))
                    @if(!empty($property['epc_doc_urls']))
                    @foreach($property['epc_doc_urls'] as $epc_doc)
                    <!-- Link to the EPC document -->
                    <a href="{{ $epc_doc }}" class="nav-link" rel="noopener noreferrer" target="_blank"
                        title="View EPC Document for {{ $property['Address']['display_address'] ?? '' }}">EPC
                        Document</a>
                    @endforeach
                    @elseif(!empty($property['epc_urls']))
                    <!-- Button to trigger EPC tab -->
                    <button class="nav-link" id="epc" data-bs-toggle="tab" data-bs-target="#nav-EPC" type="button"
                        role="tab" aria-controls="nav-EPC" aria-selected="false">
                        EPC
                    </button>
                    @endif
                    @endif

                    @if(is_array($property['virtual_tours'] ?? null) && count($property['virtual_tours']) > 0)
                    @foreach ($property['virtual_tours'] as $index => $property_virtualtour)
                    <a href="{{ $property_virtualtour['media_url'] ?? '' }}" rel="noopener noreferrer" target="_blank"
                        class="nav-link">
                        Video Tour{{ count($property['virtual_tours']) > 1 ? ' ('.($index + 1).')' : '' }}
                    </a>
                    @endforeach
                    @endif

                    @if(!empty($property['brochures']))

                    @if(is_array($property['brochures'] ?? false))
                    @foreach ($property['brochures'] as $property_brochure)
                    <a href="{{ $property_brochure['media_url'] ?? '' }}" target="_blank" class="nav-link">
                        Brochure
                    </a>

                    @endforeach
                    @endif

                    @endif
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="container px-4 px-sm-0" id="property-details">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <div class="tab-content property-content" id="nav-tabContent">

                <div class="gallery hide">

                    @foreach($propertyImages as $index => $property_image)
                    <a href="{{ $property_image['optimised_image_url'] ?? '' }}/1500" data-fancybox="gallery"
                        data-caption="{{ $property_image['caption'] }}">
                        <img src="path/to/thumb1.jpg" alt="{{ $property['Address']['display_address'] }}">
                    </a>
                    @endforeach

                </div>



                <div id="ppropertyCarousel" class="slider">
                    @foreach($propertyImages as $index => $property_image)
                    <div>
                        <img loading="lazy" src="{{ $property_image['optimised_image_url'] ?? '' }}/1500"
                            class="d-block w-100" alt="{{ $property['Address']['display_address'] }}"
                            data-media-update-date="{{ $property_image['media_update_date']}}"
                            data-caption="{{ $property_image['caption'] }}">
                    </div>
                    @endforeach
                </div>





                <div class=" fade show active" id="nav-Description" role="tabpanel"
                    aria-labelledby="nav-Description-tab">
                    <h2 class="tab-headings">About this property</h2>

                    <div class="description  height" id="description">

                        <!-- Property Summary -->
                        {!! $property['summary'] ?? '' !!}
                        <!-- Property Summary -->

                        {!! $property['description'] ?? '' !!}

                    </div>

                    <div class="read">
                        <p>Read More</p>
                    </div>

                </div>

                @if(is_array($property['floor_plans'] ?? false))
                <div id="nav-Floorplan" role="tabpanel" aria-labelledby="nav-Floorplan-tab">
                    <h2 class="tab-headings">Floorplan</h2>

                    @foreach ($property['floor_plans'] as $property_floorplan)
                    <div class="swiper-slide">
                        <a href="{{ $property_floorplan['media_url'] ?? '' }}" data-lightbox="floorplan"
                            data-title="Floorplan for {{ $property['Address']['display_address'] ?? '' }}">
                            <img src="{{ $property_floorplan['media_url'] ?? '' }}" class="img-fluid"
                                alt="Floorplan for {{ $property['Address']['display_address'] ?? '' }}">
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif






                @if($property['epcs'])
                <div id="epc" class="col">
                    @foreach ($property['epcs'] as $epcs)
                    <img loading="lazy" src="{{ $epcs['media_url'] }}" class="img-fluid"
                        alt="EPC for {{ $property['Address']['display_address'] ?? '' }}">
                    @endforeach
                </div>
                @endif






                @if(is_array($property['virtual_tours'] ?? false) && count($property['virtual_tours']) > 0)
                <div id="nav-Virtualtour" role="tabpanel" aria-labelledby="nav-Virtualtour-tab">
                    <h2 class="tab-headings">Video tours</h2>

                    @php
                    // Refine $filteredCarouselTours to include only embeddable videos using the function
                    $filteredCarouselTours = array_filter($property['virtual_tours'], function ($tour) {
                    return isEmbeddableVideo($tour['media_url']); // Use the isEmbeddableVideo function
                    });
                    @endphp

                    @if(count($filteredCarouselTours) > 0)
                    @foreach ($filteredCarouselTours as $property_virtual_tour)
                    @php
                    $embedCode = getVideoEmbedCode($property_virtual_tour['media_url']); // Generate embed code
                    @endphp
                    {{-- Display the video embed code --}}
                    {!! $embedCode !!}
                    @endforeach
                    @endif
                </div>
                @endif


                <div class="map" id="nav-Map" role="tabpanel" aria-labelledby="nav-Map-tab">
                    <h2 class="tab-headings">Location</h2>
                    @include('components/map-property-single-embedded', [
                    // Latitude
                    'lat' => $property['Latitude'] ?? '',
                    // Longitude
                    'lng' => $property['Longitude'] ?? '',
                    // Initial zoom level - values can range from 0 to 22
                    'initial_zoom' => 17
                    ])
                </div>




            </div>
        </div>
        <div class="col-sm-12 col-lg-4 property-single__description home">
            <!-- prop info -->

            <div class="enquiry-box ">

                @if ($property['availability'] !== 'Available')
                <div class="availability">
                    <p>{{ $property['availability'] === 'SSTC' ? 'Sold STC' : $property['availability'] }}</p>
                </div>
                @endif
                <div class="property-grid__meta">
                    <div class="property-grid__type">
                        <p>
                            For @if ($property['instruction_type'] == 'Letting') Rent @else Sale @endif
                        </p>
                    </div>

                    <div class="property-grid__price">
                        £{{ number_format($property['price']) }} <span
                            class="rent-frequency">{{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'Per Week' : 'PCM, Fees Apply') : '' }}</span>
                    </div>

                    <div class="property-grid__address">
                        {{ $property['Address']['address_2'] ?? '' }}, {{ $property['Address']['town'] ?? '' }},
                        {{ $property['Address']['postcode'] ?? '' }}
                    </div>

                </div>

                <ul class="property__rooms">
                    @if (!empty($property['bedrooms']))
                    <li>
                        <svg enable-background="new 0 0 22 16" viewBox="0 0 22 16" xmlns="http://www.w3.org/2000/svg"
                            class="icon__bed">
                            <path
                                d="M21.1,7.3c-0.1,0-0.2-0.1-0.2-0.2V0.4c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0H1.5C1.3,0,1.1,0.2,1.1,0.4c0,0,0,0,0,0v6.7c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.4C0.2,7.3,0,7.4,0,7.6c0,0,0,0,0,0v5.8c0,0.2,0.2,0.4,0.4,0.4c0,0,0,0,0,0h0.5c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v1.6c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V14c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h18c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v1.6c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V14c0-0.1,0.1-0.2,0.2-0.2l0,0h0.5c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V7.6c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0L21.1,7.3z M1.8,0.9c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h18c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v6.2c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.4c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0h-7.3c-0.2,0-0.4,0.2-0.4,0.4c0,0,0,0,0,0v3.1c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.4c-0.1,0-0.2-0.1-0.2-0.2l0,0V4c0-0.2-0.2-0.4-0.4-0.4H2.9C2.7,3.6,2.6,3.8,2.6,4c0,0,0,0,0,0v3.1c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H2c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0L1.8,0.9z M18.5,4.4c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-6.2c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4.5c0-0.1,0.1-0.2,0.2-0.2l0,0H18.5z M9.7,4.4c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H3.5c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4.5c0-0.1,0.1-0.2,0.2-0.2l0,0H9.7z M21.3,12.9c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0v-1.1c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h20.2c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0V12.9z M21.3,10.7c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V8.2C0.7,8.1,0.8,8,0.9,8c0,0,0,0,0,0h20.2c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0V10.7z">
                            </path>
                        </svg>
                        {{ $property['bedrooms'] }} bed
                    </li>
                    @endif
                    @if (!empty($property['bathrooms']))
                    <li>
                        <svg enable-background="new 0 0 21 21" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg"
                            class="icon__bath">
                            <path
                                d="M2.3,11.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V2.6c0-0.9,0.7-1.6,1.6-1.6c0.1,0,0.1,0,0.2,0C4,1.1,4,1.2,4,1.2c0,0,0,0,0,0.1C3.7,1.7,3.5,2.1,3.5,2.6c0,0.7,0.2,1.3,0.7,1.8c0.1,0.1,0.4,0.1,0.5,0l3.1-3.1c0.1-0.1,0.1-0.4,0-0.5c0,0,0,0,0,0C7.4,0.3,6.8,0,6.2,0c-0.5,0-1,0.2-1.4,0.5c-0.1,0.1-0.2,0.1-0.3,0C4.2,0.4,3.9,0.4,3.7,0.4c-1.2,0-2.2,0.9-2.3,2.1c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0v9.3c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.3c-0.2,0-0.3,0.2-0.3,0.4c0,0.2,0.2,0.3,0.3,0.3h0.9c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.6c0,1.4,0.7,2.6,1.9,3.3c0.1,0.1,0.2,0.2,0.2,0.3v1.6c0,0.2,0.1,0.4,0.3,0.4c0.2,0,0.4-0.1,0.4-0.3c0,0,0,0,0,0v-1.4c0-0.1,0.1-0.1,0.2-0.1c0,0,0,0,0,0c0.3,0.1,0.6,0.1,0.9,0.1h10.5c0.3,0,0.6,0,0.9-0.1c0.1,0,0.2,0,0.2,0.1c0,0,0,0,0,0v1.4c0,0.2,0.2,0.3,0.4,0.3s0.4-0.2,0.4-0.3l0,0V19c0-0.1,0.1-0.2,0.2-0.3c1.2-0.7,1.9-2,1.9-3.3v-2.6c0-0.1,0.1-0.2,0.2-0.2h0.9c0.2,0,0.3-0.2,0.3-0.4c0-0.2-0.2-0.3-0.3-0.3L2.3,11.9z M4.8,1.3C5.2,1,5.7,0.7,6.2,0.7c0.2,0,0.5,0.1,0.7,0.2C7,0.9,7,1,6.9,1.1c0,0,0,0,0,0L4.6,3.4c-0.1,0.1-0.1,0-0.2,0c0,0,0,0,0,0C4.2,3.1,4.2,2.9,4.2,2.6C4.2,2.1,4.5,1.7,4.8,1.3z M18.9,15.4c0,1.7-1.4,3.1-3.2,3.1H5.2c-1.7,0-3.1-1.4-3.2-3.1v-2.6c0-0.1,0.1-0.2,0.2-0.2h16.5c0.1,0,0.2,0.1,0.2,0.2L18.9,15.4z">
                            </path>
                        </svg>
                        {{ $property['bathrooms'] }} bath
                    </li>
                    @endif
                    @if (!empty($property['sizing']))
                    <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
  <!-- The square -->
  <polygon points="30,50 50,30 70,50 50,70" fill="none" stroke="black" stroke-width="2" />
  
  <!-- Top-right arrow -->
  <line x1="70" y1="50" x2="90" y2="30" stroke="black" stroke-width="2" />
  <polygon points="85,35 90,30 85,25" fill="black" />
  
  <!-- Top-left arrow -->
  <line x1="50" y1="30" x2="30" y2="10" stroke="black" stroke-width="2" />
  <polygon points="35,15 30,10 25,15" fill="black" />
  
  <!-- Bottom-left arrow -->
  <line x1="30" y1="50" x2="10" y2="70" stroke="black" stroke-width="2" />
  <polygon points="15,65 10,70 15,75" fill="black" />
  
  <!-- Bottom-right arrow -->
  <line x1="50" y1="70" x2="70" y2="90" stroke="black" stroke-width="2" />
  <polygon points="65,85 70,90 75,85" fill="black" />
</svg>


                        {{ $property['sizing']['maximum'] ?? '' }} {{ $property['sizing']['area_unit'] ?? '' }}
                    </li>
                    @endif
                </ul>



                <h4 class="feature">Key Features</h4>
                @if(!empty($property['features']))
                <ul id="property__features">
                    @foreach (array_slice($property['features'], 0, 5) as $index => $feature)
                    <li>
                        <p>
                            {!! $feature !!}
                        </p>
                    </li>
                    @endforeach
                </ul>
                @endif


                <div class=" branch ">

                    <h4 class="feature">Contact our branch </h4>

                    <div class="d-flex branch-info ">

                        <div class="branch-image">
                            <img class="alignnone size-medium wp-image-2541"
                                src="{{ $property['branch']['description'] ?? '' }}" alt="" width="212" height="300">
                        </div>



                        <div class="branch-contact">

                            <h4> {{ $property['branch']['name'] ?? '' }}</h4>

                            <a href="tel:{{ $property['branch']['meta']['phone_numbers'][0] ?? '' }}">
                                {{ $property['branch']['meta']['phone_numbers'][0] ?? '' }}
                            </a>


                        </div>





                    </div>



                </div>










                <!-- Button to trigger the modal -->
                <div class="d-flex buttons">
                    <a data-bs-toggle="modal" data-bs-target="#propertyViewing" class="btn first btn-primary">Arrange a
                        viewing</a>
                    <a href="#" class="btn second btn-secondary">Make an offer</a>


                    <!-- Modal Viewing Form -->
                    <div class="modal fade" id="propertyViewing" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg py-5">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="p-5 form__viewing">
                                        <h4 class="mb-5">Arrange a Viewing</h4>
                                        {!! gravity_form(
                                        id: 8, // Gravity Form ID
                                        display_title: false,
                                        display_description: false,
                                        ajax: true,
                                        field_values: [
                                        'office_id' => $property['branch']['meta']['office_id'] ?? '',
                                        'advert_address' => $property['Address']['display_address'] ?? '',
                                        'advert_postcode' => $property['Address']['postcode'] ?? '',
                                        'instruction_type' => $property['instruction_type'] ?? '',
                                        'advert_url' => $property['permalink'] ?? '',
                                        ],
                                        ) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- prop info -->
            <!-- agent -->

            @php
            // Get the negotiator email from the property data
            $negotiatorEmail = $property['other']['negotiator'] ?? '';

            // Initialize an empty variable to hold matched team member data
            $matchedTeamMember = null;

            // Query the team post type to find a match by email
            $teamQuery = new WP_Query([
            'post_type' => 'team',
            'posts_per_page' => -1,
            'meta_query' => [
            [
            'key' => 'email', // Adjust this to the exact ACF field name for the email
            'value' => $negotiatorEmail,
            'compare' => '=',
            ],
            ],
            ]);

            // Check if there's a match
            if ($teamQuery->have_posts()) {
            $teamQuery->the_post();
            $matchedTeamMember = (object) [
            'post_title' => get_the_title(),
            'email' => get_field('email'),
            'phone_number' => get_field('phone_number'),
            'featured_image_url' => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
            'instagram' => get_field('instagram'),
            'post_link' => get_permalink(),
            ];
            }

            // Reset WordPress post data
            wp_reset_postdata();
            @endphp
            @if ($matchedTeamMember)
            <div class="enquiry-box ">



                <div class=" branch ">



                    <div class="d-flex branch-info ">




                        
                        <div class="branch-contact">
                            <h4 class="feature">Agent Details </h4>
                            <h4>{{ $matchedTeamMember->post_title }}</h4>
                            <a href="tel:{{ $matchedTeamMember->phone_number }}">
                                {{ $matchedTeamMember->phone_number }}
                            </a>
                            <a href="mailto:{{ $matchedTeamMember->email }}">
                                {{ $matchedTeamMember->email }}
                            </a>
                        </div>


                        <div class="branch-image agent">
                            <img class="alignnone size-medium wp-image-2541"
                                src="{{ $matchedTeamMember->featured_image_url }}"
                                alt="{{ $matchedTeamMember->post_title }}" width="212" height="300">
                        </div>

                    </div>

                    <div class="d-flex buttons">
                        @if ($matchedTeamMember->instagram)
                        <a href="{{ $matchedTeamMember->instagram }}" class="btn first btn-primary">Follow
                            {{ $matchedTeamMember->post_title }} on Instagram</a>
                        @endif
                        <a href="mailto:{{ $matchedTeamMember->email }}" class="btn second btn-secondary">Contact
                            Agent</a>
                    </div>

                   




                </div>


            </div>

       
        @endif


        <!-- agent -->
        <!-- calc-->


        <div class="enquiry-box text-center morg-calc ">



            @include('components/mortgage-calculator')



            <p>These results are for a repayment mortgage and are only intended as a guide. Make sure you obtain
                accurate figures from your lender before committing to any mortgage. Your home may be repossessed if
                you do not keep up repayments on a mortgage. </p>


            <img src="/wp-content/uploads/2024/10/Grosvenor-May-logo.png" width="200px" alt="Grosvenor May Logo" />



        </div>




        <!-- calc -->


        <!-- stamp -->

        <div class="enquiry-box advice ">



            <div class="d-flex buttons pb-3">

            <div class="check">
                <label>
                    <input type="radio" name="propertyType" id="ltteRadio" checked> LTTE
                </label>
                <label>
                    <input type="radio" name="propertyType" id="stampRadio"> Stamp Duty
                </label>
            </div>
            

            </div>



            <div class="ltte calc" id="ltteContent">
                <?php echo do_shortcode('[stamp_duty_calculator region="wales"]'); ?>
            </div>



            <div class="stamp calc" id="stampContent">
                            <?php echo do_shortcode('[stamp_duty_calculator]'); ?>
            </div>




        </div>

    <script>    $(document).ready(function () {
        // Toggle visibility based on the selected radio button
        $('input[name="propertyType"]').on('change', function () {
            if ($('#ltteRadio').is(':checked')) {
                $('#ltteContent').show();
                $('#stampContent').hide();
            } else if ($('#stampRadio').is(':checked')) {
                $('#ltteContent').hide();
                $('#stampContent').show();
            }
        });
    });
</script>

        <!-- stamp -->


        <!-- advice -->

        <div class="enquiry-box advice ">



            <div class="d-flex buttons p-3">


                <div class="buttons">
                    <h4>Need Advice?</h4>
                    <p>If you are searching for a new property, we have the knowledge and expertise you need to help
                        your dreamhouse become a reality</p>
                    <a href="/contact/" class="btn first btn-primary">Find out more</a>

                </div>


                <div class="img">
                    <img src="/wp-content/uploads/2024/07/IMG_2341.png" alt="Advice" class="img-fluid">


                </div>





            </div>


        </div>

        <!-- advice -->

















    </div>

</div>
</div>
</div>







@php
// Default attributes for shortcode (updated for Blade syntax)
$zipcode = $postcode ?? $property['Address']['postcode'] ?? '';

// Area codes and respective region names
$postcodes = [
    'CF10 1' => 'City Centre',
    'CF10 2' => 'City Centre',
    'CF11 6' => 'Riverside',
    'CF11 7' => 'Grangetown',
    'CF11 8' => 'Leckwith / Lansdowne gardens',
    'CF11 9' => 'Pontcanna',
    'CF14 0' => 'Lisvane',
    'CF14 1' => 'Whitchurch',
    'CF14 2' => 'Whitchurch',
    'CF14 7' => 'Whitchurch',
    'CF14 3' => 'Heath',
    'CF14 4' => 'Heath',
    'CF14 5' => 'Llanishen',
    'CF14 6' => 'Rhiwbina',
    'CF14 9' => 'Thornhill',
    'CF23 5' => 'Penylan',
    'CF23 6' => 'Cyncoed',
    'CF23 7' => 'Pentwyn',
    'CF23 8' => 'Pontprennau',
    'CF24 1' => 'Adamsdown',
    'CF24 2' => 'Splott, Pengam Green / Tremorfa',
    'CF24 3' => 'Roath',
    'CF24 4' => 'Cathays',
    'CF3 3' => 'Rumney',
    'CF3 4' => 'Rumney',
    'CF3 5' => 'Old St mellons',
    'CF5 1' => 'Canton',
    'CF5 2' => 'Llandaff',
    'CF5 3' => 'Fairwater',
    'CF5 4' => 'Ely & The Drope',
    'CF5 6' => 'St Nicholas, Wenvoe Culverhouse',
    'CF15 9' => 'CF15 9',
    // Add more regions here
    'CF15 8' => 'Pontprennau',
    'CF24 9' => 'Splott',
    'CF11 10' => 'Cardiff Bay',
    // Add all other region codes here as needed
];

// Determine the area code based on the postcode
$areacode = '';
foreach ($postcodes as $key => $val) {
    if (strpos($zipcode, $key) === 0) {
        $areacode = $val;
    }
}

if ($areacode) {
    // Define region codes
    $regionCodes = [
        'City Centre' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDkzP2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--7eb5f7f9baea8c68f67c3589ca11d11534ee3a1a',
										'Riverside' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDc4P2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--034c0a2251db71ec18ffb4a421807e496488a4ff',
										'Grangetown' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDc3P2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--6dc86c5351b682117732288d140c1c394a558f4c',
										'Leckwith / Lansdowne gardens' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDc2P2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--d7ab2d646da8d5ba3417e8c231bbe7f7fc5ebc38',
										'Pontcanna' => 'BAh7CEkiCGdpZAY6BkVUSSIqZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzY0NTg_ZXhwaXJlc19pbgY7AFRJIgxwdXJwb3NlBjsAVEkiDGRlZmF1bHQGOwBUSSIPZXhwaXJlc19hdAY7AFQw--ebc2c6140e6e2760949b6321cbbba286390bdf11',
										'Lisvane' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDg2P2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--4a7e3251216d61c21f6a89f3c2afa1faf5557750',
										'Whitchurch' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDg3P2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--e3ff14d1611a883fa27284c7cba2768b4e6334c4',
										'Heath' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDg4P2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--fefa4001d1981db73125edbd33dc4edb5559a84f',
										'Llanishen' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDg5P2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--b5a70a8f01f11a21d70c9fab8770166af3a9757d',
										'Rhiwbina' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDkwP2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--f8895292a09acb9d36558fed5cce01ae7ed9f392',
										'Thornhill' => 'BAh7CEkiCGdpZAY6BkVUSSIqZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzY5OTc_ZXhwaXJlc19pbgY7AFRJIgxwdXJwb3NlBjsAVEkiDGRlZmF1bHQGOwBUSSIPZXhwaXJlc19hdAY7AFQw--2c3d9f2f8ca645ecfcf248cbb97f9dacd2f71c75',
										'Penylan' => 'BAh7CEkiCGdpZAY6BkVUSSIqZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzI2MzA_ZXhwaXJlc19pbgY7AFRJIgxwdXJwb3NlBjsAVEkiDGRlZmF1bHQGOwBUSSIPZXhwaXJlc19hdAY7AFQw--21a7dd644c7feb1b152c3829ab7f7888cd977cce',
										'Cyncoed' => 'BAh7CEkiCGdpZAY6BkVUSSIqZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzI2MzE_ZXhwaXJlc19pbgY7AFRJIgxwdXJwb3NlBjsAVEkiDGRlZmF1bHQGOwBUSSIPZXhwaXJlc19hdAY7AFQw--e8cae35b79841651afdd4c2eaebf85e919aca59e',
										'Pentwyn' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDgzP2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--a8bf1d3b43f6fb8ff72a1fcadb168629b79551e7',
										'Pontprennau' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDg0P2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--70d436406b4598d368a1c7b428956a08cec6e3c7',
										'Adamsdown' => 'BAh7CEkiCGdpZAY6BkVUSSIqZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzI2Mzg_ZXhwaXJlc19pbgY7AFRJIgxwdXJwb3NlBjsAVEkiDGRlZmF1bHQGOwBUSSIPZXhwaXJlc19hdAY7AFQw--03376aad30858f2358877d715e980769450ab384',
										'Splott, Pengam Green / Tremorfa' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDg1P2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--5868ca9c300f24066ef6fb07b198e9879094fe23',
										'Roath' => 'BAh7CEkiCGdpZAY6BkVUSSIqZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzI2MzY_ZXhwaXJlc19pbgY7AFRJIgxwdXJwb3NlBjsAVEkiDGRlZmF1bHQGOwBUSSIPZXhwaXJlc19hdAY7AFQw--b9bdb6a91490aff005219672f49ef5164aecf61b',
										'Cathays' => 'BAh7CEkiCGdpZAY6BkVUSSIqZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzI2Mzc_ZXhwaXJlc19pbgY7AFRJIgxwdXJwb3NlBjsAVEkiDGRlZmF1bHQGOwBUSSIPZXhwaXJlc19hdAY7AFQw--b0433c577fbb2b3c84c4bc53eed95c295e0d5b3f',
										'Rumney' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDkxP2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--d77fb91a9b152ece9e8fea91367ce69ee1b0464f',
										'Old St mellons' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDkyP2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--03c5cddedef0e86b27ddc6b5975567dc84baf19e',
										'Canton' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDc5P2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--96bdc79aeeb048ff6d68cc8cbd16df98a7e857d9',
										'Llandaff' => 'BAh7CEkiCGdpZAY6BkVUSSIqZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzcwNjQ_ZXhwaXJlc19pbgY7AFRJIgxwdXJwb3NlBjsAVEkiDGRlZmF1bHQGOwBUSSIPZXhwaXJlc19hdAY7AFQw--478b79060f62715cde944fc12ed42c1b1e22b507',
										'Fairwater' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDgwP2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--fe21fa0b63b467d76b6689c18f05e9287fd7b207',
										'Ely & The Drope' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDgxP2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--dbc7998f7d602df9390c9a6de76fd089374ba57d',
										'St Nicholas, Wenvoe Culverhouse' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwMDgyP2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--973e8d409ad36fde1ba4a69ed45aaf0574cf3806',
										'CF15 9' => 'BAh7CEkiCGdpZAY6BkVUSSIrZ2lkOi8vaW5mb3JtL1VzZXJBcmVhLzEwNTcwP2V4cGlyZXNfaW4GOwBUSSIMcHVycG9zZQY7AFRJIgxkZWZhdWx0BjsAVEkiD2V4cGlyZXNfYXQGOwBUMA==--d74c16269ab6fb08fcc5834a4d509095bf6a2bde'
            
    ];

    // Get the region ID
    $regionId = isset($regionCodes[$areacode]) ? $regionCodes[$areacode] : '';

    if ($regionId) {
        // Make the API request
        $response = wp_remote_get('https://inform.dataloft.co.uk/api/'.$regionId.'/8qnkvr6QNdY7NETVHUfi2A/widget_stats', ['sslverify' => false]);

        if (is_array($response) && !is_wp_error($response)) {
            $data = json_decode($response['body'], true);
            $data_twelve_months = $data['stats']['results']['area']['data']['twelve_months'];
        }
    }
}
@endphp



<div class="container data pb-5">
  <h2 class="elementor-heading-title elementor-size-default">What's the market like in this area?</h2>
</div>

<div class="container data pb-5 ">
  <!-- 4 divs side by side with padding and 20px gap -->
  <div class="row g-3">
    <div class="col-md-3 col-6">
      <div class="p-3 border bg-light">
        <div class="dl_main">
          <h3>Average price of a home</h3>
          <?php if (number_format($data_twelve_months['average_price']) != 0) { ?>
            <h3>&pound; <?php echo number_format($data_twelve_months['average_price']); ?></h3>
          <?php } else { ?>
            <h3 style="font-size:22px">Insufficient data</h3>
          <?php } ?>
          <h4><?php echo array_search($areacode, $postcodes);  ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-6">
      <div class="p-3 border bg-light">
        <div class="col_5c">
          <h3>How much <br><strong>have prices changed?</strong></h3>
          <div class="row g-3">
  <!-- 12 months block -->
  <div class="col-md-6 col-12">
    <?php 
      $minusClass = '';
      if (substr(number_format($data_twelve_months['percentage_change_in_average_price'], 1), 0, 1) === '-') {
        $minusClass = 'minusvalue';
      }
    ?>
    <div class="dl_data <?php echo $minusClass; ?>">
      <h5>
        <svg width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27 27" style="enable-background:new 0 0 27 27;" xml:space="preserve">
          <style type="text/css">
            .widget_arrow {fill:#cd3301;}
          </style>
          <g transform="rotate(0)">
            <polygon class="widget_arrow" points="1.516,10.715 1.516,14.742 10.797,5.461 10.797,27 13.664,27 13.664,5.461 22.945,14.742 22.945,10.715 12.231,0 "></polygon>
          </g>
        </svg>
        <?php echo abs(number_format($data_twelve_months['percentage_change_in_average_price'], 1)); ?>%
      </h5>
      <h6>last <strong>12 months</strong></h6>
    </div>
  </div>

  <!-- 5 years block -->
  <div class="col-md-6 col-12">
    <?php 
      $minusClassx = '';
      if (substr(number_format($data_fiveyears['percentage_change_in_average_price'], 1), 0, 1) === '-') {
        $minusClassx = 'minusvalue';
      }
    ?>
    <div class="dl_data <?php echo $minusClassx; ?>">
      <h5>
        <svg width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27 27" style="enable-background:new 0 0 27 27;" xml:space="preserve">
          <style type="text/css">
            .widget_arrow {fill:#cd3301;}
          </style> 
          <g transform="rotate(0)">
            <polygon class="widget_arrow" points="1.516,10.715 1.516,14.742 10.797,5.461 10.797,27 13.664,27 13.664,5.461 22.945,14.742 22.945,10.715 12.231,0 "></polygon>
          </g>
        </svg>
        <?php echo abs(number_format($data_fiveyears['percentage_change_in_average_price'], 1)); ?>%
      </h5>
      <h6>last <strong>5 years</strong></h6>
    </div>
  </div>
</div>

        </div>
      </div>
    </div>

    <div class="col-md-3 col-6">
      <div class="p-3 border bg-light">
        <div class="col_6c">
          <div class="dl_data1">
            <h3>What's the average<br> <strong>price per square foot?</strong></h3>
            <h5>&pound;<?php echo number_format($data_twelve_months['average_price_psf']); ?>psf</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-6">
      <div class="p-3 border bg-light">
        <div class="col_6c">
          <div class="dl_data1">
            <h3>What's the average <br><strong>price of a new home?</strong></h3>
            <h5><?php echo ($data_twelve_months['average_price_new_build'] != '') ? '&pound;' . number_format($data_twelve_months['average_price_new_build']) : ' -- '; ?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>










<?php echo do_shortcode('[elementor-template id="2185"]'); ?>








@include('debug/debug')