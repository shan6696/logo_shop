<?php

function select_user_table($dbh) {
    $sql = 'select id, name, mail, address, tel, createdate from logo_users';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}

?>