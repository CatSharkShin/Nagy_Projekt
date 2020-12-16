<?php 
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['delete'])){
      if(!delItem($_POST['id'])){
        echo "Delete failed";
      }else{
        echo "Delete was successful";
      }
    }else if(isset($_POST['save'])){
      $postData = [
        'item_id' => $_POST['item_id'],
        'item_name' => $_POST['item_name'],
        'description' => $_POST['description'],
        'buy' => $_POST['buy'],
        'sell' => $_POST['sell'],
        'image' => $_POST['image'],
      ];

      if(empty($postData['item_name']) || empty($postData['description']) || empty($postData['image'])) {
        echo "Missing information!";
      }else if($postData['buy'] < 0 || $postData['sell'] < 0){
        echo "Incorrect buy/sell value!";
      }else if(!itemEdit($postData['item_id'],$postData['item_name'], $postData['description'],$postData['buy'], $postData['sell'],$postData['image'])) {
        echo "Edit failed!";
      }

      $postData['password'] = $postData['password1'] = "";

        }
      }
?>
<h1>Users</h1>
    <div>
        <?php 
            $users = getList("SELECT item_id,item_name,description,buy,sell,image FROM items");
         ?>
         <table>
            <thead>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Description</th>
                <th>Buy</th>
                <th>Sell</th>
                <th>svg name</th>
                <th colspan="3">Actions</th>
            </thead>
            <tbody>
                <?php foreach ($users as $u) : ?>
                  <form method="post">
                    <tr>
                      <td scope="row"><input type="hidden" name="item_id" value="<?=$u['item_id']?>"><?=$u['item_id']?></td>

                      <td><input class="form-control" type="text" name="item_name" value="<?=$u['item_name'] ?>"></td>

                      <td><input class="form-control" type="text" name="description" value="<?=$u['description'] ?>"></td>

                      <td><input class="form-control" type="number" name="buy" value="<?=$u['buy'] ?>"></td>

                      <td><input class="form-control" type="number" name="sell" value="<?=$u['sell'] ?>"></td>

                      <td><input class="form-control" type="text" name="image" value="<?=$u['image'] ?>"></td>

                      <td><input type="submit" name="save" value="Save" class="btn btn-primary"></td>

                      <td><input type="button" class="btn btn-success" value="Edit" onclick="location.href='?p=admin&a=user';" /></td>

                      <td><input type="submit" name="delete" value="Delete" class="btn btn-danger"></td>
                    </tr>
                  </form>
                <?php endforeach;?>
            </tbody>
         </table>
    </div>