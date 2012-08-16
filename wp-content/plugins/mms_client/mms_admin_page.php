<?php
require('../mainconfig.php');

/** Database connection and APIs */
require('../libraries/Database.php');
require('../libraries/APIRequest.php');
require('../libraries/MCA.php');
require('lib_mms.php');
define('MMS_PLUGIN_DIRECTORY', '../wp-content/plugins/mms_client/');
$mca = new MCA();
$db = new Database();
$db->host = CONFIG_DATABASE_HOST;
$db->username = CONFIG_DATABASE_USER;
$db->password = CONFIG_DATABASE_PASSWORD;
$db->database_name = CONFIG_DATABASE_NAME;
$lib_mms = new Lib_MMS();
//request Artist listings from MyMusicStore
$mca->endpoint = 'listartists';
//this will identify what the user has clicked from the artist navigation
if(isset($_GET['prefix_string']))
$mca->params = $_GET['prefix_string'];
else
$mca->params = 1;
$result = $mca->request();
$artist_list = $result->artists;
?>
<link rel="stylesheet" type="text/css" href="<?php echo MMS_PLUGIN_DIRECTORY;?>mms.css" />
<link rel="stylesheet" type="text/css" href="<?php echo CONFIG_SITE_URL;?>wp-includes/css/colorbox.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="<?php echo CONFIG_SITE_URL;?>wp-includes/js/jquery.colorbox-min.js"></script>
<script type="text/javascript">
mms_site_url = '<?php echo CONFIG_SITE_URL;?>';
mms_plugin_directory = '<?php echo MMS_PLUGIN_DIRECTORY;?>';
</script>
<script src="<?php echo MMS_PLUGIN_DIRECTORY;?>mms.js"></script>
<script>
$(document).ready(function(){
        $(".inline").colorbox({inline:true, width:"200px"});
});
</script>
<h2>MMS Content Administration</h2>
<div align="center"><?php echo $lib_mms->show_nav(); ?> <br />&nbsp;
<table class="mms_table" cellpadding="3" cellspacing="0">
<tr>
<th width="25%" class="mms_th">Name</th>
<th width="25%" class="mms_th">Image</th>
<th width="50%" class="mms_th">Bio</th>
</tr>
<?php echo $lib_mms->data_table('loc_artist', $artist_list); ?>
</table>
</div>
