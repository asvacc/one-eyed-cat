<?php 

use OneEyedCat\Core\Models\Wysiwyg\Section as Wysiwyg;
use OneEyedCat\Core\Models\CTA\Section as CTA;
use OneEyedCat\Core\Models\Map\Section as Map;
use OneEyedCat\Core\Models\ListSection\Section as ListSection;
use OneEyedCat\Core\Models\Menu\Section as Menu;
use OneEyedCat\Core\Models\Event\Section as Event;
use OneEyedCat\Core\Models\Beer\Section as Beer;
use OneEyedCat\Core\Models\Artist\Section as Artist;

class Sections
{
    static function render(){
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
                    case 'list':
                        ListSection::render();
                        break;
                    case 'menu':
                        Menu::render();
                        break;
                    case 'upcoming_events':
                        Event::render_upcoming_event();
                }
            }
        }
    }
}