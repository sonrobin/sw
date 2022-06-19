<?php
  session_start();
  if( isset( $_SESSION[ 'uemail' ] ) ) {
    $jb_login = TRUE;

  }
 
  if(isset($_SESSION[ 'companyname' ] )) {
    $jb_company = true;

  }
  if($_SESSION[ 'confirm' ] == 0 )
    {
      $jb_confirm == 0;
    }
    else
    {
      $jb_confirm == 1;
    }
  if(isset($_SESSION[ 'maser' ]))
  {
      $jb_master == 1;
  }
  else
  {
      $jb_master == 0;
  }
  /*
  if(isset($_SESSION[ 'confirm' ] )) {
    if($_SESSION[ 'confirm' ] == 0 )
    {
      $jb_confirm == 0;
    }
    else
    {
      $jb_confirm == 1;
    }

  }
  */
?>