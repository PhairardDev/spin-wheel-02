<?php 
if(isset($_POST['str_redeem'])){ 
    
    $redeem = $_POST['str_redeem'];
    $code_ck = "80DYPAO9Y9";

    if($redeem == $code_ck){
        
        $rewards = "315";
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
