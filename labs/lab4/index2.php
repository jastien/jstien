




<?php
    $backgroundImg = "img/sea.jpg"; // default bg image
    

    // API call goes here
    if (isset ($_GET['keyword'])) { // if receives 'keyword' value
        
        include 'api/pixabayAPI.php'; // use API php file code
        $imageURLs = getImageURLs($_GET['keyword']); // assign $imageURLs to function getImageURLs, pass thru 'keyword' value of _GET array
        $backgroundImg = $imageURLs[array_rand($imageURLs)]; // assign $backgroundImg by Keyword
        
        // print_r($imageURLs); // shows content of array
        // echo "You searched for: " . $_GET['keyword']; // show keyword value typed in
    
        $keyword = $_GET['keyword']; // default 
        
        if (!empty($_GET['category']) ) {  // if a category was selected, NOT empty
          $keyword = $_GET['category']; // default to category
        }
        
        if (isset($_GET['layout'])) { // if layout is selected
          $imageURLs = getImageURLs($keyword, $_GET['layout']);
        } else {
           $imageURLs = getImageURLs($keyword);
        }
        
    } // If


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4 Pixabay Slideshow </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <!-- External CSS -->
        <style>
            @import url('css/styles.css');
            body {
                background-image: url('<?=$backgroundImg?>'); /* set background img to whatever value of $backgroundImg is */
                background-size: cover;
            }
            
            form{
                color:black;
                background-color: gray;
                
            }
        </style>
    </head>
    
    <body>
        <br /><br />
        <form>
            
            <input type="text" name="keyword" placeholder="Keyword" required>
            
            <input id="lhorizontal" type="radio" name="layout" value="horizontal"/>
            <label for="lhorizontal">Horizontal</label>
            
            <input id="lvertical" type="radio" name="layout" value="vertical" /> 
            <label for="lvertical">Vertical</label>
            
            <select  required name="category">
                <option value="">Select Category</option>
                <option value="ocean">Sea</option>
                <option value="forest">Forest</option>
                <option value="snow">Snow</option>
            </select>    
            
            <input type="submit" value="Submit">
        </form>
        <?php

            if(!isset($imageURLs)) { // if value of $imageURLs has NOT been set, show msg below
                
                echo "<h2>Type a keyword to display a slideshow <br /> with random images from Pixabay.com</h2>";
            } 
            else { // otherwise, show images
                // Display carousel here

        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators here -->
            <ol class="carousel-indicators">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0)?" class='active'": "";
                        echo "></li>";
                    }
                ?>
            </ol>
            
            <!-- Wrapper for images -->
            <div class="carousel-inner" role="listbox">
                <?php
                    for ($i = 0; $i < 5; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        }
                        while (!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="item ';
                        echo ($i == 0)?"active": "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    } // end of for loop
                ?>
            </div>
            
            <!-- Controls here -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
        
        <?php
            } // end of else statement
        ?>
        
        <!-- HTML form goes here! -->
        
        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body>
</html>