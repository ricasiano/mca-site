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
                </div>
		</div>
	</div>
<?php get_sidebars(); ?>
</div>
<?php get_footer(); ?>
