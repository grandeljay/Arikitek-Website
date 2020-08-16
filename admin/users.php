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
    <h1>Users</h1>

    <?php
      require_once ADMIN_ROOT . '/inc/messages.php';
    ?>

    <p>Hello <?php echo $_SESSION['username']; ?>.</p>

    <section class="block">
      <h2>All users</h2>
      <?php
      /**
       * Get Users
       */
      $sql = 'SELECT * FROM users;';
      $users = $dbh->prepare($sql);
      $users->execute();
      $usersArray = $users->fetchAll();
      $skipColumns = array(
        'password',
      );
      ?>
      <p>There are currently <?php echo count($usersArray); ?> users registered.</p>

      <table>
      <thead>
      <tr>
      <?php
      foreach ($usersArray[0] as $key => $value) {
        if (!in_array($key, $skipColumns)) {
          echo '<th>';

          if (!is_numeric($key)) {
            echo $key;
          }

          echo '</th>';
        }
      }
      ?>
      </tr>
      </thead>
      <tbody>
      <?php
      foreach ($usersArray as $rowArray) {

        echo '<tr>';

        foreach ($rowArray as $key => $value) {
          if (!in_array($key, $skipColumns)) {
            echo '<td>';

            if (!is_numeric($key)) {
              echo $value;
            }

            echo '</td>';
          }
        }

        echo '</tr>';

      }
      ?>
      </tbody>
      </table>
    </section>

    <section class="block">
      <h2>Verification status</h2>
      <p>Select a user you would like to verify or unverify.</p>

      <?php
      /**
       * Get unverified users
       */
      $sql = 'SELECT * FROM users;';
      $users = $dbh->prepare($sql);
      $users->execute();
      $usersArray = $users->fetchAll();


      /**
       * Change verification
       */
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['userVerfiy'])) {
          $result = databaseQuery("UPDATE users SET verified = " . $_POST['verificationStatus'] . " WHERE email = '" . $_POST['user'] . "';");
          $verificationStatus = $_POST['verificationStatus'] ? 'Verified' : 'Unverified';

          if ($result) {
            echo '<p>User ' . $_POST['user'] . ' verification successfully set to ' . $verificationStatus . '.</p>';
          }
          else {
            echo '<p>Failed to set user ' . $_POST['user'] . ' verification to ' . $verificationStatus . '.</p>';
          }
        }
      }
      ?>

      <form method="post">
        <input type="hidden" name="userVerfiy">
        <input list="users" name="user" autocomplete="off" type="email" required>
        <datalist id="users">
          <?php
          for ($i = 0; $i < count($usersArray); $i++) {
            echo '<option value="' . $usersArray[$i]['email'] . '">' . $usersArray[$i]['email'] . '</option>';
          }
          ?>
        </datalist>

        <select required name="verificationStatus">
          <option value="1">Verify</option>
          <option value="0">Unverify</option>
        </select>

        <button type="submit">Change verification of user</button>
      </form>
      <?php
      ?>
    </section>
  </main>

  <footer>
    <?php
      require_once ADMIN_ROOT . '/inc/footer.php';
    ?>
  </footer>
</body>
</html>
