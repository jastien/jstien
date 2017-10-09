<?php

$host = 'localhost'; //cloud 9 database
$dbname = 'quotes';
$username = 'root';
$password = '';

//creates database connection 
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


//we will be able to see some errors with database 
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


//prepare, execute and fetch. These commands allow us to access data from database.
// the asterix * will select all of the columns/categories/groups 

function getMaleAuthors(){
    
        global $dbConn;
        
        $sql = "SELECT * FROM q_author WHERE gender = 'M'";
        
    // Prepare the SQL Statement and assign it to a variable:
        $stmt = $dbConn -> prepare ($sql);
        
    // Execute the statement, replacing the named parameters:
    // $stmt -> execute (  array ( ':id' => '1')  );
        $stmt -> execute(); // without the parameters 
        
        $records = $stmt -> fetchAll();  //retrieves all records;
        
        
    // One methord to retrieve information 
        foreach($records as $record){
            echo $record['firstName'] . "  " . $record['lastName'] . "<br />";
        }

}

// print_r($records); //prints the content of $records 

// Another methord to retrieve information 
// while ($row = $stmt -> fetch())  {
//     echo  $row['firstName'] . ", " . $row['lastName'] . " " . $row['gender'] .  "<br />";
// }


function displayAllQuotes(){
    
        global $dbConn;
        
        $sql = "SELECT * FROM 'q_quote' WHERE 1";
        
    // Prepare the SQL Statement and assign it to a variable:
        $stmt = $dbConn -> prepare ($sql);
        
    // Execute the statement, replacing the named parameters:
    // $stmt -> execute (  array ( ':id' => '1')  );
        $stmt -> execute(); // without the parameters 
        
        $records = $stmt -> fetchAll();  //retrieves all records;
        
        
    // One methord to retrieve information 
        foreach($records as $record){
            echo $record['quotes'] . "<br />";
        }

}


?>



<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Famous Quote Generator </title>
    </head>
    <body>
        
        <h1> Male Authors</h1>
        <?=getMaleAuthors()?>
        <?=displayAllQuotes()?>
        

        

    </body>
</html>