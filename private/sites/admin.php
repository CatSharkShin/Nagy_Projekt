<div class="admin-navbar">
  <div>
    <a href="index.php?p=admin&a=users">User Manager</a>
    <span>|</span>
    <a href="index.php?p=admin&a=item">Item manager</a>
  </div>
</div>

<div style="text-align: center;">
    <?php
      if(!array_key_exists('a', $_GET) || empty($_GET['a']))
          $_GET['a'] = 'home';

      switch ($_GET['a']) {
          case 'users': require_once PATH_ADMIN.'users.php'; break;
          case 'user': require_once PATH_ADMIN.'user.php'; break;
          case 'item': require_once PATH_ADMIN.'item.php'; break;
          case 'home': require_once PATH_ADMIN.'users.php'; break;

          default: require_once PATH_BASIC.'error.php'; break;
      }
      ?>
</div>