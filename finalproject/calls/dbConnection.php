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
    }
    
?>
   