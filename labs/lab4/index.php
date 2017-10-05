<?php
      
        
        if (isset($_GET['keyword']) ) { // Form is submitted. Is there a parameter called "keyword" as part of the URL. 
            $keyword = $_GET['keyword'];
            
            echo "keyword typed: " .  $_GET['keyword'] . "<br />";
            echo "layout selected: " .  $_GET['layout'] . "<br />";
            echo "category selected: " .  $_GET['category'] . "<br />";
            
                if (!empty($_GET['category']) ) {  //an option was selected in drop down menu
                    $keyword = $_GET['category'];
                }
                
                include 'api/pixabayAPI.php';
                
                if (isset($_GET['layout'])) {
                    $imageURLs = getImageURLs($keyword, $_GET['layout']);
                } else {
                    $imageURLs = getImageURLs($keyword);
                }
                
                shuffle($imageURLs);
                $backgroundImage = $imageURLs[rand(0, count($imageURLs))];
                
                } else {  // if the form has not been submitted, echo the directions
                    $backgroundImage = 'img/sea.jpg';
                }
                
        ?>



<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4 Pixabay Slideshow</title>
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
        <style>
            @import url('css/styles.css');
            
            body{
                background-image: url('<?=$backgroundImage?>');
                background-repeat: no-repeat;
                background-size: cover;
            }
            

            
    /*            #carousel-example-generic {*/
    /*     margin: 0 auto;   */
    /*     width: 500px;*/
    /*     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);*/
    /*}*/
            
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
        

        
  
        <div id="content">
            
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 
            <!--Indicators here-->
            <ol class="carousel-indicators">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0)?" class='active'": "";
                        echo "></li>";
                    }
                ?>
            </ol>
       
            <!--Wrapper for Images-->
            <div class="carousel-inner" role="listbox">
                <?php
            //  Directions: Display carousel here
                    if (!isset($_GET['keyword'])) {  //if form hasn't been submitted
                        echo "<h2> Type a keyword to display a slideshow with random images from Pixabay.com </h2>" ;  
                    } else { //keyword entered
                        if (empty($_GET['keyword']) && empty($_GET['category']) )  { //if user fails to type a keyword or select a category, error is displayed. 
                                echo "<h2 style='color:black'> ERROR: Please select a category or type a keyword</h2>";
                                return;
                                exit; 
                        } else {

                            for ($i = 0 ; $i < 7 ; $i++) {
                                echo "<div class='item";
                                echo ($i == 0)?" active":"";
                                echo "'>";

                                do {
                                    $randomIndex = rand(0, count($imageURLs));
                                } while(!isset($imageURLs[$randomIndex]));

                                echo "<img src='" . $imageURLs[$randomIndex] . "'>";
                                echo "</div>";
                                unset($imageURLs[$randomIndex]);
                            }
                        }
                    
 
                ?>
            </div>
            
            <!-- Controls here -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" ></span>
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
        
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>