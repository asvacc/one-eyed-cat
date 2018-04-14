<?php namespace OneEyedCat\Core\Models\Artist;

class Model
{
    public $title;
    public $image;
    public $description;
    public $permalink;
    public $socialMedia;

    function __construct($artist){
        $artistId = is_object($artist) ? $artist->ID : $artist;
        $artist = is_object($artist) ? $artist : get_post($artistId);

        $this->title = get_the_title($artist->ID);
        $this->image = get_field('image',$artist->ID);
        $this->description = get_field('description',$artist->ID);
        $this->permalink = get_the_permalink($artist->ID);
        $socialMedia = array();
        if(have_rows('social_media',$artist->ID)){
            while ( have_rows('social_media',$artist->ID) ) {
                the_row();
                $socialMedia[] = new Social_Media_Model(get_sub_field('website',$artist->ID), get_sub_field('link',$artist->ID));
            }
        }
        $this->socialMedia = $socialMedia;
    }
}

class Social_Media_Model
{
    public $website;
    public $link;

    function __construct($website, $link){
        $this->website = $website;
        $this->link = $link;
    }
}