@if (Session::has('success'))
    <script>
          $(document).ready(function() {
        toastr.success("{{Session::get('success')}}", 'Success');
         });
    </script>
@endif
@if (Session::has('error'))
    <script>
         $(document).ready(function() {
        toastr.error("{{Session::get('error')}}", 'Error');
         });
    </script>
@endif
@if (Session::has('warning'))
    <script>
         $(document).ready(function() {
        toastr.warning("{{Session::get('warning')}}", 'Warning');
         });
    </script>
@endif
@if (Session::has('info'))
    <script>
         $(document).ready(function() {
        toastr.info("{{Session::get('info')}}", 'Info');
         });
    </script>
@endif
