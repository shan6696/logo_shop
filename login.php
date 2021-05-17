<?php
require_once './conf/setting.php';
require_once './model/function.php';
require_once './model/login.php';
session_start();
// DB接続
$dbh = get_db_connect();
// メールアドレスが一致するか
$mail_error_message = mail_match_check($dbh);

// パスワードが一致するか
$pass_error_message = password_match_check($mail_error_message);

// ログイン成功時の処理


$success = login_success($mail_error_message, $pass_error_message);
success_next_page($success, '../index.php');
include_once './view/login.php';

?>