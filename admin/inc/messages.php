<?php
if ( isset( $_SESSION['messages'] ) ) {
  for ( $i = 0; $i < count( $_SESSION['messages'] ); $i++) {
    message( $_SESSION['messages'][$i] );
  }

  unset( $_SESSION['messages'] );
}
?>
