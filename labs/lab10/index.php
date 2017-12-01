<?php

    function displayImages() {
        if (isset($_POST['submitForm'])) {  //checking whether the form was submitted
        
        if ($_FILES["myFile"]["size"] < 1000000) {
                move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"]);
    
        } else {
            echo "File is over 1mb.";
        }
        
        $files = scandir("gallery/", 1);
        
             for($i = 0; $i < count($files)-2; $i++) {
                echo "<img src='gallery/" . $files[$i] . "' width='35' ><br/>";
                }
    }// end isset
} //end function

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Upload a file </title>
        <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        
        <style>
        
            #content{
                margin: 0 auto;
                text-align: center;
                font-family: 'Abel', sans-serif;
                padding: 20px;
                border: 1px grey solid;
                width: 400px;
                background-color:#c4c7b1;
            }
            
            body{
                background-color:#878c6a;
            }
            
            img{
                border: solid 4px #878c6a;
            }
            
            h1{
                font-family: 'Spectral SC', serif;
            }
            
            form{
                font-family: 'Spectral SC', serif;
            }
            
        </style>
        
        <script>
        
        $(document).ready(function() {
            
                $('img').click(function(){
                $('img').css("width", "");
                $(this).css("width", "300px");
            });
    
        });

        </script>
    </head>
    <body>
        
        <div id="content">

            <h1> Photo Gallery</h1>
            
            <form method="POST" enctype="multipart/form-data">
                Upload file:
                <input type="file" name="myFile"/>
                <input type="submit" name="submitForm" value="Upload!"/>
                
            </form>
            
            <br/>
            
            <?=displayImages()?>
        
        </div>
        
    </body>
</html>