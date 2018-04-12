<?php 

use OneEyedCat\Core\Models\Wysiwyg\Section as Wysiwyg;
use OneEyedCat\Core\Models\CTA\Section as CTA;
use OneEyedCat\Core\Models\Map\Section as Map;

class Sections
{
    static function render($postId = null){
        global $post;

        if(have_rows('sections', $post->id)){
            while(have_rows('sections')){
                the_row();

                switch(get_row_layout()){
                    case 'wysiwyg':
                        Wysiwyg::render();
                        break;
                    case 'call_to_action':
                        CTA::render();
                        break;
                    case 'map':
                        Map::render();
                        break;
                }
            }
        }
    }
}