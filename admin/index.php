<?php
    require_once("include/dbcontroller.php");
    $db_handle = new DBController();
    $sql_query = new SQLQuerys();
    session_start();
    if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {
        $db_handle->divertMsg("login","");
    } else {
        $db_handle->divertMsg("offer","");
    }
?>