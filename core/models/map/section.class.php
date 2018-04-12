<?php namespace OneEyedCat\Core\Models\Map;

class Section
{
    /**
     * Renders the wysiwyg
     */
    public static function render() {
        ob_start();
        include(locate_template('template-parts/sections/map/template.php'));
        $html = ob_get_clean();
        echo $html;
        return true;
    }


}