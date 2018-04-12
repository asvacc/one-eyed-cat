<?php namespace OneEyedCat\Core\Models\Wysiwyg;

class Model
{
    public $content;

    function __construct($content){
        $this->content = $content;
    }
}