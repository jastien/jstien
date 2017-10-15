<?php
    // Lab 5 also includes this content

    //This connects with the database
    $host = 'localhost'; //cloud 9 database
    $dbname = 'quotes';
    $username = 'root';
    $password = '';
    
    //creates database connection 
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    
    //we will be able to see some errors with database 
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    function displayReflectionQuotes(){
        global $dbConn;
        
        $sql = "SELECT quote, firstName, lastName 
                FROM q_quote 
                NATURAL JOIN q_category 
                NATURAL JOIN q_cat_quote
                NATURAL JOIN q_author
                WHERE  = 'Reflection'";
        
        
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(); 
        
        foreach ($records as $record) {
            echo "<em>" .  $record['quote'] . "</em>  "  . $record['firstName'] . "  "  . $record['lastName'] . "<br />";        
            
        }
        
    }
    
        
     function displayMaleQuotes() {
        global $dbConn;
        
        $sql = "SELECT quote, firstName, lastName 
                FROM q_quote 
                NATURAL JOIN q_category 
                NATURAL JOIN q_cat_quote 
                NATURAL JOIN q_author 
                WHERE gender = 'm'
                ORDER BY lastName";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll();
        
        //print_r($records);
        
        foreach ($records as $record) {
            
            echo "<em>" . $record['quote'] . "  "  . $record['firstName'] . "  "  . $record['lastName'] . "<br />";
            
        }
        
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> SQL Joins </title>
    </head>
    <body>
        
        <h2>Reflection Quotes</h2>
        
        <?=displayReflectionQuotes()?>
        
        <h2>Quotes by Male Authors</h2>
        
        <?=displayMaleQuotes()?>


    </body>
</html>