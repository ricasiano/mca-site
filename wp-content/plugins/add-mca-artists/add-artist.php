<?php
/*
Plugin Name: MCA Artists
Description: Plugin for managing MCA artists contents
Version: 1.0
*/
//*************** Admin function ***************
function mca_artists_admin() {
	include('mca_artists_admin.php');
}

function mca_artists_admin_actions() {
    add_menu_page("MCA Artists", "MCA Artists", 1, "MCA_Artists", "mca_artists_admin", "",4);
}

add_action('admin_menu', 'mca_artists_admin_actions');

?>

