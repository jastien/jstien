<?php
session_start(); //starts or resumes an existing session


//print_r($_POST); //displays values passed from login form

//validates the username and password
include '../../dbConnectionQuotes.php';
$conn = getDatabaseConnection();

$username = $_POST['username'];
$password = sha1($_POST['password']);
        
$sql = "SELECT *
        FROM hw5
        WHERE username = :username 
        AND password = :password";   

$namedParameters  = array();
$namedParameters[':username']  = $username;
$namedParameters[':password']  = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);

if (empty($record)) {
    echo "Wrong username or password";
    header("Location: index.php?login=false");
    exit; 
  
} else {
    $_SESSION['username'] = $record['username'];
    $_SESSION['userId'] = $record['userId'];
    header('Location: ../admin.php'); //redirects users to admin page
}

?>