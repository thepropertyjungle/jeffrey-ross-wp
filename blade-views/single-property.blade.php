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

                    @foreach ($property['virtual_tours'] as $property_virtualtour)
                    <iframe width="100%" height="550" src="{{ $property_virtualtour['media_url'] ?? '' }}"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    @endforeach
                </div>
                @else

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
                        <svg enable-background="new 0 0 21 21" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg"
                            class="icon__bath">
                            <path
                                d="M2.3,11.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V2.6c0-0.9,0.7-1.6,1.6-1.6c0.1,0,0.1,0,0.2,0C4,1.1,4,1.2,4,1.2c0,0,0,0,0,0.1C3.7,1.7,3.5,2.1,3.5,2.6c0,0.7,0.2,1.3,0.7,1.8c0.1,0.1,0.4,0.1,0.5,0l3.1-3.1c0.1-0.1,0.1-0.4,0-0.5c0,0,0,0,0,0C7.4,0.3,6.8,0,6.2,0c-0.5,0-1,0.2-1.4,0.5c-0.1,0.1-0.2,0.1-0.3,0C4.2,0.4,3.9,0.4,3.7,0.4c-1.2,0-2.2,0.9-2.3,2.1c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0v9.3c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.3c-0.2,0-0.3,0.2-0.3,0.4c0,0.2,0.2,0.3,0.3,0.3h0.9c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.6c0,1.4,0.7,2.6,1.9,3.3c0.1,0.1,0.2,0.2,0.2,0.3v1.6c0,0.2,0.1,0.4,0.3,0.4c0.2,0,0.4-0.1,0.4-0.3c0,0,0,0,0,0v-1.4c0-0.1,0.1-0.1,0.2-0.1c0,0,0,0,0,0c0.3,0.1,0.6,0.1,0.9,0.1h10.5c0.3,0,0.6,0,0.9-0.1c0.1,0,0.2,0,0.2,0.1c0,0,0,0,0,0v1.4c0,0.2,0.2,0.3,0.4,0.3s0.4-0.2,0.4-0.3l0,0V19c0-0.1,0.1-0.2,0.2-0.3c1.2-0.7,1.9-2,1.9-3.3v-2.6c0-0.1,0.1-0.2,0.2-0.2h0.9c0.2,0,0.3-0.2,0.3-0.4c0-0.2-0.2-0.3-0.3-0.3L2.3,11.9z M4.8,1.3C5.2,1,5.7,0.7,6.2,0.7c0.2,0,0.5,0.1,0.7,0.2C7,0.9,7,1,6.9,1.1c0,0,0,0,0,0L4.6,3.4c-0.1,0.1-0.1,0-0.2,0c0,0,0,0,0,0C4.2,3.1,4.2,2.9,4.2,2.6C4.2,2.1,4.5,1.7,4.8,1.3z M18.9,15.4c0,1.7-1.4,3.1-3.2,3.1H5.2c-1.7,0-3.1-1.4-3.2-3.1v-2.6c0-0.1,0.1-0.2,0.2-0.2h16.5c0.1,0,0.2,0.1,0.2,0.2L18.9,15.4z">
                            </path>
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

            <div class="enquiry-box ">



                <div class=" branch ">

                    

                    <div class="d-flex branch-info ">


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
                      
                        @endif


                    </div>
                </div>
            </div>


                <!-- agent -->
                <!-- calc-->


                <div class="enquiry-box text-center morg-calc ">



                    @include('components/mortgage-calculator')



                    <p>These results are for a repayment mortgage and are only intended as a guide. Make sure you obtain
                        accurate figures from your lender before committing to any mortgage. Your home may be
                        repossessed if
                        you do not keep up repayments on a mortgage. </p>


                    <img src="/wp-content/uploads/2024/10/Grosvenor-May-logo.png" width="200px"
                        alt="Grosvenor May Logo" />



                </div>




                <!-- calc -->


                <!-- stamp -->

                <div class="enquiry-box advice ">



                    <div class="d-flex buttons p-3">


                        <?php echo do_shortcode('[stamp_duty_calculator]'); ?>







                    </div>


                </div>


                <!-- stamp -->


                <!-- advice -->

                <div class="enquiry-box advice ">



                    <div class="d-flex buttons p-3">


                        <div class="buttons">
                            <h4>Need Advice?</h4>
                            <p>If you are searching for a new property, we have the knowledge and expertise you need to
                                help your dreamhouse become a reality</p>
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





<?php echo do_shortcode('[elementor-template id="2185"]'); ?>


@include('debug/debug')







