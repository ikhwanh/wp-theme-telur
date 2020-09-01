<?php
 
/**
 * Adds Foo_Widget widget.
 */
class Telur_Categories_Widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'telur_categories', // Base ID
            'Telur Categories', // Name
            array( 'description' => __( 'a custom categories widget', 'telur' ), ) // Args
        );
    }
 
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        $categories = get_categories();
        
        echo '<li class="active"><a href="/" class=" hasIcon" type="button" title="'.$instance['title'].'"><i class="icon far fa-comments Button-icon"></i><span class="Button-label">'.$instance['title'].'</span></a></li>';
        
        foreach ($categories as $key => $value) {
            echo '<li><a class="TagLinkButton hasIcon child" href="'.get_site_url().'/?cat='.$value->term_taxonomy_id.'" style="margin-left: 10px" title=""><span class="Button-icon icon TagIcon"></span>'.$value->name.'</a></li>';
        }

        echo $args['after_widget'];
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
     public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'text_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
         </p>
    <?php
    }
 
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }
 
}