<?php 
  include 'inc_head.php';

  if ( $jb_login ) {
    session_destroy();
    echo("<script>location.href='./login.html';</script>"); 
  }
?>