<?php
require_once './conf/setting.php';
require_once './model/function.php';
require_once './model/insert_db.php';
require_once './model/signin.php';
require_once './model/check.php';

// DB接続
$dbh = get_db_connect();
// 入力データの確認
$error_message = confirm_input_data($dbh);
// DBに保存
$success = add_user_db($error_message, $dbh);
// セッションにデータ保存
save_data_session($error_message, $dbh);
// 登録完了ページへ
success_next_page($success, '../signin_completed.php');

include_once './view/signin.php';

?>