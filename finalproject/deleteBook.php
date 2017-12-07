<?php

include 'calls/dbConnection.php';
$dbConn = getDatabaseConnection();

$sql = "DELETE FROM bookInfo 
        WHERE bookId = " . $_GET['id'];

$stmt = $dbConn->prepare($sql);
$stmt->execute();

header('Location: admin.php');

?>
