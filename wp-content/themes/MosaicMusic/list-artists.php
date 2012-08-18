<?php
/*
Template Name: List Artists
*/

//request Artist listings from MyMusicStore
$mca->endpoint = 'listartists';
//this will identify what the user has clicked from the artist navigation
$limit = 21;
$prefix_string = (isset($_GET['prefix_string']))? $_GET['prefix_string'] : 'all';
$pagenumber = (isset($_GET['pagenumber']))? $_GET['pagenumber'] : 1;
$mca->params = $prefix_string.'/'.$pagenumber.'/'.$limit;
$result = $mca->request();
$artist_list = $result->artists;
$total_artists = $result->total_artists;

?>
<?php get_header(); ?>
<!--<div class="outer" id="contentwrap">-->
	<div class="postcont">
		<div id="content">
			<h2 class="title"><?php the_title(); ?></h2>
        </div>
    </div>
<?php get_sidebars(); ?>
	<div class="artist-postcont">
		<div id="artist-content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php if (is_page('24')) { ?>
				<div id="topsearch">
					<?php get_search_form(); ?> 
				</div>
                <?php } ?> 
                <div class="filter-agent"><a href="<?php echo $_SERVER['SERVER_URI'].'?page_id=2&prefix_string=all';?>">All</a> <a href="<?php echo $_SERVER['SERVER_URI'].'?page_id=2&prefix_string=1';?>">#</a> 
               <?php 
               $alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'); 
               foreach ($alphabet as $prefix):?>
               <a href="<?php echo $_SERVER['SERVER_URI']?>?page_id=2&prefix_string=<?php echo strtolower($prefix);?>"><?php echo $prefix;?></a> 
               <?php endforeach; ?>
                </div>
                <div width="100%" align="left">
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="artist_count"><?php echo $total_artists;?> total artists<br style="clear:both" /></span></br>
                </div>
                <?php if (count($artist_list) > 0): foreach ($artist_list as $artist_data): ?>
                <div class="artists-list">
                    <a href="<?php echo $SERVER['REQUEST_URI']; ?>?page_id=51&artist_id=<?php echo $artist_data->id ?>">
                    <div class="img-thumb">
                        <?php if($artist_data->image != ''):?>
                        <img src="<?php echo $artist_data->image;?>" />
                        <?php else:?>
                        <img src="<?php bloginfo('template_url'); ?>/images/no-image.png" />
                        <?php endif;?>
                        <div class="details-bg">
                            <h3><?php echo $artist_data->name;?></h3>
                        </div>
                    </div>
                    </a>
            	</div> 
                <?php endforeach; endif;?>
                <?php
                			endwhile; endif; ?>
		<!--<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>-->
		</div>
        <div align="center">
        <?php 
        if ($prefix_string != 'all'):
        $total_artists = $total_artists_by_prefix; 
            $mca->endpoint = 'countartists';
            //this will identify what the user has clicked from the artist navigation
            $mca->params = $prefix_string;
            $result = $mca->request();
            $total_artists = $result->total_artists;
        endif;        
        echo $mca->paginator($total_artists, $pagenumber, $limit, $_SERVER['SERVER_URI'].'?page_id=2', $prefix_string);?>
        </div>
	</div>
    <script>
    jQuery('.details-bg h3').mouseover(function(){
	if(jQuery(this)[0].scrollWidth>jQuery(this).outerWidth()){
		var scroll = jQuery(this)[0].scrollWidth-jQuery(this).outerWidth();
            jQuery(this).scrollLeft(0);
            jQuery(this).animate({scrollLeft:scroll},scroll*20,'linear');
		}
	}).mouseout(function(){jQuery(this).scrollLeft(0);});
	</script>
</div>
<?php get_footer(); ?>
