<?php

// $global = $_GET['keyword'];

    if (isset($_GET['keyword']) ) { // is there a parameter called "keyword" as part of the URL
        shuffle($imageURLs);
        $backgroundImage = $imageURLs[rand(0, count($imageURLs))];
    } else {  // if the form has not been submitted, echo the directions
        $backgroundImage = 'img/sea.jpg';
    }

// Create a PHP block at the top of the file that assigns the location of the image to a variable.
// HTML and PHP files are interpreted from top to bottom.  For this reason, it’s important to assign the $backgroundImage variable before the <style> section.
// $backgroundImage = "img/sea.jpg";


?>


<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4 Pixabay Slideshow</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
        <style>
            @import url('css/styles.css');
            
            body{
                background-image: url('<?=$backgroundImage?>');
                 background-repeat: no-repeat;
                background-size: cover;
            }
            
        </style>
    </head>
    <body>
        
        <br><br>
        
        <form>
            <input type="text" name="keyword" placeholder="Type keyword"/>
            
            <input id="lhorizontal" type="radio" name="layout" value="horizontal"/>
            <label for="lhorizontal">Horizontal</label>
            
            <input id="lvertical" type="radio" name="layout" value="vertical" /> 
            <label for="lvertical">Vertical</label>
            
            <select name="category">
                <option value="">Select One</option>
                <option value="ocean">Sea</option>
                <option value="forest">Forest</option>
                <option value="snow">Snow</option>
                <option value="buildings">Buildings</option>
                <option value="food">Food</option>
            </select>
            
            <input type="submit" name="Search!"/>
        </form>
        
        <?php
        
        if (!isset($_GET['keyword'])) {  //if form hasn't been submitted
            echo "<h2> Type a keyword to display a slideshow with random images from Pixabay.com </h2>" ;  
        } else { //keyword entered
            
            if ( empty($_GET['keyword']) && empty($_GET['category']) )  { //if user fails to type a keyword or select a category, error is displayed. 
            
                echo "<h2 style='color:black'> ERROR: Please select a category or type a keyword</h2>";
                return;
                exit; 
        }

            if (isset($_GET['keyword']) ) { // is there a parameter called "keyword" as part of the URL
            
            
                echo "keyword typed: " .  $_GET['keyword'] . "<br />";
                echo "layout selected: " .  $_GET['layout'] . "<br />";
                echo "category selected: " .  $_GET['category'] . "<br />";
            
                $keyword = $_GET['keyword'];
            
                    if (!empty($_GET['category']) ) {  //an option was selected in drop down menu
                        $keyword = $_GET['category'];
                    }
                    
                    include 'api/pixabayAPI.php';
                    // $imageURLs = getImageURLs($_GET['keyword']);
                    
                    
                    if (isset($_GET['layout'])) {
                        $imageURLs = getImageURLs($keyword, $_GET['layout']);
                    } else {
                        $imageURLs = getImageURLs($keyword);
                    }
                    
                    //  Dierection: set the $backgroundImage with a random image from the images we collected.
                    // shuffle($imageURLs);
                    // $backgroundImage = $imageURLs[rand(0, count($imageURLs))];
                    
                    // } else {  // if the form has not been submitted, echo the directions
                    // $backgroundImage = 'img/sea.jpg';

            } 
        
        ?>
        
  
    
        <div id="carousel-example-generic" class="caruosel slide" data-ride="carousel">
 
            <!--Indicators here-->
            <ol class="carousel-indicators">
                <!--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
                <!--<li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
                <!--<li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
                
                <?php
                
                for ($i = 0; $i < 7; $i++) {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0)? "class='active'": "";
                    echo "></li>";
                }
            
                ?>
     
            </ol>
       
            <!--Wrapper for Images-->
            <div class="carousel-inner" role="listbox">
                <?php
            //  Directions: Display carousel here
                for ($i = 0; $i < 7; $i++) {
                    do{
                        $randomIndex = rand(0, count($imageURLs));
                    }
                    while (!isset($imageURLs[$randomIndex]));
                
                    echo '<div class="item ';
                    echo ($i == 0)?"active": "";
                    echo '">';
                    echo '<img src="' . $imageURLs[$randomIndex] . '">';
                    echo '</div>';
                    unset ($imageURLs[$randomIndex]); //means to remove the element from the array, avoids duplicates 
                    
                    }
                    

                    
                    
                ?>
            </div>
            
            <!--Controls here-->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
            
    </div>

    
    
        <?php
    
        } // End else statement 
            
        ?>
        


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>

      <!--  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">-->
          <!-- Indicators -->
      <!--    <ol class="carousel-indicators">-->
      <!--      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
      <!--      <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
      <!--      <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
      <!--    </ol>-->

      <!-- Wrapper for slides -->
      <!--  <div class="carousel-inner" role="listbox">-->
      <!--      <div class="item active">-->
      <!--        <img src="..." alt="...">-->
      <!--      <div class="carousel-caption">-->
      <!--      ...-->
      <!--      </div>-->
      <!--      </div>-->
      <!--      <div class="item">-->
      <!--        <img src="..." alt="...">-->
      <!--      <div class="carousel-caption">-->
      <!--          ...-->
      <!--      </div>-->
      <!--      </div>-->
      <!--      ...-->
      <!--    </div>-->
      
    <!--Comment out: For loop to display the last 5 images in array -->
    <!--    for ($i = 0; $i < 5; $i++) {-->
    <!--    $lastFiveImages = array_pop($imageURLs);-->
    <!--    echo "<img src = '$lastFiveImages'/>";-->
    <!--}-->
    
