<?php 

class Textarea_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'textarea_widget',
			__( 'Textarea Widget', 'text_domain' )
		);
	}
	// The widget form (for the backend )
	function form($instance) {

        // Set widget defaults
        $defaults = array(
            'title'    => '',
            'textarea' => ''
        );

        extract( wp_parse_args( ( array ) $instance, $defaults ) );

        // Check values
        if( $instance) {
            $title = esc_attr($instance['title']);
            $content = esc_textarea($instance['content']);
        } ?>
            
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
            
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>"><?php _e( 'Content', 'text_domain' ); ?></label>
            <textarea class="widefat" rows="8" id="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'textarea' ) ); ?>"><?php echo wp_kses_post( $textarea ); ?></textarea>
        </p>
           
<?php }
    
	function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
        $instance['textarea'] = isset( $new_instance['textarea'] ) ? wp_strip_all_tags( $new_instance['textarea'] ) : '';
    
        return $instance;
    }


    function widget( $args, $instance ) {
        $title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
        $textarea = isset( $instance['textarea'] ) ?$instance['textarea'] : '';    
        echo $instance['content'];
        echo '<h4>'.$title.'</h4>';
        echo $textarea;
    }
}