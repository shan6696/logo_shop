<?php

function match_check_db($dbh, $sql) {
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetch();
    if (!empty($rows)) {
        return $rows;
    } else {
        return false;
    }
}



?>