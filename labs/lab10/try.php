<!--1) There is image size validation (images should be smaller than 1MB)        (15 pts)-->
<!--2) There is file type validation (only "jpg" and "png" formats are allowed)  (15 pts)-->
<!--3) Images are properly uploaded into the "gallery" folder                    (10 pts)-->
<!--4) All images are displayed as thumbnails                                    (20 pts)-->
<!--5) When clicking on a thumbnail, a bigger size image is displayed            (20 pts)-->
<!--6) There are at least 10 CSS rules to improve the look and feel              (10 pts)-->
<!--7) There is a brief description of this lab in your home page                (10 pts)-->

<?php
    $picsArray = [];
    $files = [];
    if (isset($_POST['submitForm'])) {  //checking whether the form was submitted
        $type = $_FILES["myFile"]["type"];
        $format = substr($type, 6);
        
        if ($_FILES["myFile"]["size"] < 1000000) {
            if ($format == "jpeg" || $format == "jpg" || $format == "png") {
                print_r($_FILES);
                array_push($picsArray, $_FILES["myFile"]["name"]);
                move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"]);
                // echo "Image Uploaded! <br>";
            } else {
                echo "File doesn't have a jpg, jpeg, or png file extension.";
            }
        } else {
            echo "File is over 1mb.";
        }
    }

    function getPics() {
        global $files;
        // var_dump($picsArray);
        
        var_dump($files);
        // var_dump($files);
        // echo "<script>console.log('entered getPics')</script>";
        for ($i = 0; $i < count($files); $i++) {
            echo "<img width='100' src='" . $files[$i] . "'>";    
            // print_r($picsArray);
        }
        
    }
    
    function modal() {
        echo "<script>console.log('entered modal')</script>";
        global $files;
        $files = array_filter(glob("gallery/"."*.*"));
        // echo $files[0];
        
        // echo "<img id='myImg' src='".$files[0]."' width='100' height='100'>";
        for ($i = 0; $i < count($files); $i++) {
            echo "<img id='myImg".$i."' src='".$files[$i]."' width='100' height='100'>";
            // print_r($picsArray);
        }
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 10! Image Upload </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <style>
            body {
                text-align: center;
                font-size: 20px;
            }
            #button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }
            
            #upload {
                border: 2px solid black;
                padding:13px 0;
                margin: auto;
            }
            #myImg {
                border-radius: 5px;
                cursor: pointer;
                transition: 0.3s;
            }
            
            #myImg:hover {opacity: 0.7;}
            
            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
            }
            
            /* Modal Content (image) */
            .modal-content {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
            }
            
            /* Caption of Modal Image */
            #caption {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
                text-align: center;
                color: #ccc;
                padding: 10px 0;
                height: 150px;
            }
            
            /* Add Animation */
            .modal-content, #caption {    
                -webkit-animation-name: zoom;
                -webkit-animation-duration: 0.6s;
                animation-name: zoom;
                animation-duration: 0.6s;
            }
            
            @-webkit-keyframes zoom {
                from {-webkit-transform:scale(0)} 
                to {-webkit-transform:scale(1)}
            }
            
            @keyframes zoom {
                from {transform:scale(0)} 
                to {transform:scale(1)}
            }
            
            /* The Close Button */
            .close {
                position: absolute;
                top: 15px;
                right: 35px;
                color: #f1f1f1;
                font-size: 40px;
                font-weight: bold;
                transition: 0.3s;
            }
            
            .close:hover,
            .close:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }
            
            /* 100% Image Width on Smaller Screens */
            @media only screen and (max-width: 700px){
                .modal-content {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
<a href="https://cst-352-subtopic.c9users.io">Link to student home</a>
    <form method="POST" enctype="multipart/form-data">
    
        Select File: <input id="upload" type="file" name="myFile" />
        <br>
        <input id="button" type="submit" value="Upload!" name="submitForm" />
        <br><br>
    </form>
    
    <div id="pictures">
            <?=modal()?>

            <div id="myModal" class="modal">
              <span class="close">×</span>
              <img class="modal-content" id="img01">
              <div id="caption"></div>
            </div>
    </div>


    </body>
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');
        
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById('myImg0');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        var img = document.getElementById('myImg1');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        var img = document.getElementById('myImg2');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
            modal.style.display = "none";
        }
        </script>
</html>

