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
        wp_enqueue_script('google-maps', "//maps.googleapis.com/maps/api/js?key=AIzaSyBV0iV6dA6C27O90ni2gS0IZaXXDwAvE5s&callback=initMap", array('main'), "1", true);
    }
}