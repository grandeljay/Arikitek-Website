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
<body id="pageLogin">
  <?php
    require_once ADMIN_ROOT . '/inc/authenticate.php';
  ?>

  <?php
  /**
   * Get Users
   */
  $usersArray = databaseQuery( 'SELECT * FROM users;' );


  /**
   * Process Forms
   */
  if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    /**
     * Log in
     */
    if ( isset( $_POST['logIn'] ) ) {
      $values = array(
        'email' => $_POST['email'],
        'password' => hash('ripemd160', $_POST['password']),
      );
      $loginSuccessfull = false;
      $isVerified = true;

      foreach( $usersArray as $rowArray ) {
        $email = $rowArray['email'];
        $password = $rowArray['password'];

        if ( $email == $values['email'] && $password == $values['password'] ) {
          $isVerified = $rowArray['verified'];
          $loginSuccessfull = true;
          break;
        }
      }

      if ( $loginSuccessfull && $isVerified ) {
        $_SESSION['email'] = $values['email'];

        redirect( '/admin/index.php' );
      }


      /**
       * Error Messages
       */
      if ( !$loginSuccessfull ) {
        $_SESSION['messages'][] = array(
          'heading' => 'Failure',
          'message' => 'Log in attempt failed.',
          'type' => 'failure'
        );
      }

      if ( !$isVerified ) {
        $_SESSION['messages'][] = array(
          'heading' => 'Failure',
          'message' => 'You are not verified.',
          'type' => 'failure'
        );
      }
    }


    /**
     * Create admin user
     */
    if ( isset( $_POST['createAdminUser'] ) ) {
      $values = [
        true,
        $_POST['email'],
        hash( 'ripemd160', $_POST['password'] ),
      ];

      databaseQuery( 'INSERT INTO users (verified, email, password) VALUES ("' . implode( '","', $values ) . '")' );

      /**
       * Show message that account was created on login.php
       */
      $_SESSION['messages'][] = [
        'heading' => 'Success',
        'message' => 'Admin account successfully created.',
        'type' => 'success'
      ];

      redirect( '/admin/index.php' );
    }


    /**
     * Create unverified user
     */
    if (isset($_POST['requestToJoinForm'])) {
      $values = array(
        false,
        $_POST['email'],
        hash('ripemd160', $_POST['password']),
      );

      databaseQuery( 'INSERT INTO users (verified, email, password) VALUES ("' . implode( '", "', $values) . '");' );

      $_SESSION['messages'][] = [
        'heading' => 'Review required',
        'message' => 'Your account has been created and needs to be reviewed by an admin before you can log in.',
        'type' => 'info'
      ];
      redirect( '/admin/index.php' );
    }


    /**
     * Send request to join
     */
    if (isset($_POST['requestToJoin'])) {
      echo 'Process request to join here.';
    }
  }
  ?>

  <main>
    <div>
    <?php
    require_once ADMIN_ROOT . '/inc/messages.php';

    /**
     * Create admin if there are no users
     */
    if ( count( $usersArray ) === 0 ) {
      ?>
      <section class="block">
        <h1>Create admin user</h1>
        <p>No users could be found. You are the lucky first and will be awarded admin privileges.</p>

        <form method="post">
          <input type="hidden" name="createAdminUser">
          <input type="email" placeholder="Email" name="email" required>
          <input type="password" placeholder="Password" name="password" required>
          <button type="submit" class="full">Create admin user</button>
        </form>
      </section>
      <?php
    }

    /**
     * Request to join
     */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['requestToJoinButton'])) {
        ?>
        <section class="block">
          <h1>Request to join</h1>
          <p>Use this form to sign up. An administrator will review your request.</p>

          <form method="post">
            <input type="hidden" name="requestToJoinForm">
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>

            <input type="text" placeholder="First name" pattern="[a-zA-Z]+" name="nameFirst">
            <input type="text" placeholder="Last name" pattern="[a-zA-Z]+" name="nameLast">
            <textarea placeholder="Anything else?"></textarea>

            <button type="submit" class="full">Send request</button>
          </form>

          <hr>

          <a href="/admin/index.php" class="button full">Go back</a>
        </section>
        <?php
      }
    }


    /**
     * Log in if there are users
     */
    if ( count($usersArray) > 0 && !isset( $_POST['requestToJoinButton'] ) ) {
      ?>
      <section class="block">
        <h1>Log in</h1>
        <p>Please log in to continue.</p>

        <form method="post">
          <input type="hidden" name="logIn">
          <input type="email" placeholder="Email" name="email" required>
          <input type="password" placeholder="Password" name="password" required>

          <button type="submit" class="full">Log in</button>
        </form>

        <hr>

        <form method="post">
          <input type="hidden" name="requestToJoinButton">
          <button type="submit" class="full">Request to join</button>
        </form>
      </section>
      <?php
    }
    ?>
    </div>
  </main>

  <footer>
    <?php
      require_once ADMIN_ROOT . '/inc/footer.php';
    ?>
  </footer>
</body>
</html>
