<?php
/*
Template Name: List Artists
*/
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
                <div class="artists-list">
                    <a href="<?php echo $SERVER['REQUEST_URI']; ?>?page_id=51&artistid=<?php //ID GOES HERE ?>">
                    <div class="img-thumb">
                        <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                        <div class="details-bg">
                            <h3>Artist</h3>
                        </div>
                    </div>
                    </a>
            	</div> 
                <div class="artists-list">
                    <a href="<?php bloginfo('template_url'); ?>/artist-profile.php?artistid=<?php //ID GOES HERE ?>">
                    <div class="img-thumb">
                        <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                        <div class="details-bg">
                            <h3>Artist</h3>
                        </div>
                    </div>
                    </a>
            	</div> 
                <div class="artists-list">
                    <a href="<?php bloginfo('template_url'); ?>/artist-profile.php?artistid=<?php //ID GOES HERE ?>">
                    <div class="img-thumb">
                        <img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                        <div class="details-bg">
                            <h3>Artist</h3>
                        </div>
                    </div>
                    </a>
            	</div>
			<?php endwhile; endif; ?>
		<!--<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>-->
		</div>
	</div>
	

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>