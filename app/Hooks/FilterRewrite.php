<?php
namespace TpjBladeTemplate\Hooks;
if ( ! defined( 'ABSPATH' ) ) exit;


class FilterRewrite implements IHook {

    static function register() {
        // override rewrite for properties
        add_filter('property_rewrite_filter', [self::class, 'on_property_rewrite_filter'], 9, 1);
        add_filter('property_post_type_link', [self::class, 'on_property_post_type_link'], 9, 3);
        add_action('after_update_permalink_taxonomies', [self::class, 'on_after_update_permalink_taxonomies'], 11, 2);
        add_action('init', [self::class, 'on_wp_init']);
        // end override rewrite for properties

        // override re-write for developments
        add_filter('development_rewrite_filter', [self::class, 'on_development_rewrite_filter'], 12, 1);
        add_filter('post_type_link', [self::class, 'on_post_type_link'], 10, 3);
        add_filter('rewrite_rules_array', [self::class, 'on_rewrite_rules_array']);
        // end override re-write for developments
    }

    public static function on_wp_init() {
        if (!class_exists('TPJ_OptionUtil')) {
            return;
        }

        if (\TPJ_OptionUtil::getInstance()->isComplexSeoEnabled()) {
            add_rewrite_tag('%tpj_instruction_type_tag%', '([^&/]+)');
            add_rewrite_tag('%tpj_bedrooms%', '([^&/]+)');
            add_rewrite_tag('%tpj_property_type%', '([^&/]+)');
            add_rewrite_tag('%tpj_location%', '([^&/]+)');
            add_rewrite_tag('%tpj_town%', '([^&/]+)');
            add_rewrite_tag('%tpj_postcode%', '([^&/]+)');
        }
    }

    // overide properties single rewrite slug part 1
    public static function on_property_rewrite_filter($rewrite_slug): string {
        if (!class_exists('TPJ_OptionUtil')) {
            return $rewrite_slug;
        }
        $propertiesReWrite = \TPJ_OptionUtil::getInstance()->getPropertiesReWriteSlug();
        if ($rewrite_slug === $propertiesReWrite) {
            if (\TPJ_OptionUtil::getInstance()->isComplexSeoEnabled()) {
                return $rewrite_slug . '%tpj_instruction_type_tag%' . '/%tpj_bedrooms%-%tpj_property_type%-in-%tpj_location%-%tpj_town%-%tpj_postcode%';
            } else {
                return $rewrite_slug . '/%tpj_instruction_type_tax%/%tpj_county_tax%/%tpj_town_tax%';
            }
        }
        return $rewrite_slug;
    }

    public static function on_property_post_type_link(string $post_link, \WP_Post $post, bool $leavename): string {

        if (!class_exists('TPJ_Property_Cpt')) {
            return $post_link;
        }

        if (is_object($post) && $post->post_type === \TPJ_Property_Cpt::getPostType()) {

            if (\TPJ_OptionUtil::getInstance()->isComplexSeoEnabled()) {
                return self::_handle_complex_permalink($post, $post_link);
                // return self::_handle_default_permalink($post, $post_link);
            } else {
                return self::_handle_default_permalink($post, $post_link);
            }
        }
        return $post_link;
    }

    private static function _handle_complex_permalink($post, ?string $post_link): ?string {
        $out = $post_link;
        $post_meta = get_post_meta($post->ID, \TPJ_Property_Cpt::getMetaKey(), true);

        // handle instruction_type
        $instruction_type = $post_meta['instruction_type'] ?? 'missing-instruction';
        $out = str_replace('%tpj_instruction_type_tag%' , 'for-' . strtolower($instruction_type) , $out);

        // handle bedrooms
        $bedrooms_no = $post_meta['bedrooms'] ?? 0;
        $bedrooms_no = (int) $bedrooms_no;
        $bedroom_keyword = '-bedroom';
        if ($bedrooms_no > 1) {
            $bedroom_keyword = '-bedrooms';
        }
        $out = str_replace('%tpj_bedrooms%' , $bedrooms_no . $bedroom_keyword , $out);

        // handle property_type
        $property_type = $post_meta['property_type'] ?? 'missing-property-type';
        $out = str_replace('%tpj_property_type%' , strtolower($property_type) , $out);

        // handle location
        $location = $post_meta['Address']['address_2'] ?? 'missing-location';
        $location = str_replace(' ', '-', $location);
        $out = str_replace('%tpj_location%' , sanitize_title($location) , $out);

        // handle town
        $town = $post_meta['Address']['town'] ?? 'missing-town';
        $town = str_replace(' ', '-', $town);
        $out = str_replace('%tpj_town%' , sanitize_title($town) , $out);

        // handle postcode
        $postcode = $post_meta['Address']['postcode'] ?? 'missing-postcode';
        $postcode_2 = $post_meta['Address']['postcode_2'] ?? '';
        $postcode = str_replace($postcode_2, '', $postcode);
        $postcode = str_replace(' ', '', $postcode);
        $out = str_replace('%tpj_postcode%' , sanitize_title($postcode) , $out);

        return $out;
    }

