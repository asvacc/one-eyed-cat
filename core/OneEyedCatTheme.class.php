<?php namespace OneEyedCat\Core;


require_once(TEMPLATE_DIR . '/core/widgets/textarea.class.php');
require_once(TEMPLATE_DIR . '/core/models/Setup.class.php');
require_once(TEMPLATE_DIR . '/core/models/Sections.class.php');

class OneEyedCatTheme 
{
 
    public function __construct() { }

    public function Init(){
        add_theme_support( 'post-thumbnails' );
        add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueue_scripts'));
        add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueue_styles'));
        add_action('init', array(__CLASS__, 'register_menus') );
        add_action('widgets_init', array(__CLASS__, 'register_widgets') );
        add_action('init', array('\OneEyedCat\Core\Models\Setup', 'init'));
        add_action('init', array(__CLASS__, 'initialize_other'));
        add_action('init', array(__CLASS__, 'initialize_acf'));
        add_action('init', array(__CLASS__, 'initalize_shortcodes'));
    }

    public function register_menus(){
        register_nav_menus(
            array(
                'desktop-menu' => __( 'Primary Navigation' ),
                'mobile-menu' => __( 'Mobile Navigation' ),
                'mobile-menu-icons' => __('Mobile Navigation Icons')
            )
        );
    }

    /**
     * Enqueue scripts for the theme
     */
    public function enqueue_scripts(){
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', TEMPLATE_DIR_URI . '/js/jquery.min.js');
        wp_enqueue_script('headhesive', TEMPLATE_DIR_URI . '/js/headhesive.min.js', array('jquery'));
        wp_enqueue_script('scrollTo', TEMPLATE_DIR_URI . '/js/jquery.scrollTo.min.js', array('jquery'));
        wp_enqueue_script('main', TEMPLATE_DIR_URI . '/js/main.js', array('jquery', 'headhesive', 'scrollTo'));
    }

    /**
     * Enqueue styles for the theme
     */
    public  function enqueue_styles(){
        wp_enqueue_style('main', TEMPLATE_DIR_URI . '/css/all.css');
        wp_enqueue_style('google-font-stint', '//fonts.googleapis.com/css?family=Stint+Ultra+Expanded');
        wp_enqueue_style('google-font-pontano', '//fonts.googleapis.com/css?family=Pontano+Sans');
        wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.0.8/css/all.css');
    }

    public function register_widgets(){

        $defaults = array(
            'before_title'  => '<h4>',
            'after_title'   => '</h4>'
        );

        $sidebars = array(
            array(
                'name'          => 'Footer Column 1',
                'id'            => 'footer_column_1',
                'description'   => 'Footer Column 1',
            ),
            array(
                'name'          => 'Footer Column 2',
                'id'            => 'footer_column_2',
                'description'   => 'Footer Column 2'
            ),
            array(
                'name'          => 'Footer Column 3',
                'id'            => 'footer_column_3',
                'description'   => 'Footer Column 3'
            ),
            array(
                'name'          => 'Footer Column 4',
                'id'            => 'footer_column_4',
                'description'   => 'Footer Column 4'
            )
        );

        foreach($sidebars as $args){
            $sidebar = wp_parse_args($args, $defaults);
            register_sidebar($sidebar);
        }

        register_widget('textarea_widget');
    }

