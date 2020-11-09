<div class="message" style="color: red">
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $postData = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
  ];
  if(empty($postData['email']) || empty($postData['password'])) {
    echo "Hiányzó adat(ok)!";
  } else if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Hibás email formátum!";
  } else if(!UserLogin($postData['email'], $postData['password'])) {
    echo "Hibás email cím vagy jelszó!";
  }

  $postData['password'] = "";
}
?>
</div>
<div class="login-form">
    <form method="post">
        <div class="form-group">
            <label for="email">Email cím</label>
            <br>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password">Jelszó</label>
            <br>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <button type="submit" name="login">Belépés</button>
    </form>
</div>