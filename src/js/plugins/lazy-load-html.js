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


//change height of description on property single
document.addEventListener('DOMContentLoaded', function() {
    const description = document.querySelector('.description');
    const readButton = document.querySelector('.read');

    readButton.addEventListener('click', function() {
      description.classList.toggle('height');
    });
  });


    $(document).ready(function(){
        $('.slider').slick({
          // Add your Slick options here
          
          
          slidesToShow: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          arrows: true,
          prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
          nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
          responsive: [
            {
              breakpoint: 1024, // Adjust the breakpoint as needed
              settings: {
                slidesToShow: 1 // Change slidesToShow to 1 on mobile devices
              }
            }
          ]
        });
    });


    $(document).ready(function() {
        // Function to toggle visibility based on checkboxes
        function toggleVisibility() {
            if ($('#forSaleCheckbox').is(':checked')) {
                $('.featured-prop').show();
                $('.featured-rent').hide();
            } else if ($('#forRentCheckbox').is(':checked')) {
                $('.featured-prop').hide();
                $('.featured-rent').show();
            }
        }

        // Initially trigger the toggle function
        toggleVisibility();

        // Add event listeners to checkboxes
        $('#forSaleCheckbox').on('change', function() {
            if ($(this).is(':checked')) {
                $('#forRentCheckbox').prop('checked', false);
            } else {
                $('#forRentCheckbox').prop('checked', true);
            }
            toggleVisibility();
        });

        $('#forRentCheckbox').on('change', function() {
            if ($(this).is(':checked')) {
                $('#forSaleCheckbox').prop('checked', false);
            } else {
                $('#forSaleCheckbox').prop('checked', true);
            }
            toggleVisibility();
        });
    });


    $(document).ready(function () {
        // Toggle visibility based on the selected radio button
        $('input[name="propertyType"]').on('change', function () {
            if ($('#ltteRadio').is(':checked')) {
                $('#ltteContent').show();
                $('#stampContent').hide();
            } else if ($('#stampRadio').is(':checked')) {
                $('#ltteContent').hide();
                $('#stampContent').show();
            }
        });
    });









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
