<?php session_start(); ?>
<?php 
    require "private/config.php";
    require PATH_MANAGERS."userManager.php";
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
            require PATH_BASIC."header.php";
        ?>
        <div class="app-list-container">
            <div class="app-list">
                <?php 
                    require PATH_BASIC."app_list.php";
                 ?>
            </div>
        </div>
        <div class="app-field">
            <div class="app-container">
                <?php 
                    require PATH_PRIVATE.'routing.php';
                 ?>
            </div>
        </div>
    </div>

</body>
</html>