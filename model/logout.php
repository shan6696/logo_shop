<?php
function logout() {
    $_SESSION = array();
    return true;
}
?>