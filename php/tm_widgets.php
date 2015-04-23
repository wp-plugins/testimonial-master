<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Creates Random Testimonial Widget
 *
 * @since 0.2.0
 */
class TMRandomWidget extends WP_Widget {

   	// constructor
    function TMRandomWidget() {
        parent::WP_Widget(false, $name = __('Testimonial Master Widget', 'testmonial-master'));
    }

    // widget form creation
    function form($instance) {
	    // Check values
		if( $instance) {
	     	$title = esc_attr($instance['title']);
		} else {
			$title = '';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'testmonial-master'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php
	}

    // widget update
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
      	// Fields
      	$instance['title'] = strip_tags($new_instance['title']);
     	return $instance;
    }

    // widget display
    function widget($args, $instance) {
        extract( $args );
   		// these are the widget options
   		$title = apply_filters('widget_title', $instance['title']);
    	echo $before_widget;
   		// Display the widget
   		echo '<div class="widget-text wp_widget_plugin_box">';
   		// Check if title is set
   		if ( $title ) {
      		echo $before_title . $title . $after_title;
   		}

   		$shortcode = '';
 			$testimonial_array = array();
      $my_query = new WP_Query( array('post_type' => 'testimonial', 'posts_per_page' => -1) );
     	if( $my_query->have_posts() )
     	{
     	  while( $my_query->have_posts() )
     		{
     	    $my_query->the_post();
 					$testimonial_array[] = array(
             'id' => get_the_ID(),
             'name' => get_the_title(),
             'link' => get_post_meta( get_the_ID(), 'link', true ),
 						'content' => get_the_content()
           );
     	  }
     	}
     	wp_reset_postdata();
      if (count($testimonial_array) > 0)
      {
   			$rand_testimonial = array_rand($testimonial_array);
   			$shortcode .= '"'.esc_html($testimonial_array[$rand_testimonial]["content"]).'"<br />';
   			$shortcode .= '~'.esc_html($testimonial_array[$rand_testimonial]["name"]);
   			$link = $testimonial_array[$rand_testimonial]["link"];
   			if ($link && $link != '')
   			{
   				$shortcode .= ", <a href='".esc_url($link)."'>".esc_html($link)."</a>";
   			}
      }

 			echo $shortcode;
    }
}
?>
