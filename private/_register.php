<div class="message" style="color : red">
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $postData = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'password1' => $_POST['password1']
    ];

    if(empty($postData['username']) ||  empty($postData['email']) || empty($postData['password']) || empty($postData['password1'])) {
        echo "Hiányzó adat(ok)!";
    } else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        echo "Hibás email formátum!";
    } else if ($postData['password'] != $postData['password1']) {
        echo "A jelszavak nem egyeznek!";
    } else if(strlen($postData['password']) < 6) {
        echo "A jelszó túl rövid! Legalább 6 karakter hosszúnak kell lennie!";
    } else if(!UserRegister($postData['email'], $postData['password'], $postData['username'])) {
        echo "Sikertelen regisztráció!";
    }

    $postData['password'] = $postData['password1'] = "";
}
?>
</div>
<div class="login-form">
    <form method="post">
        <div class="form-group">
            <label for="emailinput">Email cím</label>
            <br>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="nameinput">Név</label>
            <br>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="passwordinput">Jelszó</label>
            <br>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="passwordinput">Jelszó</label>
            <br>
            <input type="password" class="form-control" id="password2">
        </div>
        <button type="submit" class="btn btn-primary">Regisztráció</button>
    </form>
</div>