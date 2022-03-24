<?php 
if(isset($_POST['str_redeem'])){ 
    
    $redeem = $_POST['str_redeem'];
    $code_ck = "80DYPAO9Y9";

    if($redeem == $code_ck){
        
        $rewards = "180";
        echo $rewards;
        return $rewards;
    }
    else {
        echo "400";
        return 400;
    }
    
    
} 
else {
    echo "300";
    return 300;
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
  }*/
