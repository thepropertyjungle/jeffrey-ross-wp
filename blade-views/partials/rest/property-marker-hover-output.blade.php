<a href="{{ $property['permalink'] }}" target="_blank" 
style="height: 200px; margin-bottom: 30px; background: #F2F2F2; border: solid 1px #CCC; display: block;">
    @if(is_array($property['images'] ?? '') && count($property['images']) > 0)
    <img style="max-width: 200px;" src="{{ $property['images'][0]['optimised_image_url'] ?? '' }}/268" alt="">
    @endif
        <div class="property-map__meta">
        <div class="property-map__type">
            <h1>
                @if ($property['bedrooms'] == '0') GARAGE / STORAGE @else {{ $property['bedrooms'] }}  Bedroom {{ $property['property_type'] }} @endif For @if ($property['instruction_type'] == 'Letting') Rent @else Sale @endif
            </h1>
        </div>
        <div class="property-map__address">
            <h3>
                {{ $property['Address']['display_address'] ?? '' }}
            </h3>
        </div>        
        <div class="property-price-rooms-group">
            <div class="property-map__price">
                £{{ number_format($property['price']) }} {{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'PW' : 'PCM') : '' }}
                    <span>{{ ($property['price_qualifier'] != 'Default') ? ($property['price_qualifier'] == 'POA' ? 'POA' : $property['price_qualifier']) : '' }}</span>
            </div>                       
        </div>
    </div>
</a>