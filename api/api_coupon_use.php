<?php
if(isset($_POST['str_redeem'])){ 
    
    $deegreeList = [90, 270, 180, 360, 225, 45, 315, 135];

    $redeem = $_POST['str_redeem'];
    $deegree = $_POST['deegree'];

    if($deegree==135){
        $rewards = "เครดิต 10";
    } else if($deegree==315){
        $rewards = "เครดิต 500";
    } else if($deegree==45){
        $rewards = "เครดิต 50";
    } else if($deegree==225){
        $rewards = "เครดิต 100";
    } else if($deegree==360){
        $rewards = "เครดิต 1000";
    } else if($deegree==180){
        $rewards = "ได้หมุนใหม่";
    } else if($deegree==270){
        $rewards = "เกือบได้แล้วค่ะพี่";
    } else if($deegree==90){
        $rewards = "ไม่ได้อะไรนะคะ";
    }
    
    echo $rewards;
    return $rewards;
} 
else {
    echo "300";
    return 300;
}
