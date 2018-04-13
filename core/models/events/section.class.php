<?php namespace OneEyedCat\Core\Models\Events;

class Section
{
    /**
     * Renders the wysiwyg
     */
    public static function render() {
        $context['list'] = new Model(get_sub_field('title'), get_sub_field('list_items'));
        ob_start();
        include(locate_template('template-parts/sections/list/template.php'));
        $html = ob_get_clean();
        echo $html;
        return true;
    }


}