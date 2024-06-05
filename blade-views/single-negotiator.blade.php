<div class="container">
    <div class="negotiator__single-card" style="margin: 6em 0;">
    <div class="row">
        <div class="col-md-4">
            @if($negotiator['has_profile_images'] ?? false)
            @foreach ($negotiator['profile_images'] as $profile_image)
                <img class="negotiator__single-img" src="{{ $profile_image['media_url'] ?? '' }}" alt="">
            @endforeach           
            @endif
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
            <div class="negotiator__job">
                <h5>{{ $negotiator['job_title'] ?? '' }}</h5>
            </div>
            <div class="negotiator__title">
                <h4>{{ $negotiator['first_name'] ?? '' }} {{ $negotiator['last_name'] ?? '' }}</h4>
            </div>
            <div class="negotiator__bio">
                <h4>{{ $negotiator['bio'] ?? '' }}</h4>
            </div>             
        </div>
        <div class="col-md-2 d-flex flex-column justify-content-center align-items-center social-col">
            <h4>Get in touch</h4>
             @if($negotiator['email'] ?? false)
            <a class="negotiator__cta" href="mailto:{{ $negotiator['email'] ?? '' }}">Email {{ $negotiator['first_name'] ?? '' }}</a>  
            @endif  
            @if($negotiator['pj_telephone_number'] ?? false)      
            <a class="negotiator__cta" href="tel:{{ $negotiator['tpj_telephone_number'] ?? '' }}">Call {{ $negotiator['first_name'] ?? '' }} </a>    
            @endif       
        </div>
    </div>            
    </div>
</div>

@include('debug/debug')