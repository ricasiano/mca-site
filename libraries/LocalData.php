<?php
class LocalData extends Database {
    function __construct() {
        $this->host = CONFIG_DATABASE_HOST;
        $this->username = CONFIG_DATABASE_USER;
        $this->password = CONFIG_DATABASE_PASSWORD;
        $this->database_name = CONFIG_DATABASE_NAME;
        $this->loc_top_downloads = '';
        $this->loc_new_singles = '';
        $this->loc_new_releases = '';
        $this->loc_top_albums = '';
        $this->get_settings();
    }

    /***
        fetches configuration settings
    **/
    function get_settings() {
        $sql = "SELECT * FROM `loc_settings`";
        $result = $this->query($sql);
        $this->loc_top_downloads = $result[0]['top_downloads'];
        $this->loc_new_singles = $result[0]['new_singles'];
        $this->loc_new_releases = $result[0]['new_releases'];
        $this->loc_top_albums = $result[0]['top_albums'];
    }

    //get local active data, provide the table and field to collide to
    function get_data($table, $field, $getfield = 'id', $fieldvalue = 1) {
        $sql = sprintf("SELECT `%s` FROM `%s` WHERE `%s` = %s",
            mysql_real_escape_string($getfield),
            mysql_real_escape_string($table),
            mysql_real_escape_string($field),
            mysql_real_escape_string($fieldvalue)
        );
        $result = $this->query($sql);
        $returndata = array();
        foreach ($result as $rows) {
            $returndata[] = $rows[$getfield];
        }
        $returndata = implode(',', $returndata);
        return $returndata;
    }
    function get_all_data($table, $field, $id) {
        $sql = sprintf("SELECT * FROM `%s` WHERE `%s` = '%s'",
            mysql_real_escape_string($table),
            mysql_real_escape_string($field),
            mysql_real_escape_string($id)
        );
        $result = $this->query($sql);
        return $result;
    }
}
