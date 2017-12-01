<!DOCTYPE html>
<html>
    <head>
        <title>Hw3 - HTML Forms / PHP</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon|Open+Sans+Condensed:300" rel="stylesheet">
        
        <style>
            @import url('css/styles.css');
            
        </style>
        
    </head>
    <body>
        
        
        <?php
        // define variables and set to empty values
        $name = $email = $assignment = $level = $option = $comments = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            print_r($_POST["option"]);
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $assignment = test_input($_POST["assignment"]);
        $level = test_input($_POST["level"]);
        $option = test_input($_POST["option"]);
        $comments = test_input($_POST["comments"]);
        
        }
        $checkboxes = isset($_POST['checkbox']) ? $_POST['checkbox'] : array();
        foreach($checkboxes as $value) {
        // here you can use $value
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        ?>


        

        <!--Form elements are different types of input elements, like text fields, checkboxes, radio buttons, submit buttons, and more.-->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"> <!-- action="mailto:jstien@csumb.edu" -->
            <h2>Let the professor know about an assignment's degree of complexity:</h2><br><br>
            
            <p class="input">Your name:</p>
            <input type="text" name="name" size="50" required /><br><br>
            
            <p class="input">Your email:</p>
            <input type="text" name="email" size="50" required /><br><br>
            
            <p class="input">Name of assignment/lab:</p>
            <input type="text" name="assignment" size="50" placeholder="Type assignment number. Example hw2, hw3, lab4" required/><br><br>
            
            <p class="input">Assignment's level of intesity:</p>
            <input type="radio" name="level" value="hard" >Hard<br>
            <input type="radio" name="level" value="medium"> Medium<br>
            <input type="radio" name="level" value="easy"> Easy<br><br>
        
            <div class="helpMethod">
                <p id="resources">What resources did you use?</p>
                <input type="checkbox" name="option" value="TA">Help from TA</input><br>
                <input type="checkbox" name="option" value="professor">Help from professor</input><br>
                <input type="checkbox" name="option" value="peers">Help from peers</input><br>
                <input type="checkbox" name="option" value="atomic">Help from Atomic Learning</input><br>
                <input type="checkbox" name="option" value="internet"></input><br>
                <input type="text" name="other" size="100" placeholder="Specify other resources"/><br><br>
            </div><br>
            
            <p class="input">Other comments: </p>
            <textarea name="comments" rows="5" cols="40"></textarea><br><br>
            
            <input type="submit" />
            <input type="reset" value="Reset">
        </form>        
        
        
        <div id="output">
        <?php
            echo "<h2>Your Input:</h2>";
            echo "<div> Your name:<br><span class='output'> $name</span></div>";
            echo "<br>";
            echo "<div> Your email:<br> $email </div>";
            echo "<br>";
            echo "<div> Name of assignment/lab:<br> $assignment </div>";
            echo "<br>";
            echo "<div> Assignment's level of intesity:<br> $level </div>";
            echo "<br>";
            echo "<div> Resources used:<br> $option </div>";
            echo "<br>";
            echo "<div> Additional comments:<br> $comments </div>";
            
        ?>
        </div>
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
    </body>
</html>