<?php namespace OneEyedCat\Core\Models\Event;

require_once(TEMPLATE_DIR . '/core/models/event/model.class.php');
require_once(TEMPLATE_DIR . '/core/models/event/section.class.php');

class Setup
{
    /**
     * Used to initialize class.
     *
     * @return void
     */
    public static function init() {
        self::register_post_types();
    }

    /**
     * Registers all action and filter hooks required for the value
     * component.
     *
     * @return void
     */ 
    private static function register_hooks() {

    }

    private static function register_post_types() {
        $labels = array(
            'name' => 'Events',
            'singular_name' => 'Event',
            'add_new' => 'Add Event',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'new_item' => 'New Event',
            'all_items' => 'All Events',
            'view_item' => 'View Event',
            'search_items' => 'Search Events',
            'not_found' => 'No events found',
            'not_found_in_trash' => 'No events found in the trash',
            'parent_item_colon' => '',
            'menu_name' => 'Events'
        );

        $supports = array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'custom-fields');

        register_post_type('events', array(
            'label' => 'Events',
            'labels' => $labels,
            'public' => true,
            'exclude_from_search' => true,
            'description' => 'Events',
            'menu_icon' => 'dashicons-calendar-alt',
            'supports' => $supports,
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'event',
                'with_front' => false,
                'feeds' => false,
                'pages' => false
            )
        ));
        flush_rewrite_rules();
    }
}