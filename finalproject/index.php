<?php

function checkLogin() {
    
    if(isset($_GET['login'])){
        
        if ($_GET['login']=="false"){
            echo "Wrong Credentials";
        }
    }
}


include 'calls/dbConnection.php';
$dbConn = getDatabaseConnection();

    function bookList(){
        global $dbConn;
        $sql = "SELECT *
                FROM bookInfo
                ORDER BY bookAuthor";

        $namedParameters = array(); //this will include each of the name parameters that I will use in the function below
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute($namedParameters); //Pass the array into this parameter. For example $stmt->execute($namedParameters);
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        // return $records;
        // print_r($records);
        
         foreach($records as $record) {
                // echo $record['bookname'] . " " .  $record['bookAuthor'] . " " . $record['bookPublisher'] . " " .  $record['bookPublished'] . "<br />";
                echo "<tr><td style=\"width:20%\">" .  $record['bookname'] . "</td><td style=\"width:60%\">"  .  $record['bookAuthor'] . "</td><td style=\"width:60%\">". $record['bookPublisher'] . "<tr><td style=\"width:20%\">"  .  $record['bookPublished'] . "</td></tr><br/>";
         }
    }
    
    function displayCategoryOptions() {
        global $dbConn;
        $sql = "SELECT DISTINCT(genreName) 
                FROM `bookGenre` 
                ORDER BY genreName";
                
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Final Project</title>
        <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
        
        <style>
        
            @import url('css/styles.css');
            
        </style>
    </head>
    <body>

    <div class="content">
        <div id="logIn">Log in</div>
        
        <form method="POST" action="calls/loginProcess.php">
    
            Username: <input type="text" name="username"/> <br />
            Password: <input type="password" name="password"/> <br />
            <input type="submit" value="Login!" name="loginForm" />
            
            <p><h3>user1 - secret</h3></p>
            <p><h3>user2 - secret</h3></p>
            
        </form>
        
        <hr>
        <form>
            
            <select name="genre" onchange="showUser(this.value)">
              <option value="">--Select a genre--</option>
              <option value="1">Peter Griffin</option>
              <option value="2">Lois Griffin</option>
              <option value="3">Joseph Swanson</option>
              <option value="4">Glenn Quagmire</option>
            </select>
            
            <div id="library">Library</div>
        
            <?=bookList()?>
            
        </form>
        
    </div> <!--End content div-->
        
   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>