<?php
if(isset($_POST['str_redeem'])){ 
    
    $redeem = $_POST['str_redeem'];
    $rewards = "เครดิต 50";
    echo $rewards;
    return $rewards;
} 
else {
    echo "300";
    return 300;
}
