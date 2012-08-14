<?php
/*
   Template Name: USM DVD
 */
//use the term id
$client_catalog->identifier = 8;
$client_catalog->taxonomy = 'catablog-terms';
$result = $client_catalog->getItems();
$upload_dir = wp_upload_dir();
get_header(); ?>
	<div class="postcont">
		<div id="content">
			<h2 class="title"><?php the_title(); ?></h2>
<?php
if (count($result) > 0) :
    foreach($result as $content): 
        echo $client_catalog->catalogBuilder($content['ID'], $content['post_title'], $content['post_content'], $content['image'], $upload_dir);
    endforeach;
endif;
    ?>    
    	</div>
	</div>
	<?php get_sidebars(); ?>
</div>
    <?php get_footer(); ?>
