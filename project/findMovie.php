<!DOCTYPE html>
<html>
    <head>
        <title>Movie Finder</title>
         <!-- Bootstrap: Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/project.js"></script>
    </head>
    <style>
        body {
            background-image:url("img/movies2.jpg");
            background-size: 100%;
        }
        fieldset {
            background-color: white;
            box-shadow: 4px 4px 4px rgba(50, 50, 50, 0.75);
            margin-top:-10px;
            width:700px;
            height: 500px;
            padding: 10px;
        }
        h1 {
            font-family: times;
    }
        div {
            padding:10px;
        }
    </style>
    <body>
        <div class="col-sm-2"> 
            <form action="login.html" method="post" >
                <input type="submit" value="Login" />
            </form>
        </div>
        
        <fieldset>
             
       <form method="post">
           <center><h1>Movie Finder</h1></center>
    Movie Name:  <input type="text" name="title" id="title"/> 
    <span id="display"></span>
    <br>
    Year released:<span id="year"></span>
        <br> 
    Rated: <span id="rated"></span>
        <br>
    Category Genre:<span id="category"></span>

         <br>
        <br>
     <input type="submit" value="Enter" name="submit" id="submit" />
     </form> 

     </fieldset>
    </body>
</html>