    private static function _handle_default_permalink($post, ?string $post_link): ?string {
        $out = $post_link;

        $instruction_terms = wp_get_object_terms($post->ID, 'tpj_instruction_type_tax');
        if ($instruction_terms) {
            $out = str_replace('%tpj_instruction_type_tax%' , $instruction_terms[0]->slug , $out);
        } else {
            $out = str_replace('%tpj_instruction_type_tax%', 'uncategorized', $out);
        }
        $county_terms = wp_get_object_terms($post->ID, 'tpj_county_tax');
        if ($county_terms) {
            $out = str_replace('%tpj_county_tax%' , $county_terms[0]->slug , $out);
        } else {
            $out = str_replace('%tpj_county_tax%', 'uncategorized', $out);
        }
        $town_terms = wp_get_object_terms($post->ID, 'tpj_town_tax');
        if ($town_terms) {
            $out = str_replace('%tpj_town_tax%' , $town_terms[0]->slug , $out);
        } else {
            $out = str_replace('%tpj_town_tax%', 'uncategorized', $out);
        }
        return $out;
    }

    public static function on_after_update_permalink_taxonomies($post_id, $post_meta = []) {

        if (!class_exists('TPJ_Property_Cpt')) {
            return;
        }

        if (!$post_id || !isset($post_meta)) {
            return;
        }

        if (get_post_type($post_id) !== \TPJ_Property_Cpt::getPostType()) {
            return;
        }

        $post = get_post($post_id);

        if (!$post) {
            return;
        }

        if (\TPJ_OptionUtil::getInstance()->isComplexSeoEnabled()) {
            self::_update_property_title_complex_permalinks($post, $post_meta);
        } else {
            self::_update_property_title_default($post, $post_meta);
        }
    }

    private static function _update_property_title_default(\WP_Post $post, $post_meta) {
        $tpj_remote_property = get_post_meta($post->ID, 'tpj_remote_property', true);

        if ($tpj_remote_property) {
            $sAddr = sanitize_text_field($post_meta['Address']['display_address'] ?? '');
            $sAddr = $sAddr === '' ? (string) $post->ID : $sAddr;
            
            if ($post->post_title !== $sAddr) {
                $post_update = [
                    'ID'         => $post->ID,
                    'post_title' => $sAddr,
                    'post_name' => ''
                ];
                wp_update_post($post_update);
            }
        } else {

            $sAddr = sanitize_text_field($post_meta['Address']['display_address'] ?? '');
            $sAddr = $sAddr === '' ? (string) $post->ID : $sAddr;

            if ($post->post_title !== $sAddr ) {
                $post_update = [
                    'ID'         => $post->ID,
                    'post_title' => $sAddr,
                    'post_name' => ''
                ];
                wp_update_post($post_update);
            }
        }
    }

    private static function _update_property_title_complex_permalinks(\WP_Post $post) {
        $tpj_remote_property = get_post_meta($post->ID, 'tpj_remote_property', true);

        $post_new_title = null;

        if ($tpj_remote_property) {
            $post_new_title = (string) get_post_meta($post->ID, 'tpj_remote_id', true);

            if ($post_new_title && $post->post_title !== $post_new_title) {
                $post_update = [
                    'ID'         => $post->ID,
                    'post_title' => $post_new_title,
                    'post_name' => ''
                ];
                wp_update_post($post_update, false, false);
            }
        } else {
            $post_new_title = (string) $post->ID;
            if ($post_new_title && $post->post_title !== $post_new_title) {
                $post_update = [
                    'ID'         => $post->ID,
                    'post_title' => $post_new_title,
                    'post_name' => ''
                ];
                wp_update_post($post_update, false, false);
            }
        }
    }

    public static function on_development_rewrite_filter($rewrite_slug): string {
        if (!class_exists('TPJ_DevemopmentsManagerCpt')) {
            return $rewrite_slug;
        }
        $developmentReWrite = \TPJ_OptionUtil::getInstance()->getOption(\TPJ_DevemopmentsManagerCpt::REWRITE_KEY, \TPJ_DevemopmentsManagerCpt::DEFAULT_REWRITE_SLUG);
        return $developmentReWrite . '/%dynamic_part_one%';
    }

    public static function on_post_type_link(string $post_link, \WP_Post $post, bool $leavename) {

        if (!class_exists('TPJ_DevemopmentsManagerCpt')) {
            return $post_link;
        }

        if (is_object($post) && $post->post_type === \TPJ_DevemopmentsManagerCpt::getPostType()) {
            $out = $post_link;
            $out = str_replace('%dynamic_part_one%' , sanitize_title($post->post_title) . 'ssshello' , $out);
            return $out;
        }
        return $post_link;
    }

    static function on_rewrite_rules_array( $rules ): ?array {
        if (!class_exists('TPJ_OptionUtil')) {
            return $rules;
        }
        $developmentReWrite = \TPJ_OptionUtil::getInstance()->getOption(\TPJ_DevemopmentsManagerCpt::REWRITE_KEY, \TPJ_DevemopmentsManagerCpt::DEFAULT_REWRITE_SLUG);
        $new = [];
        $new[$developmentReWrite . '/([^/]+)/(.+)/?$'] = 'index.php?'. \TPJ_DevemopmentsManagerCpt::getPostType() .'=$matches[2]';
        return array_merge( $new, $rules ); // Ensure our rules come first
    }
}