<?php

class post{

  private $conn;
  private $table = 'dates';

   public $dateID;

  public function __construct($db){
    $this->conn = $db;
      }

     public function breakingNews(){
      try{
        $query = 'SELECT * FROM breakingnew WHERE dateID = :dateID';
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
        $query = 'SELECT * FROM trending WHERE dateID = :dateID';
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
      $query = 'SELECT * FROM categorynews WHERE dateID = :dateID';
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


}

?>