  <!-- jQuery -->
    {{ HTML::script('/assets/jquery/dist/jquery.min.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('/assets/bootstrap/dist/js/bootstrap.min.js') }}

    <!-- Metis Menu Plugin JavaScript -->
    {{ HTML::script('/assets/metisMenu/dist/metisMenu.min.js') }}
    {{ HTML::script('/assets/raphael/raphael-min.js') }}
    {{ HTML::script('/assets/morrisjs/morris.min.js') }}
    {{ HTML::script('/assets/js/morris-data.js') }}
    {{ HTML::script('/assets/js/circles.min.js') }}

    <!-- Custom Theme JavaScript -->
    {{ HTML::script('/assets/js/sb-admin-2.js') }}

    @yield('scripts')