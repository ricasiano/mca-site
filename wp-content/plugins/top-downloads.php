<?php
/*
Plugin Name: Top Downloads Widget
Description: Lists top downloaded songs
*/

add_action( 'widgets_init', create_function('', 'return register_widget("TopDownloadsWidget");') );
 
class TopDownloadsWidget extends WP_Widget
{
  function TopDownloadsWidget()
  {
    $widget_ops = array('classname' => 'TopDownloadsWidget', 'description' => 'Lists top downloaded songs' );
    $this->WP_Widget('TopDownloadsWidget', 'Top Downloads', $widget_ops);
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

    $local_data = new LocalData();
    if($local_data->loc_top_downloads == 1):
        $songs = $local_data->get_data('loc_song', 'top_download');
        $mca->endpoint = 'songs';
        $mca->params = $songs.'/20';
        $result = $mca->request();
        $top_downloads = $result->songs;
        if (count($top_downloads) > 0):
            foreach($top_downloads as $downloads): ?>
                <div class="listing-contents">
                    <div class="list-titles">
                        <h3><?php echo $downloads->title;?></h3>
                        <h4><?php echo $downloads->artist_name;?></h4>
                    </div>
                    <div class="list-options">
                    <a class="ajax cboxElement listen iframe" href="<?php echo CONFIG_SITE_URL;?>popups/player.php?play_file=<?php echo urlencode($downloads->preview);?>&artist_image=<?php echo urlencode(str_replace('.', '|', $downloads->artist_image)); ?>&song_title=<?php echo urlencode($downloads->song_title);?>&artist_name=<?php echo urlencode($downloads->artist_name);?>"></a>
                    <a href="<?php echo $mca->buy_url.$mca->clean_url($downloads->artist_name, true).'/'.$downloads->id.'/'.$mca->clean_url($downloads->title).'.html'; ?>" class="download" target="_blank"></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php
            endforeach;
        endif;
    else:
    $mca->endpoint = 'topdownloads';
    //limit response data to 10 records
    $mca->params = '10';
    $result = $mca->request();
    $top_downloads = $result->topdownloads;
    if (count($top_downloads) > 0):
    foreach($top_downloads as $downloads): ?>
    <div class="listing-contents">
    	<div class="list-titles">
        	<h3><?php echo $downloads->song_title;?></h3>
            <h4><?php echo $downloads->artist_name;?></h4>
        </div>
        <div class="list-options">
        <a class="ajax cboxElement listen iframe" href="<?php echo CONFIG_SITE_URL;?>popups/player.php?play_file=<?php echo urlencode($downloads->preview);?>&artist_image=<?php echo urlencode(str_replace('.', '|', $downloads->artist_image)); ?>&song_title=<?php echo urlencode($downloads->song_title);?>&artist_name=<?php echo urlencode($downloads->artist_name);?>"></a>
        <a href="<?php echo $mca->buy_url.$mca->clean_url($downloads->artist_name, true).'/'.$downloads->song_id.'/'.$mca->clean_url($downloads->song_title).'.html'; ?>" class="download" target="_blank"></a>
        </div>
        <div class="clear"></div>
    </div>
    
 <?php
    endforeach;
    endif;
    endif;
    echo $after_widget;
  }
 
}?>
