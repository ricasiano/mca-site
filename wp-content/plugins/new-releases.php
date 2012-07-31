<?php
/*
Plugin Name: New Releases Widget
Description: Lists artists newly released artist albums/singles
*/

add_action( 'widgets_init', create_function('', 'return register_widget("NewReleasesWidget");') );
 
class NewReleasesWidget extends WP_Widget
{
  function NewReleasesWidget()
  {
    $widget_ops = array('classname' => 'NewReleasesWidget', 'description' => 'Lists newly released artist albums/singles' );
    $this->WP_Widget('NewReleasesWidget', 'New Releases', $widget_ops);
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
    <div class="new-contents">
          <h2 class="new-releases"></h2>
            <div class="new-songs">
                <div class="img-thumb">
                    <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                </div>
                <div class="details-bg">
                    <h3>Song title</h3>
                    <h4>Artist</h4>
                    <div class="options">
                        <div style="display:inline;"><a href="#" class="listen"></a></div>
                        <div style="display:inline;"><a href="#" class="download"></a></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="new-songs">
                <div class="img-thumb">
                    <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                </div>
                <div class="details-bg">
                    <h3>Song title</h3>
                    <h4>Artist</h4>
                    <div class="options">
                        <div style="display:inline;"><a href="#" class="listen"></a></div>
                        <div style="display:inline;"><a href="#" class="download"></a></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
      </div>
    <?php
 
    echo $after_widget;
  }
 
}?>