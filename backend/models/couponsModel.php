<?php 

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'spindash_db');

class Coupons {

    function __construct(){

        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;

        if(mysqli_connect_errno()){
            echo "Failed to connect MySQL database : ". mysqli_connect_error();
        }
    }

    public function insert($num, $customerUser, $createBy, $endDate, $status) {

            $keyLenght = '10';
            $str ='124567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
            for($i=1;$i<=$num;$i++){    
                $key = substr(str_shuffle($str), 0, $keyLenght);
                $result = mysqli_query($this->dbcon, "INSERT INTO coupons(couponsCode, customerUsername, createBy, endDate, status) VALUES('$key', '$customerUser', '$createBy', '$endDate', '$status')");
                
            }
            
            return $result;
        
    }

    public function fetchdata(){
        $result = mysqli_query($this->dbcon, "SELECT * FROM coupons WHERE status = 1 ORDER BY id DESC");
        return $result;
    }

    public function fetchdata_used() {
        $result = mysqli_query($this->dbcon, "SELECT c.*, r2.rewardName FROM results r1,`coupons` c JOIN rewards r2 WHERE r1.`couponsCode` = c.couponsCode AND r1.rewardId = r2.id");
        return $result;
    }

    /*SELECT c.couponsCode, c.customerUsername, c.createDate, c.used, c.endDate, c.status, r2.rewardName AS rewardName FROM coupons c INNER JOIN results r1 ON r1.couponsCode = c.couponsCode
        INNER JOIN rewards r2 ON r1.rewardId = r2.id
        WHERE c.status = 0
        ORDER BY c.id DESC */

}