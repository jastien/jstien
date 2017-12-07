<?php

    function checkLogin() {
        
        if(isset($_GET['login'])){
            
            if ($_GET['login']=="false"){
                echo "Wrong Credentials";
            }
        }
    }
    

    
    
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
                    // echo "<option vak>".$record['genreName']."</option>";
                    echo "<option value='".$record['genreId']."'";
                    
                    if ($record['genreName'] == $_GET['genreName']) {
                        echo "selected";
                    } 
                    echo ">" . $record['genreName'] . "</option>";
                }
        }
        
        function reportPublishedYear() {
            global $dbConn;
            $sql = "SELECT AVG(bookPages)
                    FROM bookInfo
                    WHERE 1;";
                    
            $stmt = $dbConn -> prepare($sql);
            $stmt -> execute();
            $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            foreach($records as $record) {
            echo $record['AVG(bookPages)'] . "</br>";
            
            }
        }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Final Project</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        
         <script>
            function confirmDelete() {
                
                return confirm("Are you sure you want to delete this author?");
            }            
        </script>

    </head>
    <body>

        <form id="logout" action="logout.php">
            <input type="submit" value="Logout" class="btn btn-warning"/>
        </form><br/>
        <form id="addBook" action="addBook.php">
            <input type="submit" value="Add New Book" class="btn btn-success"/>
        </form><br/><br/>
        
        <form id="libraryForm" method="get">
    
            <div id="library">Library</div>

            <div class="select-style">
                <!--<strong>Select a Genre:</strong>  -->
                <select name="genre" id="genre" onchange="changeBook()">
                    <option disabled selected value>--Select a Genre--</option>
                    <?=displayGenres()?>
                </select>
            </div><br><br>
            
            <table id="books">
                <thead ><tr>
                    <th>Title: </th>
                    <th>Author: </th>
                    <th>Price: </th>
                    <th>Image: </th>
                    <th>Pages: </th>
                    <th>Publisher: </th>
                    <th>Publish Year: </th>
                    <th>Rate: </th>
                </tr></thead>
                <tbody>
                    
                </tbody>
            </table>
    
        </form>
      
        
        <div class="quotes">

            
        </div>
        
        
   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
        function changeBook() {
                    $.ajax({

                        type: "GET",
                        url: "displayBookAjax.php",
                        dataType: "json",
                        data: { "genreId": $("#genre").val() },
                        success: function(data,status) {
                        //console.log(data);
                         $('#books').find('tbody').empty();
                        for(var i=0; i<data.length;i++) {
                            // console.log(data[i].bookName);
                            $('#books').find('tbody').append('<tr><td>'+data[i].bookName+'</td><td>'+data[i].bookAuthor+'</td><td>'+data[i].bookPrice+' </td><td><img src='+data[i].bookImage+' height="120" width="100"></td><td>'+data[i].bookPages+' </td><td>'+data[i].bookPublisher+' </td><td>'+data[i].bookPublished+' </td><td>'+data[i].ratingName+'</td><td><a class="btn btn-info" href="editBook.php?id='+data[i].bookId+'">Edit book</a></td><td><a class="btn btn-danger" href="deleteBook.php?id='+data[i].bookId+'" >Delete Book</a></td></tr>');
                        } 
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
        }
    </script>
    
    </body>
</html>