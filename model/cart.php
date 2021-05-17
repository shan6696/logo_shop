<?php



function select_item($dbh) {
    if (empty($error_message)) {
        $row_result = array();
        $user_id = $_SESSION['id'];
        $sql = '    SELECT
                        logo_carts.id,
                        logo_users.address,
                        logo_users.tel,
                        logo_carts.amount,
                        logo_items.name,
                        logo_items.price,
                        logo_items.stock,
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
        foreach ($rows as $row) {
            if ($row['status'] === 1 && $row['stock'] - $row['amount'] >= 0) {
            $row_result[] =  $row;
            
            } else {
                auto_delete($dbh, $row);
            }
        }
        return array_filter($row_result);
    }
}

function auto_delete($dbh, $row) {
    $sql = 'delete from logo_carts where id ='.$row['id'];
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
}

function update_amount($dbh, $error_message) {
    $process_kind = 'update_amount';
    if (is_kind_post($process_kind) === true && empty($error_message)) {
        $amount = $_POST['amount'];
        $cart_id = $_POST['cart_id'];
        $sql = 'update logo_carts set amount = '.$amount.' where id = '.$cart_id;
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        return '変更しました';
    }
}

function delete_cart($dbh) {
    $process_kind = 'delete_cart';
    if(is_kind_post($process_kind) === true) {
        $cart_id = $_POST['cart_id'];
        $sql = 'delete from logo_carts where id = '.$cart_id;
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        return '削除しました';
    }
}

function update_match() {
    $process_kind = 'update_amount';
    if(is_kind_post($process_kind) === true) {
        $amount = $_POST['amount'];
        $stock = $_POST['stock'];
        if(preg_match('/^[0-9]+$/', $amount) !== 1 || $amount === '0') {
            return '個数の入力は正の整数のみです';
        } elseif ($stock < $amount) {
            return '在庫数がたりません。在庫数は'.$stock.'個です';
        }
    }
}

?>