<?php
if ( $_SERVER['SCRIPT_NAME'] != '/login.php' && isset( $_SESSION ) ) {
  /**
   * Session output
   */
  $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

  message(array(
    'heading' => 'Session information',
    'message' => array(
      'Last activity: ' . date('d.m.Y H:i', $_SESSION['LAST_ACTIVITY']),
      'Expires in: ' . date('i:s', time() + SESSION_EXPIRE_IN - time()),
      'User: ' . $email,
    ),
  ));
}
?>
