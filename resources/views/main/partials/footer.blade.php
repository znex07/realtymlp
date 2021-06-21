@include('main.landing.footer')
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/assets/js/flat-ui.js"></script>
        <script>
          delete $.fn.select2;
        </script>

       <script src="/assets/js/application.js"></script>
       <script src="/assets/js/spin.min.js"></script>
       <script src="/assets/js/ladda.min.js"></script>
       <script src="/assets/js/alertify.js"></script>
       <script src="/assets/js/fotorama.js"></script>
       <script src="/assets/js/listgridview.js"></script>
       <script src="/assets/js/sidebar.js"></script>
       <script src="/assets/js/avatar.js"></script>
       <script src="/assets/js/vendor/html5shiv.js"></script>
       <script src="/assets/js/vendor/respond.min.js"></script>
       <script src="/assets/js/sidebar.js"></script>
       <script src='/assets/js/profile-uploader.js'></script>
       <script src="/assets/js/classie.js"></script>
       <script src="/assets/js/modernizr.custom.js"></script>
       <script src="/assets/js/testimonials.js"></script>
       <script src="/assets/js/owl.carousel.js"></script>
       <script src="/assets/js/global.js"></script>
       <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
       <script src="/assets/js/dataTables.bootstrap.min.js"></script>
       <script>
       $(document).ready(function() {
        $('[data-toggle=offcanvas]').click(function() {
          $('.row-offcanvas').toggleClass('active');
        });
      });
      </script>
<script language="javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGmn-_-Q4FnEIofsyt2nDTmvLEICgxmgU&v=3&libraries=drawing+geometry"　async defer></script>
      @yield('scripts')

