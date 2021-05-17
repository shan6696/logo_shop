<?php

function error($rows) {
    $error_message = '';
    if (empty($rows)) {
        $error_message = '商品が非公開又は削除されました';
    }
    return $error_message;
}

function select_item($dbh) {
    $user_id = $_SESSION['id'];
    $sql = '    SELECT
                    logo_carts.id,

                    logo_carts.amount,
                    logo_items.name,
                    logo_items.price,
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

?>