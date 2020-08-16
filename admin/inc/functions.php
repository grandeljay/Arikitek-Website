<?php
/**
 * Error reporting
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/**
 * Constants
 */
defined( 'ADMIN_INDEX' ) OR define( 'ADMIN_INDEX',  dirname( dirname( __FILE__ ) ) );
defined( 'ADMIN_DIR' ) OR define( 'ADMIN_DIR', dirname( ADMIN_INDEX ) );
defined( 'ADMIN_LOGIN' ) OR define( 'ADMIN_LOGIN', ADMIN_DIR . '/login.php' );


/**
 * Connect to Database
 */
$dbh;
$dsn = 'mysql:dbname=trees_hub;host=127.0.0.1';
$user = 'trees_hub';
$password = 'trees_hub';

try {
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  /**
   * Create users table
   */
  $sql = 'CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    verified boolean NOT NULL DEFAULT FALSE,
    email VARCHAR (128) NOT NULL,
    password VARCHAR (256) NOT NULL
  );';
  $dbh->exec($sql);
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}


/**
 * Constants
 */
defined('SESSION_EXPIRE_IN') or define('SESSION_EXPIRE_IN', 1800);


/**
 * Variables
 */
$GLOBALS['messages'] = array();


/**
 * Show Messages
 */
function message($options = array()) {
  $heading = isset($options['heading']) ? $options['heading'] : null;
  $message = isset($options['message']) ? $options['message'] : null;
  $href = isset($options['href']) ? $options['href'] : null;
  $hrefLabel = isset($options['hrefLabel']) ? $options['hrefLabel'] : 'Continue';
  $type = isset($options['type']) ? $options['type'] : 'notice';

  $classes = array(
    'block',
    'message',
    $type,
  );

  ?>
  <section class="<?php echo implode(' ', $classes); ?>">
    <?php
    if ($heading) {
      echo '<h2>' . $heading .'</h2>';
    }

    if ($message) {
      if (is_array($message)) {
        for ($i = 0; $i < count($message); $i++) {
          echo '<p>' . $message[$i] .'</p>';
        }
      }
      else {
        echo '<p>' . $message .'</p>';
      }
    }

    if ($href) {
      echo '<a href="' . $href . '" class="button">' . $hrefLabel . '</a>';
    }
    ?>
  </section>
  <?php
}

/**
 * Log out user
 */
function logOutCurrentUser() {
  session_unset();
  session_destroy();

  header('Location: /admin/login.php');
  die();
}


/**
 * Database query
 */
function databaseQuery($query) {
  global $dbh;

  $result = $dbh->prepare($query);
  $return = $result->execute();

  return $return;
}
?>
