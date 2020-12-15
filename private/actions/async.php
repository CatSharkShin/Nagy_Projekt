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
                    loot($_REQUEST['boltid']);
                break;
            default:
                errorResponse("Action not found");
                break;
        }
    }
    function loot($bolt_gomb_id){
        //minden boltnál 3 szinten lehet loot
        //adott bolthoz adott loot 
        //1 szint 1 item bármi
        //2 szint 2 item bármi
        //3 szint 3 item bármi
        // amikor loot az adott bolthoz tartozó item lesz +1 darab
        //loot_pool:   bolt_gomb_id => [item_id,amount]
        $loot_pool = [
            'btn_loot_1' => 
            [
                'id' => '1',
                'amount' => '2'
            ],
        ];
        $item = $loot_pool[$bolt_gomb_id];
        //Megnézzük hogy van-e ilyen item
        $query = "SELECT user_id FROM inventory WHERE user_id = :user_id AND item_id = :item_id";
        $params = [
            ':user_id' => $_REQUEST['id'],
            ':item_id' => $item['id']
        ];
        $record = getRecord($query, $params);
        //Ha nincs, hozzáadjuk, ha van növeljük
        if(empty($record)){
            $query = "INSERT INTO inventory(user_id,item_id,amount) VALUES(:user_id,:item_id,:amount)";
            $params = [
                ':user_id' => $_REQUEST['id'],
                ':item_id' => $item['id'],
                ':amount' => $item['amount'],
            ];
            echo(executeDML($query,$params));
        }else{
            $query = "UPDATE inventory SET amount = amount + :amount WHERE user_id = :user_id AND item_id = :item_id";
            $params = [
                ':user_id' => $_REQUEST['id'],
                ':item_id' => $item['id'],
                ':amount' => $item['amount'],
            ];
            echo(executeDML($query,$params));
        }
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