<?php 
    if(array_key_exists("p",$_GET)){
        $p = $_GET['p'];
        //Page linkerben a nav menüben megadott p értéket 
        //kösd össze a betölteni kivant oldallal
        $page_linker = array(
            "login" => PATH_BASIC."_login.php",
            "register" => PATH_BASIC."_register.php",
            "profil" => PATH_BASIC."profil.php",
        );
        if(array_key_exists($p,$page_linker)){
            require_once $page_linker[$p];
        }else{
            require_once PATH_BASIC."error.php";
        }
    }else{
            require_once PATH_BASIC."home.php";
    }

 ?>