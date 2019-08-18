</div>
<div class="footer">
    <div class="text-center">
        Designed & Developed by 
        <strong ><a target="_blank" href="https://www.codeburg.in/">CodeBurg</a></strong> 2019.
    </div>
</div>


        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="js/plugins/codemirror/codemirror.js"></script>
    <script src="js/plugins/codemirror/mode/xml/xml.js"></script>
    <script src="js/plugins/cropper/cropper.min.js"></script>
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/plugins/dropzone/dropzone.js"></script>
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>

    <!-- iCheck -->
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

    <script>
        $(document).ready(function(){

            var mem = $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });


    </script>

        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function(){


                $('.dataTables-example').DataTable({
                    pageLength: 10,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        { extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},
            
                        {extend: 'print',
                         customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');
            
                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                        }
                    ]
            
                });
            
            });
            
        </script>
        
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
</html>
