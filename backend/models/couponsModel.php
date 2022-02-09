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

            $keyLenght = '8';
            $str ='124567890asdfghjklmnbvcxzqwertyuiop()/$';
        
            for($i=1;$i<=$num;$i++){    
                $key = substr(str_shuffle($str), 0, $keyLenght);
                $result = mysqli_query($this->dbcon, "INSERT INTO coupons(couponsCode, customerUsername, createBy, endDate, status) VALUES('$key', '$customerUser', '$createBy', '$endDate', '$status')");
                
            }
            
            return $result;
        
    }

    public function fetchdata(){
        $result = mysqli_query($this->dbcon, "SELECT * FROM coupons ORDER BY id DESC");
        return $result;
    }

    /*public function fetchrecords($userid){
        $result = mysqli_query($this->dbcon, "SELECT * FROM tbluser WHERE id='$userid'");
        return $result;
    }

    public function update($firstname, $lastname, $email, $phonenumber, $address, $userid) {
        $result = mysqli_query($this->dbcon, "UPDATE tbluser SET firstname='$firstname', lastname='$lastname', email='$email', phonenumber='$phonenumber', address='$address' WHERE id='$userid' ");
        return $result;
    }

    public function delete($id) {
        $result = mysqli_query($this->dbcon, "DELETE FROM tbluser WHERE id ='$id' ");
        return $result;
    }*/



}