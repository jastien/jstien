<?php

    function displayRandomColor(){
        
        return "rgba(". rand(0,255) ." , ". rand(0,255) ." , " . rand(0,255) . " , " . (rand(0,100)/100) . ")";

    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Random Background Color</title>
        <meta charset="utf-8"/>
        
        <style>

        
            /*Change color of background*/
            body {
                <?php
                
                // Method 1
                // $red = rand(0,255);
                // $green = rand(0,255);
                // $blue = rand(0,255);
                // $alpha = rand(0,100)/100;
                
                // echo "background-color: rgba($red, $green, $blue, $alpha);";
                
                //End method 1
                
                
                //Method 2
                //In this method we replace the variables $red etc. 
                //HTML and PHP in one line. We need to seperate the html and php with the paranthesis. 
                //Remember to use periods between the functions! Functions are the rand(0,255) etc. 
                //Also remember to use double quotes before the periods and after the periods. 

                echo "background-color: rgba(". rand(0,255) ." , ". rand(0,255) ." , " . rand(0,255) . " , " . (rand(0,100)/100) . ")";
                
                //End method 2
                ?>
            }
            
            /*Change color of h1 text*/
            h1{ 
                <?php
  
                echo "color: rgba(". rand(0,255) ." , ". rand(0,255) ." , " . rand(0,255) . " , " . (rand(0,100)/100) . ");";
                
                //This is an example when calling the function from the top of the page, combined with CSS. We made the function so we do not repeat the code. 
                //Use the dot before calling the function to combine PHP with the CSS code
                echo "background-color:" . displayRandomColor() . ";";
      
                ?>
            }
            
            /*Change color of h2 text*/
            h2{ 
      
            /*In this example the php tag is <? ?>, a shortcut version.*/
                background-color: <?=displayRandomColor()?>;
                color: <?=displayRandomColor()?>;
  
            }
        </style>
        
        
    </head>
    <body>
        
        <h1>Welcome</h1>
        
        <h2>Welcome 2</h2>

    </body>
</html>