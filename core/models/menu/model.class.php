<?php namespace OneEyedCat\Core\Models\Menu;

class Model
{
    public $title;

    public $menuSections;

    function __construct($title, $row){
        $menuSections = [];
        $this->title = $title;
        if(have_rows('menu_sections')){
            while ( have_rows('menu_sections') ) {
                the_row();
                $menuSections[] = new MenuSection(get_sub_field('section_title'), get_sub_field('section_items'));
            }
        }
        $this->menuSections = $menuSections;
    }
} 

class MenuSection
{
    public $title;
    
    public $menuItems;

    function __construct($title, $row){
        $this->title = $title;
        $menuItems = [];
        if(have_rows('section_items')){
            while ( have_rows('section_items') ) {
                the_row();
                $menuItems[] = new MenuItem(get_sub_field('title'), get_sub_field('description'), get_sub_field('price'));
            }
        }
        $this->menuItems = $menuItems;
    }
}

class MenuItem
{
    public $title;
    public $description;
    public $price;

    function __construct($title, $description, $price){
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }
}