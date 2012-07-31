<?php
/*
Plugin Name: Top Albums Widget
Description: Lists top downloaded albums
*/

add_action( 'widgets_init', create_function('', 'return register_widget("TopAlbumsWidget");') );
 
class TopAlbumsWidget extends WP_Widget
{
  function TopAlbumsWidget()
  {
    $widget_ops = array('classname' => 'TopAlbumsWidget', 'description' => 'Lists top albums' );
    $this->WP_Widget('TopAlbumsWidget', 'Top Albums', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
    ?>
                <div class="new-contents light-bg">
                	<h2 class="top-albums"></h2>
                    	<div class="new-album">
                        	<a href="#">
                                <div class="img-holder"><img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" /></div>
                                <h3>Album Title</h3>
                                <h4>Artist</h4>
                            </a>
                        </div>
                    	<div class="new-album">
                        	<a href="#">
                                <div class="img-holder"><img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" /></div>
                                <h3>Album Title</h3>
                                <h4>Artist</h4>
                            </a>
                        </div>
                    	<div class="new-album">
                        	<a href="#">
                                <div class="img-holder"><img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" /></div>
                                <h3>Album Title</h3>
                                <h4>Artist</h4>
                            </a>
                        </div>
                    	<div class="new-album">
                        	<a href="#">
                                <div class="img-holder"><img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" /></div>
                                <h3>Album Title</h3>
                                <h4>Artist</h4>
                            </a>
                        </div>                     
                </div>
    <?php
 
    echo $after_widget;
  }
 
}?>