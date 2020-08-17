<!DOCTYPE html>

<?php
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
    $_SESSION['username'] = $_SESSION['email'];
  ?>

  <header>
    <?php
      require_once ADMIN_ROOT . '/inc/navigation.php';
    ?>
  </header>

  <main>
    <h1>Settings</h1>

    <?php
      require_once ADMIN_ROOT . '/inc/messages.php';
    ?>

    <p>Hello <?php echo $_SESSION['username']; ?>.</p>

    <?php
    $tablesArray = databaseQuery( 'SHOW TABLES' );

    /**
     * Drop Table
     */
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( isset( $_POST['tableDrop'] ) ) {
        databaseQuery( 'DROP TABLE ' . $_POST['tableName'] );

        unset( $_SESSION['email'] );

        $_SESSION['messages'][] = [
          'heading' => 'You asked for it',
          'message' => [
            'Table has been dropped.',
            'You have been logged out, since all users were just deleted, including the admin.',
          ],
          'type' => 'important'
        ];

        redirect( '/admin/index.php' );
      }
    }
    ?>

    <section class="block">
      <h2>Drop table</h2>
      <p>Select a table you would like to remove. For obvious reasons, this action can not be undone.</p>
      <form method="post">
        <input type="hidden" name="tableDrop">
        <select name="tableName">
          <?php
          for ($i = 0; $i < count($tablesArray); $i++) {
            echo '<option value="' . $tablesArray[$i][0] . '">' . $tablesArray[$i][0] . '</option>';
          }
          ?>
        </select>

        <button type="submit" class="critical">Delete entire table</button>
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
