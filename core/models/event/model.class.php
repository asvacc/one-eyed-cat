<?php namespace OneEyedCat\Core\Models\Event;

class Model
{
    public $events;
    public $title;
    public $linkText;
    public $linkUrl;

    function __construct($title, $linkText, $linkUrl, $posts){
        $this->title = $title;
        $this->linkText = $linkText;
        $this->linkUrl = $linkUrl;
        $events = array();
        foreach($posts as $post){
            $events[] = new Event($post);
        }
        $this->events = $events;
    }
}

class Event
{
    public $image;
    public $date;
    public $details;
    public $title;
    public $permalink;

    function __construct($event){
        $eventId = is_object($event) ? $event->ID : $event;
        $event = is_object($event) ? $event : get_post($eventId);

        $this->title = get_the_title($eventId);
        $this->image = get_field('event_image', $eventId);
        $this->date = get_field('event_date', $eventId);
        $this->details = get_field('event_details', $eventId);
        $this->permalink = get_the_permalink($eventId);
    }
}