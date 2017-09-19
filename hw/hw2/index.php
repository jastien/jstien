<!DOCTYPE html>
<html>
    <head>
        <title>HW 2 - PHP Structures - Poker Simulation </title>
        
        <style>
            @import url("css/styles.css");
        </style>
        
    </head>
    
    <body onload="appendMessage()">
        
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
    
    
        function appendMessage() {
            var computer = document.createElement("p");
            var oText = document.createTextNode('Top: Player 1 and bottom: Player 2');
             computer.appendChild(oText);
             document.body.appendChild(computer);
        }
    
        $( "#backCard" ).click(function() {
            $("#formID" ).submit();
        });
        
        

    </script>
        

    </body>
</html>

<?php

$deck = range(1,20);
shuffle($deck);

// $i = 1;
// while ($i <= 1){
//          echo "<div id='name_$i'>"; 
//          $i++;
// }

function displayHand($pos) {
    global $deck;
    for ($i = 0 ; $i < 5 ; $i++) {
        $lastCard = array_pop($deck);
        $cardValue = $lastCard % 5;
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
       echo "<img id='reel$pos' src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />";
    }
}


// function displayRandomCard(){
//     $suits = array("clubs","diamonds", "hearts", "spades");
//     echo "<img src='img/cards/".$suits[rand(0,3)]."/".rand(1, 5).".png' alt='Ace' />";
// }

    displayHand($pos);

    echo "<br/>";
    echo "<br/>";

    displayHand($pos);



    function displayPoints($cardSuit) {
        echo "<div id='output'>";
            
    //     if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3 && $randomValue3 == $randomValue4){
            switch ($cardSuit) {
             case clubs: $cardSuit == "clubs" > "diamonds";
                          echo "this is something about clubs";
                          break;
            case diamonds: $cardSuit == "diamonds";
                         echo "this is something about diamonds";
                         break;
     
             default: return "??????";
         }
         
         
            echo "<h2>You won $totalPoints points!</h2>";
        } 
    //     else{
    //         echo "<h3>Try Again!</h3>";
    //     }
    //     echo "</div>";
    // }
    // displayPoints($cardSuit);
    
    
    
    
    
    
    // PROBLEMS:
    
    // 1. Creating seperate ID for player 1 and player 2 cards
    // 2. Creating if/else or switch statement for suits/winner
    
 ?>