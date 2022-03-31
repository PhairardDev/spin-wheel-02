<?php 
require_once('database.php');

$db = new Database('localhost','spindash_db','root','');

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['str_redeem'] != "" ){

    $redeem = $_POST['str_redeem'];

    $query = $db->query("SELECT couponsCode FROM coupons WHERE couponsCode = '".$redeem."' AND status = 1");

    if(count($query)!= 0 ){
        
        $currDate = date('Y-m-d');
        $rewards = $db->query("SELECT rewardName,randomPercent FROM `rewards` WHERE `balanceItems` > 0 AND `endDate` > '".$currDate."' AND `status` = 1");
        
        foreach( $rewards as $item){
            
            $percentage[$item['rewardName']] = $item['randomPercent'] ;
            
        }

        $newResult = array();
        foreach ($percentage as $percentage=>$value) {

            $newResult = array_merge($newResult, array_fill(0, $value, $percentage));
        }

        $result = $newResult[array_rand($newResult)];

        if($result=="เครดิต 10"){
            $code_ck = 135;
        } else if($result=="เครดิต 500"){
            $code_ck = 315;
        } else if($result=="เครดิต 50"){
            $code_ck = 45;
        } else if($result=="เครดิต 100"){
            $code_ck = 225;
        } else if($result=="เครดิต 1000"){
            $code_ck = 360;
        } else if($result=="ได้หมุนใหม่ 1 ครั้ง"){
            $code_ck = 180;
        } else if($result=="เกือบได้แล้วค่ะพี่"){
            $code_ck = 270;
        } else {
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

/*$fruits = array('apple' => '5', 'orange' => '90', 'pear' => '5');

$newFruits = array();
foreach ($fruits as $fruit=>$value)
{
    $newFruits = array_merge($newFruits, array_fill(0, $value, $fruit));
}

$myFruit = $newFruits[array_rand($newFruits)];

echo $myFruit;


function getRandomWeightedElement(array $weightedValues) {
    $rand = mt_rand(1, (int) array_sum($weightedValues));

    foreach ($weightedValues as $key => $value) {
      $rand -= $value;
      if ($rand <= 0) {
        return $key;
      }
    }
  }
*/