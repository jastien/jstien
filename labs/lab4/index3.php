<?php

if (isset($_GET["keyword"])) { // if form submitted, continue
    $keyword = $_GET["keyword"];
        if (!empty($_GET["category"])) { // if the category is not empty, assign the category to the keyword
            $keyword = $_GET["category"];
        }

        include 'api/pixabayAPI.php';

        if (isset($_GET["layout"])) {
            $imageURLs = getImageURLs($keyword, $_GET["layout"]);
        }
        else {
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
        <title> Lab 4. Pixabay Slideshow </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Cabin|Rancho" rel="stylesheet">
        <style>
            @import url('css/styles.css');
            body {
                background-image: url('<?=$backgroundImage?>');
                background-repeat: no-repeat;
                background-size: cover;
                font-family: 'Cabin', sans-serif;
                color: black;
                text-shadow: 2px 2px 4px #000000;
            }
            .carousel {
                width: 450px;
                display: block;
                margin: 20px auto;
                max-height: 300px;
            }
            .carousel .item{
                min-height: 280px;
                max-height: 300px;
            }
            .carousel .item img{
                margin: 0 auto; /* Align slide image horizontally center */
                max-height: 300px;
            }

            body {
                margin-top: 30px;
            }

            h2 {
                text-align: center;
                padding: 20px;
                font-size: 2.2em;
            }

            h1 {
                text-align: center;
                margin-bottom: 30px;
                font-family: 'Rancho', sans-serif;
                font-size: 4em;
            }


        </style>
    </head>
    <body>
        <div class="container-fluid">
                    <h1>Pixabay Image Search</h1>
                    <form method="GET" class="form-horizontal">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label for="keyword">Keyword: </label>
                                        <input type="text" name="keyword" class="form-control" value="" placeholder="Search by keyword..."/>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="radio">
                                        <label><input type="radio" name="layout" value="horizontal">Horizontal</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="layout" value="vertical">Vertical</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-lg-8 col-lg-offset-3 center-block">
                                <div class="col-xs-5">
                                    <div class="form-group">
                                        <select name="category" class="form-control">
                                            <option selected="true" disabled="disabled">- Select a Preset -</option>
                                            <option value="sea">Sea</option>
                                            <option value="mountains">Mountains</option>
                                            <option value="forest">Forest</option>
                                            <option value="sky">Sky</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <input type="submit" class="btn btn-default" />
                                </div>
                            </div>
                        </div>
                    </form>

            </div>
        </div>


        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                    for ($i = 0 ; $i < 7 ; $i++) {
                        echo "<li data-target='#myCarousel' data-slide-to='$i'";
                        echo ($i == 0)? "class='active'": "";
                        echo "></li>";
                    }
                ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                    if(!isset($_GET['keyword'])) { // Keyword not entered
                        echo "<h2>Enter a keyword or select a preset to find an image</h2>";
                    } else { // Keyword entered
                        if (empty($_GET["keyword"]) && empty($_GET["category"])) { // if neither the keyword nor a category has not been submitted, echo an error
                                echo "<h2>Error: You have not entered a keyword or a preset</h2>";
                                return;
                                exit;
                        } else {

                            for ($i = 0 ; $i < 7 ; $i++) {
                                echo "<div class='item ";
                                echo ($i == 0)?"active":"";
                                echo "'>";

                                do {
                                    $randomIndex = rand(0, count($imageURLs));
                                } while(!isset($imageURLs[$randomIndex]));

                                echo "<img src='" . $imageURLs[$randomIndex] . "'>";
                                echo "</div>";
                                unset($imageURLs[$randomIndex]);
                            }
                        }



                    }
                ?>


            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
            </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>