<a href="{{ $property['permalink'] }}" target="_blank" 
style="height: 200px; margin-bottom: 30px; background: #F2F2F2; border: solid 1px #CCC; display: block;">
    @if(is_array($property['images'] ?? '') && count($property['images']) > 0)
    <img style="max-width: 200px;" src="{{ $property['images'][0]['media_url'] ?? '' }}" alt="">
    @endif
    <span>{{ $property['Address']['display_address'] ?? '' }}</span>
</a>