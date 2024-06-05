{{--
    ATTENTION
    =========
    /src/scss/partials/copyright.scss

    This file can be used as a shortcode to easily add a
    copyright year and other company specific data on your
    website. The classes included will help you add your
    own custom styles.
--}}

@php
    // Get current year from the server
    $TPJCurrentYear = date("Y");

    // Get the WordPress site name using WP function
    $TPJsiteName = get_bloginfo('name');
@endphp

<span class="tpj_copyright">
    <span class="tpj_copyright__symbol">&copy;</span><span class="tpj_copyright__currentYear">{{ $TPJCurrentYear }}</span><span class="tpj_copyright__siteName">{{ $TPJsiteName }}</div>
</span>