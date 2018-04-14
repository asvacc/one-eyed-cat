<?php namespace OneEyedCat\Core\Models\Event;

class Section
{
    /**
     * Renders the wysiwyg
     */
    public static function render() {
        $context['events'] = new Model();
        ob_start();
        include(locate_template('template-parts/sections/cta/template.php'));
        $html = ob_get_clean();
        echo $html;
        return true;
    }

    public static function render_upcoming_event(){

        $args = array(
            'numberposts'      => 3,
            'post_type'        => 'events',
            'post_status'      => 'publish',
            'meta_key'         => 'event_date',
            'orderby'          => 'meta_value',
            'order'            => 'ASC',
            'meta_query' => array(
                array(
                        'key' => 'event_date',
                        'value' => date('Y-m-d'),
                        'compare' => '>=', 
                        'type'    => 'DATE'
                    )
                )
        );

        $posts = get_posts( $args );
        $context['event'] = new Model(get_sub_field('title'), get_sub_field('link_text'), get_sub_field('link_url'), $posts);
        
        ob_start();
        include(locate_template('template-parts/sections/event/template.upcoming_events.php'));
        $html = ob_get_clean();
        echo $html;
        return true;
    }

    public static function get_all_events(){
        
        $args = array(
            'numberposts'      => -1,
            'post_type'        => 'events',
            'post_status'      => 'publish',
            'meta_key'         => 'event_date',
            'orderby'          => 'meta_value',
            'order'            => 'ASC',
            'meta_query' => array(
                array(
                        'key' => 'event_date',
                        'value' => date('Y-m-d'),
                        'compare' => '>=', 
                        'type'    => 'DATE'
                    )
                )
        );

        $posts = get_posts( $args );

        $context['events'] = array();
        foreach($posts as $post){
            $context['events'][] = new Event($post);
        }
        return $context;
    }

}