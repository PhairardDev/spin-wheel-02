<?php

require_once('database.php');

$db = new Database('localhost','spindash_db','root','');

if($_SERVER['REQUEST_METHOD']=='GET'){
    echo json_encode($db->query('SELECT c.*, r2.rewardName FROM results r1,`coupons` c JOIN rewards r2 WHERE r1.`couponsCode` = c.couponsCode AND r1.rewardId = r2.id'));
    //echo json_encode($db->query('SELECT `couponsCode`,`customerUsername`,`createBy`,`createDate`,`endDate` FROM `coupons` WHERE status = 1 ORDER BY id DESC'));

}
else {
    http_response_code(405);
}