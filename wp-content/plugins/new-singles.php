<?php
/*
Plugin Name: New Singles Widget
Description: Lists recent artists' singles
*/

add_action( 'widgets_init', create_function('', 'return register_widget("NewSinglesWidget");') );
 
class NewSinglesWidget extends WP_Widget
{
  function NewSinglesWidget()
  {
    $widget_ops = array('classname' => 'NewSinglesWidget', 'description' => 'Lists recent artists\' singles' );
    $this->WP_Widget('NewSinglesWidget', 'New singles', $widget_ops);
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
    $mca->endpoint = 'newsingles';
    //limit response data to 5 records
    $mca->params = '5';
    $result = $mca->request();
    $new_singles = $result->new_singles;
    if (count($new_singles) > 0):
    foreach ($new_singles as $singles): ?>
    <div class="listing-contents">
    	<div class="list-titles">
        	<h3><?php echo $singles->song_title;?></h3>
            <h4><?php echo $singles->artist_name;?></h4>
        </div>
        <div class="list-options">
            <a title="Preview" class="ajax cboxElement listen" href="popups/player.php?play_file=<?php echo $singles->preview;?>"></a>
            <a title="Download MP3" href="<?php echo $mca->buy_url.$mca->clean_url($singles->artist_name, true).'/'.$singles->song_id.'/'.$mca->clean_url($singles->song_title).'.html'; ?>" class="download"></a>
            <a title="Caller Ringback" href="#" class="ringback-dl"></a>
        </div>
        <div class="clear"></div>
     </div>
    <?php endforeach;
    endif; ?>
 <?php
    echo $after_widget;
  }
 
}?>
