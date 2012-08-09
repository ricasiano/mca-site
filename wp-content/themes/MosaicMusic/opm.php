<?php
/*
Template Name: OPM Music
*/

$mca->endpoint = 'newsingles';
//limit response data to 5 records select with opm genre only
$mca->params = '5/opm';
$result = $mca->request();
$new_singles = $result->new_singles;
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

<?php
    if (count($new_singles) > 0):
    foreach ($new_singles as $singles): ?>
    <div class="listing-contents">
    	<div class="list-titles">
        	<h3><?php echo $singles->song_title;?></h3>
            <h4><?php echo $singles->artist_name;?></h4>
        </div>
        <div class="list-options">
            <a class="ajax cboxElement listen" href="popups/player.php?play_file=<?php echo $singles->preview;?>"></a>
            <a href="<?php echo $mca->buy_url.$mca->clean_url($singles->artist_name, true).'/'.$singles->song_id.'/'.$mca->clean_url($singles->song_title).'.html'; ?>" class="download"></a>
        </div>
        <div class="clear"></div>
     </div>
    <?php endforeach; 
    endif;?>
		</div>
	</div>
<?php get_sidebars(); ?>
</div>
<?php get_footer(); ?>