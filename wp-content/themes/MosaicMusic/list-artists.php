<?php
/*
Template Name: List Artists
*/
$mca->endpoint = 'listartists';
if(isset($_GET['initial']))
$mca->initial = $_GET['initial'];
if(isset($_GET['start']))
$mca->start = $_GET['start'];
if(isset($_GET['end']))
$mca->end = $_GET['end'];
$result = $mca->listArtists();
$result = json_decode($result);
$artist_list = $result->artists;
?>
<?php get_header(); ?>
<!--<div class="outer" id="contentwrap">-->
	<div class="artist-postcont">
		<div id="artist-content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php if (is_page('24')) { ?>
				<div id="topsearch">
					<?php get_search_form(); ?> 
				</div>
                <?php } ?> 
                <div align="center"><a href="<?php echo $_SERVER['SERVER_URI'].'?'.$_SERVER['QUERY_STRING'];?>&initial=1">#</a> 
               <?php 
               $alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'); 
               foreach ($alphabet as $initial_list):?>
               <a href="<?php echo $_SERVER['SERVER_URI']?>?page_id=2&initial=<?php echo strtolower($initial_list);?>"><?php echo $initial_list;?></a> 
               <?php endforeach; ?>
                </div>

                <?php foreach ($artist_list as $artist_data): ?>
                <div class="artists-list">
                    <a href="<?php echo $SERVER['REQUEST_URI']; ?>?page_id=51&artistid=<?php echo $artist_data->id ?>">
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
                <?php endforeach;?>
			<?php endwhile; endif; ?>
		<!--<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>-->
		</div>
	</div>
<?php get_sidebars(); ?>
</div>
<?php get_footer(); ?>
