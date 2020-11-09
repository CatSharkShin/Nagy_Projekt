<?php 
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['delete'])){
      if(!delUser($_POST['id'])){
        echo "Delete failed";
      }else{
        echo "Delete was successful";
      }
    }else if(isset($_POST['save'])){
      $postData = [
        'user_id' => $_POST['user_id'],
        'user_name' => $_POST['user_name'],
        'email' => $_POST['email'],
        'permission' => $_POST['permission']
      ];

      if(empty($postData['user_name']) || empty($postData['permission']) || empty($postData['email'])) {
        echo "Missing information!";
      } else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        echo "Wrong email format!";
      }else if($postData['permission'] < 0 || $postData['permission'] > 1){
        echo "Incorrect permission level!";
      }else if(!userEdit($postData['user_id'],$postData['user_name'], $postData['email'], $postData['permission'])) {
        echo "Edit failed!";
      }

      $postData['password'] = $postData['password1'] = "";

        }
      }
 ?>
<div style="text-align: center;">
    <h1>Users</h1>
    <div>
        <?php 
            $users = getList("SELECT user_id,user_name,email,permission FROM users");
         ?>
         <table>
            <thead>
                <th>User Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Permission level</th>
                <th colspan="2">Actions</th>
            </thead>
            <tbody>
                <?php foreach ($users as $u) : ?>
                  <form method="post">
                    <tr>
                      <td scope="row"><input type="hidden" name="user_id" value="<?=$u['user_id']?>"><?=$u['user_id']?></td>

                      <td><input class="form-control" type="text" name="user_name" value="<?=$u['user_name'] ?>"></td>

                      <td><input class="form-control" type="email" name="email" value="<?=$u['email'] ?>"></td>

                      <td><input min="0" max="1" class="form-control" type="number" name="permission" value="<?=$u['permission'] ?>"></td>

                      <td><input type="submit" name="save" value="Save" class="btn btn-primary"></td>

                      <td><input type="submit" name="delete" value="Delete" class="btn btn-danger"></td>
                    </tr>
                  </form>
                <?php endforeach;?>
            </tbody>
         </table>
    </div>
</div>