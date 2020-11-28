<div class="title-box">
            <h1><a href="index.php">Bored in Quarantine</a></h1>
</div>
<?php 
    //Belépett uid alapján lekérni nvetoryt pénzt meg kb mindent
    
?>
<div class="navbar">
    <div class="app-title">
        <?php 
            if(!array_key_exists('p', $_GET) || empty($_GET['p']))
                $_GET['p'] = 'home';
            switch ($_GET['p']) {
                case 'home' : echo "Főoldal" ; break;
                case 'brewing' : echo "Pálinkafőzés" ; break;
                case 'register' : echo "Regisztráció" ; break;
                case 'login' : echo "Bejelentkezés" ; break;
                case 'svgs' : echo "Ikonok" ; break;
                case 'admin' : echo "Admin panel" ; break;
                default : echo "Error" ; break;
            }
         ?>
    </div>
    <div class="menu">
    <?php if(IsUserLoggedIn()) : ?>
        <a href="index.php?p=shop" class="money">Pénz</a>
        <span>|</span>
        <a href="index.php?p=profil"><?=$_SESSION['uname']?></a>
        <span>|</span>
        <a href="index.php?p=profil" class="level">Szint</a>
    <?php endif; ?>
    </div>
    <div class="login-menu">
    <?php if(!IsUserLoggedIn()) : ?>
        <a href="index.php?p=login">Belépés</a>
        <span>|</span>
        <a href="index.php?p=register">Regisztráció</a>
    <?php else : ?>
        <?php if($_SESSION['permission'] > 0): ?>
            <a href="index.php?p=admin">Admin</a>
            <span>|</span>
        <?php endif; ?>
        <a href="index.php?p=logout">Kilépés</a>
    <?php endif; ?>
    </div>
</div>