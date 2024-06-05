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
    @if(isset($dropdown) && $dropdown)
    <nav aria-label="Search Results Navigation">
        <ul class="pagination">
            {{-- Render first page link if available --}}
            @isset($paginate['firstPageUrl'])
                <li class='page-item'>
                    <a href="{{ $paginate['firstPageUrl'] }}" class='page-link' aria-label="First Page">&laquo;</a>
                </li>
            @endisset

            {{-- Render previous page link if available --}}
            @isset($paginate['previousPageUrl'])
                <li class='page-item'>
                    <a href="{{ $paginate['previousPageUrl'] }}" class='page-link' aria-label="Previous">&lsaquo;</a>
                </li>
            @endisset

            {{-- Render select element for page links --}}
            @if(is_array($paginate['pages'] ?? ''))
                <li class="page-item">
                    <select class="pagination-select" onchange="window.location.href = this.value;">
                        @foreach ($paginate['pages'] as $page)
                            <option value="{{ $page['pageUrl'] }}"
                                {{ $page['active_class'] === 'active' ? 'selected' : '' }}>
                                {{ $page['pageNo'] }}
                            </option>
                        @endforeach
                    </select>
                </li>
            @endif

            {{-- Render next page link if available --}}
            @isset($paginate['nextPageUrl'])
                <li class='page-item'>
                    <a href="{{ $paginate['nextPageUrl'] }}" class='page-link' aria-label="Next">&rsaquo;</a>
                </li>
            @endisset

            {{-- Render last page link if available --}}
            @isset($paginate['lastPageUrl'])
                <li class='page-item'>
                    <a href="{{ $paginate['lastPageUrl'] }}" class='page-link' aria-label="Last Page">&raquo;</a>
                </li>
            @endisset
        </ul>
    </nav>
    @else
    <nav aria-label="Search Results Navigation">
        <ul class="pagination">
            {{-- Render first page link if available --}}
            @isset($paginate['firstPageUrl'])
                <li class='page-item'>
                    <a href="{{ $paginate['firstPageUrl'] }}" class='page-link' aria-label="First Page">&laquo;</a>
                </li>
            @endisset

            {{-- Render previous page link if available --}}
            @isset($paginate['previousPageUrl'])
                <li class='page-item'>
                    <a href="{{ $paginate['previousPageUrl'] }}" class='page-link' aria-label="Previous">&lsaquo;</a>
                </li>
            @endisset

            {{-- Render page links --}}
            @if(is_array($paginate['pages'] ?? ''))
                @foreach ($paginate['pages'] as $page)
                    <li class="page-item {{ $page['active_class'] }}">
                        <a href="{{ $page['pageUrl'] }}" class='page-link'>{{ $page['pageNo'] }}</a>
                    </li>
                @endforeach
            @endif

            {{-- Render next page link if available --}}
            @isset($paginate['nextPageUrl'])
                <li class='page-item'>
                    <a href="{{ $paginate['nextPageUrl'] }}" class='page-link' aria-label="Next">&rsaquo;</a>
                </li>
            @endisset

            {{-- Render last page link if available --}}
            @isset($paginate['lastPageUrl'])
                <li class='page-item'>
                    <a href="{{ $paginate['lastPageUrl'] }}" class='page-link' aria-label="Last Page">&raquo;</a>
                </li>
            @endisset
        </ul>
    </nav>
    @endif
@endif