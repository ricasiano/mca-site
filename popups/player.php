<html>
<head><title>Audio Player</title></head>
<script type="text/javascript" src="http://localhost/mca-universal/popups/audio-player/audio-player.js"></script>  
        <script type="text/javascript">  
            AudioPlayer.setup("http://localhost/mca-universal/popups/audio-player/player.swf", {  
                width: 290  
            });  
        </script>  
  
    </head>  
    <body>  
        <p id="audioplayer_1">Now Playing...</p>  
        <script type="text/javascript">  
        AudioPlayer.embed("audioplayer_1", {soundFile: "<?php echo urldecode($_GET['play_file']);?>"});  
	</script>  
    </body>  
</html>  


