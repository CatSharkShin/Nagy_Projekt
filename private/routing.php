<?php 
    if(array_key_exists("p",$_GET)){
        $p = $_GET['p'];
        $page_linker = array(
            "login" => "_login.php",
            "register" => "_register.php",
            "profil" => "profil.php",
        );
        if(array_key_exists($p,$page_linker)){
            require_once $page_linker[$p];
        }else{
            require_once "error.php";
        }
    }else{
            require_once "home.php";
    }

 ?>