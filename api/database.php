<?php 

class Database {
    private $pdo;

    public function __construct($host, $dbname, $username, $password){
        $conn = new PDO('mysql:host='.$host.';dbname='.$dbname.';', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $conn;
    }

    public function query($show){
        $stmt = $this->pdo->prepare($show);
        $stmt->execute();

        if($show){
            $data = $stmt->fetchAll();
            return $data;
        }
    }

    public function insert($insert, $value){
        $stmt = $this->pdo->prepare($insert);
        $stmt->execute($value);
    }

    public function update($update,$value){
        $stmt = $this->pdo->prepare($update);
        $stmt->execute($value);
    }

}