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

    //initialize request for top downloads on MMS
    $mca = new mca();
    $mca->endpoint = 'topalbums';
    $local_data = new LocalData();
    if($local_data->loc_top_albums == 1):
    $albums = $local_data->get_data('loc_album', 'top_album');
    $mca->endpoint = 'albums';
    $mca->params = $albums.'/4';
    $result = $mca->request();
    $top_albums = $result->albums;
    ?>
                <div class="new-contents light-bg">
                	<h2>Top Albums</h2>

                        <?php 
                        if (count($top_albums) > 0):
                        foreach ($top_albums as $albums): 
                        if (isset($albums->id)):?>
                    	<div class="new-album">
                        	<a href="<?php echo $SERVER['REQUEST_URI']; ?>?page_id=51&artist_id=<?php echo $albums->id ?>">
                                <div class="img-holder"><img src="<?php echo $albums->image;?>" /></div>
                                <h3><?php echo $albums->title;?></h3>
                                <h4><?php echo $albums->albumartist;?></h4>
                            </a>
                        </div>
                        <?php 
                        endif;
                        endforeach;
                        endif; ?>
                </div>
    <?php


    else:
    //limit response data to 4 records
    $mca->params = '4';
    $result = $mca->request();
    $top_albums = $result->top_albums;
    ?>
                <div class="new-contents light-bg">
                	<h2>Top Albums</h2>

                        <?php 
                        if (count($top_albums) > 0):
                        foreach ($top_albums as $albums): ?>
                    	<div class="new-album">
                        	<a href="<?php echo $SERVER['REQUEST_URI']; ?>?page_id=51&artist_id=<?php echo $albums->artist_id ?>">
                                <div class="img-holder"><img src="<?php echo $albums->album_image;?>" /></div>
                                <h3><?php echo $albums->album_title;?></h3>
                                <h4><?php echo $albums->artist_name;?></h4>
                            </a>
                        </div>
                        <?php endforeach;
                        endif; ?>
                </div>
    <?php
    endif;
    echo $after_widget;
  }
 
}?>
