<?php

$deck = range(1,20);
shuffle($deck);
$totalPoints = 0;

function displayHand() {
    global $deck, $totalPoints;
    $handPoints = 0;
    $handAces = 0;
    
    for ($i = 0 ; $i < 5 ; $i++) {
        $lastCard = array_pop($deck);
        $cardValue = $lastCard % 5;
        $cardSuit;
        print_r($cardValue);

        if($lastCard <= 5) {
            $cardSuit = "clubs";
        } else if($lastCard > 5 && $lastCard <= 10) {
            $cardSuit = "diamonds";
        } else if($lastCard > 10 && $lastCard <= 15) {
            $cardSuit = "hearts";
        } else if($lastCard > 15) {
            $cardSuit = "spades";
        }
        if($cardValue == 0) {
            $cardValue = 5;
        }
       else {
           echo "<img src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />";
    }
    $handPoints = $handPoints + $cardValue;
    }
    
    echo " Points: " . $handPoints . ",";
    
    echo " Aces: "  . $handAces;
    
    $totalPoints = $totalPoints + $handPoints;
    
    return $handAces;
}



    displayHand();

    echo "<br/>";
    echo "<br/>";

    displayHand();
 ?>



<!DOCTYPE html>
<html>
    <head>
        <title>HW 2 - PHP Structures - Poker Simulation </title>
        
        <style>
            /*@import url("css/styles.css");*/
        </style>
        
    </head>
    
    <body>
        
    <header>
        <h1>Poker Simulation</h1>
    </header>
    
    <main>
        <div id="main">

            <form id="formID">
                <input id="littleButton" type="Submit" value="Draw new cards ->" alt="Submit"/>
                <img id="backCard" onclick=submit() src="img/cards/card_back.png" alt="card"/>
            </form>

        </div>
    </main>
    
    
    <script type="text/javascript">
        $("#backCard").click(function() {
            $("#formID" ).submit();
        });
    </script>
        

    </body>
</html>


    <!--// PROBLEMS:-->
    
    <!--// 1. Creating seperate ID for player 1 and player 2 cards-->
    <!--// 2. Creating if/else or switch statement for suits/winner-->
    
