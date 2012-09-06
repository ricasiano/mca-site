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
<h2>MMS Settings</h2>
<div class="mms_settings_container">
<form method="POST" action="options-general.php?page=mms_settings">
<?php
if(isset($_POST['submit'])) {
    $db->connect();
    $query = sprintf("UPDATE `loc_settings` SET `new_releases` = '%s', `top_albums` = '%s', `top_downloads` = '%s', `new_singles` = '%s'
    , `opm_new_releases` = '%s', `opm_hot` = '%s'",
        mysql_real_escape_string($_POST['new_releases']),
        mysql_real_escape_string($_POST['top_albums']),
        mysql_real_escape_string($_POST['top_downloads']),
        mysql_real_escape_string($_POST['new_singles']),
        mysql_real_escape_string($_POST['opm_new_releases']),
        mysql_real_escape_string($_POST['opm_hot'])

    );
    $db->query($query);
    echo '<div class="mms_save_settings" align="center">Settings successfully saved'.date('Y-m-d H:i:s').'.</div>';
}
$mms_config = $db->query("SELECT * FROM `loc_settings`");
?>


<h3>Albums</h3>
&nbsp;&nbsp;- <b>New Releases:</b><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['new_releases'] == 0)? 'checked="checked"':''; echo $checked; ?> name="new_releases" id="new_releases" value="0"><span class="mms_label"> Use MMS Data</span><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['new_releases'] == 1)? 'checked="checked"':''; echo $checked; ?> name="new_releases" id="new_releases" value="1"><span class="mms_label"> Use Custom Data</span><br /><br />
&nbsp;&nbsp;- <b>Top Albums:</b><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['top_albums'] == 0)? 'checked="checked"':''; echo $checked; ?> name="top_albums" id="top_albums" value="0"><span class="mms_label"> Use MMS Data</span><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['top_albums'] == 1)? 'checked="checked"':''; echo $checked; ?> name="top_albums" id="top_albums" value="1"><span class="mms_label"> Use Custom Data</span><br /><br />
&nbsp;&nbsp;- <b>OPM New Releases:</b><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['opm_new_releases'] == 0)? 'checked="checked"':''; echo $checked; ?> name="opm_new_releases" id="opm_new_releases" value="0"><span class="mms_label"> Use MMS Data</span><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['opm_new_releases'] == 1)? 'checked="checked"':''; echo $checked; ?> name="opm_new_releases" id="opm_new_releases" value="1"><span class="mms_label"> Use Custom Data</span><br /><br />
&nbsp;&nbsp;- <b>OPM Hot:</b><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['opm_hot'] == 0)? 'checked="checked"':''; echo $checked; ?> name="opm_hot" id="opm_hot" value="0"><span class="mms_label"> Use MMS Data</span><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['opm_hot'] == 1)? 'checked="checked"':''; echo $checked; ?> name="opm_hot" id="opm_hot" value="1"><span class="mms_label"> Use Custom Data</span><br /><br />

<h3>Songs</h3>
&nbsp;&nbsp;- <b>Top Downloads:</b><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['top_downloads'] == 0)? 'checked="checked"':''; echo $checked; ?> name="top_downloads" id="top_downloads" value="0"><span class="mms_label"> Use MMS Data</span><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['top_downloads'] == 1)? 'checked="checked"':''; echo $checked; ?> name="top_downloads" id="top_downloads" value="1"><span class="mms_label"> Use Custom Data</span><br /><br />
&nbsp;&nbsp;- <b>New Singles:</b><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['new_singles'] == 0)? 'checked="checked"':''; echo $checked; ?> name="new_singles" id="new_singles" value="0"><span class="mms_label"> Use MMS Data</span><br />
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="mms_radio" <?php $checked = ($mms_config[0]['new_singles'] == 1)? 'checked="checked"':''; echo $checked; ?> name="new_singles" id="new_singles" value="1"><span class="mms_label"> Use Custom Data</span><br />

<div align="center"><input type="submit" name="submit" value="Save">
</div>
</form>
 </div>
