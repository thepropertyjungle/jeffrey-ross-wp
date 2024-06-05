{{--
    ATTENTION
    =========
    This is a universal video embed component.
    The idea is to remove any issues with varying
    URLs from both YouTube and Vimeo.

    You can use it by including the component and
    adding some parameters, for example:

    @include('components/video-embed', [
        'videoUrl' => $property['virtual_tours'][0]['media_url'],
        'title' => $property['Address']['display_address']
    ])
--}}

@php
    function getEmbedUrl($url) {
        $youtubePattern = '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&?\/]+)/';
        $vimeoPattern = '/vimeo\.com\/(\d+)/';

        if (preg_match($youtubePattern, $url, $matches)) {
            return "https://www.youtube.com/embed/" . $matches[1];
        } elseif (preg_match($vimeoPattern, $url, $matches)) {
            return "https://player.vimeo.com/video/" . $matches[1];
        } else {
            return "Invalid URL";
        }
    }

    $embedUrl = getEmbedUrl($videoUrl);
@endphp

@if($embedUrl !== 'Invalid URL')
    <iframe loading="lazy" src="{{ $embedUrl }}" title="Video for {{ $title ?? '' }}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
@else
    <p>Invalid video URL provided.</p>
@endif
