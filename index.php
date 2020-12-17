<?php session_start(); ?>
<?php 
    require "private/config.php";
    require PATH_MANAGERS."userManager.php";
    require PATH_MANAGERS."itemManager.php";
    require_once PATH_MANAGERS."database.php";
 ?>
<!DOCTYPE html>
<html>
<head>
    <?php 
        if(isset($_SESSION['uid'])){
            $uid = $_SESSION['uid'];
        }
     ?>
    <link rel="stylesheet" type="text/css" href="<?=PATH_CSS.'style.css'?>">
    <title>BIQ</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?=PATH_JS.'functions.js'?>" type="text/javascript"></script>
    <script type="text/javascript">
        setSession();
    </script>
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