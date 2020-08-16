<!DOCTYPE html>

<?php
require_once '../inc/functions.php';

$GLOBALS['messages'][] = array(
  'heading' => 'Cannot connect to database',
  'message' => 'It\'s not been possible to establish a database connection. Probably because it hasn\'t been setup yet.',
  'type' => 'info'
);
?>

<html lang="en">
<head>
  <?php
    require_once ADMIN_ROOT . '/inc/head.php';
  ?>
</head>
<body id="pageInstall">
  <main>
    <h1>Install</h1>

    <?php
      require_once ADMIN_ROOT . '/inc/messages.php';
    ?>

    <section class="block">
      <h1>Establish a database connection</h1>
      <form method="post">
        <input type="text" name="" value="" placeholder="Host" required>
        <input type="text" name="" value="" placeholder="Name" required>
        <input type="text" name="" value="" placeholder="User" required>
        <input type="text" name="" value="" placeholder="Password" required>

        <button type="submit" name="">Connect</button>
      </form>
    </section>
  </main>

  <footer>
    <?php
      require_once ADMIN_ROOT . '/inc/footer.php';
    ?>
  </footer>
</body>
</html>
