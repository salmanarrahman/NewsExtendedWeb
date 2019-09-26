<?php

class Database{

  private $db_name = 'newsextended';
  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $conn;

  public function connect(){
    $this->conn = null;

    try{

      $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;

      $this->conn = new PDO($dsn,$this->username,$this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//echo "connected";
    }catch(PDOException $e){
      echo "Connection Error" . $e->getMessage();
      echo "busted";
    }

    return $this->conn;


  }

}

?>