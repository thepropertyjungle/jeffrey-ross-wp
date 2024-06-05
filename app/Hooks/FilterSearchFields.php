<?php
namespace TpjBladeTemplate\Hooks;
if ( ! defined( 'ABSPATH' ) ) exit;

class FilterSearchFields implements IHook {

    static function register() {
        add_filter('property_search_fields', [self::class, 'on_property_search_fields'], 15, 1);
    }

    // property search fields that are searchable
    public static function on_property_search_fields($search_fields): array {
        return [
            'address_1', 'address_2', 'address_3', 'address_4', 'display_address', 
            'town', 'county', 'country', 'price', 'ref', 'featured', 'instruction_type', 
            'postcode', 'property_type', 'bedrooms', 'availability', 'internal_area', 
            'internal_area_unit', 'department', 'price_qualifier', 'rent_frequency', 
            'new_home', 'contract_months'
        ];
    }
}