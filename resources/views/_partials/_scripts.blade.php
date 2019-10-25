        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
    
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        
        <!-- Select2 -->
        <script src="../../plugins/select2/js/select2.full.min.js"></script>
        
        <!-- Bootstrap4 Duallistbox -->
        <script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        
        <script type="text/javascript" src="{{ asset('plugins/datatables/datatables.min.js')}}"></script>
    
        <script>
            $.extend( true,$.fn.dataTable.defaults,{
                'processing': true,
                'serverSide': true,
                "orderMulti": true,
                'language': {'url': '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'}
            });
        </script>
    
        <!-- Toastr -->
        <script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
    
        <!-- ChartJS -->
        {{-- <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script> --}}
        
        <!-- Sparkline -->
        {{-- <script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script> --}}
        
        <!-- JQVMap -->
        {{-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script> --}}
        {{-- <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script> --}}
        
        <!-- jQuery Knob Chart -->
        {{-- <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script> --}}
        
        <!-- daterangepicker -->
        {{-- <script src="{{ asset('plugins/moment/moment.min.js')}}"></script> --}}
        {{-- <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
        
        <!-- bootstrap color picker -->
        {{-- <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script> --}}
        
        <!-- Tempusdominus Bootstrap 4 -->
        {{-- <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script> --}}
        
        <!-- Summernote -->
        {{-- <script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script> --}}
        
        <!-- overlayScrollbars -->
        {{-- <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script> --}}
        
        <!-- AdminLTE App -->
        <script src="{{ asset('js/adminlte.js')}}"></script>

