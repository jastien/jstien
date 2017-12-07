<!--<input type="hidden">-->
<?php

    include 'calls/dbConnection.php';
    $dbConn = getDatabaseConnection();
    
    function getAuthorInfo() {
    global $conn;
        
    $sql = "SELECT *
            FROM q_author
            WHERE authorId = " . $_GET['authorId'];    
     
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $record;
}

if (isset($_GET['updateForm'])) { //Admin submitted update form
    
    //echo "Update form was submitted!";
    
    $sql = "UPDATE q_author SET 
	            firstName = :fName,
	            lastName = :lName,
	            gender = :gender
            WHERE authorId = :authorId";
    
    $namedParameters = array();
    $namedParameters[':fName'] = $_GET['firstName'];
    $namedParameters[':lName'] = $_GET['lastName'];
    $namedParameters[':gender'] = $_GET['gender'];
    $namedParameters[':authorId'] = $_GET['authorId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    echo "Record was updated!";

    
}

if (isset($_GET['authorId'])) {
    
    $authorInfo = getAuthorInfo();  
    
    //print_r($authorInfo);
    
}


    
?>