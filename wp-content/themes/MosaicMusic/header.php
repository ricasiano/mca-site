<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php function wp_initialize_the_theme() { if (!function_exists("wp_initialize_the_theme_load") || !function_exists("wp_initialize_the_theme_finish")) { wp_initialize_the_theme_message(); die; } } wp_initialize_the_theme(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<link rel="icon" href="favicon.ico" type="image/x-ico"/>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'/>
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/screen.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/print.css" type="text/css" media="print" />
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo includes_url();?>css/colorbox.css" />

<!--[if IE 6]>
<script src="<?php bloginfo('template_url'); ?>/js/pngfix.js"></script>
<![endif]--> 
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js" type="text/javascript"></script>
<script src="<?php echo includes_url();?>js/jquery.colorbox-min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/menu/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/menu/custom.js"></script> //-->
<!-- <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/audio.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/audio-player.js"></script> //-->

<script>
$(document).ready(function(){
        $(".ajax").colorbox();
        $(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
        $(".iframe").colorbox({iframe:true, width:350, height:420, scrolling: false});
        $(".inline").colorbox({inline:true, width:"50%"});
        //Example of preserving a JavaScript event for inline calls.
        $("#click").click(function(){ 
            $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
            return false;
            });
});
</script>


<?php echo get_theme_option("head") . "\n";  wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">
<div id="wrapper-bg"><div id="wrapper-bg2">
<div id="outer-wrapper" class="outer-wrapper">  
<div class="outer">


</div>
<div id="header" class="outer">
<div class="header-part">
<?php
$get_logo_image = get_theme_option('logo');
$get_banner_image = get_theme_option('topbanner');
if($get_logo_image != '') {
    ?>
        <a href="<?php bloginfo('url'); ?>"><img src="<?php echo $get_logo_image; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="logoimg" /></a>
        <?php
} else {
    ?>
        <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <h2><?php bloginfo('description'); ?></h2>
        <?php
}
?>

</div>

<div class="header-part rightsector">
<div style="padding: 0 0 0 0; text-align:right;">

<a href="<?php bloginfo('url'); ?>"><img src="<?php echo $get_banner_image; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/></a>

</div>
</div>
</div>

<div class="outer">
<div class="navi-links">
<div class="navi-primary-container">
<?php
if(function_exists('wp_nav_menu')) {
    wp_nav_menu( 'theme_location=menu_1&menu_class=navi-primary navis&container=&fallback_cb=menu_1_default');
} else {
    menu_1_default();
}

function menu_1_default()
{
    ?>
        <ul class="navis navi-primary">
        <li <?php if(is_home()) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
        <?php wp_list_pages('sort_column=menu_order&title_li=' ); ?>
        </ul>
        <?php
}

?>
</div>
</div>

<!--<div id="topsearch">
<?php get_search_form(); ?> 
</div>-->
</div>
<div class="outer" id="contentwrap">	
<?php 
include (TEMPLATEPATH . '/upperbox.php');
