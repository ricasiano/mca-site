</div>
<div id="footer-widgets-outer" class="clearfix">
<div class="footer-widgets-inner">
<?php
        /**
        * Footer Widget Areas. Manage the widgets from: wp-admin > Appearance > Widgets > Footer Left (Just add your own widgest and default widgets will go away)
        */
		$get_footer_image = get_theme_option('logofooter');
        ?>
<!--
<ul class="footer-widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Left') ) : ?>
				<li><h2><?php _e('Recent Posts'); ?></h2>
			               <ul>
					<?php wp_get_archives('type=postbypost&limit=5'); ?>  
			               </ul>
				</li>				
		<?php endif; ?>
</ul> end footer left -->
<?php
        /**
        * Footer  Widget Areas. Manage the widgets from: wp-admin > Appearance > Widgets > Footer Center (Just add your own widgest and default widgets will go away)
        */
        ?>
<!-- <ul class="footer-widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Center') ) : ?>
				<li id="tag_cloud"><h2>Tags Cloud</h2>
					<?php wp_tag_cloud('largest=18&format=flat&number=20'); ?>
				</li>
<?php endif; ?>
</ul><!-- end footer central -->
<?php
        /**
        * Footer  Widget Areas. Manage the widgets from: wp-admin -> Appearance -> Widgets Footer Right (Just add your own widgest and default widgets will go away)
        */
        ?>
<!--	<ul class="footer-widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Right') ) : ?>
				<li><h2>About Us</h2>
		Those are default Wordpress widgets, just add your own Appearance > Widgets and they will go away.<br /><br />

<strong>Our Company Address</strong><br />
New York Plaza<br />
NY 10004 <br />
Phone: (212) 543 -4322 <br />
Fax: (800) 343-2365<br />

</li>
		<?php endif; ?>
</ul><!-- end footer right -->
</div>
</div>


<div id="footer-outer">
<div id="footer">
	<div id="footer-logo">
    <a href="<?php bloginfo('url'); ?>"><img src="<?php echo $get_footer_image; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/></a>
    </div>
    <div id="footer-nav">
    <?php
                    if(function_exists('wp_nav_menu')) {
                        wp_nav_menu( 'theme_location=menu_2&menu_class=footer-navs&container=&fallback_cb=menu_2_default');
                    } else {
                        menu_2_default();
                    }
                    
                    function menu_2_default()
                    {
                        ?>
                        <ul class="">
    						<li <?php if(is_home()) { ?> class="" <?php } ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
    						<?php wp_list_pages('sort_column=menu_order&title_li=' ); ?>
    					</ul>
                        <?php
                    }
                    
                ?>
    </div>
    <div class="clear">Copyright &copy; <a href="<?php bloginfo('home'); ?>"><strong><?php bloginfo('name'); ?></strong></a>  - <?php bloginfo('description'); ?> - Powered by <a href="http://wordpress.org/"><strong>WordPress</strong></a>
    </div>
</div>

   <?php // This theme is released free for use under creative commons licence. http://creativecommons.org/licenses/by/3.0/
            // All links in the footer should remain intact, until you buy links free theme.
            // Warning! Your site may stop working if these links are edited or deleted  ?>
 <div id="info">This theme is sponsored by <a href="http://www.corporateoffice.us/">corporate phone number</a> along with <a href="http://www.washingmachines.net/">washing machine</a>, <a href="http://www.tvandradio.net/">listen to music</a> and <a href="http://www.universityaddress.com/">College reviews</a></div>
</div></div></div>

<?php
	 wp_footer();
	echo get_theme_option("footer")  . "\n";
?>
</body>
</html>