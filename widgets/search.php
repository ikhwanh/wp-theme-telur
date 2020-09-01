<?php
 
/**
 * Adds Foo_Widget widget.
 */
class Telur_Search_Widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'telur_search', // Base ID
            'Telur Search', // Name
            array( 'description' => __( 'A custom search', 'telur' ), ) // Args
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
        ?>
                            <li class="item-search">
                                <div id="search-box" class="Search">
                                    <div class="Search-input">
                                        <form role="search" method="get" id="searchform" action="<?php echo get_site_url(); ?>">
                                            <input name="s" id="search-input" class="FormControl" type="search" placeholder="<?php echo $instance['title'];?>" value="<?php echo get_search_query(); ?>"  style="width: 100%; max-width: 225px;">
                                        </form>
                                    </div>
                                    <ul class="Dropdown-menu Search-results"></ul>
                                </div>
                            </li>
        <?php
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
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Placeholder:' ); ?></label>
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