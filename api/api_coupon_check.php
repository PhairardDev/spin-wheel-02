<?php

require_once('database.php');

$db = new Database('localhost','spindash_db','root','');

if($_SERVER['REQUEST_METHOD']=='GET'){

    echo json_encode($db->query('SELECT * FROM coupons ORDER BY id DESC'));

} else if ($_SERVER['REQUEST_METHOD']=='POST') {
    echo 'This is Post!!';
} else {
    http_response_code(405);
}