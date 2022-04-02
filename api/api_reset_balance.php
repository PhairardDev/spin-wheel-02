<?php

require_once('database.php');

$db = new Database('localhost','spindash_db','root','');

$ids = array($db->query("SELECT id AS id FROM rewards WHERE status !=0 ORDER BY id ASC"));

foreach ($ids as $id=>$val) {
    
    foreach ($val as $key=>$data){
        $rewardId = $data['id'];
        $resetBal = $db->update_balance("UPDATE rewards SET balanceItems = totalItems WHERE id=$rewardId");
    }
}