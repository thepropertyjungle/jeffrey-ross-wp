/*
    ATTENTION
    =========
    This plugin allows the lazy loading of HTML elements.
    All you need to do is apply the class of 'lazy-load-html'
    to any element you wish to lazy load.

    You can enable and disable debugging by setting tpj_debugging
    to true.

    You can also change the negative pixel threshold to make elements
    appear on scroll sooner or later.
*/

(function ($) {
    var tpj_debugging = true; // Set to 'true' to enable debugging, 'false' to disable
    var tpj_pixelThreshold = -250; // Pixel distance from the bottom of the viewport

    $(document).ready(function () {
        $(window).on("scroll", function () {
            $(".lazy-load-html").each(function () {
                if (
                    !$(this).hasClass("loaded") &&
                    isElementNearViewportBottom($(this), tpj_pixelThreshold)
                ) {
                    $(this).addClass("loaded");
                }
            });

            if (tpj_debugging) {
                updateElementStatus();
            }
        });
    });

    // The browser viewport is set from the bottom.
    function isElementNearViewportBottom(el, distanceFromViewportBottom) {
        var rect = el.get(0).getBoundingClientRect();
        var windowHeight =
            window.innerHeight || document.documentElement.clientHeight;

        return (
            rect.top <= windowHeight + distanceFromViewportBottom &&
            rect.bottom > windowHeight
        );
    }

    // Debugging code will add borders around your elements
    function updateElementStatus() {
        $(".lazy-load-html").each(function () {
            var rect = $(this).get(0).getBoundingClientRect();
            var windowHeight =
                window.innerHeight || document.documentElement.clientHeight;

            // Remove any previously set styles
            $(this).removeAttr("style");

            if (rect.bottom < 0 || rect.top > windowHeight) {
                $(this).css({ border: "2px solid red" }); // Style for elements outside the viewport
            } else if (
                isElementNearViewportBottom($(this), tpj_pixelThreshold)
            ) {
                $(this).css({ border: "2px solid green" }); // Style for elements inside the viewport
            } else {
                $(this).css({ border: "2px solid orange" }); // Style for elements near the viewport
            }
        });
    }
})(jQuery);
