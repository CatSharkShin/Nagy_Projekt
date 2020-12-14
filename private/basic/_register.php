<div class="message" style="color : red">
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $postData = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password1' => $_POST['password1'],
        'password2' => $_POST['password2']
    ];

    if(empty($postData['username']) ||  empty($postData['email']) || empty($postData['password1']) || empty($postData['password2'])) {
        echo "Hiányzó adat(ok)!";
    } else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        echo "Hibás email formátum!";
    } else if ($postData['password1'] != $postData['password2']) {
        echo "A jelszavak nem egyeznek!";
    } else if(strlen($postData['password1']) < 6) {
        echo "A jelszó túl rövid! Legalább 6 karakter hosszúnak kell lennie!";
    } else if(!UserRegister($postData['email'], $postData['password1'], $postData['username'])) {
        echo "Sikertelen regisztráció!";
    }

    $postData['password'] = $postData['password1'] = "";
}
?>
</div>
<div class="login-form">
    <form method="post" >
        <div class="form-group">
            <label for="email">Email cím</label>
            <br>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?=isset($postData) ? $postData['email'] : "";?>">
        </div>
        <div class="form-group">
            <label for="name">Név</label>
            <br>
            <input name="username" type="text" class="form-control" id="name" aria-describedby="emailHelp" value="<?=isset($postData) ? $postData['username'] : "";?>">
        </div>
        <div class="form-group">
            <label for="password1">Jelszó</label>
            <br>
            <input  name="password1" type="password" class="form-control" id="password1">
        </div>
        <div class="form-group">
            <label for="password2">Jelszó</label>
            <br>
            <input name="password2" type="password" class="form-control" id="password2">
        </div>
        <button type="submit" name="register" class="btn-grey">Regisztráció</button>
    </form>
</div>