<?php include_once('../config.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo $header_paths['css'] . '/main-styles.css'; ?>" rel="stylesheet">        
        <style>
            body{
                background-color:#e44646;
            }

            *{
                color:#fff;
            }

            p{                
                text-align:center;
            }
            
            p:first-of-type{
                font-size:60px;
                margin-top:30px;
            }

            p:not(:first-of-type){
                font-size:20px;
            }

            img{
                display:block;
                margin-top:50px;
            }
            
        </style>
    </head>
    <body>

        <img class="center-align-bl" src="<?php echo $header_paths['resources'] . '/images/stop.png'; ?>" alt="error image">
        <?php 
            echo "<p >";
            if(isset($_GET['message'])){
                echo urldecode(base64_decode($_GET['message']));
            }else{
                echo "Error!";
            }
            echo "</p>";
        
        ?>

        <p>Go back to <a href="../public/homepage.php">Homepage</a></p>

    </body>
</html>