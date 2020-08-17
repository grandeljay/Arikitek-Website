<!DOCTYPE html>

<?php
require_once '../inc/functions.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
  switch ( $_POST['form'] ) {
    case 'database':
      $data = [];

      unset( $_POST['form'] );

      foreach ($_POST as $key => $value) {
        $data[] = 'define( \'DB_' . strtoupper($key) . '\', \'' . $value . '\' );';
      }

      file_put_contents( ADMIN_ROOT . '/inc/configure.php', '<?php' . PHP_EOL . implode( PHP_EOL, $data ) . PHP_EOL . '?>' );

      redirect( '/admin/index.php' );
      break;
  }
}


/**
 * Messages
 */
if ( file_exists( ADMIN_ROOT . '/inc/configure.php' ) ) {
  $_SESSION['messages'][] = array(
     'heading' => 'Cannot connect to database',
     'message' => 'The crededentials for the database do not seem to work.',
     'type' => 'error'
  );
}
else {
  $_SESSION['messages'][] = array(
     'heading' => 'Cannot connect to database',
     'message' => 'It\'s not been possible to establish a database connection. Probably because it hasn\'t been setup yet.',
     'type' => 'info'
  );
}

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
        <input type="hidden" name="form" value="database">

        <input type="text" name="host" value="" placeholder="Host" required>
        <input type="text" name="name" value="" placeholder="Name" required>
        <input type="text" name="user" value="" placeholder="User" required>
        <input type="text" name="password" value="" placeholder="Password" required>

        <button type="submit" class="full">Connect</button>
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
