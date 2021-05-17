<?php
require_once './model/cart.php';
require_once './conf/setting.php';
require_once './model/function.php';
session_start();

is_session();
// DB接続
$dbh = get_db_connect();


$error_message = update_match();
// 予約個数変更
$update_message = update_amount($dbh, $error_message);
// カート商品削除
$delete_message = delete_cart($dbh);
// 商品情報を持ってくる
$rows = select_item($dbh);
include_once 'view/cart.php';
?>