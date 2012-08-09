<?php
/*
   Template Name: OPM Music
 */

$mca->endpoint = 'newreleases';
//limit response data to 5 records select with opm genre only
$mca->params = '5/opm';
$result = $mca->request();
$new_releases = $result->new_releases;
?>
<?php get_header(); 

$get_opm_banner_image = get_theme_option('opmbanner');
?>
<?php
if(is_page('80')) { ?>

<div class="opm-banner" style="background:url('<?php echo $get_opm_banner_image; ?>') center no-repeat;">
</div>
	
<?php } ?>
<!--<div class="outer" id="contentwrap">-->
	<div class="postcont">
		<div id="content">	
			<div class="new-contents light-bg">
                	<h2 class="latest-news"></h2>
                    <?php 
					global $post;
						$postslist=get_posts('category_name=opm&numberposts=3&orderby=post_date');
						
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
                     <div class="all-news"><a href="index.php?page_id=78" class="more-btn"></a></div>
                     <?php }//endif
					 	else{
							?>
                            <h4 style="padding:0 0 0 15px; color:#fff;">No posts available.</h4>
							<?php
							}
					  ?>
                </div>
	
                <div class="new-contents light-bg">
                    <h2 class="new-releases"></h2>

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
                    <h2 class="new-releases"></h2>
                    <?php
                    $mca->endpoint = 'topalbums';
                    //limit response data to 5 records select with opm genre only
                    $mca->params = '5/opm/hot';
                    $result = $mca->request();
                    $hot_albums = $result->top_albums;
                    if (count($hot_albums) > 0):
                        foreach ($hot_albums as $hot): ?>
                            <div class="new-album">
                            <a href="<?php echo $SERVER['REQUEST_URI']; ?>?page_id=51&artist_id=<?php echo $hot->artist_id ?>">
                            <div class="img-holder"><img src="<?php echo $hot->album_image;?>" /></div>
                            <h3><?php echo $hot->album_title;?></h3>
                            <h4><?php echo $hot->artist_name;?></h4>
                            </a>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
        <?php get_sidebars(); ?>
        </div>
        <?php get_footer(); ?>
