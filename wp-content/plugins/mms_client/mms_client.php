<?php
/*
Plugin Name: MMS Client Content Administration
Plugin URI: http://www.mymusicstore.ph
Description: Allows management of Top downloads, singles etc... based from current content on MMS
Author: Xybersolutions
Version: 1.0
Author URI: http://www.mymusicstore.ph
*/

/* ===============================
  A D M I N   M E N U / P A G E
================================*/
add_action('admin_menu', 'mms_menu');
function mms_menu() {
    add_options_page('MMS CMS Administration', 'MMS CMS Administration', 7, 'mms_admin', 'mms_cms_administration');
    add_options_page('MMS Settings', 'MMS Settings', 7, 'mms_settings', 'mms_cms_settings');

}
add_action('admin_cms', 'mms_menu');
function mms_cms_administration() {
    include('mms_admin_page.php');
}
function mms_cms_settings() {
    include('mms_settings.php');
}
