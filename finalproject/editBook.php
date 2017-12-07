<?php

// session_start();

// if (!isset($_SESSION['username'])) { //checks whether admin has already logged in
    
//     header("Location: index.php");
//     exit;
    
// }

include 'calls/dbConnection.php';
$dbConn = getDatabaseConnection();

function getBookInfo() {
    global $dbConn;
        
    $sql = "SELECT *
            FROM bookInfo
            WHERE bookId = " . $_GET['id'];    
     
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $record;
}

if (isset($_GET['updateForm'])) { //Admin submitted update form
    
    //echo "Update form was submitted!";
    
    $sql = "UPDATE bookInfo SET 
            bookName = :name,
            bookAuthor = :author,
            bookImage = :image,
            bookPublisher = :publisher,
            bookPublished = :published,
            bookPages = :pages,
            bookPrice = :price,
            ratingId = :ratingId
        WHERE bookId = :bookId";
    //  print_r($_GET['bookPublished']);

     $namedParameters = array();
     $namedParameters[":name"]  = $_GET['bookName'];
     $namedParameters[":author"]  = $_GET['bookAuthor'];
     $namedParameters[":price"]  = $_GET['bookPrice'];
     $namedParameters[":image"]  = $_GET['bookImage'];
     $namedParameters[":publisher"]  = $_GET['bookPublisher'];
     $namedParameters[":published"]  = $_GET['bookPublished'];
     $namedParameters[":pages"]  = $_GET['bookPages'];
     $namedParameters[":ratingId"]  = $_GET['ratingId'];
     $namedParameters[":bookId"]  = $_GET['id'];



     $stmt = $dbConn->prepare($sql);
     $stmt->execute($namedParameters);

     echo "Book updated!";
     
    
    
}


if (isset($_GET['id'])) {
    
    $bookInfo = getBookInfo();  

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Book</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
        <link href="css/stylesEdit.css" rel="stylesheet">
    </head>
    <body>

        <h1> Update Book </h1>
        
        <form id="goBack" action="admin.php">
            <input type="submit" value="Go Back" class="btn"/>
        </form><br/><br/>
        
        <form>
            <fieldset>
                <!--<legend> Adding New Book </legend>-->
                    <table>
      
                    <input type="hidden" name="id" value="<?=$bookInfo['bookId']?>">
                    
                    <tr>
                        <td>Title: </td>
                        <td><input class="width" type="text" name="bookName" value="<?=$bookInfo['bookName']?>" /></td>
                    </tr>
                    
                    <tr>
                        <td>Author: </td>
                        <td><input class="width" type="text" name="bookAuthor" value="<?=$bookInfo['bookAuthor']?>" /></td>
                    </tr>
                    
                     <tr>
                        <td>Price: </td>
                        <td><input class="width" type="text" name="bookPrice"  value="<?=$bookInfo['bookPrice']?>" /></td>
                    </tr>
                    
                     <tr>
                        <td>Picture URL: </td>
                        <td><input class="width" type="text" name="bookImage" value="<?=$bookInfo['bookImage']?>"/></td>
                    </tr>
                    
                    <tr>
                        <td>Publisher: </td>
                        <td><input class="width" type="text" name="bookPublisher" value="<?=$bookInfo['bookPublisher']?>" /></td>
                    </tr>
                    
                     <tr>
                        <td>Publish Year: </td>
                        <td><input class="width" type="text" name="bookPublished" value="<?=$bookInfo['bookPublished']?>" /></td>
                    </tr>
                    
                     <tr>
                        <td>Pages:</td>
                        <td><input class="width" type="text" name="bookPages" value="<?=$bookInfo['bookPages']?>" /></td>
                    </tr>
                
                    <tr>
                        <td><strong>Rating:</strong></td>
                    </tr>
                        <tr><td><input type="radio" name="ratingId" id="1" value="1"
                        
                            <?php 
                            
                                if ($bookInfo['ratingId'] == '1') {
                                 echo " checked";
                             }
                             
                             ?>
                            
                            >
                        
                        Not at all influential</td></tr>
                        
                        
                        <tr><td><input type="radio" name="ratingId" id="2" value="2"
                        
                            <?php 
                        
                             if ($bookInfo['ratingId'] == '2') {
                                 echo " checked";
                             }
                             
                             ?>
                            
                            >
                            
                        Slightly influential</td></tr>
                        
                        
                        </tr><td><input type="radio" name="ratingId" id="3" value="3"
                        
                            <?php 
                        
                             if ($bookInfo['ratingId'] == '3') {
                                 echo " checked";
                             }
                             
                             ?>
                            
                        >
                        
                        Moderately influential</td></tr>
                        
                        
                        </tr><td><input type="radio" name="ratingId" id="4" value="4"
                        
                            <?php 
                        
                             if ($bookInfo['ratingId'] == '4') {
                                 echo " checked";
                             }
                             
                             ?>
                        
                        >
                        Very influential</td></tr>
                        
                        
                        </tr><td><input type="radio" name="ratingId" id="5" value="5"
                        
                            <?php 
                        
                             if ($bookInfo['ratingId'] == '5') {
                                 echo " checked";
                             }
                             
                             ?>
                        
                        >
                        Extremely influential</td></tr>
             
                        
                    <tr>
                        <td><input type="submit" value="Update Book" name="updateForm" class="btn btn-success"></td>
                    </tr>
            
                </table>
            </fieldset>
        </form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>