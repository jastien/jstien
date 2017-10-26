<?php

    include '../../dbConnectionQuotes.php';
    
    $conn = getDatabaseConnection();
    
        function displayCountryOptions() {
            global $conn;
            $sql = "SELECT DISTINCT(country) 
                    FROM `q_author` 
                    ORDER by country";
                    
            $stmt = $conn -> prepare($sql);
            $stmt -> execute();
            $records = $stmt -> fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set
            
            // print_r($records);
            
            foreach($records as $record) {
                echo "<option " ;
                
                if ($record['country'] == $_GET['country']) {
                    echo "selected";
                } 
                
                echo ">" . $record['country'] . "</option>";
            }
        }
        
    
        function displayCategoryOptions() {
        global $conn;
        $sql = "SELECT DISTINCT(category) 
                FROM `q_category` 
                ORDER BY category";
                
        //   $sql = "SELECT * FROM `q_category`
        //         INNER JOIN q_cat_quote
        //         ON q_category.categoryId = q_cat_quote.categoryId
        //         INNER JOIN q_quote
        //         ON q_cat_quote.quoteId = q_quote.quoteId";

                
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        // print_r($records);
        
            foreach($records as $record) {
                echo "<option ";
                
                if ($record['category'] == $_GET['category']) {
                    echo "selected";
                } 
                echo ">" . $record['category'] . "</option>";
            }
        }
    
        function displayQuotes(){
            global $conn;

            $sql = "SELECT firstname, lastName, quote
                    FROM q_author
                    NATURAL JOIN q_quote
                    NATURAL JOIN q_cat_quote
                    NATURAL JOIN q_category
                    WHERE 1";
            
                
                $namedParameters = array(); //this will include each of the name parameters that I will use in the function below
                if(!empty($_GET['content'])){ //user typed something for quote content 
                
                    // The following sql works BUT it allows SQL injection!!
                    // $sql = $sql . " AND quote LIKE '%".$_GET['content']. "%'"; 
                    
                    //Preventing AQL injection
                    $sql = $sql . " AND quote LIKE :quoteContent"; // using named parameters to avoid SQL injection
                    $namedParameters[":quoteContent"] = "%" . $_GET['content'] . "%";
                }
                
                if(isset($_GET['gender'])){ // gender was checked/clicked by the user
                    $sql = $sql . " AND gender = :gender ";
                    $namedParameters[':gender'] = $_GET['gender'];
                }
                
                if(!empty($_GET['country'])){
                    $sql = $sql . " AND country = :country ";
                    $namedParameters[':country'] = $_GET['country'];
                }
                
                  if(!empty($_GET['category'])){
                    $sql = $sql . " AND category = :category ";
                    $namedParameters[':category'] = $_GET['category'];
                }
                
                
                if(isset($_GET['orderBy'])){
                    if ($_GET['orderBy'] == 'orderByAuthor') {
                        $sql = $sql . " ORDER BY lastName";
                    } else {
                        $sql = $sql . " ORDER BY quote";
                    }
                }
                
            
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($namedParameters); //Pass the array into this parameter. For example $stmt->execute($namedParameters);
            $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
  
            foreach($records as $record) {
                echo "<em>" .  $record['quote'] . " " .  $record['category'] . " " . $record['firstName'] . " " .  $record['lastName'] . "<br />";;
            }
            
            
        }
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6: Quote Finder</title>
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <h1>Quote Finder</h1>
        
        <div id="content">
            <form method="get">
                    <strong>Quote Content:</strong>
                    <input type="text" name="content" value="<?=$_GET['content']?>"><br/><br/>
                    <strong>Author's Gender:</strong>
                    <input type="radio" name="gender" id="female" value="F"
                    
                    <?php 
                    
                        if ($_GET['gender'] == 'F') {
                         echo " checked";
                     }
                     
                     ?>
                    
                    >
                    
                    <label for="female">Female</label>
                    
                    
                    <input type="radio" name="gender" id="male" value="M"
                    
                    <?php 
                
                     if ($_GET['gender'] == 'M') {
                         echo " checked";
                     }
                     
                     ?>
                    
                    >
                    
                    <label for="male">Male</label><br/><br/>
                    
                    <!--<input type="radio" name="gender" id="noGender" value="X">-->
                    <!--<label for="noGender">No gender</label>-->
    
                    
                    <strong>Author's Birthplace:</strong>
                    <select name="country">
                        <option value="">Select a Country</option>
                        <?=displayCountryOptions()?>
                    </select><br/><br/>
                    
                    
                    <strong>Category:</strong>  
                    <select name="category">
                        <option value="">Select a Category</option>
                        <?=displayCategoryOptions()?>
                    </select><br/><br/>
                    
                    
                    Order by: 
                     <input type="radio" name="orderBy" id="orderByAuthor" value="orderByAuthor"
                     
                    <?php 
                    
                         if ($_GET['orderBy'] == 'orderByAuthor') {
                             echo " checked";
                         }
                     
                     ?>
                    
                     >
                     
                    <label for="orderByAuthor">Author</label>
                    
                    
                     <input type="radio" name="orderBy" id="orderByQuote" value="orderByQuote">
                     
                    <label for="orderByQuote">Quote</label>  <br/><br/>
                    
                    <!--<input type="radio" name="orderBy" id="noOrder" value="noOrder">-->
                    <!--<label for="noOrder">No order</label><br/><br/>-->
                    
                    
                    
                    <input type="submit" value="Filter" name="submit">
            </form>
        </div><!--end div content-->
        


        <div class="quotes">
            
            <?=displayQuotes()?>
            
        </div>
        
    </body>
</html>