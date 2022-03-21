<?php 
if(isset($_POST['str_redeem'])){ 
    
    $redeem = $_POST['str_redeem'];
    $code_ck = "80DYPAO9Y9";

    if($redeem == $code_ck){
        echo $code_ck;
        return $code_ck;
    }
    else {
        echo "400";
        return http_response_code(400);
    }
    
    
} 
else {
    echo "300";
    return http_response_code(300);
}
