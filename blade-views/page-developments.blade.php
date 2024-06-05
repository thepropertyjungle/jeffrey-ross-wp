<div class="tpj-container">
    <h2>Developments<h2>
    @if(count($developments) > 0)

        <h2>Showing {{ count($developments) }} developments</h2>

        <div style="margin-bottom: 50px;">
            @foreach ($developments as $development)
                @include('partials/development')
            @endforeach
        </div>
        
    @else
        <p>No developments found within that search criteria.</p>
    @endif
</div>

@include('debug/debug')