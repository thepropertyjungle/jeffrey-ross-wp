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
