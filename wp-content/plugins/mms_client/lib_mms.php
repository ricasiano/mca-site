<?php
class Lib_MMS extends Database{
    function __construct() {
        $this->host = CONFIG_DATABASE_HOST;
        $this->username = CONFIG_DATABASE_USER;
        $this->password = CONFIG_DATABASE_PASSWORD;
        $this->database_name = CONFIG_DATABASE_NAME;
    }
       
    function show_nav() {
        $nav = array('#', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
        $navreturn = 'Browse Artist: &nbsp;&nbsp;';
    	$cnt = count($nav);
    	$ctr = 0;
        foreach ($nav as $navval){
            $navlink = ($navval == '#')? 1: $navval;
            $navreturn .= '<a class="mms_navigation" href="options-general.php?page=mms_admin&prefix_string='.$navlink.'">'.$navval.'</a> ';
            if ($ctr != $cnt){
                $navreturn .= '&nbsp;&nbsp;&nbsp;';
            }
            ++$ctr;
        }
        return $navreturn;
    }

    //main container for data, contains artist listing
    function data_table($table, $data) {
        $tabledata = '';
        $ctr = 0;
        foreach ($data as $vardata => $valdata) {
            $tabledata .= '<tr>';
            $alt = ($ctr % 2)? 'mms_td' : 'mms_td_alt';
            $id = $valdata->id;
            foreach ($valdata as $key => $val) {
                $tabledata .= ($key != 'id') ? '<td align="center" class="'.$alt.'">'.$this->display_by_type($table, $id, $key, $val).'</td>':'';
            }
            $tabledata .= '</tr><tr><td colspan="4" class="'.$alt.'" align="center"><div class="album_container" id="album_container_'.$id.'"></div></td></tr>';
            ++$ctr;
        }
        return $tabledata;
    }

    //show how the data should behave based on field type
    function display_by_type($table, $id, $key, $val) {
        $data = '';
        switch ($key) {
            case 'image':
                $data = ($val != '')?'<img class="mms_image" src="'.$val.'" />':'no image';
            break;
            case 'bio':
                $data = $this->display_bio($table, $id, $val);
            break;
            default:
                $data = '<a class="mms_anchor" href="javascript:void(0)" onclick="show_album(\''.$id.'\')">'.$val.'</a>';
            break;
        }
        return $data;
    }

    //artist biography field
    function display_bio($table, $id, $val) {
        $query = sprintf("SELECT count(*) as cnt, bio FROM `%s` WHERE `id` = '%s'",
            mysql_real_escape_string($table),
            mysql_real_escape_string($id)
        );
        $result = $this->query($query);
        $val = ($result[0]['cnt'] > 0) ? html_entity_decode($result[0]['bio']) : $val;
        $data = '<textarea cols="50" rows="7" class="mms_textarea" id="bio_'.$id.'">'.$val.'</textarea><a href="#save_response" ';
        $data .= 'onclick="save_data(\''.$table.'\', \'bio\', \''.$id.'\', \'#bio_'.$id.'\')"><img class="mms_image" src="'.MMS_PLUGIN_DIRECTORY.'images/save_icon.gif" /></a><div style="display:none"><a href="#save_response" id="trigger_response" class="inline cboxElement"/><div id="save_response" style="padding:10px; background:#fff;"></div></div>';
        return $data;
    }
}

