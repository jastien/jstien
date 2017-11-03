<?php
session_start();

if (!isset($_SESSION['username '])) { //if not set, it means that admin hasn't logged in
    
    header("Location: index.php"); //redirects users to login page
    exit;
    
}

function authorList(){
    include '../../dbConnectionQuotes.php';
    $conn = getDatabaseConnection();
    $sql = "SELECT *
            FROM q_author
            ORDER BY lastName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section  </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        
        <script>
            
            function confirmDelete() {
                // Prompt is javascript function. 
                // This will be executed in the browser, not the server.
                return confirm("Are you sure you want to delete this author?");
                
            }
            
        </script>
        
        
    </head>
    <body>

        <h1> ADMIN SECTION</h1>
        <h2> Welcome <?=$_SESSION[adminFullName]?>!</h2>

<br >

    <form action="addAuthor.php">
        <input type="submit" value="Add new Author"/>
    </form>

        <?php 
        
        // $authors =authorList();
        
        // foreach($authors as $author) {
            
        //     echo "[<a href='updateAuthor.php?authorId=".$author['authorId']."'>Update</a>] ";
        //     // echo "[<a href='deleteAuthor.php?authorId=".$author['authorId']."'>Delete</a>] ";
            
            
        //     echo "<form style='display:inline' action='deleteAuthor.php' onsubmit='return confirmDelete()'>
                   
        //             <input type='hidden' name='authorId' value='".$author['authorId']."'>
        //             <input type='submit' value='Delete'>
                    
        //         </form>";
            
        //     echo $author['firstName'] . "  " . $author['lastName'] . " " . $author['country'] . "<br>";
        // }
        
                $authors =authorList();
        
        foreach($authors as $author) {
            
            echo "[<a href='updateAuthor.php?authorId=".$author['authorId']."'>Update</a>] ";
            //echo "[<a href='deleteAuthor.php?authorId=".$author['authorId']."'>Delete</a>] ";
            
            echo "<form style='display:inline' action='deleteAuthor.php' onsubmit='return confirmDelete()'>
                    <input type='hidden' name='authorId' value='".$author['authorId']."'>
                    <input type='submit' value='Delete'>
                  </form>";
            
            echo $author['firstName'] . "  " . $author['lastName'] . " " . $author['country'] . "<br>";
        }
        
        
        ?>
        
        <!--<br/><br/><a href="logout.php">Logout</a>-->
       <br/><br/><a class="button" href="logout.php">Log out</a>
       <!--<br/><br/><button onclick="window.location.href='/index.php'">Log out</button>-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    </body>
</html>