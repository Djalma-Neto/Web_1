<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPLICATION</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <?php
        foreach ($_SESSION['usuarios'] as $usuario){
            echo("<div>".$usuario."</div>");
        }
    ?>
</body>

</html>