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
    $local_data = new LocalData();
    if($local_data->loc_new_singles == 1):
        $songs = $local_data->get_data('loc_song', 'new_single');
        $mca->endpoint = 'songs';
        $mca->params = $songs.'/20';
        $result = $mca->request();
        $new_singles = $result->songs;
        if (count($new_singles) > 0):
            foreach ($new_singles as $singles): 
                $smart_rbt_keyword = '';
                $globe_rbt_keyword = '';
                $sun_rbt_keyword = '';
                $rbt = $local_data->get_all_data('loc_song', 'id', $singles->id);
                if (count($rbt)>0):
                    $smart_rbt_keyword = $rbt[0]['smart_rbt_keyword'];
                    $globe_rbt_keyword = $rbt[0]['globe_rbt_keyword'];
                    $sun_rbt_keyword = $rbt[0]['sun_rbt_keyword'];
                endif;
                ?>
                <div class="listing-contents">
                    <div class="list-titles">
                        <h3><?php echo $singles->title;?></h3>
                        <h4><?php echo $singles->artist_name;?></h4>
                    </div>
                    <div class="list-options">
                    <a class="ajax cboxElement listen iframe" href="<?php echo CONFIG_SITE_URL;?>popups/player.php?play_file=<?php echo urlencode($singles->preview);?>&artist_image=<?php echo urlencode(str_replace('.', '|', $singles->artist_image)); ?>&song_title=<?php echo urlencode($singles->title);?>&artist_name=<?php echo urlencode($singles->artist_name);?>"></a>
                        <a title="Download MP3" target="_blank" href="<?php echo $mca->buy_url.$mca->clean_url($singles->artist_name, true).'/'.$singles->id.'/'.$mca->clean_url($singles->title).'.html'; ?>" class="download"></a>
                        <a class="ajax cboxElement ringback-dl iframe" href="<?php echo CONFIG_SITE_URL;?>popups/rbt.php?&artist_image=<?php echo urlencode(str_replace('.', '|', $singles->artist_image)); ?>&song_title=<?php echo urlencode($singles->title);?>&artist_name=<?php echo urlencode($singles->artist_name);?>&rbt_globe=<?php echo $globe_rbt_keyword;?>&rbt_smart=<?php echo $smart_rbt_keyword;?>&rbt_sun=<?php echo $sun_rbt_keyword;?>"></a>
                    </div>
                    <div class="clear"></div>
                 </div>
            <?php endforeach;
        endif; 
    else:
        $mca->endpoint = 'newsingles';
        //limit response data to 20 records
        $mca->params = '20';
        $result = $mca->request();
        $new_singles = $result->new_singles;
        if (count($new_singles) > 0):
            foreach ($new_singles as $singles): 
                $smart_rbt_keyword = '';
                $globe_rbt_keyword = '';
                $sun_rbt_keyword = '';
                $rbt = $local_data->get_all_data('loc_song', 'id', $singles->id);
                if (count($rbt)>0):
                    $smart_rbt_keyword = $rbt[0]['smart_rbt_keyword'];
                    $globe_rbt_keyword = $rbt[0]['globe_rbt_keyword'];
                    $sun_rbt_keyword = $rbt[0]['sun_rbt_keyword'];
                endif;
                ?>
                <div class="listing-contents">
                    <div class="list-titles">
                        <h3><?php echo $singles->song_title;?></h3>
                        <h4><?php echo $singles->artist_name;?></h4>
                    </div>
                    <div class="list-options">

                    <a class="ajax cboxElement listen iframe" href="<?php echo CONFIG_SITE_URL;?>popups/player.php?play_file=<?php echo urlencode($singles->preview);?>&artist_image=<?php echo urlencode(str_replace('.', '|', $singles->artist_image)); ?>&song_title=<?php echo urlencode($singles->song_title);?>&artist_name=<?php echo urlencode($singles->artist_name);?>"></a>
                        <a title="Download MP3" target="_blank" href="<?php echo $mca->buy_url.$mca->clean_url($singles->artist_name, true).'/'.$singles->song_id.'/'.$mca->clean_url($singles->song_title).'.html'; ?>" class="download"></a>
                        <a class="ajax cboxElement ringback-dl iframe" href="<?php echo CONFIG_SITE_URL;?>popups/rbt.php?&artist_image=<?php echo urlencode(str_replace('.', '|', $singles->artist_image)); ?>&song_title=<?php echo urlencode($singles->title);?>&artist_name=<?php echo urlencode($singles->artist_name);?>&rbt_globe=<?php echo $globe_rbt_keyword;?>&rbt_smart=<?php echo $smart_rbt_keyword;?>&rbt_sun=<?php echo $sun_rbt_keyword;?>"></a>                    </div>
                    <div class="clear"></div>
                 </div>
            <?php endforeach;
        endif; 
    endif;
    echo $after_widget;
  }
 
}?>
