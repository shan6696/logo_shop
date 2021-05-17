<?php
require_once './model/order_completed.php';
require_once './conf/setting.php';
require_once './model/function.php';
session_start();
is_session();
// DB接続
$dbh = get_db_connect();
// 商品情報を$rowsに代入
$rows = select_item($dbh);
$error_message = error_message($rows);
update_item($dbh, $rows, $error_message);

include_once 'view/order_completed.php';
?>