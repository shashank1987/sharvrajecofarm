<?php
  require_once("include/dbcontroller.php");
  $db_handle = new DBController();
  $sql_query = new SQLQuerys();
  session_start();
  if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {
      $db_handle->divertMsg("login.php","");
  }
  ?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <meta name="google-site-verification" content="gbkOCBRcT4qvHdZhXJ5bup5r7g0oHfk3zmdusyTYDVI" />
        <title>Marigold-Hair-and-Beauty-salon-panjim-Goa</title>
        <link rel="shortcut icon" type="image/x-icon" href="http://marigoldsalon.in/assets/img/favicon.png">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
        <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
        <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
        <link href="css/plugins/codemirror/codemirror.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script type="text/javascript" src="js/custom.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {
              $('#BefourAfterFrm').on('submit', function (e) {
                e.preventDefault();
                data = new FormData(this);
                data.append('action', 'BefourAfter');
                // alert("hello");
                $.ajax({
                  type: 'POST',
                  url: "resources/getdata.php",
                  data: data,
                  contentType: false,
                  cache: false,
                  processData:false,
                  success: function (data) {
                      $('#msgDiv').html(data).addClass( "alert alert-success" );
                      $('#BefourAfterFrm')[0].reset();
                      viewBA();
                      setTimeout(function() {
                            $('#msgDiv').fadeOut('fast');
                        }, 5000); // <-- time in milliseconds
                  }
                });
              });
            });

            function viewBA() {
                $.ajax({
                    type: 'post',
                    url: 'resources/viewdata.php',
                    data: {'action':'viewbefourafter'},
                    success: function (response) {
                        $( '#viewBA' ).html(response);
                    }
                });
            }
        </script>
    </head>
    <body onload="viewBA();">
        <div id="wrapper">
            <?php
                include('include/sidebar.php');
                ?>
            <div id="page-wrapper" class="gray-bg">
                <?php
                    include('include/header.php');
                    ?>
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Before / After</h2>
                    </div>
                </div>
                <div class="wrapper wrapper-content">
                    <?php
                        include('include/discount.php');
                        ?>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Upload Before After Images</h5>
                                </div>
                                <div class="ibox-content">
                                    <form id="BefourAfterFrm">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">Before Image</label>
                                            <div class="col-sm-12">
                                                <input type="file" name="imgBefour" class="form-control" placeholder="Ladies" required>
                                            </div>
                                        </div>
                                        <div class="form-group  row">
                                            <label class="col-sm-12 col-form-label">After Image</label>
                                            <div class="col-sm-12">
                                                <input type="file" name="imgAfter" class="form-control" placeholder="More Information" required>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button class="btn btn-white btn-sm" type="button">Cancel</button>
                                                <button class="btn btn-primary btn-sm" id="btnbefourafter" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div>
                <div class="wrapper wrapper-content"> -->
                    <div id="viewBA"></div>
                </div>
                <?php
                    include("include/footer.php");
                    ?>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>
        <!-- Jasny -->
        <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>
        <!-- DROPZONE -->
        <script src="js/plugins/dropzone/dropzone.js"></script>
        <!-- CodeMirror -->
        <script src="js/plugins/codemirror/codemirror.js"></script>
        <script src="js/plugins/codemirror/mode/xml/xml.js"></script>
        <script>
            Dropzone.options.dropzoneForm = {
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
            };
            
            $(document).ready(function(){
            
                var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
                    lineNumbers: true,
                    matchBrackets: true
                });
            
                var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
                    lineNumbers: true,
                    matchBrackets: true
                });
            
                var editor_two = CodeMirror.fromTextArea(document.getElementById("code3"), {
                    lineNumbers: true,
                    matchBrackets: true
                });
            
                var editor_two = CodeMirror.fromTextArea(document.getElementById("code4"), {
                    lineNumbers: true,
                    matchBrackets: true
                });
            
            
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });
            
            });
        </script>
    </body>
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/carousel.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Oct 2018 18:37:22 GMT -->
</html>