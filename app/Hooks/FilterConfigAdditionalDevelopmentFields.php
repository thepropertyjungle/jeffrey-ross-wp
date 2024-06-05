<?php
namespace TpjBladeTemplate\Hooks;
if ( ! defined( 'ABSPATH' ) ) exit;


class FilterConfigAdditionalDevelopmentFields implements IHook {

    static function register() {
        add_filter('tpj_filter_config_additional_development_fields', [self::class, 'on_tpj_filter_config_additional_development_fields']);
    }

    static function on_tpj_filter_config_additional_development_fields(?array $config) {
        return [
            [
                'Class' => 'URLInput',
                'db_key' => 'custom_url',
                'label' => esc_html__('Custom URL', 'tpj-textdomain'),
                'description' => 'Some description',
                'colCssClass' => 'col-md-12',
            ],
            [
                'Class' => 'InputRepeater',
                'db_key' => 'bullet_points',
                'label' => esc_html__('Demo input repeater', 'tpj-textdomain'),
                'description' => 'Use the button below to add entries',
                'colCssClass' => 'col-md-12',
            ],
            [
                'Class' => 'TextInput',
                'db_key' => 'test_field_one_two',
                'label' => esc_html__('Demo text development', 'tpj-textdomain'),
                'description' => 'Some description',
                'required' => false,
                'colCssClass' => 'col-md-6',
            ],
            [
                'Class' => 'TextInput',
                'db_key' => 'test_field_second',
                'label' => esc_html__('Demo text second', 'tpj-textdomain'),
                'description' => 'Some description second',
                'required' => false,
                'colCssClass' => 'col-md-6',
                'is_searchable' => false
            ],
            [
                'Class' => 'Checkbox',
                'db_key' => 'test_field_checkbox',
                'label' => esc_html__('Demo checkbox', 'tpj-textdomain'),
                'value' => '1',
                'description' => 'Some description',
                'required' => false,
                'colCssClass' => 'col-md-6',
                'is_searchable' => false
            ],
            [
                'Class' => 'RelatedBlogPosts',
                'db_key' => 'blade_related_blog_posts',
                'label' => esc_html__('Related blog posts', 'tpj-textdomain'),
                'value' => '1',
                'description' => 'Some description blog posts',
                'colCssClass' => 'col-md-6'
            ],
            [
                'Class' => 'TextInput',
                'db_key' => 'test_field',
                'label' => esc_html__('Demo text', 'tpj-textdomain'),
                'defaultValue' => 'Hello',
                'description' => 'Some description',
                'required' => false,
                'colCssClass' => 'col-md-6',
                'is_searchable' => false
            ],
            [
                'Class' => 'ImageUpload',
                'db_key' => 'test_image',
                'label' => esc_html__('Demo image upload', 'tpj-textdomain'),
                'description' => 'Some description',
                'colCssClass' => 'col-md-6',
            ],
            [
                'Class' => 'TextArea',
                'db_key' => 'test_textarea',
                'label' => esc_html__('Demo textarea', 'tpj-textdomain'),
                'description' => 'Some description (HTML is allowed)',
                'required' => false,
                'colCssClass' => 'col-md-12',
                'is_searchable' => false
            ],
            [
                'Class' => 'ImageUpload',
                'db_key' => 'test_image_second',
                'label' => esc_html__('Demo image upload 2', 'tpj-textdomain'),
                'description' => 'Some description 2',
                'colCssClass' => 'col-md-3',
                'is_searchable' => false
            ],
            [
                'Class' => 'TextArea',
                'db_key' => 'test_textarea_second',
                'label' => esc_html__('Demo textarea', 'tpj-textdomain'),
                'description' => 'Some description (HTML is allowed)',
                'required' => false,
                'colCssClass' => 'col-md-9',
                'is_searchable' => false
            ],
        ];
    }
}