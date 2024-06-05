<div>
    <a target="_blank" href="{{ $development['permalink'] ?? '' }}"><h3>{{ $development['title'] ?? 'missing title' }}</h3></a>
    <div>
        @if( isset($development['properties']) && count($development['properties']) > 0)
        <div style="margin-bottom: 70px;">
            <h4>Properties</h4>
                @foreach ($development['properties'] as $property)
                    <div>
                        <a target="_blank" href="{{ $property['permalink'] ?? '' }}"><strong>{{ $property['Address']['display_address'] ?? '' }}</strong></a>
                        @if(is_array($property['images'] ?? '') && count($property['images']) > 0)
                            <img style="max-width: 300px;" src="{{ $property['images'][0]['media_url'] ?? '' }}" alt="">
                        @endif
                    </div>
                @endforeach
        </div>
        @endif

        @if( isset($development['marketing_images']) && count($development['marketing_images']) > 0)
        <div style="margin-bottom: 70px;">
            <h4>Marketing images</h4>
            <div style="display: flex; flex-wrap: wrap;">
                @foreach ($development['marketing_images'] as $marketing_image)
                    <img style="max-width: 300px;" src="{{ $marketing_image['media_url'] ?? '' }}" alt="">
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

@include('debug/debug')