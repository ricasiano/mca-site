<?php
/*
Template Name: Artist's Profile
*/
?>
<?php get_header(); ?>
<!--<div class="outer" id="contentwrap">-->
	<div class="postcont">
		<div id="content">	
			<?php 
			$artist_id = $_GET['artistid'];
			?>
			<div class="artist-banner" style="background:url(<?php bloginfo('template_url'); ?>/images/artists/Akon_test.jpg) no-repeat;">
           	</div>
            
            <div id="artist-tabs" class="artist-widget">
                <ul class="artist-nav">
                    <li><a href="#artist-info">Info</a></li>
                    <li><a href="#artist-albums">Albums</a></li>
                    <li><a href="#artist-photos">Photos</a></li>
                </ul>
                <div id="artist-info" class="tabdiv">
                    <h3>Artist name goes here...</h3>
                    <div>
                    	<p>After winning music fans over with his 2003 multi-platinum debut Trouble, Senegalese singer Akon returns with more stories from his personal journey via his sophomore CD Konvicted. If Trouble was Akon's ode to redemption (before his music career took off he served time for car theft), Konvicted picks up at rebirth. His mission now is to reinvent himself through his salvation - music.</p>

<p>The son of accomplished jazz musician Mor Thiam, Akon was introduced to varied musical styles early on. "I grew-up listening to all kinds of music. Obviously I love soul songs, but I also like mixing in other types of music," Akon confesses. "For every Stevie Wonder track I've listened to, there is another by Steely Dan that helped shape me as an artist."</p>
                    </div>
                </div><!--/artist-info-->
                
                <div id="artist-albums" class="tabdiv">
                    <div class="album-list">
                    	<div class="the-albums">
                        	<div class="the-album-art">
                    			<img class="the-album-art" src="<?php bloginfo('template_url'); ?>/images/top_album/bornthiswaydeluxe.jpg" />
                            </div>
                            <div class="the-album-details">
                            	<h4>Album name</h4></audio>
                            	<a href="<?php //LINK GOES HERE... ?>" class="click-play"></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="album-playlist">
                    	<h3>Playlist</h3>
                        <div class="audiojs  " classname="audiojs" id="audiojs_wrapper0">
                        	<audio controls="controls" preload="" src="http://s3.amazonaws.com/audiojs/01-dead-wrong-intro.mp3" autoplay="autoplay"></audio>
                            <!--<div class="play-pause">
                                <p class="play"></p>
                                <p class="pause"></p>
                                <p class="loading"></p>
                                <p class="error"></p>
                            </div>
                            <div class="scrubber">
                                <div class="progress" style="width: 53.124151165402px; "></div>
                                <div class="loaded" style="width: 280px; "></div>
                            </div>
                            <div class="time">
                                <em class="played">00:47</em>/<strong class="duration">04:09</strong>
                            </div>
                            <div class="error-message"></div>
                        </div>-->
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