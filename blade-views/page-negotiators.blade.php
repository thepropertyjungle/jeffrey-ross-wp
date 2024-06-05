<div class="container">
    <!-- <h2>Negotiators<h2> -->
    @if(count($negotiators) > 0)

        <!-- <h2>Showing {{ count($negotiators) }} negotiators</h2> -->

        <div class="row">
            @foreach ($negotiators as $negotiator)
                <div class="col-lg-4">
                    @if($negotiator['has_profile_images'] ?? false)
                    <a href="{{ $negotiator['permalink'] ?? '' }}" >
                        <div class="negotiator__card">
                            <img class="negotiator__img" src="{{ $negotiator['profile_images'][0]['media_url'] ?? '' }}" alt="">
                            <div class="negotiator__meta">
                            <div class="negotiator__job">
                                <h5>{{ $negotiator['job_title'] ?? '' }}</h5>
                            </div>
                            <div class="negotiator__title">
                                <h4>{{ $negotiator['first_name'] ?? '' }} {{ $negotiator['last_name'] ?? '' }}</h4>
                            </div>
                            </div>
                            <!-- <div class="negotiator__bio">
                                <h4>{{ $negotiator['bio'] ?? '' }}</h4>
                            </div> -->
                        </div>
                    </a>    
                    @endif
                </div>
            @endforeach
        </div>
        
    @else
        <p>No negotiators found.</p>
    @endif
</div>

@include('debug/debug')