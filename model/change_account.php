<?php

function confirm_change_input_data($dbh) {
    $process_kind = 'change_account';
    if (is_kind_post($process_kind) === true) {
        return error_message($dbh);
    }
}

function error_message($dbh) {
    $error_message = array();
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $error_message[4] = name_preg_match($name);
    $error_message[0] = is_post('name', 'ユーザー名');
    $error_message[1] = is_post('mail', 'メールアドレス');
    $error_message[2] = is_post('address', '住所');
    $error_message[5] = tel_preg_match('tel', $tel);
    $error_message[3] = is_post('tel', '電話番号');
    $error_message[6] = double_check($dbh, $name, 'name', 'ユーザー名');
    $error_message[7] = double_check($dbh, $mail, 'mail', 'メールアドレス');
    
    return array_filter($error_message);
}

function name_preg_match($key) {
        if (preg_match('/^[a-zA-Z0-9]{6,100}$/', $key) !== 1 && $key !== '') {
            return $error_message[] = 'ユーザー名は半角英数字かつ6文字以上です';
        }
}

function tel_preg_match($key) {
    if (preg_match('/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/', $key) !== 1 && $key !== '') {
            $message[] = '正しい電話番号を入力してください';
    }
}

function is_post($key, $value) {
    if (get_post_data($key) === '') {
        return $error_message[] = $value.'が未入力です';
    }
}

function double_check($dbh, $key, $i, $value) {
    $sql = 'select * from logo_users where '.$i. "= '". $key ."'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll();
    if (!empty($row)) {
        return '使われている'.$value.'です';
    }
}

function change_account($error_message, $dbh) {
    $process_kind = 'change_account';
    if (is_kind_post($process_kind) === true && empty($error_message)) {
        print 'ko';
        update_user_table($dbh);
        return true;
    }
}

function update_user_table($dbh){
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $updatedate = date("'Y-m-d H:i:s'");
    $sql ='update logo_users set name='."'".$name."'".', mail='."'".$mail."'".', address='."'".$address."'".', tel='."'".$tel."'".', updatedate='.$updatedate.' where id='.$id;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    
}

function change_session($result) {
    $process_kind = 'change_account';
    if (is_kind_post($process_kind) === true && $result === true) {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['tel'] = $_POST['tel'];
        return true;
    }
}



?>
