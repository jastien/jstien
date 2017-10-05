<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> <html>
<head>
    <title>BMI-calculato example</title>
</head>
<body>
    
    <!--<form action="bmi2.php" method="POST">-->
    <!--    <table>-->
    <!--    <tr><td>Height in meters</td><td><input type="text" name="height" maxlength="4"></td></tr>-->
    <!--    <tr><td>Weight in kilograms</td><td><input type="text" name="weight" maxlength="3"></td></tr>-->
    <!--    </table>-->
    <!--    <input type="submit" value="Calculate"><input type="reset" value="Reset">-->
    <!--</form>-->
    
        <form action="results.php" method="POST">
            <h2>Calculate your BMI</h2>
                Your Weight(kg): <input type="text" name="weight" size="20"><br/> 
                Your Height(cm): <input type="text" name="height" size="20"><br/>
                <input type="submit" value="calculate" onClick="calculateBmi()"><br/> 
                <!--Your BMI: <input type="text" name="bmi" size="20"><br/> -->
                <!--This Means: <input type="text" name="meaning" size="20"><br />-->
                <input type="reset" value="Reset" />
            </form>

    
</body>  
</html> 