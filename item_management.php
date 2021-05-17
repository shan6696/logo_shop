<?php
require_once './conf/setting.php';
require_once './model/function.php';
require_once './model/item_management.php';
require_once './model/insert_db.php';
require_once './model/select_db.php';
require_once './model/update_db.php';
require_once './model/delete_db.php';
require_once './model/time_dif.php';

// DB接続
$dbh = get_db_connect();
// 画像アップロード
$img_upload_message = img_upload();
// 入力されたデータが正しいか確認
$input_data_message = confirm_input_data();
// // エラーメッセージ
$error_message = error_message($img_upload_message, $input_data_message);
// // DBに保存
$add_message = add_item_db($error_message, $dbh);
// // 在庫数変更
$update_stock_message = update_stock($dbh);
// // セールの割合を変更
$update_discount_message = update_discount($dbh);
// // ステータスを変更
$update_status_message = update_status($dbh);
// // 削除する
$delete_message = delete_item($dbh);
// // DBのデータを表示
$rows = select_item_db($dbh);
include_once './view/item_management.php';
?>