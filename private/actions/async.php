<?php
    require_once "../config.php";
    require_once "../../".DATABASE_CONTROLLER;
    if(isset($_REQUEST) && isset($_REQUEST['action'])){
        switch ($_REQUEST['action']) {
            case 'session':
                getSession();
                break;
            case 'loot':
                if(isset($_REQUEST['boltid']))
                    loot();
                break;
            default:
                errorResponse("Action not found");
                break;
        }
    }
    function loot(){
        //minden boltnál 3 szinten lehet loot
        //adott bolthoz adott loot 
        //1 szint 1 item bármi
        //2 szint 2 item bármi
        //3 szint 3 item bármi
        // amikor loot az adott bolthoz tartozó item lesz +1 darab
        
    }
    function getSession(){
        $query = "SELECT money FROM users WHERE user_id = :user_id";
        $params = [
            ':user_id' => $_REQUEST['id'],
        ];
        $record = getRecord($query, $params);
        if(!empty($record)) {
            echo json_encode($record); exit();
        }
        return errorResponse("SQL request failed or empty: id: "+strval($_REQUEST['id']));
    }
    function errorResponse($error="undefined error"){
        echo json_encode(array(
            'error' => array(
                'msg' => $error,
            ),
        ));
    }
?>