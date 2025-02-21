<?php
require __DIR__ . '/vendor/autoload.php';

use TpjBladeTemplate\App;
use TpjBladeTemplate\Hooks\HooksFactory;
use TpjBladeTemplate\Hooks\FilterConfig;
use TpjBladeTemplate\Hooks\FilterConfigAdditionalDevelopmentFields;
use TpjBladeTemplate\Hooks\FilterConfigAdditionalPropertyFields;

(new App())->start();

// Edit main config here
HooksFactory::registerHook(FilterConfig::class);

// Edit property additional fields config here
HooksFactory::registerHook(FilterConfigAdditionalPropertyFields::class);

// Edit developments additional fields config here
HooksFactory::registerHook(FilterConfigAdditionalDevelopmentFields::class);

// Edit override permalinks
// use TpjBladeTemplate\Hooks\FilterRewrite;
// HooksFactory::registerHook(FilterRewrite::class);

// Edit override searchable fields
// use TpjBladeTemplate\Hooks\FilterSearchFields;
// HooksFactory::registerHook(FilterSearchFields::class);

/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

    /*
        ATTENTION
        =========
        The child theme includes Bootstrap as a node module. Please make sure that
        you install all required packages in the Prepros 'Packages' tab before
        starting development.

        If you update the Bootstrap version for your theme, please save 
        /src/scss/vendor/bootstrap.scss to provoke Prepros to recompile
        the latest version of Bootstrap's CSS
    */
    wp_enqueue_style(
        'bootstrap',
        get_stylesheet_directory_uri() . '/dist/css/vendor/bootstrap.css',
        array(),
        filemtime(get_stylesheet_directory() . '/dist/css/vendor/bootstrap.css') // Use file modification time
    );

    /*
        ATTENTION
        =========
        This is the default style.css file being added to the theme.

        Please use the provided SCSS files for your custom themes styles.
    */
    wp_enqueue_style(
        'hello-elementor-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('hello-elementor-theme-style'),
        filemtime(get_stylesheet_directory() . '/style.css') // Use file modification time
    );

    /*
        ATTENTION
        =========
        The child theme includes Bootstrap as a node module. Please make sure that
        you install all required packages in the Prepros 'Packages' tab before
        starting development.

        If you update the Bootstrap version for your theme, please save
        /src/js/vendor/bootstrap.js to provoke Prepros to recompile the
        latest version of Bootstrap's JavaScript
    */
    wp_enqueue_script(
        'bootstrap',
        get_stylesheet_directory_uri() . '/dist/js/vendor/bootstrap.js',
        array(),
        filemtime(get_stylesheet_directory() . '/dist/js/vendor/bootstrap.js'), // Use file modification time
        true // Load just before </body>
    );


    /*
        ATTENTION
        =========
        This file can be used for theme-specific JavaScript functions.

        Please use /src/js/site.js
    */
    wp_enqueue_script(
        'site',
        get_stylesheet_directory_uri() . '/dist/js/site.js',
        array(),
        filemtime(get_stylesheet_directory() . '/dist/js/site.js'), // Use file modification time
        true // Load just before </body>
    );
}

add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );




// Function to add class to body based on ACF true/false field
function add_home_class_to_body() {
    // Check if ACF function exists (to avoid errors if ACF is not active)
    if (function_exists('get_field')) {
        // Get the value of the ACF true/false field
        $is_header = get_field('navy_header');

        // Add 'navy' class to body if ACF field is true
        if ($is_header) {
            add_filter('body_class', function($classes) {
                $classes[] = 'navy';
                return $classes;
            });
        }
    }
}
add_action('wp_head', 'add_home_class_to_body');


function custom_svg_icon_shortcode() {
    return '
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 40 40" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.66553 2.50345C1.66553 2.04324 2.0386 1.67017 2.49881 1.67017H15.8313C16.2915 1.67017 16.6646 2.04324 16.6646 2.50345C16.6646 2.96366 16.2915 3.33673 15.8313 3.33673H3.33209V15.836C3.33209 16.2962 2.95902 16.6693 2.49881 16.6693C2.0386 16.6693 1.66553 16.2962 1.66553 15.836V2.50345Z" fill="white"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M37.4968 1.67041C37.957 1.67041 38.3301 2.04348 38.3301 2.50369V15.8362C38.3301 16.2964 37.957 16.6695 37.4968 16.6695C37.0366 16.6695 36.6635 16.2964 36.6635 15.8362V4.51541L27.1492 14.0297C26.8238 14.3552 26.2962 14.3552 25.9707 14.0297C25.6453 13.7043 25.6453 13.1767 25.9707 12.8513L35.4851 3.33698H24.1643C23.7041 3.33698 23.331 2.9639 23.331 2.50369C23.331 2.04348 23.7041 1.67041 24.1643 1.67041H37.4968Z" fill="white"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.49881 38.3345C2.0386 38.3345 1.66553 37.9614 1.66553 37.5012V24.1687C1.66553 23.7085 2.0386 23.3354 2.49881 23.3354C2.95902 23.3354 3.33209 23.7085 3.33209 24.1687V35.4895L12.3256 26.4959C12.651 26.1705 13.1786 26.1705 13.5041 26.4959C13.8295 26.8214 13.8295 27.349 13.5041 27.6744L4.51053 36.6679H15.8313C16.2915 36.6679 16.6646 37.041 16.6646 37.5012C16.6646 37.9614 16.2915 38.3345 15.8313 38.3345H2.49881Z" fill="white"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M38.3301 37.5012C38.3301 37.9614 37.957 38.3345 37.4968 38.3345H24.1643C23.7041 38.3345 23.331 37.9614 23.331 37.5012C23.331 37.041 23.7041 36.6679 24.1643 36.6679H36.6635V24.1687C36.6635 23.7085 37.0366 23.3354 37.4968 23.3354C37.957 23.3354 38.3301 23.7085 38.3301 24.1687V37.5012Z" fill="white"/>
        </svg>
    ';
}
add_shortcode('custom_svg_icon', 'custom_svg_icon_shortcode');






function get_team_member_phone() {
    if (get_post_type() === 'team') {
        $phone_number = get_field('phone_number'); // Get the ACF field value
        if ($phone_number) {
            return esc_html($phone_number);
        }
    }
    return ''; // Return empty if not on a 'team' post type
}
add_shortcode('team_phone', 'get_team_member_phone');
