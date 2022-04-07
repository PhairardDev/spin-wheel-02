<?php 
require_once('database.php');

$db = new Database('localhost','spindash_db','root','');

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['str_redeem'] != "" ){

    $redeem = $_POST['str_redeem'];

    $query = $db->query("SELECT couponsCode FROM coupons WHERE couponsCode = '".$redeem."' AND status=1");

    if(count($query)!= 0 ){
        
        $currDate = date('Y-m-d');
        $rewards = $db->query("SELECT displayOrder,randomPercent FROM `rewards` WHERE `balanceItems` > 0 AND `endDate` > '".$currDate."' AND `status`=1");
        
        foreach( $rewards as $item){
            
            $percentage[$item['displayOrder']] = $item['randomPercent'] ; 
        }

        $newResult = array();
        foreach ($percentage as $percentage=>$value) {

            $newResult = array_merge($newResult, array_fill(0, $value, $percentage));
        }

        $result = $newResult[array_rand($newResult)];

        if($result==8){
            $code_ck = 135;
        } else if($result==7){
            $code_ck = 315;
        } else if($result==6){
            $code_ck = 45;
        } else if($result==5){
            $code_ck = 225;
        } else if($result==4){
            $code_ck = 360;
        } else if($result==3){
            $code_ck = 180;
        } else if($result==2){
            $code_ck = 270;
        } else if($result==1){
            $code_ck = 90;
        }
        
        echo $code_ck;

    } 
    else {
        echo "300";
    }

}
else {
    http_response_code(405);
}