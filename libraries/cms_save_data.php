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

if (isset($_POST)) {
    $db->connect();
    $query = sprintf("SELECT count(*) as cnt FROM `%s` WHERE `id` = '%s'",
        mysql_real_escape_string($_POST['table']),
        mysql_real_escape_string($_POST['id'])
        );
    $count = $db->query($query);
    if ($count[0]['cnt'] == 0) {
        $db->connect();
        $query = sprintf("INSERT INTO `%s`(`id`, `%s`) VALUES('%s', '%s')",
            mysql_real_escape_string($_POST['table']),
            mysql_real_escape_string($_POST['field']),
            mysql_real_escape_string($_POST['id']),
            mysql_real_escape_string(htmlentities($_POST['value']))
        );
    }
    else {
        $db->connect();
        $query = sprintf("UPDATE `%s` SET `%s` = '%s' WHERE`id` = '%s'",
            mysql_real_escape_string($_POST['table']),
            mysql_real_escape_string($_POST['field']),
            mysql_real_escape_string(htmlentities($_POST['value'])),
            mysql_real_escape_string($_POST['id'])
        );
    }
    $db->save($query);
    echo json_encode(array('result' => 'Data has been saved.'));
}
elseif (isset($_GET)) {

}
