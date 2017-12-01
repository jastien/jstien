<?php
if(isset($_GET['movieId'])){
  include "../includes/dbConnection.php";
  $conn = getdbConnection("netflix");
  deleteMovie();
}

function deleteMovie(){
  global $conn;
  
  $sql = "DELETE FROM movies
          WHERE movieId = :movieId";
  $namedParameters = array();
  $namedParameters[":movieId"] = $_GET['movieId'];
  $statement = $conn->prepare($sql);
 $statement->execute($namedParameters);
  
  header("Location: admin.php");    
  
}
?>