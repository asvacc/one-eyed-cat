<?php namespace OneEyedCat\Core\Models\Wysiwyg;

class Section
{
    /**
     * Renders the wysiwyg
     */
    public static function render() {
        $context['wysiwyg'] = new Model(get_sub_field('content'), get_sub_field('background'));
        ob_start();
        include(locate_template('template-parts/sections/wysiwyg/template.php'));
        $html = ob_get_clean();
        echo $html;
        return true;
    }


}