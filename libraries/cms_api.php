<?php
require('../mainconfig.php');
require('APIRequest.php');
require('MCA.php');
$mca = new MCA();
$mca->endpoint = 'artistinfo';
$mca->params = $_POST['artist_id'];
$result = $mca->request();
echo json_encode($result->artist_info);
