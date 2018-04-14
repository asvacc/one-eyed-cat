<?php namespace OneEyedCat\Core\Models\Artist;

require_once(TEMPLATE_DIR . '/core/models/artist/model.class.php');

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
            'name' => 'Artists',
            'singular_name' => 'Artist',
            'add_new' => 'Add Artist',
            'add_new_item' => 'Add New Artist',
            'edit_item' => 'Edit Artist',
            'new_item' => 'New Artist',
            'all_items' => 'All Artists',
            'view_item' => 'View Artists',
            'search_items' => 'Search Artists',
            'not_found' => 'No artists found',
            'not_found_in_trash' => 'No artists found in the trash',
            'parent_item_colon' => '', 
            'menu_name' => 'Artist'
        );

        $supports = array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'custom-fields');

        register_post_type('artists', array(
            'label' => 'Artist',
            'labels' => $labels,
            'public' => true,
            'exclude_from_search' => true, 
            'description' => 'Artist',
            'menu_icon' => 'dashicons-admin-users',
            'supports' => $supports,
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'artist',
                'with_front' => false,
                'feeds' => false,
                'pages' => false
            )
        ));
        flush_rewrite_rules();
    }
}