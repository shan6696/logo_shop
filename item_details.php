<?php
require_once './model/item_details.php';
require_once './conf/setting.php';
require_once './model/function.php';
session_start();
// DB接続
$dbh = get_db_connect();

$row = set_get($dbh);

$error_message = error($dbh);
// 商品数をカートテーブルに挿入
cart_in($dbh, $error_message);

action($error_message);
include_once 'view/item_details.php';
?>