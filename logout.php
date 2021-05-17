<?php
require_once './model/logout.php';
require_once './model/function.php';
session_start();

$success = logout();
success_next_page($success, '../index.php');
include_once './view/login.php';

?>