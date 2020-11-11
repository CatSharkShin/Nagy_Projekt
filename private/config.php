<?php 
define("PATH_PUBLIC","public/");
define("PATH_PRIVATE","PRIVATE/");
define("PATH_CSS",PATH_PUBLIC."css/");
define("PATH_JS",PATH_PUBLIC."js/");
define("PATH_SVGS",PATH_PUBLIC."svgs/");

define("PATH_BASIC",PATH_PRIVATE."basic/");
define("PATH_MANAGERS",PATH_PRIVATE."managers/");
define("PATH_SITES",PATH_PRIVATE."sites/");
define("PATH_ACTIONS",PATH_PRIVATE."actions/");
define("DATABASE_CONTROLLER",PATH_MANAGERS."database.php");
    
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'biq');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');