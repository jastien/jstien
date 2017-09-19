
<?php

function displaySymbol($symbol){
    
    echo "<img src='../labs/lab2/img/$symbol.png' width='50' />";
    
}

$symbols = array("lemon", "orange", "cherry");  //initializes array with 3 items

//print_r($symbols);  //display all elements for debugging purposes

//echo $symbols[0];

//displaySymbol(  $symbols[1] );

$symbols[] = "bar";  //Adding new element at the end
//displaySymbol(  $symbols[3] );

array_push($symbols, "seven");

/*
for ($i = 0; $i < 5; $i++) {
  displaySymbol(  $symbols[$i] );
  echo "<br />";
}
*/

//$randomSymbol = rand(0,4);
//displaySymbol($symbols[$randomSymbol]);
//displaySymbol($symbols[rand(0,4)]);
//displaySymbol($symbols[array_rand($symbols)]); //displays random element in array

print_r($symbols);

$lastItem = array_pop($symbols);  //retrieves and REMOVES last item in the array

displaySymbol($lastItem);

echo "<hr> Before sort: <br />";
print_r($symbols);

sort($symbols); //orders array elements alphabetically A-Z  or 0-9
rsort($symbols); //orders array elements alphabetically Z-A  or 9-0

echo "<hr> After reversed sort: <br />";
print_r($symbols);

shuffle($symbols);
echo "<hr> After shuffle: <br />";
print_r($symbols);



foreach ($symbols as $symbol) {
    displaySymbol($symbol);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP Array Practice </title>
    </head>
    <body>




    </body>
</html>