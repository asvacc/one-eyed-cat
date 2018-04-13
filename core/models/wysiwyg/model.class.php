<?php namespace OneEyedCat\Core\Models\Wysiwyg;

class Model
{
    public $content;
    public $background;

    function __construct($content, $background){
        $this->content = $content;
        $this->background = $background;
    }
}