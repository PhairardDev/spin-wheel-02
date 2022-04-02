<?php

require_once('database.php');

$db = new Database('localhost','spindash_db','root','');

if($_SERVER['REQUEST_METHOD']=='GET'){

    echo json_encode($db->query('SELECT rewardName AS name FROM rewards WHERE status !=0 ORDER BY displayOrder ASC'));

}
else {
    http_response_code(405);
}