  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright © {{ date('Y') }} <a href="#">Edge Realty</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('public/backend/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/assets/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('public/backend/assets/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('public/backend/assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('public/backend/assets/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/backend/assets/plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('public/backend/assets/dist/js/pages/dashboard2.js')}}"></script>

<!-- bs-custom-file-input -->
<script src="{{asset('public/backend/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('public/backend/assets/plugins/summernote/summernote-bs4.js')}}"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })

    $(document).ready(function () {
        bsCustomFileInput.init();
    });

    var options =  {
    height: 300,
    placeholder: 'Start typing your text...',
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert',['ltr','rtl']],
        ['fontsize', ['fontsize']],
        ['insert', ['link','picture', 'video', 'hr']],
        ['view', ['fullscreen', 'codeview']]
    ]
    };
    summernote.summernote(options);
</script>



</body>
</html>
