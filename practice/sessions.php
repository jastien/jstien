<?php

    session_start();
    
    if (!isset($_SESSION['randomNumber'])) {//the parameter is the session variable. It could be anything, but helpful to call it something meaningful
    
        $_SESSION['randomNumber'] = rand(1,100); //assigns value for the first time
    
    }
    
    $randomNumber = rand(1,100);
    
    echo "Number to guess: " . $_SESSION['randomNumber'];

?>



<!DOCTYPE html>
<html>
    <head>
        <title> Guess a Number </title>
    </head>
    <body>

        <h1> Guess a number from 1 to 100 </h1>

        <form>
            
            Guess:  <input type="text" name="guess"/> <br />
            
            <input type="submit" name="submit"/>
            
        </form>
    </body>
</html>