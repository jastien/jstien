<?php

function checkLogin() {
    
    if(isset($_GET['login'])){
        
        if ($_GET['login']=="false"){
            echo "Wrong Credentials";
        }
        
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Final Project</title>
    </head>
    <body>


        <h1>Log in! </h1>
        
        <form method="POST" action="calls/loginProcess.php">
    
            Username: <input type="text" name="username"/> <br />
            Password: <input type="password" name="password"/> <br />
            <input type="submit" value="Login!" name="loginForm" />
            
            <p><h3>user1 - secret</h3></p>
            <p><h3>user2 - secret</h3></p>
            
        </form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>