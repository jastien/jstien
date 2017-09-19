<!DOCTYPE html>
<html>

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->

<head>
    <meta char=”utf-8” />
    <title>Random Card Game</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

</head>
<!-- closing head -->

<!-- This is the body -->
<!-- This is where we place the content of our website -->

<body>
    <header>
        <h1>Random Card Game</h1>
    </header>

    <main>
        <div id="main">

            <?php
            
            include 'inc/functions.php';
    
            play();
            
            ?>

            <form>
                <input type="Submit" value="Spin!" />
            </form>

        </div>
    </main>


    <!-- This is the footer -->
    <!-- The footer goes inside the body but not always -->
    <footer>

    </footer>
    <!-- closing footer -->

</body>
<!-- closing body -->

</html>
