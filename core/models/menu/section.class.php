<?php namespace OneEyedCat\Core\Models\Menu;

class Section
{
    /**
     * Renders the wysiwyg
     */
    public static function render() {
        $context['menu'] = new Model(get_sub_field('menu_title'), get_sub_field('menu_sections'));
        ob_start();
        include(locate_template('template-parts/sections/menu/template.php'));
        $html = ob_get_clean(); 
        echo $html;
        return true;
    }


}