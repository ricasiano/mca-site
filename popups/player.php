<?php require ('../mainconfig.php'); ?>
<html>
<head><title>Audio Player</title></head>
<script type="text/javascript" src="<?php echo CONFIG_SITE_URL;?>popups/audio-player/audio-player.js"></script>  
        <script type="text/javascript">  
            AudioPlayer.setup("<?php echo CONFIG_SITE_URL;?>popups/audio-player/player.swf", {  
                width: 290,
                autostart: "yes",
                loop: "yes"
            });  
        </script>  
  
    </head>  
    <body style="font-family: verdana, arial, sans-serif; font-size: 12px">  
	<?php if ($_GET['artist_image'] != ''): ?>
	<img src="<?php echo str_replace('|', '.', urldecode($_GET['artist_image']));?>" />
	<?php  
	endif;
	?>
	<br />
        <p id="audioplayer_1"></p><br />
	<?php 
	echo '<b>'.urldecode($_GET['song_title']).'<br /></b>';
	echo urldecode($_GET['artist_name']); ?>
        <script type="text/javascript">  
        AudioPlayer.embed("audioplayer_1", {soundFile: "<?php echo urldecode($_GET['play_file']);?>"});  
	</script>  
    </body>  
</html>  
