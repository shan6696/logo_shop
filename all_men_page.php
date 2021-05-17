<?php
require_once './model/all_men_page.php';
require_once './conf/setting.php';
require_once './model/function.php';
session_start();
// DB接続
$dbh = get_db_connect();
// DBからすべてのデータを$rowsに代入
$rows = select_items_db($dbh);

// foreach($rows as $key => $value) {
//     $sort_keys[$key] = $value['price'];
// }
// array_multisort($sort_keys, SORT_DESC, $rows);

include_once 'view/all_men_page.php';

?>