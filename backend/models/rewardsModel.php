<?php 
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'spindash_db');

class Rewards {

    function __construct(){

        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        $this->dbcon = $conn;

        if(mysqli_connect_errno()){
            echo "Failed to connect MySQL database : ". mysqli_connect_error();
        }
    }

    public function insert($rewardName, $rewardType, $totalPerTime, $totalItems, $createBy, $percentage, $startDate, $endDate, $status, $newOrder) {
  
        $result = mysqli_query($this->dbcon, "INSERT INTO rewards(rewardName, rewardType, randomPercent, totalPerTime, totalItems, balanceItems, startDate, endDate, createBy, status, displayOrder) VALUES('$rewardName', '$rewardType', '$percentage', '$totalPerTime', '$totalItems', '$totalItems', '$startDate', '$endDate', '$createBy', '$status', '$newOrder')");
        return $result;
        
    }

    public function update($id, $rewardName, $rewardType, $totalPerTime, $totalItems, $percentage, $startDate, $endDate, $status) {
        $result = mysqli_query($this->dbcon, "UPDATE rewards SET rewardName='$rewardName', rewardType='$rewardType', totalPerTime='$totalPerTime', totalItems='$totalItems', randomPercent='$percentage', startDate='$startDate', endDate='$endDate', updateDate = '".date('Y-m-d H:i:s')."',status ='$status'  WHERE id='$id' ");
        return $result;
    }

    public function update_order($id, $newOrder) {
        $result = mysqli_query($this->dbcon, "UPDATE rewards SET displayOrder ='$newOrder' WHERE id='$id'");
        return $result;
    }

    public function fetchdata(){
        $result = mysqli_query($this->dbcon, "SELECT * FROM rewards ORDER BY displayOrder ASC");
        return $result;
    }

    public function fetchorder(){
        $result = mysqli_query($this->dbcon, "SELECT MAX(displayOrder) AS latest FROM rewards WHERE 1");
        return $result;
    }

    public function countRewards(){
        $result = mysqli_query($this->dbcon, "SELECT COUNT(id) AS count FROM `rewards` WHERE 1");
        return $result;
    }

    public function fetchrecords($rewardId){
        $result = mysqli_query($this->dbcon, "SELECT * FROM rewards WHERE id='$rewardId'");
        return $result;
    }

    public function delete($id) {
        $result = mysqli_query($this->dbcon, "DELETE FROM rewards WHERE id ='$id' ");
        return $result;
    }
}