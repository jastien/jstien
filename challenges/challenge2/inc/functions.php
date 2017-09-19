<?php

        //Start For loop
    function play(){
        for($i=1; $i<3; $i++){
            ${"randomValue" . $i } = rand(0,4);
            displaySymbol(${"randomValue" . $i}, $i );
        }
        //End for loop
        
        displayPoints($randomValue1, $randomValue2);
        }

    function displaySymbol($randomValue, $pos){

        //Start switch statement
        switch ($randomValue) {
            case 0: $symbol = "ace";
                    break;
            case 1: $symbol = "jack";
                    break;
            case 2: $symbol = "king";
                    break;
            case 3: $symbol = "queen";
                    break;
            case 4: $symbol = "ten";
                    break;
        }
        
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title=' " . ucfirst($symbol) . " ' width='70'/>";

    }
    
    
            
        function displayPoints($randomValue1, $randomValue2){
            $humanCard;
            $computerCard;
            echo "<div id='output'>";
            if ($randomValue1 != $randomValue2){
                switch($randomValue1){
                    case 0: $humanCard = 5;
                    break;
                    case 1: $humanCard = 2;
                    break;
                    case 2: $humanCard = 4;
                    break;
                    case 3: $humanCard = 3;
                    break;
                    case 4: $humanCard = 1;
                    break;
                }
                switch($randomValue2){
                    case 0: $computerCard = 5;
                    break;
                    case 1: $computerCard = 2;
                    break;
                    case 2: $computerCard = 4;
                    break;
                    case 3: $computerCard = 3;
                    break;
                    case 4: $computer = 1;
                    break;
                }
                
                if($humanCard > $computerCard){
                    echo "<h2>Human Won!</h2>";
                } else if($computerCard > $humanCard){
                    echo "<h2>Computer Won!</h2>";
                }
                
            } else {
                echo "<h2>It's a Tie!<h2>";
            }
            echo "</div>";
        }


?>