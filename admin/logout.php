<?php
  require_once("include/dbcontroller.php");
  $db_handle = new DBController();
  $sql_admin = new Admin();
  ?>
<?php
  session_start();
  if (session_destroy()) { 
    $db_handle->Query($sql_admin->sessNull());
    $db_handle->divertMsg("login.php","");
  }
  ?>