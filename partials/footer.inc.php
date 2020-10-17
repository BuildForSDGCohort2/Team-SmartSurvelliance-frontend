</div><!-- App Container -->
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="assets/plugins/bootstrap/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/toastr/toastr.min.js"></script>
        <script src="assets/plugins/d3/d3.min.js"></script>
        <script src="assets/plugins/nvd3/nv.d3.min.js"></script>
        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/elevatezoom/jquery.elevatezoom-3.0.8.min.js"></script>
        <!-- Select2 -->
        <script src="assets/plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="../../assets/js/pages/mailbox.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>
        <script src="assets/js/image.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="assets/dist/js/demo.js"></script>
        <script src="assets/js/utilities.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
    
                "use strict";
                
                $('#primaryToast').on('click', function(){
                    toastr.primary('Are you the 6 fingered man?')
                });

                $('#successToast').on('click', function(){
                    toastr.success('Are you the 6 fingered man?')
                });
                
                $('#infoToast').on('click', function(){
                    toastr.info('I do not think that means what you think it means.')
                });
                
                $('#warningToast').on('click', function(){
                    toastr.warning('Inconceivable!')
                });
                
                $('#dangerToast').on('click', function(){
                    toastr.error('Have fun storming the castle!')
                });
            });
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                  theme: 'bootstrap4'
                })
              })
        </script>
    </body>
</html>