<?php

require_once('database.php');

$db = new Database('localhost','spindash_db','root','');

if($_SERVER['REQUEST_METHOD']=='GET'){

    echo json_encode($db->query('SELECT rewardName AS name FROM rewards ORDER BY id DESC'));

}
else {
    http_response_code(405);
}