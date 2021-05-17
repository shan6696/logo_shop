<?php
    function insert_item_table($dbh, $name, $price, $stock, $size, $sex, $type, $img, $status, $features, $createdate) {
        $sql = 'insert into logo_items (name, price, size, img, stock, sex, type, status, comment, createdate)
                value (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $dbh->prepare($sql);
        $stmt->bindvalue(1, $name, PDO::PARAM_STR);
        $stmt->bindvalue(2, $price, PDO::PARAM_INT);
        $stmt->bindvalue(3, $size, PDO::PARAM_STR);
        $stmt->bindvalue(4, $img, PDO::PARAM_STR);
        $stmt->bindvalue(5, $stock, PDO::PARAM_INT);
        $stmt->bindvalue(6, $sex, PDO::PARAM_STR);
        $stmt->bindvalue(7, $type, PDO::PARAM_STR);
        $stmt->bindvalue(8, $status, PDO::PARAM_STR);
        $stmt->bindvalue(9, $features, PDO::PARAM_STR);
        $stmt->bindvalue(10, $createdate, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    function insert_user_table($dbh, $name, $mail, $password, $address, $tel, $createdate) {
        $sql = 'insert into logo_users (name, mail, password, address, tel, createdate)
                value (?, ?, ?, ?, ?, ?)';
        $stmt = $dbh->prepare($sql);
        $stmt->bindvalue(1, $name, PDO::PARAM_STR);
        $stmt->bindvalue(2, $mail, PDO::PARAM_INT);
        $stmt->bindvalue(3, $password, PDO::PARAM_STR);
        $stmt->bindvalue(4, $address, PDO::PARAM_STR);
        $stmt->bindvalue(5, $tel, PDO::PARAM_INT);
        $stmt->bindvalue(6, $createdate, PDO::PARAM_STR);
        $stmt->execute();
    }
?>