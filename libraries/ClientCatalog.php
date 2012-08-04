<?php
class ClientCatalog extends Database {
    function __construct() {
        //the id of the term/category to fetch
        $this->identifier = null;
        //the taxonomy term as defined by wordpress, defaults to CataBlog's taxonomy identifier
        $this->taxonomy = 'catalog-terms';
    }

    /***
        builds the default style for the catalog
    **/
    function catalogBuilder($id, $post_title, $post_content, $image, $upload_dir) {
        ob_start();
        ?>
    <div class="new-album">
        <a class="inline" href="#pop_content_<?php echo $id;?>">
            <div class="img-holder"><img src="<?php 
            echo $upload_dir['baseurl'].'/catablog/originals/'.$image;?>" /></div>
            <h3><?php 
            $title = explode(' - ', $post_title);
            echo trim($title[0]); ?></h3>
            <h4><?php if (isset($title[1]))
            echo trim($title[1]); ?></h4>
        </a>
    </div>
    <!-- This contains the hidden content for inline calls -->
    <div style="display:none">
        <div id="pop_content_<?php echo $id;?>" style="padding:10px; background:#fff;">
        <h3><?php echo $title[0];?></h3>
        <div align="center"><img src="<?php 
        echo $upload_dir['baseurl'].'/catablog/originals/'.$image;?>" /></div>
        <h4><?php if (isset($title[1]))
        echo trim($title[1]); ?></h4>
        <?php echo nl2br($post_content);?>
        </div>
    </div>

        <?php
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }

    /***
        initialize the request to mymusicstore server
    **/
    function getItems() {
        $sql = 'SELECT p.ID, p.post_title, p.post_content, pm.meta_value
        FROM wp_postmeta AS pm
        LEFT JOIN wp_posts AS p ON pm.post_id = p.ID
        LEFT JOIN wp_term_relationships AS tr ON p.ID = tr.object_id
        LEFT JOIN wp_term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
        LEFT JOIN wp_terms AS t ON tt.term_id = t.term_id
        WHERE t.term_id = '.$this->identifier.'
        AND tt.taxonomy LIKE  \''.$this->taxonomy.'\'
        GROUP BY p.ID
        ORDER BY p.post_title';

        $result = $this->query($sql);
        //restructure data, since wordpress includes json in dbase... tsk tsk
        $data = array();
        foreach ($result as $result_keys => $result_val) {
            foreach($result_val as $row_key => $row_val) {
                if ($row_key == 'meta_value') {
                    //parse and remove unnecessary data since json is invalid, double tsk tsk...
                    $meta_value = explode('"', $row_val);
                    $data[$result_keys]['image'] = $meta_value[3];
                }
                else
                $data[$result_keys][$row_key] = $row_val;
            }
        }
        return $data;
    }
}
