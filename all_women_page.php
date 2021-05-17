<?php
require_once './model/all_women_page.php';
require_once './conf/setting.php';
require_once './model/function.php';
session_start();
// DB接続
$dbh = get_db_connect();
// DBからすべてのデータを$rowsに代入
$rows = select_items_db($dbh);



include_once 'view/all_women_page.php';

?>