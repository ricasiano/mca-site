<?php get_header(); ?>
				<?php 
				if(is_home()) { include (TEMPLATEPATH . '/featured.php'); 
				query_posts($query_string . '&cat=-4');} ?>
			<div class="postcont">
				<div id="content">
                
                
            </div><!--content-->
        </div><!--post-content-->
		
		<?php get_sidebars(); ?>
	</div><!--contentwrap-->
<?php get_footer(); ?>
