<?php
    
    include '../../dbConnectionQuotes.php';
    
    $conn = getDatabaseConnection();
    
    $sql = "SELECT username 
            FROM q_login
            WHERE username = :username";
            
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute( array(":username"=>$_GET['username']) );
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    // print_r($record)
    //displays the data using json style
    echo json_encode($record);
    
?>

