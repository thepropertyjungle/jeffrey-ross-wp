{{--
    ATTENTION
    =========
    /src/scss/search-results/search-results-corner-flash.scss

    A universal include file used across multiple
    templates to display property availability.
--}}

@php
    $availability = $property['availability'];
@endphp

<div class="property__corner-flash">
    @if (in_array($availability, ['SSTC (sales only)', 'SSTC', 'Sold Subject to Contract', 'Sold STC']))
        Sold STC
    @elseif (in_array($availability, ['SSTCM (Scottish sales only)', 'SSTCM']))
        SSTCM
    @elseif (in_array($availability, ['Under Offer (sales only)', 'Under Offer']))
        Under Offer
    @elseif (in_array($availability, ['Let Agreed (lettings only)', 'Let Agreed']))
        Let Agreed
    @elseif (in_array($availability, ['Reserved']))
        Reserved
    @else
        {{ $availability ?? '' }}
    @endif
</div>