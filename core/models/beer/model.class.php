<?php namespace OneEyedCat\Core\Models\Beer;

use OneEyedCat\Core\Models\Artist\Model as Artist;

class Model
{
    public $title;
    public $type;
    public $description;
    public $permalink;
    public $abv;
    public $ibu;
    public $artist;
    public $image;

    function __construct($beer){


        $beerId = is_object($beer) ? $beer->ID : $beer;
        $beer = is_object($beer) ? $beer : get_post($beerId);

        $this->title = get_the_title();
        $this->type = get_field('beer_type');
        $this->description = get_field('description');
        $this->permalink = get_the_permalink();
        $this->abv = get_field('abv');
        $this->ibu = get_field('ibu');
        $this->image = get_field('image');

        $post = get_field('artist', $beer->ID);
        if($post){
            $this->artist = new Artist(get_field('artist'));
        }
    }
}