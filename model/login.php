<?php
function mail_match_check ($dbh) {
    $process_kind = 'login';
    if (is_kind_post($process_kind) === true) {
        $name = $_POST['name'];
        if ($name !== '') {
            
                if (match_check_db($dbh, $name) === false) {
                    return '※ユーザー名又はパスワードが違います';
                } else {
                    $rows = match_check_db($dbh, $name);
                    in_session($rows);
                }
        } else {
            return '※ユーザー名が未入力です';
        }
    }
}



function match_check_db($dbh, $name) {
    $sql = 'select id, name, mail, password, address, tel from logo_users where name=' . '"'.$name .'"';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetch();
    if (empty($rows)) {
        return false;
    } elseif (isset($rows)) {
        return $rows;
    }
}

function password_match_check($mail_error_message) {
    $process_kind = 'login';
    
    if (is_kind_post($process_kind) === true && empty($mail_error_message)) {
        
        if($_SESSION['password'] === $_POST['password']) {
            unset($_SESSION['password']);
        } else {
            $_SESSION = array();
            return '※ユーザー名又はパスワードが違います';
        }
    }
}

function login_success($mail_error_message, $pass_error_message) {
       ($mail_error_message !== null);
    $process_kind = 'login';
    if(is_kind_post($process_kind) === true) {
        if ($mail_error_message === null && $pass_error_message === null) {
            return true;
        }
    }
}

function in_session($rows) {
    $_SESSION['id'] = $rows['id'];
    $_SESSION['name'] = $rows['name'];
    $_SESSION['mail'] = $rows['mail'];
    $_SESSION['password'] = $rows['password'];
    $_SESSION['address'] = $rows['address'];
    $_SESSION['tel'] = $rows['tel'];
}
?>