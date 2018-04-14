<?php namespace OneEyedCat\Core\Models\Beer;

require_once(TEMPLATE_DIR . '/core/models/beer/model.class.php');

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
            'name' => 'Beers',
            'singular_name' => 'Beer',
            'add_new' => 'Add Beer',
            'add_new_item' => 'Add New Beer',
            'edit_item' => 'Edit Beer',
            'new_item' => 'New Beer',
            'all_items' => 'All Beers',
            'view_item' => 'View Beer',
            'search_items' => 'Search Beers',
            'not_found' => 'No beers found',
            'not_found_in_trash' => 'No beers found in the trash',
            'parent_item_colon' => '', 
            'menu_name' => 'Beers'
        );

        $supports = array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'custom-fields');

        register_post_type('beers', array(
            'label' => 'Beers',
            'labels' => $labels,
            'public' => true,
            'exclude_from_search' => true,
            'description' => 'Beers',
            'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg width="18" height="18" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path fill="black" d="M704 896v-384h-256v256q0 53 37.5 90.5t90.5 37.5h128zm1024 448v192h-1152v-192l128-192h-128q-159 0-271.5-112.5t-112.5-271.5v-320l-64-64 32-128h480l32-128h960l32 192-64 32v800z"/></svg>'),
            'supports' => $supports,
            'has_archive' => false,
            'publicly_queryable'=>false,
            'rewrite' => array(
                'slug' => 'beer',
                'with_front' => false,
                'feeds' => false,
                'pages' => false
            )
        ));
        flush_rewrite_rules();
    }
}