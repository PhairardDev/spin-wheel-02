<?php
require_once('database.php');
$db = new Database('localhost','spindash_db','root','');

if(isset($_POST['str_redeem'])){ 

$deegreeList = [90, 270, 180, 360, 225, 45, 315, 135];

$redeem = $_POST['str_redeem'];
$degree = $_POST['code_ck'];
$current = date("Y-m-d H:i:s");
$rewards = "";

$queryUsed = $db->update("UPDATE coupons SET status =?, used =? WHERE couponsCode =?", array(0,$current,$redeem));

    if($degree==135){
        $rewards = "เครดิต 10";
    } else if($degree==315){
        $rewards = "เครดิต 500";
    } else if($degree==45){
        $rewards = "เครดิต 50";
    } else if($degree==225){
        $rewards = "เครดิต 100";
    } else if($degree==360){
        $rewards = "เครดิต 1000";
    } else if($degree==180){
        $rewards = "ได้หมุนใหม่ 1 ครั้ง";
    } else if($degree==270){
        $rewards = "เกือบได้แล้วค่ะพี่";
    } else {
        $rewards = "ไม่ได้อะไรนะคะ";
    }

    $updateBalance = $db->update("UPDATE rewards SET balanceItems = balanceItems-1 WHERE rewardName =?", array($rewards));

    $queryRewardId = $db->query("SELECT id FROM rewards WHERE rewardName ='".$rewards."'");
    $rewardId = $queryRewardId[0]['id'];

    $sqlResult = $db->insert("INSERT results(couponsCode, rewardId, updateDate, status) VALUE(?,?,?,?)", array($redeem,$rewardId,$current,1));

    echo $rewards;
} 
else {
    echo "300";
}
