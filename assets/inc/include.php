<?php 
    $activePage = basename($_SERVER['PHP_SELF'], ".php"); 

require_once("admin/include/dbcontroller.php");
  $db_handle = new DBController();
  $sql_query = new SQLQuerys();
?>