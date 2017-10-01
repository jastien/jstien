<?php

$zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

    
function yearList($startYear, $endYear){
    
    // $startYear = 1500; not a good solution because this will replace the argument that is already passed in the function
    // $endYear = 2000;
    
    for( $i = $startYear; $i <= $endYear; $i+= 4 ){
        
        global $zodiac;
        
        $yearSum = 0;
        
        echo "<li> Year $i ";
        
        if ($i == 1776){
            echo "<b> USA INDEPENDENCE </b>";
        }
        
        if ($i % 100 == 0 ){
            echo "<b> Happy New Century! </b>";
        }
        
        echo "</li>";
        
        $yearSum = $yearSum + $i; //$yearSum += $i; (this is the same)
    }
    
    return $yearSum;
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Zodiac</title>
    </head>
    <body>
        <h1>
            Chinsese Zoadiac List
        </h1>
        
        
        <ul>
            
            <?php 
            
            //When we return a value in a function, $yearSum, we need to assign it to the called function. Does not need the same name. 
            $sum = yearList(1500, 2000);
            
            ?>
            
            <h2> Year Sum = <?=$sum?> </h2>
            
        </ul>
        
        <?php
    
    
        //  Attempt from student in class
        
        // function yearList(){
            
        //     echo '<header>Chinsese Zoadiac </header>';
        //     echo '<ul>';
        //     for ($i = 1500; $i <=2000; $i){
        //         echo '<li>' . $i . '</li>';
        //     }
        // echo '<ul>';
        // }
        
        
        ?>
        
        
        <?php
        
        
        //My attempt
        
        // $i = 1500;
        
        // for ($i = 0; $i < 2001; $i++) {
        //     echo "<li>" . [$i] . "</li>";
            
        ?>
        

    </body>
</html>