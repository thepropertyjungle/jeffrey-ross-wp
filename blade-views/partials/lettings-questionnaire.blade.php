@php
    // Set variables from property data for LeadPro form
    //$advert_address = $property['Address']['display_address'] ?? '';
    $advert_postcode = $property['Address']['postcode'] ?? '';
    // $advert_image = $property['images'][0]['media_url'] ?? '';
    $hasInstructionType = $property['instruction_type'] ?? '';

    $advert_image = sanitize_text_field(wp_unslash($_GET['advert_image'] ?? ''));
    $office_id = sanitize_text_field(wp_unslash($_GET['office_id'] ?? ''));
    $advert_address = sanitize_text_field(wp_unslash($_GET['advert_address'] ?? ''));
    $advert_url = sanitize_text_field(wp_unslash($_GET['advert_url'] ?? ''));
    $advert_summary = sanitize_text_field(wp_unslash($_GET['advert_summary'] ?? ''));

    $instruction_type = $hasInstructionType === 'Sale' ? 'sale' :
                        ($hasInstructionType === 'Letting' ? 'let' : '');

   //$advert_url = $property['permalink'] ?? '';
 
@endphp

<div class="viewing-form">
<div class="container-fluid">
    <div class="row" style="background: linear-gradient(90deg, rgba(101,101,101,1) 0%, rgba(101,101,101,1) 0%, rgba(101,101,101,1) 0%, rgba(0,0,0,0.6447172619047619) 0%),url('<?= esc_attr($advert_image) ?>'); background-size:cover;">
    <div class="col">
        <div class="viewing-hero">
        <h4 class="viewing-address"><?= esc_attr($advert_address) ?></h4>
        <h2 class="viewing-heading">Lettings Questionnaire</h2>
        </div>
    </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="viewing-form-warapper">
                {!! do_shortcode('[gravityform id="5" title="false" description="false" ajax="true" field_values="office_id='. $office_id .'&advert_summary='. $advert_summary  .'&advert_address='. $advert_address .'&advert_image='. $advert_image .'&advert_postcode='. $advert_postcode .'&advert_url='. $advert_url .'&type='. $instruction_type .'"]'); !!}
            </div>
        </div>
    </div>
</div>
</div>


@include('debug/debug')