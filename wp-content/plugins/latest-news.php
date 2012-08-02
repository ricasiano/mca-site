<?php
/*
Plugin Name: Latest News MCA Widget
Description: Lists Latest News MCA
*/

add_action( 'widgets_init', create_function('', 'return register_widget("LatestNewsMCAWidget");') );
 
class LatestNewsMCAWidget extends WP_Widget
{
  function LatestNewsMCAWidget()
  {
    $widget_ops = array('classname' => 'LatestNewsMCAWidget', 'description' => 'Lists Latest News MCA' );
    $this->WP_Widget('LatestNewsMCAWidget', 'Latest News MCA', $widget_ops);
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
    <?php
	/*function string_limit_words($string, $word_limit)
	{
	  $words = explode(' ', $string, ($word_limit + 1));
	  if(count($words) > $word_limit)
	  array_pop($words);
	  return implode(' ', $words);
	}*/
	?>
                <!-- latest-news -->
                
                <div class="new-contents dark-bg">
                	<h2 class="latest-news"></h2>
                    <?php 
					global $post;
					$postslist=get_posts('category_name=news&numberposts=3&orderby=post_date');
					if($postslist)
					{ foreach($postslist as $post) : setup_postdata($post); ?>
                    	<div class="new-column">
                        <a href="<?php the_permalink(); ?>">
                        	<div class="img-holder"><?php the_post_thumbnail(array(60,60)); ?></div>
                            <h3><?php the_title(); ?></h3>
                            <h4><?php $excerpt = get_the_excerpt();
  echo string_limit_words($excerpt,8);//comments_number('0 comments', 'One Comments', '% Comments' );?></h4>
                            <span class="more-about">more...</span>
                        </a>
                        </div><?php endforeach; ?>
                     <div class="all-news"><a href="index.php?page_id=54" class="more-btn"></a></div>
                     <?php }//endif
					 	else{
							?>
                            <h4 style="padding:0 0 0 15px; color:#fff;">No posts available.</h4>
							<?php
							}
					  ?>
                </div>
    <?php
 
    echo $after_widget;
  }
 
}?>