<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit;
}

if(isset($_POST['submit'])){
  include "../includes/dbConnection.php";
  $conn = getdbConnection("netflix");
  addMovie();
}

function addMovie(){
    global $conn;
    $sql = "INSERT INTO movies
            (title, year, rated, categoryId) 
            VALUES (:title, :year, :rated, :categoryId)";
            $namedParameters = array();
            $namedParameters[":title"] = $_POST['title'];
            $namedParameters[":year"] = $_POST['year'];
            $namedParameters[":rated"] = $_POST['rated'];
            $namedParameters[":categoryId"] = $_POST['categoryId'];

    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    echo "Movie was added!";

}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section </title>
        <meta charset="utg-8" />
        <!-- Bootstrap: Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
        <style>
    section {
        padding: 5px;
        background-color: white;
        box-shadow: 4px 4px 4px rgba(50, 50, 50, 0.75);
        margin-top:-10px;
        width:500px;
    }
    body {
        background-image:url("img/movies4.jpg");
        background-size: 100%;
    }
    
    </style>
    <body>
        <section>
        <h1> Adding New Movie </h1>
         <nav>
  <form action="admin.php">
         <input type="submit" value="Home" />
     </form>
</nav> 
<form method="post">
   Movie Name:  <input type="text" name="title"/><br>
   Year released:  <input type="text" name="year"/><br>
       Rated:
    <select name="rated">
        <option value="PG">PG</option>
        <option value="PG-13">PG-13</option>
        <option value="R">R</option>
        <option value="Unrated">Unrated</option>
    </select>
    <br>
         Category Genre:
    <select name="categoryId">
        <option value="1001">Action</option>
        <option value="1002">Comedies</option>
        <option value="1003">Drama</option>
        <option value="1004">Musical</option>
        <option value="1005">Horror</option>
        <option value="1006">Foreign</option>
        <option value="1007">Fantasy</option>
        <option value="1008">Mystery</option>
    </select>
    <br>
    <br>
     <input type="submit" value="Add Movie" name="submit" />
     </form>
     </section>
    </body>
</html>