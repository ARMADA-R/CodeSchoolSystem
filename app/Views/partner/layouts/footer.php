<!-- /.content-wrapper -->
<footer class="main-footer">
  <!-- <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.0-rc.1
  </div> -->
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/jquery/jquery.min.js"></script>

<!-- jQuery 3.4.1 -->
<!-- <script src="<?php echo base_url() . '/public/'; ?>design/js/jquery-3.4.1.min.js"></script>
 -->

<!-- Lazy Load -->
<script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/lazyload/lazyload.js"></script>


<!-- Bootstrap 4 rtl -->
<!-- <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script> -->
<!-- overlayScrollbars -->
<!-- <script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->

<!-- Bootstrap -->
<script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE -->
<script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/dist/js/adminlte.js"></script>

<!-- AdminLTE -->
<script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/moment/moment.min.js"></script>

<!-- Bootstrap 4 rtl -->
<!-- <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous"> -->


<!-- tostar -->
<script src="<?php echo base_url() . '/public/'; ?>design/js/toastr.js"></script>


<!-- Hijri Date -->
<script src="<?php echo base_url() . '/public/'; ?>Hijri-date/js/moment-with-locales.js"></script>
<script src="<?php echo base_url() . '/public/'; ?>Hijri-date/js/moment-hijri.js"></script>
<script src="<?php echo base_url() . '/public/'; ?>Hijri-date/js/bootstrap-hijri-datetimepicker.js"></script>


<script>
  $("img.lazyload").lazyload();
</script>
<script>
  var user_id = '<?= session('user_data')['user_id'] ?>';
  var partner_id = '<?= session('user_data')['user_id'] ?>';
  var token = '<?= session('user_data')['token'] ?>';

  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "7000",
    "extendedTimeOut": "4000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "toastClass": 'toastr'
  };



  $(document).ready(function() {

    //Hijri date bicker configration
    $("#hijri-date-picker").hijriDatePicker({
      locale: "ar-sa",
      format: "DD-MM-YYYY",
      hijriFormat: "iYYYY-iMM-iDD",
      dayViewHeaderFormat: "MMMM YYYY",
      hijriDayViewHeaderFormat: "iMMMM iYYYY",
      showSwitcher: true,
      allowInputToggle: true,
      useCurrent: true,
      isRTL: true,
      keepOpen: false,
      hijri: true,
      debug: false,
      showClear: true,
      showTodayButton: true,
      showClose: true,
    });

    $("#hijri-date-picker").on('dp.change', function(arg) {
      if (!arg.date) {
        $("#date").val('');
        return;
      };
      let date = arg.date;
      $("input#date").val(date.format("YYYY-MM-DD"));
    });

  });
</script>
</body>

</html>