<?php

require_once('database.php');

$db = new Database('localhost','spindash_db','root','');

if($_SERVER['REQUEST_METHOD']=='GET'){

    echo json_encode($db->query('SELECT * FROM coupons ORDER BY id DESC'));

} else if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $coupons = $_POST['str_redeem'];
    /*$sql = "SELECT COUNT(couponsCode) FROM coupons WHERE couponsCode = :redeem";
    $result = $db->prepare($sql);
    $result->execute(array(':redeem'=>$_POST['str_redeem']));*/

    if(isset($coupons)) {
        return $coupons;
    }
    else {
        return http_response_code(300);
    }

} else {
    http_response_code(405);
}