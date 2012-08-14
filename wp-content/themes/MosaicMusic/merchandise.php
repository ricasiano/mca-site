<?php
/*
   Template Name: Merchandise
 */
//use the term id
$client_catalog->identifier = 12;
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
?>
            <div class="new-album">
                <a href="javascript:void(0)">
                    <div class="img-holder"><img src="<?php 
                    echo $upload_dir['baseurl'].'/catablog/originals/'.$content['image'];?>" /></div>
                    <h3><?php 
                    $title = explode(' - ', $content['post_title']);
                    echo trim($title[0]); ?></h3>
                    <h4><?php echo $content['post_content']; ?><br />PHP <?php echo $content['price'];?> </h4>
                 </a>
            </div>

<?php
    endforeach;
endif;
    ?>    
		</div>
     </div>
	<?php get_sidebars(); ?>
</div>
    <?php get_footer(); ?>
