<?php require ('../mainconfig.php'); ?>
<html>
<head><title>RBTs</title></head>
    </head>  
    <body style="font-family: verdana, arial, sans-serif; font-size: 12px">  
	<div align="center">
    Get the <b>Ringback</b> Tone!<br />
    <u><?php echo urldecode($_GET['song_title']).' by ' .urldecode($_GET['artist_name']);?></u><br />
    Text code to your Mobile Phone<br /><br />
    <?php if ($_GET['rbt_smart'] != ''): ?>
    Text <?php echo $_GET['rbt_smart'];?> to 2728 for Smart<br />
    <?php endif; ?>
    <?php if ($_GET['rbt_globe'] != ''): ?>
    Text <?php echo $_GET['rbt_globe'];?> to nnnn for Globe<br />
    <?php endif; ?>
    <?php if ($_GET['rbt_sun'] != ''): ?>
    Text <?php echo $_GET['rbt_sun'];?> to nnnn for Sun<br />
    <?php endif; ?><br />
    P0.00 for 0 days
    </div>
    </body>  
</html>  
