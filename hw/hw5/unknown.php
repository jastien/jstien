<?php
session_start();
if (!isset($_SESSION["username"])) { //checks whether the admin has logged in
    header("Location: index.php"); 
    exit;
} else {
    include '../../dbConnectionQuotes.php';
    $conn = getDatabaseConnection();
    
    global $conn;
    $sql = "INSERT INTO hw5 
    (userId, score, submissionDate) 
    VALUES ('". $_SESSION['userId'] ."', '".$_POST['score']."', CURRENT_TIMESTAMP);";

    $namedParameters = array();
    $namedParameters[":score"] = $_POST['score'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);  //ALWAYS PASS the named parameters, if any
    $records = $stmt -> fetchAll($sql); 
    
    $sql = "SELECT count(userId) num, 
    AVG(score) average 
    FROM `hw5` WHERE userId =".$_SESSION['userId'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();  //ALWAYS PASS the named parameters, if any
    $records = $stmt -> fetchAll($sql); 
    // $info = sqlFetchAll($sql);
    echo json_encode($info);
}

?>