<?php

function delete_item($dbh) {
    $process_kind = 'delete_item';
    if (is_kind_post($process_kind) === true) {
        $table = 'logo_items';
        $id = $_POST['id'];
        delete_db($dbh, $table, $id);
        return '削除しました';
    }
}

function delete_db($dbh, $table, $id) {
    $sql = 'delete from '. $table . ' where id = '. $id;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}

?>