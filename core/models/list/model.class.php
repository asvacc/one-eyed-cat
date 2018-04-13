<?php namespace OneEyedCat\Core\Models\ListSection;

class Model
{
    public $title;

    public $listItems;

    function __construct($title, $row){
        $listItems = [];
        $this->title = $title;
        if(have_rows('list_items')){
            while ( have_rows('list_items') ) {
                the_row();
                $listItems[] = get_sub_field('list_item');
            }
        }
        $this->listItems = $listItems;
    }
}