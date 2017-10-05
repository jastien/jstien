<html>
<body>

    Your weight: <?php echo $_POST["weight"]; ?><br>
    Your height: <?php echo $_POST["height"]; ?>

    <?php  
    
//     function calculateBmi() {
//     $weight = ($_GET["weight"]);
//     $height = ($_GET["height"]);
    
//     if ($weight > 0 && $height > 0) {
//         $finalBmi = $weight / ($height / 100 * $height / 100);
//         // $bmi = $weight / ($height * $height); 
//         print "<a href='bmi2.php'>Try again</A>";
        
//         if ($finalBmi < 18.5) {
//             print "<a href='bmi2.php'> That you are too thin. </a>";
//         }
//         if ($finalBmi > 18.5 && $finalBmi < 25) {
//             print "<a href='bmi2.php'> That you are healthy. </a>";
//         }
//         if ($finalBmi > 25) {
//             print "<a href='bmi2.php'> That you have overweight. </A>";
//         }
//     }
//     else {
//         alert("Please Fill in everything correctly");
//     }
// }


        function calculateBmi() {
        //Define variables and give initial values.  
        $height = 0;  
        $weight = 0;  
        
        
        
        //Check if height is valid. First uservalue is translated into floavalue.   
        //If given value is not valid float, result of floatval-function is zero.  
        //If conversion translated into string and original input value are the same, input is correct.  
        // if ($_POST['height']!=strval(floatval($_POST['height'])))   
        // {  
        // //Print error message and hyperlink.  
        //     print "Height is invalid<br />";  
        //     print "<a href='index.php'>try again</A>";  
        // //Execution of this script is terminated at this point.  
        //     exit;  
        // }  
        
        //Read user value to variable.  
        $height = $_POST['height'];  
        
        //Check that value is in right range.  
        // if ($height < 0 || $height > 2.5)  
        // {  
        //     print "Height must be value between 0 and 2.5<br />";  
        //     print "<a href='bmi2.htm'>try again</A>";  
        //     exit;  
        // }  
        
        //Weight is in kilogramms, so it must be an integer (no floating point).  
        // if ($_POST['weight']!=strval(intval($_POST['weight'])))   
        // {  
        //     print "Weight is invalid<br />";  
        //     print "<a href='index.php'>try again</A>";  
        //     exit;  
        // }  
        
        //Read user value to variable.  
        $weight = $_POST['weight'];  
        
        //Check that value is in right range.  
        // if ($weight<0 || $weight>500)  
        // {  
        //     print "Weight must be value between 0 and 500<br />";  
        //     print "<a href='bmi2.htm'>try again</A>";  
        //     exit;  
        // }  
        
        //Calculate BMI.   
        // $bmi = $weight / ($height * $height); 
        $bmi = $weight / ($height / 100 * $height / 100);
        
        //Print result.  
        print("Body mass index is $bmi");  
        
                
        if ($bmi < 18.5) {
            echo "<a href='index.php'> That you are too thin. </a>";
        }
        if ($bmi > 18.5 && $bmi < 25) {
            echo "<a href='index.php'> That you are healthy. </a>";
        }
        if ($bmi> 25) {
            echo "<a href='index.php'> That you have overweight. </A>";
        }
        
    }
    
    
    calculateBmi();
        
    ?>  
    
    <br/><br/>
    <a href="result.php">Back to calculator</a>  

</body>
</html>