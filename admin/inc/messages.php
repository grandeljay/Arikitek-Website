<?php
for ( $i = 0; $i < count( $GLOBALS['messages'] ); $i++) {
  message( $GLOBALS['messages'][$i] );
}

unset( $GLOBALS['messages'] );
?>
