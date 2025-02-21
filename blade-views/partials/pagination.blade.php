{{--
    ATTENTION
    =========
    You have choices here. You can choose to render the pagination as
    a dropdown/select element if you wish. The default is the standard
    Bootstrap pagination.

    In order to render the pagination in a select, use the following in
    your pagination include:

    @include('partials/pagination', [
        'dropdown' => 'true'
    ])
--}}



@if($paginate['hasPagination'] ?? false)
<nav aria-label="Search Results Navigation">
    <div class="pagination-thumbs  justify-content-between align-items-center">


      

    <div class="d-flex flex-row justify-content-center align-items-center page-numbers">
    @if(!empty($paginate['pages']) && is_array($paginate['pages']))
        @php
            // Retrieve the total number of pages directly from pagination data
            $totalPages = $paginate['totalPages'] ?? (isset($paginate['last_page']) ? $paginate['last_page'] : max(array_column($paginate['pages'], 'pageNo')));

            // Find the current active page
            $currentPage = collect($paginate['pages'])->firstWhere('active_class', 'active');
        @endphp
        @if($currentPage)
            <div class="page-info">
                Page {{ $currentPage['pageNo'] }} / {{ $totalPages }}
            </div>
        @endif
    @endif
</div>


    <div class="d-flex prevnext flex-row justify-content-center align-items-center button-box">


        <div class="d-flex flex-row justify-content-center align-items-center button-box">
            {{-- Render previous page divnk if available --}}
            @isset($paginate['previousPageUrl'])
            <div class='page-item prev-page-item'>
                <a href="{{ $paginate['previousPageUrl'] }}" class='page-divnk' aria-label="Previous">
                    <span class="pagination-name">Prev</span></a>
            </div>
            @endisset
        </div>


        <div class="d-flex flex-row justify-content-center align-items-center button-box">
            {{-- Render next page divnk if available --}}
            @isset($paginate['nextPageUrl'])
            <div class='page-item next-page-item'>
                <a href="{{ $paginate['nextPageUrl'] }}" class='page-divnk' aria-label="Next"><span
                        class="pagination-name">Next</span></a>
            </div>
            @endisset
        </div>

    </div>


    </div>
</nav>
@endif