<?php

/*$deck = array();

for($i=1; $i<53; $i++){
  $deck[$i] = $i;
} 
*/

$deck = range(1,52);
shuffle($deck);
print_r($deck);

function displayHand() {
    global $deck;
    for ($i = 0 ; $i < 5 ; $i++) {
        $lastCard = array_pop($deck);
        $cardValue = $lastCard % 13;
        $cardSuit;
        if($cardValue <= 13) {
            $cardSuit = "clubs";
        } else if($cardValue > 13 && $cardValue <= 26) {
            $cardSuit = "diamonds";
        } else if($cardValue > 26 && $cardValue <= 39) {
            $cardSuit = "hearts";
        } else if($cardvalue > 39) {
            $cardSuit = "spades";
        }
        
        if($cardValue == 0) {
            $cardValue = 13;
        }
        echo $lastCard % 13 . " ";
          echo "<img src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />";
    }
}
echo "<hr>";
displayHand();
echo "<hr>";
displayHand();
echo "<hr>";

function displayRandomCard(){
    //$randomCard = rand(1, 13);
    $suits = array("clubs","diamonds", "hearts", "spades");
    //$randSuit = rand(0,3);
    //echo "<img src='img/cards/$suits[$randSuit]/$randomCard.png' alt='Ace' />";
    echo "<img src='img/cards/".$suits[rand(0,3)]."/".rand(1, 13).".png' alt='Ace' />";
}

for($i=0; $i<5; $i++){
  displayRandomCard(); 
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3: Ace Poker </title>
    </head>
    <body>
    
    
    

    </body>
</html>