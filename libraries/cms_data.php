<?php
require('../mainconfig.php');

/** Database connection and APIs */
require('Database.php');
$db = new Database();
$db->host = CONFIG_DATABASE_HOST;
$db->username = CONFIG_DATABASE_USER;
$db->password = CONFIG_DATABASE_PASSWORD;
$db->database_name = CONFIG_DATABASE_NAME;
if (isset($_POST['request_type'])) {
    $db->connect();
    $query = sprintf("SELECT count(*) as cnt FROM `%s` WHERE `id` = '%s'",
        mysql_real_escape_string($_POST['table']),
        mysql_real_escape_string($_POST['id'])
        );
    $count = $db->query($query);
    if ($_POST['request_type'] == 'post_rbt') {
        if ($count[0]['cnt'] == 0) {
            $query = sprintf("INSERT INTO `%s`(`id`, `smart_rbt_keyword`, `globe_rbt_keyword`, `sun_rbt_keyword`) VALUES('%s', '%s', '%s', '%s')",
                mysql_real_escape_string($_POST['table']),
                mysql_real_escape_string($_POST['id']),
                mysql_real_escape_string($_POST['smart_rbt_keyword']),
                mysql_real_escape_string($_POST['globe_rbt_keyword']),
                mysql_real_escape_string($_POST['sun_rbt_keyword'])
            );
        }
        else {
            $query = sprintf("UPDATE `%s` SET `smart_rbt_keyword` = '%s', `globe_rbt_keyword` = '%s', `sun_rbt_keyword` = '%s' WHERE `id` = '%s'",
                mysql_real_escape_string($_POST['table']),
                mysql_real_escape_string($_POST['smart_rbt_keyword']),
                mysql_real_escape_string($_POST['globe_rbt_keyword']),
                mysql_real_escape_string($_POST['sun_rbt_keyword']),
                mysql_real_escape_string($_POST['id'])
            );
        }
    }
    else {
        if ($count[0]['cnt'] == 0) {
            $query = sprintf("INSERT INTO `%s`(`id`, `%s`) VALUES('%s', '%s')",
                mysql_real_escape_string($_POST['table']),
                mysql_real_escape_string($_POST['field']),
                mysql_real_escape_string($_POST['id']),
                mysql_real_escape_string(htmlentities($_POST['value']))
            );
        }
        else {
            $query = sprintf("UPDATE `%s` SET `%s` = '%s' WHERE`id` = '%s'",
                mysql_real_escape_string($_POST['table']),
                mysql_real_escape_string($_POST['field']),
                mysql_real_escape_string(htmlentities($_POST['value'])),
                mysql_real_escape_string($_POST['id'])
            );
        }
    }
    $db->save($query);
    echo json_encode(array('result' => 'Data has been saved.'));
}
else if (isset($_GET['request_type'])) {
    $db->connect();
    $query = sprintf("SELECT  * FROM `%s` WHERE `%s` = '%s'",
        mysql_real_escape_string($_GET['table']),
        mysql_real_escape_string($_GET['field']),
        mysql_real_escape_string($_GET['value'])
    );
    $data = $db->query($query);
    if (isset($data[0]))
    echo substr(json_encode(array($data[0])), 1, -1);
}
