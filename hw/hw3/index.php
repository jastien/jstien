<!DOCTYPE html>
<html>
    <head>
        <title>BMI-calculator</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
        <!--http://www.thecalculatorsite.com/health/bmicalculator.php-->
        
    </head>
    
    <style>
        @import url("css/styles.css");
    </style>
    
    <body>
        
        <div id="content">
        
            <div id="img1">
                <img src='img/bmi.png' alt='Bmi' />
            </div>
    
            <form id="bmiForm" action="results.php" method="POST">
            
                <h1>Calculate your BMI <br/> (Body mass index)</h1>
                <h2 id="subheader"> A measure of body fat in adults </h2>
                
                    Your Weight(kg): <input type="text" name="weight" size="20" required><br/> 
                    Your Height(cm): <input type="text" name="height" size="20" required><br/><br/>
                    
                    <label for="gender">Gender: </label>
                    <input type="radio" name="gender" value="male">
                    <label for="male">Male</label>
                    
                    <input type="radio" name="gender" value="female">
                    <label for="female">Female</label><br/><br/>
                    
                    
                    <label for="athletic">Athletic body?</label>
                    <select id="athletic" name="category">
                        <option value="">Select One</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select><br/><br/>
                    
                    <label for="chart">Include a chart picture your results?</label>
                    <input type="checkbox" name="chart" value="yes" />Yes <br/><br/>
                    
              
                    <input type="submit" value="Calculate"> <!--onClick="calculateBmi()-->
                    
                    <input type="reset" value="Reset" />
                </form>
                
                <div id="img2">
                    <img src='img/heart.png' alt='Heart' />
                </div>
                
            </div> <!-- end content div-->
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    </body>  
</html> 