<?php namespace OneEyedCat\Core\Models\CTA;

class Section
{
    /**
     * Renders the wysiwyg
     */
    public static function render() {
        $context['cta'] = new Model(get_sub_field('top_text'), get_sub_field('button_text'), get_sub_field('button_url'), get_sub_field('bottom_text'));
        ob_start();
        include(locate_template('template-parts/sections/cta/template.php'));
        $html = ob_get_clean();
        echo $html;
        return true;
    }


}