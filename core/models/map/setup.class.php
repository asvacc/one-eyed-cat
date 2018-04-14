<?php namespace OneEyedCat\Core\Models\Map;

require_once(TEMPLATE_DIR . '/core/models/map/section.class.php');

class Setup
{
    /**
     * Used to initialize class.
     *
     * @return void
     */
    public static function init() {
        self::register_hooks();
    }

    /**
     * Registers all action and filter hooks required for the value
     * component.
     *
     * @return void
     */
    private static function register_hooks() {
        wp_enqueue_script('google-maps', "//maps.googleapis.com/maps/api/js?key=" . get_field('google_maps_api_key', 'option') . "&callback=initMap", array('main'), "1", true);
    }
}