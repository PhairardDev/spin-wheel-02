<?php 
if(isset($_POST['str_redeem'])){ 
    
    $redeem=$_POST['str_redeem'];
    echo $_POST['str_redeem'];
    $code_ck = "80DYPAO9Y9";
    return $code_ck;
} 
else {
    echo "300";
    return http_response_code(300);;
}
