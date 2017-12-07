<?php

include 'calls/dbConnection.php';
$dbConn = getDatabaseConnection();

        function displayGenres() {
            global $dbConn;
            $sql = "SELECT DISTINCT genreName, genreId  
                    FROM `bookGenre` 
                    ORDER BY genreName";
                    
            $stmt = $dbConn -> prepare($sql);
            $stmt -> execute();
            $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            
                foreach($records as $record) {
                    echo "<option value='".$record['genreId']."'";
                    
                    if ($record['genreName'] == $_GET['genreName']) {
                        echo "selected";
                    } 
                    echo ">" . $record['genreName'] . "</option>";
                }
        }
        
        
 
 if (isset($_GET['addForm'])) { //checks if form was submitted
     
    // include 'calls/dbConnection.php';
    // $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * FROM bookInfo";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    $length = count($records);
    
     $sql = "INSERT INTO bookInfo (bookName, bookAuthor, bookPrice, bookImage, bookPublisher, bookPublished, bookPages, genreId, ratingId)  
            VALUES (:name,:author,:price,:image,:publisher,:published,:pages, :genre, :ratingId)";
            // ON DUPLICATE KEY UPDATE bookName=VALUES(bookName), bookAuthor=VALUES(bookAuthor), bookPrice=VALUES(bookPrice), 
            // bookImage=VALUES(bookImage), bookPublisher=VALUES(bookPublisher), bookPublished=VALUES(bookPublished),  bookPages=VALUES(bookPages)";


     $np = array();
    // $np[":length"]  = $length;
     $np[":name"]  = $_GET['bookName'];
     $np[":author"]  = $_GET['bookAuthor'];
     $np[":price"]  = $_GET['bookPrice'];
     $np[":image"]  = $_GET['bookImage'];
     $np[":publisher"]  = $_GET['bookPublisher'];
     $np[":published"]  = $_GET['bookPublished'];
     $np[":pages"]  = $_GET['bookPages'];
     $np[":genre"] = $_GET['genre'];
     $np[":ratingId"] = $_GET['ratingId'];

     
     $stmt = $dbConn->prepare($sql);
     $stmt->execute($np);
     
     echo "Book added!";
     
 }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Adding New Book</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
        <link href="css/stylesEdit.css" rel="stylesheet">
    </head>
    <body>

        <h1> Add New Book </h1>
        
        <form id="goBack" action="admin.php">
            <input type="submit" value="Go Back" class="btn"/>
        </form><br/><br/>
        
        
        <form>
            <fieldset>
            <!--<legend> Adding New Book </legend>-->
            <table>
                
                 <tr>
                    <td>Title: </td>
                    <td><input class="width" type="text" name="bookName"/></td>
                </tr>
                
                <tr>
                    <td>Author: </td>
                    <td><input class="width" type="text" name="bookAuthor"/></td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td><input class="width" type="text" name="bookPrice"/></td>
                </tr>
                 <tr>
                    <td>Picture URL: </td>
                    <td><input class="width" type="text" name="bookImage"/></td>
                </tr>
                <tr>
                    <td>Publisher: </td>
                    <td><input class="width" type="text" name="bookPublisher"/></td>
                </tr>
                <tr>
                    <td>Publish Year: </td>
                    <td><input class="width" type="text" name="bookPublished"/></td>
                </tr>
                <tr>
                    <td>Pages: </td>
                    <td><input class="width" type="text" name="bookPages"/></td>
                </tr>
            
                
                <!--Title: <input type="text" name="bookName"/> <br />-->
                <!--Author: <input type="text" name="bookAuthor"/> <br />-->
                <!--Price: <input type="text" name="bookPrice"/> <br />-->
                <!--Picture URL: <input type="text" name="bookImage"/><br>-->
                <!--Publisher: <input type="text" name="bookPublisher"/><br /> -->
                <!--Publish Year: <input type="text" name="bookPublished"/><br /> -->
                <!--Pages: <input type="text" name="bookPages"/><br /> -->
                
                
                <tr><td><strong>Select a Genre:</strong></td></tr>
                <td><select name="genre" id="genre">
                    <option disabled selected value>--Select a Genre--</option>
                    <?=displayGenres()?>
                </select></td>
                
                
                <tr><td><strong>Rating:</strong></td></tr>
                   
                    <tr><td><input type="radio" name="ratingId" id="1" value="1">
                    Not at all Influential</td></tr>
                    
                    <tr><td><input type="radio" name="ratingId" id="2" value="2">
                    Slightly Influential</td></tr>
                    
                    <tr><td><input type="radio" name="ratingId" id="3" value="3">
                    Moderately Influential</td></tr>

                    <tr><td><input type="radio" name="ratingId" id="4" value="4">
                    Very Influential<tr><td>
                    
                    <tr><td><input type="radio" name="ratingId" id="5" value="5">
                    Extremely Influential<tr><td>
    
                <tr>
                    <td><input type="submit" value="Add Book" name="addForm" class="btn btn-success"></td>
                </tr>
                
                </table>
            </fieldset>
        </form>
            
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>