<?php

function displaySymbol($symbol){
    echo "<img src='../labs/lab2/img/$symbol.png' width='50' />";
}

$symbols = array("lemon", "orange", "cherry"); //initializes array with 3 items

// print_r($symbols); //display all elements for debugging purposes

//To display the first element of the array, the lemon, is positioned as 0. This will display the text 'lemon'
// echo $symbols[0];


//call displaySymbol function
    // displaySymbol( $symbols[1] );


$symbols[] = "bar"; //Adding new element at the end
// print_r($symbols[3]); //This will display the text 'bar'
// displaySymbol($symbols[3]); //This will display the image of bar.png

array_push($symbols, "seven");

// for($i = 0; $i < 5; $i++){
//     displaySymbol( $symbols[$i] );
//     echo "<br/>";
// }

//display a random value
    // 1. way
    // $randomSymbol = rand(0,4);
    // displaySymbol( $symbols[$randomSymbol]);
    
    //2. way
    // displaySymbol($symbols[array_rand($symbols)]); //displays random elements in array
    
//To view all the elements
    print_r($symbols);
    
$lastItem = array_pop($symbols); //retrieves and REMOVES last item in the array

displaySymbol($lastItem);

//This will show that seven is removed from the array
    echo "<hr> Before sort: <br/>";
    print_r($symbols);

    
    sort($symbols); //orders array elements aplphabetically A-Z or 0-9
    rsort($symbols); //orders array elements aplphabetically Z-A or 9-0
    
    echo "<hr> After reversed sort: <br/>";
    print_r($symbols);
    
    shuffle($symbols);
    echo "<hr> After shuffle: <br/>";
    print_r($symbols);
    
    foreach ($symbols as $s){
        displaySymbol( $s );
    }


    
?>


<!DOCTYPE html>
<html>
    <head>
        <title> PHP Array Practice </title>
    </head>
    <body>
        <h1></h1>

    </body>
</html>