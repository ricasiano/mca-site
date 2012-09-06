<html>
<head><title>RBTs</title></head>
    </head>  
    <body style="font-family: verdana, arial, sans-serif; font-size: 12px">  
	<div align="center">
    Get the <b>Ringback</b> Tone!<br /><br />
    <?php if ($_GET['artist_image'] != '') : ?>
    <img src="<?php echo str_replace('|', '.', urldecode($_GET['artist_image']));?>" height="100"/><br />
    <?php endif; ?>
    <u><?php echo urldecode($_GET['song_title']).' by ' .urldecode($_GET['artist_name']);?></u><br />
    Text code to your Mobile Phone<br /><br />
    <?php if ($_GET['rbt_smart'] != ''): ?>
    Text <?php echo $_GET['rbt_smart'];?> to <b>2728</b> for Smart<br />
    <?php endif; ?>
    <?php if ($_GET['rbt_globe'] != ''): ?>
    Text <?php echo $_GET['rbt_globe'];?> to <b>2332</b> for Globe<br />
    <?php endif; ?>
    <?php if ($_GET['rbt_sun'] != ''): ?>
    Text <?php echo $_GET['rbt_sun'];?> to <b>2300</b> for Sun<br />
    <?php endif; ?><br />
    P15.00 for 5 days
    </div>
    </body>  
</html>  
