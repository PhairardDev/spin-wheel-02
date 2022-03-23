<?php
if(isset($_POST['str_redeem'])){ 
    
    $redeem = $_POST['str_redeem'];
    $rewards = "เกือบได้แล้วค่ะพี่";
    echo $rewards;
    return $rewards;
} 
else {
    echo "300";
    return 300;
}
