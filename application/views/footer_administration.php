 <div class="footer">
                    <div class="pull-right">
                        Team <strong>Shadow</strong>.
                    </div>
                    <div>
                        <strong>Copyright</strong> TS-Tech &copy; 2016-2017
                    </div>
                </div>

            </div>
        </div>

       <!-- Mainly scripts -->
    
    <script src="<?php echo base_url(); ?>style/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url(); ?>style/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?php echo base_url(); ?>style/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url(); ?>style/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>style/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/iCheck/icheck.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo base_url(); ?>style/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?php echo base_url(); ?>style/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>style/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/dataTables/datatables.min.js"></script>
    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url(); ?>style/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo base_url(); ?>style/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?php echo base_url(); ?>style/js/plugins/toastr/toastr.min.js"></script>
    
    <script src="<?php echo base_url(); ?>style/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/clockpicker/clockpicker.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/cropper/cropper.min.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/fullcalendar/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="<?php echo base_url(); ?>style/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>
    <!-- Chosen -->
    <script src="<?php echo base_url(); ?>style/js/plugins/chosen/chosen.jquery.js"></script>

   <!-- JSKnob -->
   <script src="<?php echo base_url(); ?>style/js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="<?php echo base_url(); ?>style/js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="<?php echo base_url(); ?>style/js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="<?php echo base_url(); ?>style/js/plugins/nouslider/jquery.nouislider.min.js"></script>
    <!-- Toastr script -->
   <script src="<?php echo base_url(); ?>style/js/plugins/toastr/toastr.min.js"></script>


    
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
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
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
        


    </body>

</html>
