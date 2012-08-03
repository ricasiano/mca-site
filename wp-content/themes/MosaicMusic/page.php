<?php get_header(); 
if(is_page('24')) {
	include (TEMPLATEPATH . '/featured.php'); 
}
?>
<!--<div class="outer" id="contentwrap">-->
	<div class="postcont">
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php if (is_page('24')) { ?>
				<div id="topsearch">
					<?php get_search_form(); ?> 
				</div>
                <?php } ?> 
			<div class="post" id="post-<?php the_ID(); ?>">
			<!--<h2 class="title"><?php the_title(); ?></h2>-->
				<div class="entry">
<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array("class" => "alignleft post_thumbnail")); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
				</div>
			</div>
			<?php endwhile; endif; ?>
		<!--<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>-->
		</div>
	</div>

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>