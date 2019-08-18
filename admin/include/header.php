<?php 
    $activePage = basename($_SERVER['PHP_SELF'], ".php"); 

require_once("include/dbcontroller.php");
  $db_handle = new DBController();
  $sql_query = new SQLQuerys();
  session_start();
  if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {
      $db_handle->divertMsg("login","");
  }
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SharvRaj Eco Farm</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="css/plugins/codemirror/codemirror.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <style type="text/css">
       /*.menu_nav::-webkit-scrollbar { width: 0 !important }*/
      .scrollOff::-webkit-scrollbar { display: none; }
    </style>
</head>

<body>

    <div id="wrapper">

    <?php
        include('sidebar.php');
    ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to SharvRaj Eco Farm</span>
                        </li>
                        <li>
                            <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>
                        <?php 
                            if($activePage == 'offer') {
                                echo 'Offer';
                            } elseif($activePage == 'services') {
                                echo 'Services';
                            } elseif($activePage == 'gallery') {
                                echo 'Gallery';
                            } elseif($activePage == 'profile') {
                                echo 'Profile';
                            }
                        ?>    
                    </h2>
                </div>
            </div>    
            <div class="wrapper wrapper-content animated fadeInRight">
                <div id="msgDiv"></div>
            