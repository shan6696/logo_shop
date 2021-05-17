<?php
    function select_item_db($dbh) {
        $row_desc = array();
        $sql = 'select  id, img, name, size, sex, price, stock, comment, discount, createdate, status from logo_items';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        for ($i = count($rows) -1; $i >= 0; $i--) {
            $row_desc[] = $rows[$i];
        }
        return $row_desc;
    }
?>