<?php
require_once './conf/setting.php';
require_once './model/function.php';
session_start();
// DB接続
$dbh = get_db_connect();

include_once './view/index.php';

?>