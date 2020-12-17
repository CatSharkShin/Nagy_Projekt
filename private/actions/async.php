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
                'amount' => '1'
            ],
            'btn_loot_2' => 
            [
                'id' => '2',
                'amount' => '1'
            ],
            'btn_loot_3' => 
            [
                'id' => '3',
                'amount' => '1'
            ],
            'btn_loot_4' => 
            [
                'id' => '4',
                'amount' => '1'
            ],
            'btn_loot_5' => 
            [
                'id' => '5',
                'amount' => '1'
            ],
            'btn_loot_6' => 
            [
                'id' => '1',
                'amount' => '10'
            ],
            'btn_loot_7' => 
            [
                'id' => '2',
                'amount' => '10'
            ],
            'btn_loot_8' => 
            [
                'id' => '3',
                'amount' => '10'
            ],
            'btn_loot_9' => 
            [
                'id' => '4',
                'amount' => '10'
            ],
            'btn_loot_10' => 
            [
                'id' => '5',
                'amount' => '10'
            ],
            'btn_loot_11' => 
            [
                'id' => '1',
                'amount' => '30'
            ],
            'btn_loot_12' => 
            [
                'id' => '2',
                'amount' => '30'
            ],
            'btn_loot_13' => 
            [
                'id' => '3',
                'amount' => '30'
            ],
            'btn_loot_14' => 
            [
                'id' => '4',
                'amount' => '30'
            ],
            'btn_loot_15' => 
            [
                'id' => '5',
                'amount' => '30'
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
    function sellItem($item_id){
        $query = "SELECT amount,sell FROM inventory JOIN items ON inventory.item_id = items.item_id WHERE user_id = :user_id AND inventory.item_id = :item_id";
        $params = [
            ':user_id' => $_REQUEST['id'],
            ':item_id' => $item_id,
        ];
        $record = getRecord($query, $params);
        $money = $record['amount'] * $record['sell'];

        //$query = "UPDATE inventory SET amount = 0 WHERE user_id = :user_id AND item_id = :item_id";
        $query = "DELETE FROM inventory WHERE user_id = :user_id AND item_id = :item_id";
        $params = [
            ':user_id' => $_REQUEST['id'],
            ':item_id' => $item_id,
        ];
        executeDML($query,$params);
        $query = "UPDATE users SET money = money + :money WHERE user_id = :user_id";
        $params = [
            ':money' => $money,
            ':user_id' => $_REQUEST['id'],
        ];
        executeDML($query,$params);
        echo json_encode(array(
            'success' => array(
                'msg' => 'newmoney:'.$money,
            ),
        ));
    }
?>