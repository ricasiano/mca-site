<?php
/*
Template Name: Artist's Profile
*/

//request artist profile from MyMusicStore
$mca->endpoint = 'artistinfo';
$mca->params = $_GET['artist_id'];
$result = $mca->request();

$artist_info = $result->artist_info;
?>
<?php get_header(); ?>
<!--<div class="outer" id="contentwrap">-->
	<div class="postcont">
		<div id="content">	
			<?php 
			$artist_id = $_GET['artistid'];
			?>
			<div class="artist-banner" style="background:url('<?php echo $artist_info->artist_image;?>') center no-repeat;">
           	</div>
            
            <div id="artist-tabs" class="artist-widget">
                <ul class="artist-nav">
                    <li><a href="#artist-info">Info</a></li>
                    <li><a href="#artist-albums">Albums</a></li>
                </ul>
                <div id="artist-info" class="tabdiv">
                    <h3><?php echo $artist_info->artist_name;?></h3>
                    <div>
                    <?php echo $artist_info->bio;?>
                    </div>
                </div><!--/artist-info-->
                
                <div id="artist-albums" class="tabdiv">
                    <div class="album-list">
                        <?php 
                        if (count($artist_info->albums) > 0):
                        foreach ($artist_info->albums as $key=>$val): ?>
                    	<div class="the-albums">
                        	<div class="the-album-art">
                    			<img class="the-album-art" src="<?php echo $val->album_image ;?>" />
                            </div>
                            <div class="the-album-details">
                            	<h4><?php echo $val->album_title;?></h4>
                            	<a href="javascript:void(0)" id="play_album_<?php echo $key;?>" class="click-play"></a>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $("#play_album_<?php echo $key;?>").click(function() {
                                    $(".album-playlist").fadeOut();
                                    $("#album_container_<?php echo $key;?>").fadeIn();
                                });
                            });
                        </script>
                        <?php endforeach;
                        endif; ?>
                    </div>
                    <?php
                        if (count($artist_info->albums) > 0):
                        $ctr = 0;
                        $hide = '';
                        foreach ($artist_info->albums as $key=>$val):
                        if ($ctr != 0)
                        $hide = 'style="display:none"';
                        ?>
                    <div class="album-playlist" id="album_container_<?php echo $key;?>" <?php echo $hide;?>>
                    	<h3>Playlist</h3>
                        <ol class="album-songs">
                            <?php if (count($val->songs) > 0):
                            foreach ($val->songs as $song_key=>$song_val): ?>
                            <li><a class="ajax cboxElement cboxPlay" title="Preview" href="popups/player.php?play_file=<?php echo urlencode($song_val->song_preview);?>">&nbsp;</a> <a class="ajax cboxElement cboxDL" title="Download" href="popups/player.php?play_file=<?php echo urlencode($song_val->song_preview);?>">&nbsp;</a><?php echo $song_val->song_title;?></li>
                            <?php endforeach;
                            endif; ?>
                        </ol>
                    </div>
                    <?php
                        ++$ctr;
                        endforeach;
                        endif;
                    ?>
                    <div class="clear"></div>
                </div><!--/artist-albums-->
            </div>
		</div><!--#content-->
	</div><!--#postcont-->
	<script type="text/javascript" language="javascript">
    	jQuery(document).ready(function(){
  			jQuery('.album-songs li:nth-child(odd)').addClass('alternate');
		});
    </script>      
<?php //get_sidebars(); ?>

</div>
<?php get_footer(); ?>