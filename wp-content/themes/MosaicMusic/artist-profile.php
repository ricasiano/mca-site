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
			<div class="artist-banner" style="background:url('<?php echo $artist_info->artist_image;?>') no-repeat;">
           	</div>
            
            <div id="artist-tabs" class="artist-widget">
                <ul class="artist-nav">
                    <li><a href="#artist-info">Info</a></li>
                    <li><a href="#artist-albums">Albums</a></li>
                    <li><a href="#artist-photos">Photos</a></li>
                </ul>
                <div id="artist-info" class="tabdiv">
                    <h3><?php echo $artist_info->artist_name;?></h3>
                    <div>
                    <?php echo $artist_info->bio;?>
                    </div>
                </div><!--/artist-info-->
                
                <div id="artist-albums" class="tabdiv">
                    <div class="album-list">
                        <?php foreach ($artist_info->albums as $key=>$val): ?>
                    	<div class="the-albums">
                        	<div class="the-album-art">
                    			<img class="the-album-art" src="<?php echo $val->album_image ;?>" />
                            </div>
                            <div class="the-album-details">
                            	<h4><?php echo $val->album_title;?></h4>
                            	<a href="<?php //LINK GOES HERE... ?>" class="click-play"></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="album-playlist">
                    	<h3>Playlist</h3>
                        <div class="audiojs" classname="audiojs" id="audiojs_wrapper0">
                        	<audio preload="" src="http://s3.amazonaws.com/audiojs/01-dead-wrong-intro.mp3"></audio>
                        <ol class="album-songs">
                        	<li class="playing"><a href="#" data-src="http://s3.amazonaws.com/audiojs/01-dead-wrong-intro.mp3">dead wrong intro</a></li>
                            <li><a href="#" data-src="http://s3.amazonaws.com/audiojs/02-juicy-r.mp3">juicy-r</a></li>
                            <li><a href="#" data-src="http://s3.amazonaws.com/audiojs/03-its-all-about-the-crystalizabeths.mp3">it's all about the crystalizabeths</a></li>
                            <li><a href="#" data-src="http://s3.amazonaws.com/audiojs/04-islands-is-the-limit.mp3">islands is the limit</a></li>
                            <li><a href="#" data-src="http://s3.amazonaws.com/audiojs/05-one-more-chance-for-a-heart-to-skip-a-beat.mp3">one more chance for a heart to skip a beat</a></li>
                            <li><a href="#" data-src="http://s3.amazonaws.com/audiojs/06-suicidal-fantasy.mp3">suicidal fantasy</a></li>
                            <li><a href="#" data-src="http://s3.amazonaws.com/audiojs/07-everyday-shelter.mp3">everyday shelter</a></li>
                            <li><a href="#" data-src="http://s3.amazonaws.com/audiojs/08-basic-hypnosis.mp3">basic hypnosis</a></li>
                            <li><a href="#" data-src="http://s3.amazonaws.com/audiojs/09-infinite-victory.mp3">infinite victory</a></li>
                            <li><a href="#" data-src="http://s3.amazonaws.com/audiojs/10-the-curious-incident-of-big-poppa-in-the-nighttime.mp3">the curious incident of big poppa in the nighttime</a></li>
<li><a href="#" data-src="http://s3.amazonaws.com/audiojs/11-mo-stars-mo-problems.mp3">mo stars mo problems</a></li>
                        </ol>
                    </div>
                    <div class="clear"></div>
                </div><!--/artist-albums-->
                
                <div id="artist-photos" class="tabdiv">
                    <div class="artist-photo">
                    	<a href="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg"><img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" title="Sample Image"/></a>
                    </div>
                    <div class="artist-photo">
                    	<a href="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg"><img src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" title="Sample Image"/></a>
                    </div>
                </div><!--/artist-photos-->
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
