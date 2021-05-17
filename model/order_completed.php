<?php

function select_item($dbh) {
    $user_id = $_SESSION['id'];
    $sql = '    SELECT
                    logo_carts.amount,
                    logo_items.id,
                    logo_items.name,
                    logo_items.stock,
                    logo_items.price,
                    logo_items.status,
                    logo_items.size,
                    logo_items.img,
                    logo_items.discount
                FROM
                    logo_users
                INNER JOIN logo_carts ON logo_users.id = logo_carts.user_id
                INNER JOIN logo_items ON logo_carts.item_id = logo_items.id
                WHERE logo_users.id = '.$user_id;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}

function error_message($rows) {
    $error_message = array();
    if (empty($rows)) {
        $error_message[] = '商品がありません';
    }
    foreach ($rows as $row) {
        $amount = $row['amount'];
        $stock = $row['stock'];
        $status = $row['status'];
        $quantity = $stock - $amount;
        $name = $row['name'];
        if ($quantity < 0) {
            $error_message[] = $name.'の在庫数が'.($amount - $stock).'個足りないのため買えません';
        }
        if ($status === 0) {
            $error_message[] = 'この商品は非公開のため購入できません';
        }
        if (empty($rows)) {
            $error_message[] = '商品が入っていません';
        }
    }
        return array_filter($error_message);
}

function update_item($dbh, $rows, $error_message) {
    
    if (empty($error_message)) {
        foreach ($rows as $row) {
            $item_id = $row['id'];
            $amount = $row['amount'];
            $stock = $row['stock'];
            $name = $row['name'];
            $quantity = $stock - $amount;
            update_sql($dbh, $quantity, $item_id);
            cart_delete($dbh);
        }
    }
}

function update_sql($dbh, $quantity, $item_id) {
    $sql = 'update logo_items set stock = '.$quantity.' where id = ' .$item_id;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}

function cart_delete($dbh) {
    $sql = 'delete from logo_carts';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}

?>