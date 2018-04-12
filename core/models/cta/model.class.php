<?php namespace OneEyedCat\Core\Models\CTA;

class Model
{
    public $topText;
    public $buttonText;
    public $buttonUrl;
    public $bottomText;

    function __construct($topText, $buttonText, $buttonUrl, $bottomText){
        $this->topText = $topText;
        $this->buttonText = $buttonText;
        $this->buttonUrl = $buttonUrl;
        $this->bottomText = $bottomText;
    }
}