<?php
namespace TpjBladeTemplate\Hooks;
if ( ! defined( 'ABSPATH' ) ) exit;


class FilterConfig implements IHook {

    static function register() {
        add_filter('tpj_theme_main_config', [self::class, 'on_tpj_theme_main_config']);
    }

    static function on_tpj_theme_main_config() {
        return [
            'property_rest_search' => [
                'can_use_blade_html_output' => true,
                'allowed_blade_views' => [
                    'partials/rest/property-rest-output', 
                    'partials/rest/property-marker-hover-output',
                    'partials/rest/map-info-window',
                    'partials/rest/shortlist-property'
                ],
            ],
            'google_maps' => [
                'should_load' => true, 
                'libraries' => ['places', 'drawing']
            ],
            'wp_admin' => [
                'gdpr' => [
                    'show_gdpr_warning' => true,
                    'gdpr_message' => 'Please make sure you have filled in all GDPR data.'
                ]
            ],
            'property_single' => [
                'displays_qr_code' => true,
                'related_properties' => [
                    'include_related_properties' => true,
                    'max_results' => 10,
                    'exact_compare_fields' => [
                        'instruction_type', 
                        // 'bedrooms', 'property_type'
                    ],
                    'min_compare_fields' => [
                        // 'price' => ['fuzz_pc' => 5], 
                        // 'bedrooms' => ['fuzz_pc' => false]
                    ],
                    'max_compare_fields' => [
                        // 'price' => ['fuzz_pc' => 10], 
                        // 'bedrooms' => ['fuzz_pc' => 5]
                    ],
                    'use_similar_outcode' => true,
                    'use_similar_features' => true,
                    'radius_config' => [
                        'use_radius' => true,
                        'distance' => 100,
                        'unit' => 'mi', // Possible values mi | km
                    ]
                ],
            ],
            'property_images_fix_https' => true,
            'property_extra_fields' => [
                'enabled' => true,
                'tab_title' => 'Additional fields',
                'remote_properties_delete_extra_fields_older_than' => 'six_months', // Available keys: one_day, one_week, one_month, three_months, six_months,
                'check_for_additional_data_removal_every' => 'tpj_everytwoweeks', // Available keys: tpj_everyweek, tpj_everytwoweeks
            ],
            'development_extra_fields' => [
                'enabled' => true,
                'tab_title' => 'Additional fields'
            ],
            'development_single' => [
                'displays_qr_code' => true
            ],
            'lead_pro' => [
                'uses_gravity_forms_webhook' => true
            ],
            // local_custom_image_sizes you can leave an empty array if no custom sizes are needed
            'local_custom_image_sizes' => [
                // [
                //     'key' => 'tpj-listing-card-image',
                //     'width' => 400,
                //     'height' => 0,
                //     'crop' => false
                // ],
                // [
                //     'key' => 'tpj-listing-single-slider-image',
                //     'width' => 700,
                //     'height' => 0,
                //     'crop' => false
                // ]
            ],
            'excluded_stc_values' => [
                'SSTC (sales only)', 'SSTC', 'Sold Subject to Contract', 'Sold STC', 'SSTCM (Scottish sales only)', 'SSTCM', 'Under Offer (sales only)', 'Under Offer', 'Let Agreed (lettings only)', 'Let Agreed', 'Reserved'
            ],
            'excluded_sold_let_values' => [
                'Sold', 'Let', 'Exchanged', 'Completed', 'Withdrawn'
            ],
            'search' => [
                'property' => [
                    'use_custom_model' => false,
                    'custom_model_class' => '\TpjBladeTemplate\Models\Property'
                ]
            ]
        ];
    }
}