<?php
/*
Plugin Name: Client Catalog Widget
Description: Displays catalog items based on page type, uses wordpress DB, not via MMS API
*/

add_action( 'widgets_init', create_function('', 'return register_widget("ClientCatalogWidget");') );
 
class ClientCatalogWidget extends WP_Widget
{
  function ClientCatalogWidget()
  {
    $widget_ops = array('classname' => 'ClientCatalogWidget', 'description' => 'Displays catalog items based on page type, uses wordpress DB, not via MMS API');
    $this->WP_Widget('ClientCatalogWidget', 'Client Catalog', $widget_ops);
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

    //get USM DVD Catalog
    $catalog = new ClientCatalog();
    $catalog->identifier = 8;
    $catalog->taxonomy = 'catablog-terms';
    $result = $catalog->getItems();
    print_r($result);
    ?>
                <div class="new-contents light-bg">
                	<h2 class="top-albums"></h2>

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
 
    echo $after_widget;
  }
 
}?>
