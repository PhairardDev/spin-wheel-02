<?php
function generateKey($round) {

    $keyLenght = '8';
    $str ='124567890asdfghjklmnbvcxzqwertyuiop()/$';

    for($i=1;$i<=$round;$i++){    
        $key = substr(str_shuffle($str), 0, $keyLenght);
        echo 'key:'.$key.'<br />';
    }

}

generateKey(10);