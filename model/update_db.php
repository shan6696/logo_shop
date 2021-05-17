<?php

function update_stock($dbh) {
    $process_kind = 'update_stock';
    if (is_kind_post($process_kind) === true) {
        if ($_POST['stock'] === '') {
            return $error_message = '個数を入力してください';
        }
        if (preg_match('/^[0-9]+$/', $_POST['stock']) !== 1) {
            return $error_message = '値段は半角数字で入力してください';
        }
        if (!isset($error_message)){
            $set = 'stock';
            $value = $_POST['stock'];
            $id = $_POST['id'];
            update_db($dbh, $set, $value, $id);
            return '在庫数を変更しました';
        }
    }
}

function update_discount($dbh) {
    $process_kind = 'update_discount';
    if (is_kind_post($process_kind) === true) {
        $set = 'discount';
        $value = $_POST['discount'];
        $id = $_POST['id'];
        update_db($dbh, $set, $value, $id);
        return 'セール値を変更しました';
    }
}

function update_status($dbh) {
    $process_kind = 'update_status';
    if (is_kind_post($process_kind) === true) {
        $set = 'status';
        $value = $_POST['status'];
        $id = $_POST['id'];
        update_db($dbh, $set, $value, $id);
        return 'ステータスを変更しました';
    }
}

function update_db($dbh, $set, $value, $id) {
    $updatedate = date("'Y-m-d H:i:s'");
    $sql = 'update logo_items set ' . $set . ' = ' . $value . ', updatedate = '. $updatedate . ' where id = ' . $id ;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}
?>