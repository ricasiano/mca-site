<?php
/*
Plugin Name: List Artists Widget
Description: Lists artists under the music label
*/

add_action( 'widgets_init', create_function('', 'return register_widget("ListArtistsWidget");') );
 
class ListArtistsWidget extends WP_Widget
{
  function ListArtistsWidget()
  {
    $widget_ops = array('classname' => 'ListArtistsWidget', 'description' => 'Lists artists under the music label' );
    $this->WP_Widget('ListArtistsWidget', 'List artists', $widget_ops);
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
            <div class="artists-list">
                <div class="img-thumb">
                    <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                <div class="details-bg">
                    <h3>Artist</h3>
                </div>
                </div>
            </div>
            <div class="artists-list">
                <div class="img-thumb">
                    <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                <div class="details-bg">
                    <h3>Artist</h3>
                </div>
                </div>
            </div>
            <div class="artists-list">
                <div class="img-thumb">
                    <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                <div class="details-bg">
                    <h3>Artist</h3>
                </div>
                </div>
            </div>
            <div class="artists-list">
                <div class="img-thumb">
                    <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                <div class="details-bg">
                    <h3>Artist</h3>
                </div>
                </div>
            </div>
            <div class="artists-list">
                <div class="img-thumb">
                    <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                <div class="details-bg">
                    <h3>Artist</h3>
                </div>
                </div>
            </div>
            <div class="artists-list">
                <div class="img-thumb">
                    <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                <div class="details-bg">
                    <h3>Artist</h3>
                </div>
                </div>
            </div>
        
    <?php
 
    echo $after_widget;
  }
 
}?>