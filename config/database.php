<?php
class ConnectDatabase{

    private $servername ;
    private $username;
    private $password;
    private $dbName;

    // เชื่อมต่อฐานข้อมูล
    public function connect(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "12345678";
        $this->dbName = "bus";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbName", $this->username, $this->password);
            $this->dbcon = $conn;
            $this->dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->dbcon;
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}

?>