<?php
require('../mainconfig.php');

/** Database connection and APIs */
require('Database.php');
$db = new Database();
$db->host = CONFIG_DATABASE_HOST;
$db->username = CONFIG_DATABASE_USER;
$db->password = CONFIG_DATABASE_PASSWORD;
$db->database_name = CONFIG_DATABASE_NAME;
//table field id value
$db->connect();
$query = sprintf("SELECT  * FROM `%s` WHERE `id` = '%s'",
    mysql_real_escape_string($_GET['table']),
    mysql_real_escape_string($_GET['id'])
    );
    $data = $db->query($query);
}
echo json_encode(array('result' => $data));
