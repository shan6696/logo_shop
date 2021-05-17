<?php
require_once './model/order.php';
require_once './conf/setting.php';
require_once './model/function.php';
session_start();

is_session();
// DB接続
$dbh = get_db_connect();
// 商品情報を$rowsに代入
$rows = select_item($dbh);

$error_message = error($rows);

include_once 'view/order.php';
?>