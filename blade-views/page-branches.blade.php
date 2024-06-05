<div class="tpj-container">
    <h2>Branches<h2>
    @if(count($branches) > 0)

        <h2>Showing {{ count($branches) }} branches</h2>

        <div style="margin-bottom: 50px;">
            @foreach ($branches as $branch)
                <h3>Branch: {{ $branch['name'] ?? '' }}</h3>
            @endforeach
        </div>
        
    @else
        <p>No branches found.</p>
    @endif
</div>

@include('debug/debug')