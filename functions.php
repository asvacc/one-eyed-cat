<?php namespace OneEyedCat;

define("TEMPLATE_DIR", get_template_directory());

define("TEMPLATE_DIR_URI", get_template_directory_uri() . '/assets');

require_once(TEMPLATE_DIR . '/core/OneEyedCatTheme.class.php');

use OneEyedCat\Core\OneEyedCatTheme as ThemeSetup;

add_action('after_setup_theme', function(){
	ThemeSetup::init();
	add_filter('show_admin_bar', '__return_false'); //delete later
});
