<!DOCTYPE html>

<?php
require_once 'inc/functions.php';
?>

<html lang="en">
<head>
  <?php
    require_once 'inc/head.php';
  ?>
</head>
<body>
  <?php
    require_once 'inc/authenticate.php';
  ?>

  <?php
    $_SESSION['username'] = isset($_SESSION['email']) ? $_SESSION['email'] : 'Unknown';
  ?>

  <header>
    <?php
      require_once 'inc/navigation.php';
    ?>
  </header>

  <main>
    <h1>Dashboard</h1>

    <?php
      require_once 'inc/messages.php';
    ?>

    <p>Hello <?php echo $_SESSION['username']; ?>.</p>
  </main>

  <footer>
    <?php
      require_once 'inc/footer.php';
    ?>
  </footer>
</body>
</html>
