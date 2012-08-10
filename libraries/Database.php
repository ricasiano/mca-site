<?php
class Database {
    function __construct() {
        //connection params
        $this->host = null;
        $this->username = null;
        $this->password = null;
        $this->database_name = null;
    }

    /***
        initialize db connection
    **/
    private function connect() {
        mysql_connect($this->host, $this->username, $this->password) or die('DB Connection error');
        mysql_select_db($this->database_name) or die('Invalid database selected');
    }
    public function query($sql) {
        $this->connect();
        $result = mysql_query($sql) or die(mysql_error());
        $data = array();
        $ctr = 0;
        if(count($result) > 0) {
            while ($rows = mysql_fetch_assoc($result)) {
                foreach($rows as $key=>$val) {
                    $data[$ctr][$key] = $val;
                }
            ++$ctr;
            }
        }
        mysql_close();
        return $data;
    }
}
