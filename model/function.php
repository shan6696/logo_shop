<?php
// DB接続
function get_db_connect() {
    try {
        $dbh = new PDO(DSN, DB_USER, DB_PASSWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => DB_CHARSET));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
        echo '接続できませんでした。'.$e->getMessage();
    }
    return $dbh;
}

function is_kind_post($process_kind) {
    if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['process_kind'] === "$process_kind") {
        return true;
    } 
    return false;
}

function is_error_message($process_kind, $error_message) {
    if (is_kind_post($process_kind) === true) {
        if (empty($error_message)) {
            return true;
        }
    }
}

function success_next_page($success, $next) {
    if($success === true) {
        header("Location: model/$next");
    }
}

function get_post_data($key) {
    $str = '';
    if (isset($_POST[$key])) {
        $str = $_POST[$key];
    }
    return $str;
}

function is_session() {
    if (!isset($_SESSION['id'])) {
        header ('Location: index.php');
    }
}

?>