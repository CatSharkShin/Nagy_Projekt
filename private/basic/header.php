<div class="title-box">
            <h1><a href="index.php">Bored in Quarantine</a></h1>
</div>
<div class="navbar">
    <div class="app-title">
        <?php 
            if(!array_key_exists('p', $_GET) || empty($_GET['p']))
                $_GET['p'] = 'home';
            switch ($_GET['p']) {
                case 'home' : echo "Főoldal" ; break;
                case 'register' : echo "Regisztráció" ; break;
                case 'login' : echo "Bejelentkezés" ; break;
                default : echo "Error" ; break;
            }
         ?>
    </div>
    <div class="menu">
    <?php if(IsUserLoggedIn()) : ?>
        <a href="index.php?p=shop">Pénz</a>
        <span>|</span>
        <a href="index.php?p=profil">Név</a>
        <span>|</span>
        <a href="index.php?p=profil">Szint</a>
    <?php endif; ?>
    </div>
    <div class="login-menu">

    <?php if(!IsUserLoggedIn()) : ?>
        <a href="index.php?p=login">Belépés</a>
        <span>|</span>
        <a href="index.php?p=register">Regisztráció</a>
    <?php else : ?>
        <a href="index.php?p=logout">Kilépés</a>
    <?php endif; ?>
    </div>
</div>