<?php
session_start();

// if(!isset($_SESSION['username'])){
//     header("Location: login.html");
//     exit();
// }

include "../includes/dbConnection.php";
$conn = getdbConnection("netflix");

function findMovie($title){
    global $conn;
    $sql = "SELECT *
            FROM movies AS m
            JOIN category AS c ON m.categoryId = c.categoryId
            WHERE m.title LIKE '%$title%'
            ";
    // $namedParameters = array();
    // $namedParameters[":title"] = $title;
    $statement = $conn->prepare($sql);
    // $statement->execute($namedParameters);
    $statement->execute();
    $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

    // foreach ($movies as $movie) {
    //     echo ($movie['title']);
    // }
    return $movies[0];
}

$movie = findMovie($_GET['title']);
echo (json_encode($movie));

?>


