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
     
    }

    public function initialize_other(){
        add_action('navigation_markup_template', function($content){
            $content = str_replace('role="navigation"', '', $content);
            $content = preg_replace('#<h2([^>]*)>(.*)</h2>#m', '', $content);
            return $content;
        });
    }
}