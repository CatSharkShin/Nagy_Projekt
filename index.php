<?php 
    require "public/config.php";
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?=PATH_CSS.'style.css'?>">
    <title>Nagy Projekt</title>
</head>
<body>
    <div class="container">
        <?php 
            require PATH_PRIVATE."header.php";
        ?>
        <div class="app-list-container">
            <div class="app-list">
                <a href=""><img src="<?=PATH_SVGS.'fish.svg'?>"> Horgászat</a>
            </div>
        </div>
        <div class="app-field">
            <div class="app-container">
                <?php 
                    require PATH_PRIVATE.'_login.php';
                 ?>
            </div>
        </div>
    </div>

</body>
</html>