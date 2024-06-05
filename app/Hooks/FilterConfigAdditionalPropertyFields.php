<?php
namespace TpjBladeTemplate\Hooks;
if ( ! defined( 'ABSPATH' ) ) exit;


class FilterConfigAdditionalPropertyFields implements IHook {

    static function register() {
        add_filter('tpj_theme_additional_property_fields_config', [self::class, 'on_tpj_theme_additional_property_fields_config']);
    }

    static function on_tpj_theme_additional_property_fields_config(?array $config) {
        return [
            [
                'Class' => 'Checkbox',
                'db_key' => 'featured',
                'label' => esc_html__('Featured Property?', 'tpj-textdomain'),
                'value' => '1',
                'description' => 'Make this a featured property',
                'required' => false,
                'colCssClass' => 'col-md-6',
                'is_searchable' => true
            ],
            [
                'Class' => 'RelatedBlogPosts',
                'db_key' => 'blade_related_blog_posts',
                'label' => esc_html__('Related blog posts', 'tpj-textdomain'),
                'value' => '1',
                'description' => 'Link blog posts to this property',
                'colCssClass' => 'col-md-6',
                'is_searchable' => false
            ],
            [
                'Class' => 'TextArea',
                'db_key' => 'additional_text',
                'label' => esc_html__('Additional Text', 'tpj-textdomain'),
                'description' => 'Add additional text for this property',
                'required' => false,
                'colCssClass' => 'col-md-6',
                'is_searchable' => false
            ],
            [
                'Class' => 'TextArea',
                'db_key' => 'owner_quote',
                'label' => esc_html__('Owner Quote', 'tpj-textdomain'),
                'description' => 'Add a quote from the current owner',
                'required' => false,
                'colCssClass' => 'col-md-6',
                'is_searchable' => false
            ],
            // [
            //     'Class' => 'TextInput',
            //     'db_key' => 'test_field_one',
            //     'label' => esc_html__('Demo text', 'tpj-textdomain'),
            //     'description' => 'Demo description',
            //     'required' => false,
            //     'colCssClass' => 'col-md-12',
            //     'is_searchable' => true,
            //     'supports_multiple_value' => true, 
            //     // supports_multiple_value
            //     // used when passing as a shortcode attribute with plus Ex: test_field_one="value1+value2"
            //     // In frontend we can use checkboxes and the URL will look like: ?test_field_one[]=value1&test_field_one[]=value2
            //     // Checkbox example: <input type="checkbox" name="test_field_one[]" value="value1">
            // ],
            // [
            //     'Class' => 'ChooseTaxonomyField',
            //     'db_key' => 'additional_property_types',
            //     'label' => esc_html__('Additional property types', 'tpj-textdomain'),
            //     'description' => 'Choose additional property types ',
            //     'required' => false,
            //     'colCssClass' => 'col-md-12',
            //     'is_searchable' => true,
            //     'supports_multiple_value' => true,
            // ],
            // [
            //     'Class' => 'ChooseTaxonomyField',
            //     'db_key' => 'bullet_points',
            //     'label' => esc_html__('Bullet points', 'tpj-textdomain'),
            //     'description' => 'something ',
            //     'required' => false,
            //     'colCssClass' => 'col-md-12',
            //     'is_searchable' => true,
            //     'supports_multiple_value' => true,
            // ],
            // [
            //     'Class' => 'TextInput',
            //     'db_key' => 'test_field_second',
            //     'label' => esc_html__('Demo text second', 'tpj-textdomain'),
            //     'description' => 'Some description second',
            //     'required' => false,
            //     'colCssClass' => 'col-md-6',
            //     'is_searchable' => false
            // ],
            // [
            //     'Class' => 'Checkbox',
            //     'db_key' => 'test_field_checkbox',
            //     'label' => esc_html__('Demo checkbox', 'tpj-textdomain'),
            //     'value' => '1',
            //     'description' => 'Some description',
            //     'required' => false,
            //     'colCssClass' => 'col-md-6',
            //     'is_searchable' => false
            // ],
            // [
            //     'Class' => 'TextInput',
            //     'db_key' => 'test_field',
            //     'label' => esc_html__('Demo text', 'tpj-textdomain'),
            //     'defaultValue' => 'Hello',
            //     'description' => 'Some description',
            //     'required' => false,
            //     'colCssClass' => 'col-md-6',
            //     'is_searchable' => false
            // ],
            // [
            //     'Class' => 'ImageUpload',
            //     'db_key' => 'test_image',
            //     'label' => esc_html__('Demo image upload', 'tpj-textdomain'),
            //     'description' => 'Some description',
            //     'colCssClass' => 'col-md-6',
            // ],
            // [
            //     'Class' => 'ImageUpload',
            //     'db_key' => 'test_image_second',
            //     'label' => esc_html__('Demo image upload 2', 'tpj-textdomain'),
            //     'description' => 'Some description 2',
            //     'colCssClass' => 'col-md-3',
            //     'is_searchable' => false
            // ],

            // [
            //     'Class' => 'TextArea',
            //     'db_key' => 'test_textarea',
            //     'label' => esc_html__('Demo textarea', 'tpj-textdomain'),
            //     'description' => 'Some description (HTML is allowed)',
            //     'required' => false,
            //     'colCssClass' => 'col-md-9',
            //     'is_searchable' => false
            // ],
        ];
    }
}