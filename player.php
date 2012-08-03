<html>
<head><title>Audio Player</title></head>
<body>
<audio controls="controls" autoplay="autoplay">
    <source src="<?php echo urldecode($_GET['play_file']);?>" type="audio/mp3" />
      Your browser does not support the audio player.
      </audio> 
</body>
</html>

