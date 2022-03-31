<?php
require_once('database.php');
$db = new Database('localhost','spindash_db','root','');

if(isset($_POST['str_redeem'])){ 

$deegreeList = [90, 270, 180, 360, 225, 45, 315, 135];

$redeem = $_POST['str_redeem'];
$degree = $_POST['code_ck'];
$current = date("Y-m-d H:i:s");

    if($degree==135){
        $order = 1;
    } else if($degree==315){
        $order = 2;
    } else if($degree==45){
        $order = 3;
    } else if($degree==225){
        $order = 4;
    } else if($degree==360){
        $order = 5;
    } else if($degree==180){
        $order = 6;
    } else if($degree==270){
        $order = 7;
    } else if($degree==90){
        $order = 8;
    }

    $updateBalance = $db->update("UPDATE rewards SET balanceItems = balanceItems-1 WHERE displayOrder =?", array($order));
    $queryRewardId = $db->query("SELECT id,rewardName FROM rewards WHERE displayOrder ='".$order."'");
    
    $rewardId = $queryRewardId[0]['id'];
    $rewardName = $queryRewardId[0]['rewardName'];

    if($rewardName != "ได้หมุนใหม่ 1 ครั้ง"){

        $queryUsed = $db->update("UPDATE coupons SET status =?, used =? WHERE couponsCode =?", array(0,$current,$redeem));
        $sqlResult = $db->insert("INSERT results(couponsCode, rewardId, updateDate, status) VALUE(?,?,?,?)", array($redeem,$rewardId,$current,1));

        echo $rewardName;
    }
    else {
        echo $rewardName;
    }

    
} 
else {
    echo "300";
}
