<?php namespace OneEyedCat\Core\Models\Event;

class Section
{
    /**
     * Renders the wysiwyg
     */
    public static function render() {
        $context['events'] = new Model();
        ob_start();
        include(locate_template('template-parts/sections/cta/template.php'));
        $html = ob_get_clean();
        echo $html;
        return true;
    }


}