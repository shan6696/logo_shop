<?php
function time_dif($value) {
    $createdate = $value;
    $createtime = strtotime("$createdate");
    $now = date("Y/m/d H:i:s");
    $nowtime = strtotime("$now");
    $time_dif = ($nowtime - $createtime);
    if ($time_dif <= 3600) {
        return true;
    }
}
?>