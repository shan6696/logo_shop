<?php

function set_get($dbh) {
        $sql = 'select id, name, price, img, stock, size, comment, discount from logo_items where id = '.$_GET['id'];
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetch();
        return $rows;
}

function error($dbh) {
        $process_kind = 'cart_in';
        $error_message = '';
        if(is_kind_post($process_kind) === true) {
                $amount = $_POST['amount'];
                $stock = $_POST['stock'];
                $user_id = $_SESSION['id'];
                $item_id = $_POST['id'];
                
                $sql ='select user_id, item_id, amount from logo_carts where user_id = '.$user_id.' and item_id ='.$item_id; 
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch();
                
                $cart_amount = $row['amount'];
                
                if ($amount === '') {
                        $error_message = '個数を入力してください';
                } elseif (preg_match('/^[0-9]+$/', $amount) === 0 || $amount === '0') {
                        $error_message = '正の整数のみです';
                } elseif ($stock < $amount) {
                        $error_message = '在庫が足りません。残り'.$stock.'個です';
                } elseif ($stock < $cart_amount + $amount) {
                        $error_message = 'カートにある商品と合わせると在庫が足りません';
                }
        }
        return $error_message;
}

function cart_in($dbh, $error_message) {
    $process_kind = 'cart_in';
    if (is_kind_post($process_kind) === true && $error_message === '') {
        $user_id = $_SESSION['id'];
        $item_id = $_POST['id'];
        $amount = $_POST['amount'];
        $createdate = date("'Y-m-d H:i:s'");
        // カートに同じ商品があるか調べる
        $sql ='select user_id, item_id, amount from logo_carts where user_id = '.$user_id.' and item_id ='.$item_id; 
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        // カートに同じ商品があったら
        if (!empty($row)) {
                $new_amount = $row['amount'] + intval($amount);
                $sql ='update logo_carts set amount = '.$new_amount.' where item_id = '.$item_id;
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
        } else {
                // カートに同じ商品がなかったら
                $sql = 'insert into logo_carts (user_id, item_id, amount, createdate) 
                value('.$user_id.','.$item_id.','.$amount.','.$createdate.')';
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
        }
    }
}

function action($error_message) {
        $process_kind = 'cart_in';
        if (is_kind_post($process_kind) === true && $error_message === '') {
                header ('Location: cart.php');
        }
}

?>