<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit;
}

include "../includes/dbConnection.php";
$conn = getdbConnection("netflix");

function getMovieInfo($movieId) {
  global $conn;
  
  $sql = "SELECT * 
          FROM movies
          WHERE movieId = :movieId";
  $namedParameters = array();
  $namedParameters[":movieId"] = $movieId;
  $statement = $conn->prepare($sql);
  $statement->execute($namedParameters);
  $record = $statement->fetch(PDO::FETCH_ASSOC);
 
  return $record;
}

if (isset($_GET['movieId'])){
    $movie = getMovieInfo($_GET['movieId']);
}

if(isset($_POST['submit'])){
  updateMovie();
  $movie = getMovieInfo($_POST['movieId']);
  echo "Movie Updated!";
}

function selectRated($rate){
    global $movie;
    if ($movie['rated'] == $rate) {
        
        return "selected";
    }
}

function selectCategory($cat){
    global $movie;
    if ($movie['categoryId'] == $cat) {
        
        return "selected";
    }
}

function updateMovie(){
    global $conn;
    $sql = "UPDATE movies
            SET title = :title,
                year  = :year,
                rated  = :rated,
                categoryId  = :categoryId
            WHERE movieId = :movieId";
            $namedParameters = array();
            $namedParameters[":title"] = $_POST['title'];
            $namedParameters[":year"] = $_POST['year'];
            $namedParameters[":rated"] = $_POST['rated'];
            $namedParameters[":categoryId"] = $_POST['categoryId'];
            $namedParameters[":movieId"] = $_POST['movieId'];

    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);

}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Movies </title>
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
        background-image:url("img/movies5.jpg");
        background-size: 100%;
    }
    </style>
    <body>
        <section>
        <h1>Update Movie</h1>
<nav>
  <form action="admin.php">
         <input type="submit" value="Home" />
     </form>
</nav> 
<br>
<form method="post">
   Movie Name:  <input type="text" name="title" value="<?=$movie['title']?>" />
   <br>
   Year released:  <input type="text" name="year" value="<?=$movie['year']?>" />
   <br>
       Rated:
    <select name="rated">
        <option value="PG" <?= selectRated("PG") ?>>PG</option> 
        <option value="PG-13" <?= selectRated("PG-13") ?>>PG-13</option>
        <option value="R" <?= selectRated("R") ?>>R</option>
        <option value="Unrated" <?= selectRated("Unrated") ?>>Unrated</option>
    </select>
    <br>
         Category Genre:
    <select name="categoryId">
        <option value="1001" <?= selectCategory("1001") ?>>Action</option>
        <option value="1002" <?= selectCategory("1002") ?>>Comedies</option>
        <option value="1003" <?= selectCategory("1003") ?>>Drama</option>
        <option value="1004" <?= selectCategory("1004") ?>>Musical</option>
        <option value="1005" <?= selectCategory("1005") ?>>Horror</option>
        <option value="1006" <?= selectCategory("1006") ?>>Foreign</option>
        <option value="1007" <?= selectCategory("1007") ?>>Fantasy</option>
        <option value="1008" <?= selectCategory("1008") ?>>Mystery</option>
    </select>
    <br>
    <br>
     <input type="hidden" name="movieId"  value="<?=$_GET['movieId']?>"  />
     <input type="submit" value="Update Movie" name="submit" />
     </form>
     </section>
    </body>
</html>