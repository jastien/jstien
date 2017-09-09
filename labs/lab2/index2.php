<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <meta charset="utf-8"
    </head>
    <body>
        
    <?php
        
    function displaySymbol($randomNumber){
            
        // $randomNumber = rand(0,2); //Generates random number
        
        if ($randomNumber == 0) {
            $symbol = "seven";
        } else if ($randomNumber == 1) {
            $symbol = "cherry";
        } else {
            $symbol = "lemon";
        }
         
        echo "<img src='img/$symbol.png' alt='$symbol' title='$symbol' width='70'/>";
        }
        
    // Displays numbers of points player has won  
    function displayPoints(){
    
        // checking if the three symbols are the same
        
        if($randomValue1 != $randomValue2){
            echo "<h1> Try Again! </h1>";
        }
        
        
        
    }
        
        $randomValue1 = rand(0,2); //Generates random number
        displaySymbol($randomValue1); //call displaySymbol() function
        
        $randomValue2 = rand(0,2); //Generates random number
        displaySymbol($randomValue2); //call displaySymbol() function
        
        $randomValue3 = rand(0,2); //Generates random number
        displaySymbol($randomValue3); //call displaySymbol() function
        
        echo "The random values are: ";
        echo $randomValue1 . ", " . $randomValue2 . " and " . $randomValue3
        
        displayPoints($randomValue1. $randomValue2. $randomValue3);
    
        
    ?>
  
    </body>
</html>