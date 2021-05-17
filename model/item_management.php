<?php
// 画像をアップロード　返り値にメッセージ
function img_upload() {
    $process_kind = 'add_item';
    if (is_kind_post($process_kind) === true) {
        $message = img_extension_confirm();
    return $message;
    }
    
}
// 拡張子を調べている　返り値はメッセージ
function img_extension_confirm() {
    if (is_uploaded_file($_FILES['img']['tmp_name']) === TRUE) {
        $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        if ($extension === 'jpg' || $extension === 'JPG' || $extension === 'jpeg' || $extension === 'JPEG' || $extension === 'png' || $extension === 'PNG') {
            $message = img_new_filename($extension);
        } else {
            return $message = 'ファイルはJPGかPNGのみです';
        }
    } else {
        return $message = 'ファイルを選択してください';
    }
}

// ファイル名を一意に変更して、フォルダに保存　返り血はメッセージ
function img_new_filename($extension) {
    $new_img_filename = sha1(uniqid(mt_rand(), true)).'.'.$extension;
    if (is_file('./img/'.$new_img_filename) !== TRUE) {
        if (move_uploaded_file($_FILES['img']['tmp_name'], './img/'.$new_img_filename) !== TRUE) {
            return $message = 'ファイルアップロードに失敗しました';
        }
    } else {
        return $message = 'ファイルアップロードに失敗しました';
    }
    define ('NEW_FILE_NAME', $new_img_filename);
}
// 各入力されたデータの確認
function confirm_input_data() {
    $process_kind = 'add_item';
    $message = array();
    if(is_kind_post($process_kind) === true) {
        $name = htmlspecialchars(get_post_data('name'), ENT_QUOTES);
        $price = get_post_data('price');
        $stock = get_post_data('stock');
        $type = get_post_data('type');
        $status = get_post_data('status');
        $features = get_post_data('features');
        if ($name === '') {
            $message[] = '商品名を入力してください';
        }
        if (ctype_space($name)){
            $message[] = 'すべて空白です';
        }
        if ($price === '') {
            $message[] = '値段を入力してください';
        } elseif (preg_match('/^[0-9]+$/', $price) !== 1) {
            $message[] = '値段は半角数字で入力してください';
        }
        if ($stock === '') {
            $message[] = '個数を入力してください';
        } elseif (preg_match('/^[0-9]+$/', $stock) !== 1) {
            $message[] = '個数は半角数字で入力してください';
        }
        if (!isset($_POST['size'])) {
            $message[] = 'サイズを入力してください';
        }
        if (!isset($_POST['sex'])) {
            $message[] = '性別を入力してください';
        }
        if ($type ==='') {
            $message[] = '種類を入力してください';
        }
        if ($status ==='') {
            $message[] = 'ステータスを入力してください';
        }
        if ($features === '') {
            $message[] = '特徴を入力してください';
        }
    }
    return $message;
}

function error_message($img_upload_message, $input_data_message) {
    if(is_kind_post('add_item') === true) {
        $error_message = array();
        if (isset($input_data_message)) {
            foreach ($input_data_message as $value) {
                $error_message[] = $value;
            }
        }
        if (isset($img_upload_message)) {
            $error_message[] = $img_upload_message;
        }
        return $error_message;
    }
}

function add_item_db($error_message, $dbh) {
    $process_kind = 'add_item';
    if (is_error_message($process_kind, $error_message) === true) {
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $size = $_POST['size'];
        $sex = $_POST['sex'];
        $type = $_POST['type'];
        $img = NEW_FILE_NAME;
        $status = $_POST['status'];
        $features = $_POST['features'];
        $createdate = date('Y-m-d H:i:s');
        insert_item_table($dbh, $name, $price, $stock, $size, $sex, $type, $img, $status, $features, $createdate);
        return '商品を追加しました';
    }
}




?>