<div data-component="PropertiesLoadMore" 
    data-view-name="partials/rest/property-rest-output" 
    data-initialloadno="9"
    data-items-per-page="9"
    data-use-load-more-btn="true"
    data-use-load-more-btn-after-properties-loaded="20" 
    data-per-page-items-using-load-more-btn="9">

    <!--Include info load more component-->
    @include('components/global-load-more-info')

    <div class="tpj_load-more-content"></div>

    <div class="tpj_load-more-no-results" style="display: none;">No posts found</div>

    <div class="tpj_load-more-preloader" style="display: none;">Loading...</div>
    <a href="#" class="tpj_load-more-button" style="display: none;">Load more</a>
</div>
@include('debug/debug')