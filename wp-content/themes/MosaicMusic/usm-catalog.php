<?php
/*
   Template Name: USM Catalog
 */
//use the term id
$client_catalog->identifier = 9;
$client_catalog->taxonomy = 'catablog-terms';
$result = $client_catalog->getItems();
$upload_dir = wp_upload_dir();
get_header();
if (count($result) > 0) :
    foreach($result as $content): 
        echo $client_catalog->catalogBuilder($content['ID'], $content['post_title'], $content['post_content'], $content['image'], $upload_dir);
    endforeach;
endif;
    ?>    <?php get_sidebars(); ?>
    </div>
    <?php get_footer(); ?>