    /**
     * Initialize custom posts types
     */
    public function initialize_acf(){
        acf_add_options_page(array(
            'page_title' 	=> 'Theme Settings',
            'menu_title'	=> 'Theme Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));

        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_5ad140145de51',
                'title' => 'Artist',
                'fields' => array(
                    array(
                        'key' => 'field_5ad1409329604',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_5ad1401629600',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'field_5ad1402e29601',
                        'label' => 'Social Media',
                        'name' => 'social_media',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'block',
                        'button_label' => 'Add Social Media',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5ad1403d29602',
                                'label' => 'Website',
                                'name' => 'website',
                                'type' => 'select',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '40',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'choices' => array(
                                    'facebook' => 'Facebook',
                                    'instagram' => 'Instagram',
                                    'twitter' => 'Twitter',
                                    'youtube' => 'YouTube',
                                ),
                                'default_value' => array(
                                ),
                                'allow_null' => 1,
                                'multiple' => 0,
                                'ui' => 0,
                                'ajax' => 0,
                                'return_format' => 'value',
                                'placeholder' => '',
                            ),
                            array(
                                'key' => 'field_5ad1406f29603',
                                'label' => 'Link',
                                'name' => 'link',
                                'type' => 'url',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '60',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'artists',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => array(
                    0 => 'the_content',
                    1 => 'excerpt',
                    2 => 'custom_fields',
                    3 => 'discussion',
                    4 => 'comments',
                    5 => 'author',
                    6 => 'format',
                    7 => 'page_attributes',
                    8 => 'featured_image',
                    9 => 'categories',
                    10 => 'tags',
                    11 => 'send-trackbacks',
                ),
                'active' => 1,
                'description' => '',
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_5ad13d04317c8',
                'title' => 'Beer',
                'fields' => array(
                    array(
                        'key' => 'field_5ad23b9fc28bd',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'instructions' => 'This won\'t be used if the Artist is populated.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_5ad13d52a97d5',
                        'label' => 'Beer Type',
                        'name' => 'beer_type',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5ad13d61a97d6',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'field_5ad13d71a97d7',
                        'label' => 'ABV',
                        'name' => 'abv',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '%',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_5ad13d87a97d8',
                        'label' => 'IBU',
                        'name' => 'ibu',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => 'IBU',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_5ad140d950ac8',
                        'label' => 'Artist',
                        'name' => 'artist',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'artists',
                        ),
                        'taxonomy' => array(
                        ),
                        'allow_null' => 1,
                        'multiple' => 0,
                        'return_format' => 'id',
                        'ui' => 1,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'beers',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => array(
                    0 => 'permalink',
                    1 => 'the_content',
                    2 => 'excerpt',
                    3 => 'custom_fields',
                    4 => 'discussion',
                    5 => 'comments',
                    6 => 'revisions',
                    7 => 'slug',
                    8 => 'author',
                    9 => 'format',
                    10 => 'page_attributes',
                    11 => 'featured_image',
                    12 => 'categories',
                    13 => 'tags',
                    14 => 'send-trackbacks',
                ),
                'active' => 1,
                'description' => '',
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_5ad1449244b3b',
                'title' => 'Beer Page',
                'fields' => array(
                    array(
                        'key' => 'field_5ad16d253525e',
                        'label' => 'Content',
                        'name' => 'top_content',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'field_5ad1449443763',
                        'label' => 'Mainstays',
                        'name' => 'mainstays',
                        'type' => 'relationship',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'beers',
                        ),
                        'taxonomy' => array(
                        ),
                        'filters' => array(
                            0 => 'search',
                            1 => 'post_type',
                            2 => 'taxonomy',
                        ),
                        'elements' => '',
                        'min' => '',
                        'max' => '',
                        'return_format' => 'object',
                    ),
                    array(
                        'key' => 'field_5ad144ae43764',
                        'label' => 'Seasonals',
                        'name' => 'seasonals',
                        'type' => 'relationship',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'beers',
                        ),
                        'taxonomy' => array(
                        ),
                        'filters' => array(
                            0 => 'search',
                            1 => 'post_type',
                            2 => 'taxonomy',
                        ),
                        'elements' => '',
                        'min' => '',
                        'max' => '',
                        'return_format' => 'object',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-beers.php',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => array(
                    0 => 'the_content',
                ),
                'active' => 1,
                'description' => '',
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_5ad019a54cc07',
                'title' => 'Event',
                'fields' => array(
                    array(
                        'key' => 'field_5ad019c583ee1',
                        'label' => 'Event Image',
                        'name' => 'event_image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_5ad019ee83ee3',
                        'label' => 'Event Date',
                        'name' => 'event_date',
                        'type' => 'date_picker',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'F j, Y',
                        'return_format' => 'F j, Y',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_5ad019cb83ee2',
                        'label' => 'Event Details',
                        'name' => 'event_details',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'events',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => array(
                    0 => 'permalink',
                    1 => 'the_content',
                    2 => 'excerpt',
                    3 => 'custom_fields',
                    4 => 'discussion',
                    5 => 'comments',
                    6 => 'revisions',
                    7 => 'slug',
                    8 => 'author',
                    9 => 'format',
                    10 => 'page_attributes',
                    11 => 'featured_image',
                    12 => 'categories',
                    13 => 'tags',
                    14 => 'send-trackbacks',
                ),
                'active' => 1,
                'description' => '',
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_5acec80e215c5',
                'title' => 'Every Page Fields',
                'fields' => array(
                    array(
                        'key' => 'field_5acec81f5a5cb',
                        'label' => 'Page Customizations',
                        'name' => 'page_customizations',
                        'type' => 'group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5acec8405a5cc',
                                'label' => 'Header Background',
                                'name' => 'header_background',
                                'type' => 'image',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'return_format' => 'url',
                                'preview_size' => 'thumbnail',
                                'library' => 'all',
                                'min_width' => '',
                                'min_height' => '',
                                'min_size' => '',
                                'max_width' => '',
                                'max_height' => '',
                                'max_size' => '',
                                'mime_types' => '',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '!=',
                            'value' => 'default',
                        ),
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'page',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => array(
                    0 => 'the_content',
                    1 => 'discussion',
                    2 => 'comments',
                    3 => 'send-trackbacks',
                ),
                'active' => 1,
                'description' => '',
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_5acea3b1e025c',
                'title' => 'Home Page Header Carousel',
                'fields' => array(
                    array(
                        'key' => 'field_5acea3b8f4931',
                        'label' => 'Header Carousel',
                        'name' => 'header_carousel',
                        'type' => 'group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5acec36615ff8',
                                'label' => 'Animation Speed',
                                'name' => 'animation_speed',
                                'type' => 'number',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => 5000,
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'min' => 3000,
                                'max' => 10000,
                                'step' => 500,
                            ),
                            array(
                                'key' => 'field_5acec39f15ff9',
                                'label' => 'Background Images',
                                'name' => 'background_images',
                                'type' => 'repeater',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'collapsed' => '',
                                'min' => 0,
                                'max' => 0,
                                'layout' => 'table',
                                'button_label' => '',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_5acec3a715ffa',
                                        'label' => 'Background Image',
                                        'name' => 'background_image',
                                        'type' => 'image',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'return_format' => 'url',
                                        'preview_size' => 'thumbnail',
                                        'library' => 'all',
                                        'min_width' => '',
                                        'min_height' => '',
                                        'min_size' => '',
                                        'max_width' => '',
                                        'max_height' => '',
                                        'max_size' => '',
                                        'mime_types' => '',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-home.php',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_5ad172d68af15',
                'title' => 'Theme Settings',
                'fields' => array(
                    array(
                        'key' => 'field_5ad172df7511c',
                        'label' => 'Google Maps API Key',
                        'name' => 'google_maps_api_key',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'theme-general-settings',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_5ace8ef11b4b6',
                'title' => 'Page Content',
                'fields' => array(
                    array(
                        'key' => 'field_5ace8ef545dc4',
                        'label' => 'Sections',
                        'name' => 'sections',
                        'type' => 'flexible_content',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layouts' => array(
                            '5ace8f0b9f2eb' => array(
                                'key' => '5ace8f0b9f2eb',
                                'name' => 'wysiwyg',
                                'label' => 'WYSIWYG',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_5ad0135e3388f',
                                        'label' => 'Background',
                                        'name' => 'background',
                                        'type' => 'select',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'choices' => array(
                                            'white' => 'White',
                                            'black' => 'Black',
                                        ),
                                        'default_value' => array(
                                            0 => 'white',
                                        ),
                                        'allow_null' => 0,
                                        'multiple' => 0,
                                        'ui' => 0,
                                        'ajax' => 0,
                                        'return_format' => 'value',
                                        'placeholder' => '',
                                    ),
                                    array(
                                        'key' => 'field_5ace92ea031d0',
                                        'label' => 'Content',
                                        'name' => 'content',
                                        'type' => 'wysiwyg',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'tabs' => 'all',
                                        'toolbar' => 'full',
                                        'media_upload' => 1,
                                        'delay' => 0,
                                    ),
                                ),
                                'min' => '',
                                'max' => '',
                            ),
                            '5aceb015c71eb' => array(
                                'key' => '5aceb015c71eb',
                                'name' => 'call_to_action',
                                'label' => 'Call To Action',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_5aceb025c71ec',
                                        'label' => 'Top Text',
                                        'name' => 'top_text',
                                        'type' => 'text',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                    ),
                                    array(
                                        'key' => 'field_5aceb02fc71ed',
                                        'label' => 'Button Text',
                                        'name' => 'button_text',
                                        'type' => 'text',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                    ),
                                    array(
                                        'key' => 'field_5aceb034c71ee',
                                        'label' => 'Button Url',
                                        'name' => 'button_url',
                                        'type' => 'page_link',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'post_type' => array(
                                        ),
                                        'taxonomy' => array(
                                        ),
                                        'allow_null' => 0,
                                        'allow_archives' => 0,
                                        'multiple' => 0,
                                    ),
                                    array(
                                        'key' => 'field_5aceb038c71ef',
                                        'label' => 'Bottom Text',
                                        'name' => 'bottom_text',
                                        'type' => 'text',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                    ),
                                ),
                                'min' => '',
                                'max' => '',
                            ),
                            '5aceb51d9344e' => array(
                                'key' => '5aceb51d9344e',
                                'name' => 'map',
                                'label' => 'Map',
                                'display' => 'block',
                                'sub_fields' => array(
                                ),
                                'min' => '',
                                'max' => '',
                            ),
                            '5acffd75f0065' => array(
                                'key' => '5acffd75f0065',
                                'name' => 'list',
                                'label' => 'List',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_5acffd7bf0066',
                                        'label' => 'Title',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                    ),
                                    array(
                                        'key' => 'field_5acffd80f0067',
                                        'label' => 'List Items',
                                        'name' => 'list_items',
                                        'type' => 'repeater',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'collapsed' => '',
                                        'min' => 0,
                                        'max' => 0,
                                        'layout' => 'table',
                                        'button_label' => '',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_5acffd89f0068',
                                                'label' => 'List Item',
                                                'name' => 'list_item',
                                                'type' => 'text',
                                                'instructions' => '',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                        ),
                                    ),
                                ),
                                'min' => '',
                                'max' => '',
                            ),
                            '5ad004e4b1f46' => array(
                                'key' => '5ad004e4b1f46',
                                'name' => 'menu',
                                'label' => 'Menu',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_5ad005f0b1f4d',
                                        'label' => 'Menu Title',
                                        'name' => 'menu_title',
                                        'type' => 'text',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                    ),
                                    array(
                                        'key' => 'field_5ad004e7b1f47',
                                        'label' => 'Menu Sections',
                                        'name' => 'menu_sections',
                                        'type' => 'repeater',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'collapsed' => '',
                                        'min' => 0,
                                        'max' => 0,
                                        'layout' => 'block',
                                        'button_label' => 'Add Menu Section',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_5ad004f7b1f48',
                                                'label' => 'Section Title',
                                                'name' => 'section_title',
                                                'type' => 'text',
                                                'instructions' => '',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'maxlength' => '',
                                            ),
                                            array(
                                                'key' => 'field_5ad004ffb1f49',
                                                'label' => 'Section Items',
                                                'name' => 'section_items',
                                                'type' => 'repeater',
                                                'instructions' => '',
                                                'required' => 0,
                                                'conditional_logic' => 0,
                                                'wrapper' => array(
                                                    'width' => '',
                                                    'class' => '',
                                                    'id' => '',
                                                ),
                                                'collapsed' => '',
                                                'min' => 0,
                                                'max' => 0,
                                                'layout' => 'block',
                                                'button_label' => 'Add Menu Item',
                                                'sub_fields' => array(
                                                    array(
                                                        'key' => 'field_5ad0050db1f4a',
                                                        'label' => 'Title',
                                                        'name' => 'title',
                                                        'type' => 'text',
                                                        'instructions' => 'Food item title',
                                                        'required' => 1,
                                                        'conditional_logic' => 0,
                                                        'wrapper' => array(
                                                            'width' => '60',
                                                            'class' => '',
                                                            'id' => '',
                                                        ),
                                                        'default_value' => '',
                                                        'placeholder' => '',
                                                        'prepend' => '',
                                                        'append' => '',
                                                        'maxlength' => '',
                                                    ),
                                                    array(
                                                        'key' => 'field_5ad005cab1f4c',
                                                        'label' => 'Price',
                                                        'name' => 'price',
                                                        'type' => 'number',
                                                        'instructions' => 'Menu Item Price (No dollar sign)',
                                                        'required' => 1,
                                                        'conditional_logic' => 0,
                                                        'wrapper' => array(
                                                            'width' => '40',
                                                            'class' => '',
                                                            'id' => '',
                                                        ),
                                                        'default_value' => '',
                                                        'placeholder' => '',
                                                        'prepend' => '$',
                                                        'append' => '',
                                                        'min' => '',
                                                        'max' => '',
                                                        'step' => '',
                                                    ),
                                                    array(
                                                        'key' => 'field_5ad005b8b1f4b',
                                                        'label' => 'Description',
                                                        'name' => 'description',
                                                        'type' => 'textarea',
                                                        'instructions' => '',
                                                        'required' => 1,
                                                        'conditional_logic' => 0,
                                                        'wrapper' => array(
                                                            'width' => '',
                                                            'class' => '',
                                                            'id' => '',
                                                        ),
                                                        'default_value' => '',
                                                        'placeholder' => '',
                                                        'maxlength' => '',
                                                        'rows' => 4,
                                                        'new_lines' => '',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'min' => '',
                                'max' => '',
                            ),
                            '5ad12b0d849fa' => array(
                                'key' => '5ad12b0d849fa',
                                'name' => 'upcoming_events',
                                'label' => 'Upcoming Events',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_5ad133e74196e',
                                        'label' => 'Title',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => 'Upcoming Events',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                    ),
                                    array(
                                        'key' => 'field_5ad133ff4196f',
                                        'label' => 'Link Text',
                                        'name' => 'link_text',
                                        'type' => 'text',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => 'View All Events',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                    ),
                                    array(
                                        'key' => 'field_5ad1340341970',
                                        'label' => 'Link Url',
                                        'name' => 'link_url',
                                        'type' => 'page_link',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'post_type' => array(
                                        ),
                                        'taxonomy' => array(
                                        ),
                                        'allow_null' => 0,
                                        'allow_archives' => 0,
                                        'multiple' => 0,
                                    ),
                                ),
                                'min' => '',
                                'max' => '',
                            ),
                        ),
                        'button_label' => 'Add Section',
                        'min' => '',
                        'max' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'page',
                        ),
                    ),
                ),
                'menu_order' => 1,
                'position' => 'acf_after_title',
                'style' => 'seamless',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => array(
                    0 => 'the_content',
                ),
                'active' => 1,
                'description' => '',
            ));
            
            endif;
    }

    public function initialize_other(){
        add_action('navigation_markup_template', function($content){
            $content = str_replace('role="navigation"', '', $content);
            $content = preg_replace('#<h2([^>]*)>(.*)</h2>#m', '', $content);
            return $content;
        });
    }

    public function initalize_shortcodes(){
        add_shortcode( 'button', function($atts){
            $atts = shortcode_atts(
                array(
                    'text' => 'Button Text',
                    'link' => 'Button Link',
                    'padding' => 'no-padding'
                ), $atts, 'Button'
            );
            return '<a class="button ' . $atts['padding'] . '" href="' . $atts['link'] . '">' . $atts['text'] . "</a>";
        } );
    }
}