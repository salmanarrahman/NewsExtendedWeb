<?php

class post{

  private $conn;

   public $dateID;

  public function __construct($db){
    $this->conn = $db;
      }

     public function breakingNews(){
      try{
        $query = 'SELECT * FROM breakingnews WHERE dateID = :dateID';
        //prepare statement
        $statement = $this->conn->prepare($query);
        $this->dateID = htmlspecialchars(strip_tags($this->dateID));
        $statement->bindParam(":dateID",$this->dateID);

        if ($statement->execute()) {
          # code...
          return $statement;
        }
        printf("Error: %s. \n",$statement->error);

        return false;


      }catch(PDOException $e)
    {
      echo "could not connect to table " . $e->getMessage() ;
    }
        return $statement;
     
    }


    public function videos(){
      try{
        $query = 'SELECT * FROM video WHERE dateID = :dateID';
        //prepare statement
        $statement = $this->conn->prepare($query);
        $this->dateID = htmlspecialchars(strip_tags($this->dateID));
        $statement->bindParam(":dateID",$this->dateID);

        if ($statement->execute()) {
          # code...
          return $statement;
        }
        printf("Error: %s. \n",$statement->error);

        return false;


      }catch(PDOException $e)
    {
      echo "could not connect to table " . $e->getMessage() ;
    }
        return $statement;     
    }

    
    public function trending(){
      try{
        $query = 'SELECT * FROM trendingnews WHERE dateID = :dateID';
        //prepare statement
        $statement = $this->conn->prepare($query);
        $this->dateID = htmlspecialchars(strip_tags($this->dateID));
        $statement->bindParam(":dateID",$this->dateID);

        if ($statement->execute()) {
          # code...
          return $statement;
        }
        printf("Error: %s. \n",$statement->error);

        return false;


      }catch(PDOException $e)
    {
      echo "could not connect to table " . $e->getMessage() ;
    }
        return $statement;     
    }

  public function readDate(){

    try
    {
         $query = 'SELECT  * FROM dates';

         $statement = $this->conn->query($query);
    }catch(PDOException $e)
    {
      echo "could not connect to table".$e->getMessage() ;
    }

   
 //   $statement->execute();

    return $statement;    

  }


  public function categorywiseNews(){
    try{
      $query = 'SELECT * FROM categorywisenews WHERE dateID = :dateID';
      //prepare statement
      $statement = $this->conn->prepare($query);
      $this->dateID = htmlspecialchars(strip_tags($this->dateID));
      $statement->bindParam(":dateID",$this->dateID);

      if ($statement->execute()) {
        # code...
        return $statement;
      }
      printf("Error: %s. \n",$statement->error);

      return false;


    }catch(PDOException $e)
  {
    echo "could not connect to table " . $e->getMessage() ;
  }
      return $statement;   
  }

  public function category(){

    try
    {
         $query = 'SELECT  * FROM categories';
         $statement = $this->conn->query($query);

    }catch(PDOException $e){
      echo "could not connect to table".$e->getMessage() ;
    }

   

    return $statement;    


  }


}

?>