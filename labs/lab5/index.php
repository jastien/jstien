<?php

    // $host = 'localhost'; //cloud 9 database
    // $dbname = 'quotes';
    // $username = 'root';
    // $password = '';
    
    // //creates database connection 
    // $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    
    // //we will be able to see some errors with database 
    // $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    include '../../dbConnection.php';
    $dbConn = getDatabaseConnection();

//prepare, execute and fetch. These commands allow us to access data from database.
// the asterix * will select all of the columns/categories/groups 

// function getMaleAuthors(){
    
//         global $dbConn;
        
//         $sql = "SELECT * FROM q_author WHERE gender = 'M'";
        
//     // Prepare the SQL Statement and assign it to a variable:
//         $stmt = $dbConn -> prepare ($sql);
        
//     // Execute the statement, replacing the named parameters:
//     // $stmt -> execute (  array ( ':id' => '1')  );
//         $stmt -> execute(); // without the parameters 
        
//         $records = $stmt -> fetchAll();  //retrieves all records;
        
        
//     // One methord to retrieve information 
//         foreach($records as $record){
//             echo $record['firstName'] . "  " . $record['lastName'] . "<br />";
//         }

// }

// print_r($records); //prints the content of $records 

// Another methord to retrieve information 
// while ($row = $stmt -> fetch())  {
//     echo  $row['firstName'] . ", " . $row['lastName'] . " " . $row['gender'] .  "<br />";
// }


// function displayAllQuotes(){
    
//         global $dbConn;
        
//         $sql = "SELECT * FROM 'q_quote' WHERE 1";
        
//     // Prepare the SQL Statement and assign it to a variable:
//         $stmt = $dbConn -> prepare ($sql);
        
//     // Execute the statement, replacing the named parameters:
//     // $stmt -> execute (  array ( ':id' => '1')  );
//         $stmt -> execute(); // without the parameters 
        
//         $records = $stmt -> fetchAll();  //retrieves all records;
        
        
//     // One methord to retrieve information 
//         foreach($records as $record){
//             echo $record['quotes'] . "<br />";
//         }

// }

    // This workds but is very time consuming because we are retrieveing all of the quotes but only displaying one. 
    //  function displayRandomQuotes_NotEfficient() {
    //     global $dbConn;
        
    //     $sql = "SELECT quote FROM q_quote"; 
    //             // NATURAL JOIN q_category 
    //             // NATURAL JOIN q_cat_quote 
    //             // NATURAL JOIN q_author 
    //             // WHERE gender = 'm'
    //             // ORDER BY lastName";
        
    //     $stmt = $dbConn->prepare($sql);
    //     $stmt->execute();
    //     $records = $stmt->fetchAll();
        
    //     shuffle($records);
        
    //     echo $records[0]['quote'];
        
    //     // print_r($records);
        
    //     // foreach ($records as $record) {
            
    //     //     echo "<em>" . $record['quote'] . "  "  . $record['firstName'] . "  "  . $record['lastName'] . "<br />";
            
    //     // }
        
    // }
    
    
    function getRandomQuote(){
    
        global $dbConn;
        
        //Retrieve all quote IDs
        //Select one quoteId randomly
        //Get the quote for that quoteId
        
    //Step 1: Generate random quoteId
        
        $sql = "SELECT quoteId FROM q_quote"; //retrives all quoteIDs
        
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute(); 
        $records = $stmt -> fetchAll(); 
        // $records is an array
        
        
        // Three methods to display a random quote 
        // $randomIndex = rand(0, count($records));
        $randomIndex = array_rand($records);

        //displaying the random quoteId
        // echo($records[$randomIndex]['quoteId']);
        
        //saving the random quoteId to the variable called $quoteId
        $quoteId = $records[$randomIndex]['quoteId'];
    
       
    //Step 2: Retreiving quote based on Random Quote Id
        $sql = "SELECT quote, firstName, lastName, authorId
                FROM q_quote 
                NATURAL JOIN q_author
                WHERE quoteId = $quoteId";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute();
        $record = $stmt -> fetch(); //using "fetch()" because it's expected to get ONLY ONE record        
        
      ?> 
      
      <div id="saying">
      
      <?php
        echo "<em>" . $record['quote'] . "</em><br/>";
        // echo "<a target='authorInfo' href='getAuthorInfo.php?authorId=" . $record['authorId'] . " '> - " . $record['firstName'] . " " . $record['lastName'] . "</a>";
        echo "<a target='authorInfo' href='getAuthorInfo.php?authorId=" . $record['authorId'] . " '> - " . $record['firstName'] . " " . $record['lastName'] . "</a>";

    }
    
?>

    </div>


<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Famous Quote Generator </title>
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
        
        <style>
            @import url('css/styles.css');
        </style>
        
    </head>
    <body>
 
        
        <h2>Display Random Quote</h2>
        <?=getRandomQuote()?>
        
        <br/>
        
        <iframe name="authorInfo"></iframe>
        <!--<input type="reset" value="Reset" />-->
        
     <footer>
        <hr> CST353 Web Scripting. 2017 &copy; Stien <br>
        <strong>Disclaimer:</strong>It is used for academic purposes only.
    </footer>

    </body>
</html>