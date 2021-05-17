<?php
require_once './model/header.php';
require_once './conf/setting.php';
require_once './model/function.php';


// DB接続
$dbh = get_db_connect();
// DBからcartのデータをもってくる
$header_rows = select_sub_item($dbh);

include_once 'view/header.php';
?>