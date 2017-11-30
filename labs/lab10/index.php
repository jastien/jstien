<?php

// function displayImages() {
//     if(isset($_POST['submitForm'])) { // checks if the form has been submitted
//         if($_FILES['myFile']['size'] > 1000000) {
//             echo "File is over 1mb.";
//             // echo "Error: File is larger than 1mb";
//             // $("#tooBig").append("Error: File is larger than 1mb");
//         } else {
//             move_uploaded_file($_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name'] );
//             $files = scandir("gallery/", 1);
//         // echo "<img src='gallery/" . $_FILES['myFile']['name'] . "'>";
//         // print_r($files);
        
//             for($i = 0; $i < count($files)-2; $i++) {
//                 echo "<img src='gallery/" . $files[$i] . "' width='35' > <br/>";
//             }
        
//         } //end else
//     } // end if(isset($_POST['submitForm'])) 
// } //end function displayImages()

    
    function displayImages() {
        if (isset($_POST['submitForm'])) {  //checking whether the form was submitted
        
        if ($_FILES["myFile"]["size"] < 1000000) {
                move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"]);
    
        } else {
            echo "File is over 1mb.";
        }
        
        $files = scandir("gallery/", 1);
        
             for($i = 0; $i < count($files)-2; $i++) {
                echo "<img src='gallery/" . $files[$i] . "' width='35' > <br/>";
                }
    }// end isset
} //end function


    
?>



<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Upload a file </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        
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

        <h1> Photo Gallery</h1>
        
        <form method="POST" enctype="multipart/form-data">
            Upload file:
            <input type="file" name="myFile"/>
            <input type="submit" name="submitForm" value="Upload!"/>
            
        </form>
        
        <br/>
        
        <span id="tooBig"></span>
        
        <?=displayImages()?>
        
    </body>
</html>