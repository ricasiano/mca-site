<div class="wrap">
<?php    echo "<h2>MCA Artists</h2>";?>

<form name="mca_artists_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<?php    echo "<h4>Add New Artist</h4>"; ?>
	<p>Name<input type="text" name="artist_name" value="" size="20"></p>
	<p>Bio<textarea name="artist_bio"></textarea></p>
	<p>Preview Image<input type="text" name="preview_image" id="preview_image"><input id="preview_image_button" type="button" value="Upload Image" /></p>
	<p>Artist Profile Banner<input type="text" name="banner_image" id="banner_image"><input id="banner_image_button" type="button" value="Upload Image" /></p>
	<hr />	

	<p class="submit">
	<input type="submit" name="Submit" value="Add" onsubmit=""/>
	</p>
</form>
<script type="text/javascript" language="javascript">
jQuery(document).ready(function() {
	var preview_img;

    jQuery('#preview_image_button').click(function() {
        preview_img = jQuery('#preview_image').attr('name');
        tb_show('Upload Image', 'media-upload.php?type=image&amp;TB_iframe=true&amp;width=640&amp;height=105');
        return false;
    });

window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html) {

if (preview_img) {
	imgurl = jQuery(html).attr('href');
        jQuery('#preview_image').val(imgurl);
tb_remove();
       preview_img = '';

		} else {
			window.original_send_to_editor(html);
		}
};

});

jQuery(document).ready(function() {
	var banner_img;

    jQuery('#banner_image_button').click(function() {
        banner_img = jQuery('#banner_image').attr('name');
        tb_show('Upload Image', 'media-upload.php?type=image&amp;TB_iframe=1');
        return false;
    });

window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html) {

if (banner_img) {
	imgurl = jQuery(html).attr('href');
        jQuery('#banner_image').val(imgurl);
tb_remove();
       banner_img = '';

		} else {
			window.original_send_to_editor(html);
		}
};

});
</script>
<?php
global $wpdb;
$a_name = $_POST['artist_name'];
$a_bio = $_POST['artist_bio'];
?>

