<?php $search_text = empty($_GET['s']) ? "" : get_search_query(); ?> 

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