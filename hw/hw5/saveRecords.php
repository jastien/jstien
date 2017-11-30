<?php
// session_start();
// if (!isset($_SESSION["username"])) {
//     header("Location: login.php"); 
//     exit;
// } else {
    
include '../../dbConnectionHw5.php';
$conn = getDatabaseConnection();

$userId = $_SESSION['userId'];
$score = $_GET['score'];   

$sql = "INSERT INTO score (score) 
        VALUES (:score)";
$namedParameters = array();
$namedParameters[":score"] = $score;
// $namedParameters[":userId"] = $userId;
// $np[":score"]  = $_GET['score']; 
// $np[":username"]  = $_SESSION['userId'];

$stmt = $conn -> prepare ($sql);
$stmt -> execute($namedParameters);
echo json_encode($record);

// $sql = "SELECT COUNT(userId) AS trials, 
//         AVG(score) average FROM score 
//         WHERE userId = :userId";
        
// $namedParameters = array();
// // $namedParameters[":userId"] = $userId;
// $namedParameters[":userId"] = $_SESSION['userId'];
// $statement = $conn->prepare($sql);
// $statement->execute($namedParameters);
// $rows = $statement->fetchAll(PDO::FETCH_ASSOC);



?>