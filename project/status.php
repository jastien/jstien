<?php
include '../includes/dbConnection.php';
$dbConn = getDBConnection("netflix");

function movieAndRatings(){
global $dbConn;
 echo "<h2>Movies and Ratings</h2>";
      $sql ="SELECT title, AVG(ratings) AS score
             FROM movies AS m
             JOIN rating AS r ON m.movieId = r.movieId
             GROUP BY r.movieId
             ORDER BY score ";
    //   echo $sql . "<br/>"; 
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach($records as $movie) {
          echo $movie['title'] . " - " . $movie['score'] . " " . "<br />";
      }
}

function moviesInCategory(){
global $dbConn;
 echo "<h2>Number of movies in each category</h2>";
    $sql = "SELECT *, COUNT(movieId) AS movieCount  
              FROM movies AS m
              JOIN category AS c ON c.categoryId = m.categoryId
              GROUP BY m.categoryId";
        // echo $sql . "<br/>"; 
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach($records as $movie) {
          echo $movie['category'] . " category has " . $movie['movieCount'] . " movies<br/>";
      }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Status </title>
        <meta charset="utg-8" />
        <!-- Bootstrap: Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        body {
                background-color:white;
                color:#C92A13;
        }
        h1 {
             font-size: 70px;
             text-align: center;
        }
        form{
            color:black;
        }
        </style>
    </head>
    <body>
        <h1>Report</h1>
    </form>
         <form action="admin.php">
         <input type="submit" value="Home" />
     </form>
     
        <table class="table">
            <tr><td><?= movieAndRatings() ?></td></tr>
            <tr><td><?= moviesInCategory() ?></td></tr>
        </table>
    </body>
</html>