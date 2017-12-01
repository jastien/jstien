<?php 

    function getDatabaseConnection() {
        global $dbConn; 
        
        $host = 'localhost'; //cloud 9 database
        $dbname = 'finalproject';
        $username = 'root';
        $password = '';
        
        //when connecting from Heroku
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
        
        
        //creates database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // $dbConn = new PDO("mysql:host=".$host.";dbname=".$db, $username, $password); //from powerpoint

        
        //we'll be able to see some errors with database
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
        // $dbConn = getDatabaseConnection();
    }

    // $dbConn = getDatabaseConnection();

    
    // echo "Report 1: Cities that have a population between 50,000 and 80,000: <br/>";
    // $sql = "SELECT town_name, population 
    //         FROM mp_town 
    //         WHERE population 
    //         BETWEEN 50000 and 80000";
        
    // $stmt = $dbConn -> prepare ($sql);
    // $stmt -> execute();
    // $records = $stmt -> fetchAll(); //PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set
        
    // foreach($records as $record) {
    //     echo $record['town_name'] . "</br>";
    // }
    
?>

<!--<!DOCTYPE html>-->
<!--<html>-->
<!--    <head>-->
<!--        <title>Midterm Practice part 2</title>-->
<!--    </head>-->
<!--    <body>-->

        
<!--    </body>-->
<!--</html>-->
   