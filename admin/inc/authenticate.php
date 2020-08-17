<?php
/**
 * Initialise session
 */
session_start();


/**
 * Redirect lost users which are logged in
 */
$redirectFromScriptIfLoggedIn = array(
  '/admin/login.php',
);

if ( isset( $_SESSION['email'] ) && in_array( $_SERVER['SCRIPT_NAME'], $redirectFromScriptIfLoggedIn) ) {
  redirect( '/admin/index.php' );
}


/**
 * Show Log in Form
 * If there is at least 1 user
 */
if ( !isset($_SESSION['email']) ) {
  redirect( '/admin/login.php' );
}


/**
 * Log out user
 */
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
  if ( isset( $_POST['userLogOut'] ) ) {
    logOutCurrentUser();
  }
}


/**
 * Expire user
 */
if ( isset($_SESSION['LAST_ACTIVITY'] ) && ( time() - $_SESSION['LAST_ACTIVITY'] > SESSION_EXPIRE_IN ) ) {
    session_unset();
    session_destroy();
}

$_SESSION['LAST_ACTIVITY'] = time();
?>
