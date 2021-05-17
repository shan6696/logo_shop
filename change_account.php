<?php
require_once './conf/setting.php';
require_once './model/function.php';
require_once './model/change_account.php';
session_start();

is_session();
// DB接続
$dbh = get_db_connect();
//  postのエラー確認
 $error_message = confirm_change_input_data($dbh);
//  db変更
 $result = change_account($error_message, $dbh);
//  セッション変更
 $success =change_session($result);
//  変更完了画面に遷移
success_next_page($success, '../change_account_completed.php');

include_once 'view/change_account.php';

?>