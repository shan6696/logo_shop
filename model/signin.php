<?php

function confirm_input_data($dbh) {
    $process_kind = 'new_account';
    $message = array();
    if (is_kind_post($process_kind)) {
        $name = get_post_data('name');
        $mail = get_post_data('mail');
        $password = get_post_data('password');
        $address = get_post_data('address');
        $tel = get_post_data('tel');
        $name_check = 'select name from logo_users where name=' . '"'.$name .'"';
        $mail_check = 'select name from logo_users where mail=' . '"'.$mail .'"';
        if ($name === '') {
            $message[] = '※ユーザー名を入力してください';
        } elseif (preg_match('/^[a-zA-Z0-9]{6,100}$/', $name) !== 1) {
            $message[] = '※ユーザー名は半角英数字かつ6文字以上です';
        }
        if (ctype_space($name)){
            $message[] = '※空白は登録できません';
        }
        if ($mail === '') {
            $message[] = '※メールアドレスを入力してください';
        } elseif (preg_match('/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/', $mail) !== 1) {
            $message[] = '※正しいメールアドレスを入力してください';
        }
        if ($password === '') {
            $message[] = '※パスワードを入力してください';
        } elseif (preg_match('/^[a-zA-Z0-9]{6,100}$/', $password) !== 1) {
            $message[] = '※パスワードは半角英数字かつ6文字以上で入力してください';
        }
        if ($address === '') {
            $message[] = '※住所を入力してください';
        }
        if ($tel === '') {
            $message[] = '※電話番号を入力してください';
        } elseif (preg_match('/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/', $tel) !== 1) {
            $message[] = '※正しい電話番号を入力してください';
        }
        if (match_check_db($dbh, $name_check) !== false) {
            $message[] = '※このユーザー名は登録済みです';
        }
        if (match_check_db($dbh, $mail_check) !== false) {
            $message[] = '※このメールアドレスは登録済みです';
        }
        return $message;
    }
}

function add_user_db($error_message, $dbh) {
    $process_kind = 'new_account';
    if (is_error_message($process_kind, $error_message) === true) {
        $name = get_post_data('name');
        $mail = get_post_data('mail');;
        $password = get_post_data('password');;
        $address = get_post_data('address');;
        $tel = get_post_data('tel');;
        $createdate = date('Y-m-d H:i:s');
        insert_user_table($dbh, $name, $mail, $password, $address, $tel, $createdate);
        return true;
    }
}

function save_data_session($error_message, $dbh) {
    $process_kind = 'new_account';
    if(is_error_message($process_kind, $error_message) === true) {
       
        
        session_start();
        $_SESSION['name'] = get_post_data('name');
        $_SESSION['mail'] = get_post_data('mail');
        $_SESSION['address'] = get_post_data('address');
        $_SESSION['tel'] = get_post_data('tel');
        $sql = 'select id from logo_users where name = ' . "'".$_SESSION['name']."'";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $_SESSION['id'] = $row['id'];
    }
}
?>