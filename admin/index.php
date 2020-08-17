<!DOCTYPE html>

<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

require_once 'inc/functions.php';
?>

<html lang="en">
<head>
  <?php
    require_once ADMIN_ROOT . '/inc/head.php';
  ?>
</head>
<body>
  <?php
    require_once ADMIN_ROOT . '/inc/authenticate.php';
  ?>

  <?php
    $_SESSION['username'] = isset($_SESSION['email']) ? $_SESSION['email'] : 'Unknown';
  ?>

  <header>
    <?php
      require_once ADMIN_ROOT . '/inc/navigation.php';
    ?>
  </header>

  <main>
    <h1>Dashboard</h1>

    <?php
      require_once ADMIN_ROOT . '/inc/messages.php';
    ?>

    <p>Hello <?php echo $_SESSION['username']; ?>.</p>
  </main>

  <footer>
    <?php
      require_once ADMIN_ROOT . '/inc/footer.php';
    ?>
  </footer>
</body>
</html>
