<?php
if(!array_key_exists('p', $_GET) || empty($_GET['p']))
    $_GET['p'] = 'home';

switch ($_GET['p']) {
    case 'home': require_once PATH_BASIC.'home.php'; break;
    case 'svgs': require_once PATH_SITES.'svgs.php'; break;

    case 'login': !IsUserLoggedIn() ? require_once PATH_BASIC."_login.php" : header('Location: index.php'); break;

    case 'register': !IsUserLoggedIn() ? require_once PATH_BASIC."_register.php" : header('Location: index.php'); break;

    case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;

    default: require_once PATH_BASIC.'error.php'; break;
}