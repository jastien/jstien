<?php

    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * FROM `q_author` WHERE authorId=" . $_GET['authorId'];

    $stmt = $conn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt -> fetch();
    
?>

<div id="results">
    

<?php

    
    echo "<div id='results'>" . $record['firstName'] . " " . $record['lastName'] . " " . "<img class='images' src=\"" . $record['picture'] . "\" />" . "<br/><br/>  Gender: " . $record['gender'] . "<br/><br/>Country of origin: " . $record['country'] . "<br/><br/>Date of birth: " . $record['dob'] . "<br/><br/>Date of death: " . $record['dod'] . "<br/><br/>Biography: <br/> " . $record['biography'] . "</div>";
    
?>

</div>

<!DOCTYPE html>
<html>
    <head>
        
        <title> Author Info </title>
        <!--<input type="reset" value="Reset" />-->
        
        <style>
            @import url('css/styles.css');
        </style>
        
    </head>
    <body>
    
        
    </body>
</html>