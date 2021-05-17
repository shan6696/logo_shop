<?php
require_once 'model/user_information.php';
require_once 'conf/setting.php';
require_once 'model/function.php';

$dbh = get_db_connect();

$rows = select_user_table($dbh);

include_once 'view/user_information.php';
?>