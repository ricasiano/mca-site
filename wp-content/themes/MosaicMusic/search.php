<?php get_header(); ?>
<div class="outer" id="contentwrap">
<div class="postcont">
<div id="content">
<?php
$mca->endpoint = 'searchartists';
$mca->params = urlencode($_GET['s']).'/0/10';
$result = $mca->request();
$artists = $result->search_results;
$mca->endpoint = 'searchalbums';
$mca->params = urlencode($_GET['s']).'/0/10';
$result = $mca->request();
$albums = $result->search_results;
$mca->endpoint = 'searchsongs';
$mca->params = urlencode($_GET['s']).'/0/10';
$result = $mca->request();
$songs = $result->search_results;

?>
<br />
<div id="topsearch">
    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"> 
<div id="search">
<img src="<?php bloginfo('template_url'); ?>/images/search_txt.gif" />
        <input type="text" value="<?php echo $search_text; ?>" 
            name="s" id="s"  onblur="if (this.value == '')  {this.value = '<?php echo $search_text; ?>';}"  
            onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}" />
</div>
<div id="search-btn">
        <input type="image" src="<?php bloginfo('template_url'); ?>/images/go.gif" style="border:0; vertical-align: top;" /> 
</div>
<div class="clear"></div>
    </form>
    </div>
<div id="songresults">
<h2 class="title">Song Results:</h2>
<?php if (count($songs) > 0):
foreach ($songs as $my_song): ?>
<div class="new-songs">
<div class="img-thumb">
<img src="<?php echo $my_song->album_image;?>">
</div>
<div class="details-bg">
<h3><?php echo $my_song->song_title;?></h3>
<h4><?php echo $my_song->artist_name;?></h4>
<div class="options">
<div style="display:inline;"><a href="<?php echo $my_songs->preview;?>" class="listen"></a></div>
<div style="display:inline;"><a href="<?php echo $mca->buy_url.$mca->clean_url($my_songs->artist_name, true).'/'.$my_songs->song_id.'/'.$mca->clean_url($my_songs->song_title).'.html'; ?>" class="download"></a></div>
</div>
</div>
<div class="clear"></div>
</div>
<?php endforeach;
else:
    echo 'No song found.';
endif; ?>
</div>
<div id="artistresults">
<h2 class="title">Artist Results:</h2>
<?php if (count($artists) > 0):
foreach ($artists as $my_artist): ?>

<div class="artists-list">
<a href="?page_id=51&amp;artist_id=<?php echo $my_artist->id;?>">
<div class="img-thumb">
<img src="<?php echo $my_artist->image;?>">
<div class="details-bg">
<h3><?php echo $my_artist->name;?></h3>
</div>
</div>
</a>
</div>
<?php endforeach;
else:
    echo 'No artist found.';
endif;?>
</div>
<div id="albumresults">

<h2 class="title">Album Results:</h2>
<?php if (count($albums) > 0):
foreach ($albums as $my_album): ?>

<div class="artists-list">
<a href="?page_id=51&amp;artist_id=<?php echo $my_album->artist_id;?>">
<div class="img-thumb">
<img src="<?php echo $my_album->image;?>">
<div class="details-bg">
<h3><?php echo $my_album->title;?></h3>
</div>
</div>
</a>
</div>
<?php endforeach;
else:
    echo 'No album found.';
endif;?>
</pre></div>

</div>
</div>

<?php get_sidebars(); ?>
</div>
<?php get_footer(); ?>
