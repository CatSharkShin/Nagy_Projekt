<?php 
    require "inc/config.php";
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="inc/css/style.css">
    <title>Nagy Projekt</title>
</head>
<body>
    <div class="container">
        <?php 
            require PATH_PUBLIC."header.php";
        ?>
        <div class="app-list-container">
            <div class="app-list">
                <a href=""><img src="<?=PATH_SVGS.'fish.svg'?>"> Horgászat</a>
            </div>
        </div>
        <div class="app-field">
            <div class="app-container"></div>
        </div>
    </div>

</body>
</html>