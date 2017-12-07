<?php
require_once( 'calls/dbConnection.php');
$dbConn = getDatabaseConnection();

        $sql = "SELECT bookId, bookAuthor,bookPrice,bookName, bookImage, bookPublisher, bookPublished, bookPages, ratingId, ratingName
                FROM bookInfo
                NATURAL JOIN bookGenre
                NATURAL JOIN bookRating
                WHERE 1";
                
        $namedParameters = array();
        
        // if(!empty($_GET['bookName'])){ //user typed something for quote content 
        //     $sql = $sql . " AND bookName LIKE :book"; // using named parameters to avoid SQL injection
        //     $namedParameters[":bookName"] = "%" . $_GET['bookName'] . "%";
        // }
        
        if(!empty($_GET['genreId'])){
        $sql = $sql . " AND genreId = :genreName ";
        $namedParameters[':genreName'] = $_GET['genreId'];
        }
        
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute($namedParameters); 
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($records);

?>