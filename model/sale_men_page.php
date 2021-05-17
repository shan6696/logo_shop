<?php

function select_items_db($dbh) {
    $row_desc = array();
    $sql = "select id, name, price, size, img, stock, sex, type, discount, status, comment, createdate from logo_items where sex='men' AND status=1 AND discount > 0";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    for ($i = count($rows) -1; $i >= 0; $i--) {
        $row_desc[] = $rows[$i];
    }
    return $row_desc;
}



?>
