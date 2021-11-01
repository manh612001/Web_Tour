<?php
    session_start();
    require_once('./utility.php');
    require_once('./database/dbhelper.php');
    $sql = "select * from tour ";
    $lastItem =  executeResult($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    <?php 
        foreach($lastItem as $item){
            echo '<div>
            <img src="'.$item['thumbnail'].'" alt="">
            <p>'.$item['title'].'</p>
            <p>'.$item['description'].'</p>
            <p style="color:red">'.$item['price'].'</p>
        </div>';
        }
        
    ?>
    
</body>
</html>