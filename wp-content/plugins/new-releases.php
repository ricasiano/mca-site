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
    //initialize request for top downloads on MMS
    $mca = new mca();
    $mca->endpoint = 'newreleases';
    //limit response data to 5 records
    $mca->params = '5';
    $result = $mca->request();
    $new_releases = $result->new_releases;
    ?>
                <div class="new-contents light-bg">
                	<h2>New Releases</h2>

                        <?php 
                        if (count($new_releases) > 0):
                        foreach ($new_releases as $releases): ?>
                    	<div class="new-album">
                        	<a href="<?php echo $SERVER['REQUEST_URI']; ?>?page_id=51&artist_id=<?php echo $releases->artist_id ?>">
                                <div class="img-holder"><img src="<?php echo $releases->album_image;?>" /></div>
                                <h3><?php echo $releases->album_title;?></h3>
                                <h4><?php echo $releases->artist_name;?></h4>
                            </a>
                        </div>
                        <?php endforeach;
                        endif; ?>
                </div>
    <?php
 
    echo $after_widget;
  }
 
}?>
