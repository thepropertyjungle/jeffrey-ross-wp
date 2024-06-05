{{--
    ATTENTION
    =========
    Developers won't have to edit anything here.

    Please leave alone.
--}}

@if($shouldOutputDebug)
    <script>
        window.TpjPopupDebugData = {};

        @isset($properties)
        TpjPopupDebugData.properties = <?= json_encode($properties) ?>;
        @endisset

        @if(!isset($development) && isset($property) && !isset($properties))
        TpjPopupDebugData.property = <?= json_encode($property) ?>;
        @endif

        @isset($currentPage)
        TpjPopupDebugData.currentPage = <?= json_encode($currentPage) ?>;
        @endisset

        @isset($max_num_pages)
        TpjPopupDebugData.max_num_pages = <?= json_encode($max_num_pages) ?>;
        @endisset

        @isset($total_posts)
        TpjPopupDebugData.total_posts = <?= json_encode($total_posts) ?>;
        @endisset

        @isset($dynamic_shortcode_data)
        TpjPopupDebugData.dynamic_shortcode_data = <?= json_encode($dynamic_shortcode_data) ?>;
        @endisset

        @isset($developments)
        TpjPopupDebugData.developments = <?= json_encode($developments) ?>;
        @endisset

        @if(isset($development) && !isset($developments))
        TpjPopupDebugData.development = <?= json_encode($development) ?>;
        @endif

        @isset($negotiators)
        TpjPopupDebugData.negotiators = <?= json_encode($negotiators) ?>;
        @endisset

        @if(isset($negotiator) && !isset($negotiators))
        TpjPopupDebugData.negotiator = <?= json_encode($negotiator) ?>;
        @endif

        @isset($branches)
        TpjPopupDebugData.branches = <?= json_encode($branches) ?>;
        @endisset

        @isset($global_options)
        TpjPopupDebugData.global_options = <?= json_encode($global_options) ?>;
        @endisset

        @isset($search)
        TpjPopupDebugData.search = <?= json_encode($search) ?>;
        @endisset

        console.log('Debug data:', TpjPopupDebugData);

    </script>
@endif