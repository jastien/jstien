<html>
    <head>
        <title>BMI-calculator results</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    </head>
    
    <style>
        @import url("css/styles.css");
    </style>
    
    <body>
        <div id="results">
            
            <h2> Your input:</h2>
            Your weight: <?php echo $_POST["weight"]; ?><br>
            Your height: <?php echo $_POST["height"]; ?><br><br>
            
            <a href="index.php">Back to calculator</a> 
            
        </div>
        <hr> 
        
        <?php
            //Form validation 
            // define variables and set to empty values
            $height = $weight = $gender = $athletic = $chart = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $name = test_input($_POST["height"]);
              $email = test_input($_POST["weight"]);
              $website = test_input($_POST["gender"]);
              $comment = test_input($_POST["athletic"]);
              $gender = test_input($_POST["chart"]);
            }
            
            // Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
            // Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
        ?>
    
    
        <div id="resultsContent">
            <h2> Results:</h2>
            
        <?php  
    
            function calculateBmi() {
                //Define variables and give initial values.  
                $height = 0;  
                $weight = 0; 
                
                
                // echo "<div id='textResults>";
                
                
                $gender = $_POST['gender'];
                if ($gender == 'male') {
                    echo "<img src='img/male.png' alt='Male' />";
                } 
                if ($gender == 'female') {
                    echo "<img src='img/female.png' alt='Female' />";
                } 
                
                
                $athletic = $_POST['category'];
                if ($athletic == 'yes') {
                    echo "<p> You have indicated that you have an athletic body. BMI does not factor for muscle mass.
                    So, a person with a lot of muscle might have a high BMI, when their body is actually healthy.</p>";
                } 
                
            
        
                //Read user value to variable.  
                $height = $_POST['height'];  
                
                // Check that value is in right range.  
                if ($height <= 0)  {  
                        print  "<b> Height must be a value greater than 0. <br /> </b>";  
                        print "<a href='index.php'>Try again</a>";  
                        exit;  
                }  
        
                //Read user value to variable.  
                $weight = $_POST['weight'];  
                
                //Check that value is in right range.  
                if ($weight <= 0)  {  
                        print "Weight must be a value greater than 0. <br />";  
                        print "<a href='index.php'>Try again</a>";  
                        exit;  
                    }  
                    
    
                //Calculate BMI.   
                // $bmi = $weight / ($height * $height); 
                $bmi = $weight / ($height / 100 * $height / 100);
                
                //Print result.  
                print( '<p>' . "Body mass index is $bmi" . '</p>'  );  
                
                        
                if ($bmi < 18.5) {
                    echo "<p> This may signify that you are underweight, so you may need to put on some weight. </p>";
                }
                if ($bmi > 18.5 && $bmi < 25) {
                    echo "<p> This may signify that you are at a healthy weight for your height.  </p>";
                }
                if ($bmi> 25) {
                    echo "<p> This may signify that you have overweight. You may be advised to lose some weight for health reasons. </p>";
                }
                
                // echo "</div>";
                
                // echo "<div id='imgResults>";
                
                ?>
                
                </div> <!--End resultsContent div-->
                <hr> 
                
                <div id="chartImage">
                
                <?php

                
                $chart = $_POST['chart'];
                    if ($chart == 'yes') {
                    echo "<img src='img/chart.png' alt='Chart' />";
                }
                
                // echo "</div>";
                
        }
        
        calculateBmi();
            
        ?>  
        
        </div> <!--End chartImage div-->
        
        
        
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    </body>
</html>