<?php
/**
 * Error reporting
 */
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );


/**
 * Constants
 */
defined( 'ROOT' ) OR define( 'ROOT', $_SERVER['DOCUMENT_ROOT'] );
defined( 'ADMIN_ROOT' ) OR define( 'ADMIN_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/admin' );


/**
 * Configuration
 */
if ( file_exists( ADMIN_ROOT . '/inc/configure.php' ) ) {
  /**
   * Load
   */
  require_once ADMIN_ROOT . '/inc/configure.php';


  /**
   * Connect to Database
   */
  databaseQuery('CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    verified boolean NOT NULL DEFAULT FALSE,
    email VARCHAR (128) NOT NULL,
    password VARCHAR (256) NOT NULL
  );');
}
else {
  /**
   * Run installer
   */
   redirect( '/admin/install' );
}


/**
 * Constants
 */
defined( 'SESSION_EXPIRE_IN' ) or define( 'SESSION_EXPIRE_IN', 1800 );


/**
 * Variables
 */
$GLOBALS['messages'] = array();


/**
 * Redirect
 */
function redirect( $uri ) {
  if ( $uri != $_SERVER['REQUEST_URI'] ) {
    header( 'Location: ' . $uri );
    die();
  }
}


/**
 * Show Messages
 */
function message( $options = array() ) {
  $heading = isset( $options['heading'] ) ? $options['heading'] : null;
  $message = isset( $options['message'] ) ? $options['message'] : null;
  $href = isset( $options['href'] ) ? $options['href'] : null;
  $hrefLabel = isset( $options['hrefLabel'] ) ? $options['hrefLabel'] : 'Continue';
  $type = isset( $options['type'] ) ? $options['type'] : 'notice';

  $classes = array(
    'block',
    'message',
    $type,
  );

  ?>
  <section class="<?php echo implode( ' ', $classes ); ?>">
    <?php
    if ( $heading ) {
      echo '<h2>' . $heading .'</h2>';
    }

    if ( $message ) {
      if ( is_array( $message ) ) {
        for ( $i = 0; $i < count( $message ); $i++ ) {
          echo '<p>' . $message[$i] .'</p>';
        }
      }
      else {
        echo '<p>' . $message .'</p>';
      }
    }

    if ( $href ) {
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

  header( 'Location: /admin/login.php' );
  die();
}


/**
 * Database query
 */
function databaseQuery( $query ) {
  $dbh;
  $return = false;
  $type = strtolower( explode( ' ', $query )[0] );

  try {
    $dbh = new PDO( 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASSWORD );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $result = $dbh->prepare( $query );

    switch ( $type ) {
      case 'select':
        $return = $result->fetchAll();
        break;

      default:
        $return = $result->execute();
        break;
    }
  }
  catch ( PDOException $exception ) {
    $return = 'Connection failed: ' . $exception->getMessage();

    switch ( $exception->getCode() ) {
      case 1049:
        $GLOBALS['messages'][] = array(
          'heading' => 'Error',
          'message' => $exception->getMessage(),
          'type' => 'failure'
        );
        break;
    }
  }

  return $return;
}
?>
