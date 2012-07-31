<div class="log-sign">
    <div class="thelogform">
    <form>
    <label for="e-mail">Email:&nbsp;</label><input id="e-mail" type="email" />
    <label for="pword">Password:&nbsp;</label><input id="pword" type="password" />
    <input type="image" src="<?php bloginfo('template_url'); ?>/images/submit.gif" name="login-btn" style="vertical-align:middle;"><br>
    </form>
    </div>
<div style="width: 30%; padding: 0 0 0 0; text-align:right; float:right;">
<?php if(get_theme_option('socialnetworks') != '') {
    		?>
    			<div class="addthis_toolbox">   
    			    <!--<?php if(get_theme_option('rss') != '') { ?><a href="<?php echo get_theme_option('rss'); ?>"  title="Subsrcribe"><img src="<?php bloginfo('template_url'); ?>/images/social-icons/rss.png"  style="margin:0 4px 0 0;"  /></a><?php } ?>-->

<?php if(get_theme_option('facebook') != '') { ?><a href="<?php echo get_theme_option('facebook'); ?>" title="Facebook"><img src="<?php bloginfo('template_url'); ?>/images/social-icons/facebook.png"  style="margin:0 4px 0 0; "  title="Facebook" /></a><?php } ?>

<?php if(get_theme_option('twitter') != '') { ?><a href="<?php echo get_theme_option('twitter'); ?>" title="Twitter"><img src="<?php bloginfo('template_url'); ?>/images/social-icons/twitter.png"  style="margin:0 4px 0 0; " title="Twitter" /></a><?php } ?>

<!--<?php if(get_theme_option('googleplus') != '') { ?><a href="<?php echo get_theme_option('googleplus'); ?>" title="Google Plus"><img src="<?php bloginfo('template_url'); ?>/images/social-icons/googleplus.png"  style="margin:0 4px 0 0; "  title="Google Plus" /></a><?php } ?>

<?php if(get_theme_option('linkedin') != '') { ?><a href="<?php echo get_theme_option('linkedin'); ?>" title="LinkedIn"><img src="<?php bloginfo('template_url'); ?>/images/social-icons/linkedin.png"  style="margin:0 4px 0 0; "  title="LinkedIn" /></a><?php } ?>-->

<?php if(get_theme_option('youtube') != '') { ?><a href="<?php echo get_theme_option('youtube'); ?>" title="YouTube"><img src="<?php bloginfo('template_url'); ?>/images/social-icons/youtube.png"  style="margin:0 4px 0 0; "  title="YouTube" /></a><?php } ?>

<!--<?php if(get_theme_option('email') != '') { ?><a href="<?php echo get_theme_option('email'); ?>" title="eMail"><img src="<?php bloginfo('template_url'); ?>/images/social-icons/email.png"  style="margin:0 4px 0 0; "  title="eMail" /></a><?php } ?>-->
<div style="display:inline;"><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.mcamusic.com.ph&amp;layout=button_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; width: 120px; height:21px; float:right;" align="center" allowtransparency="true"></iframe></div>
    			    
    			   
    			</div><?php
    	}
    ?>
		</div>
	<div style="clear:both"></div>
</div>