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
<!-- <script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/jquery/jquery.min.js"></script> -->

<!-- jQuery 3.4.1 -->
<script src="<?php echo base_url() . '/public/'; ?>design/js/jquery-3.4.1.min.js"></script>


<!-- Lazy Load -->
<script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/lazyload/lazyload.js"></script>


<!-- Bootstrap 4 rtl -->
<!-- <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE -->
<script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/dist/js/adminlte.js"></script>

<!-- AdminLTE -->
<script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/moment/moment.min.js"></script>

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
  var school_id = '<?= session('user_data')['user_id'] ?>';
  var user_id = '<?= session('user_data')['user_id'] ?>';
  var token = '<?= session('user_data')['token'] ?>';
  var school_name = '<?= session('user_data')['school_name'] ?>';
  moment.locale("ar-sa");
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

  //Hijri date bicker configration
  $("#hijri-date-picker").hijriDatePicker({
    locale: "ar-sa",
    format: "DD-MM-YYYY",
    hijriFormat: "iYYYY-iMM-iDD",
    dayViewHeaderFormat: "MMMM YYYY",
    hijriDayViewHeaderFormat: "iMMMM iYYYY",
    showSwitcher: true,
    allowInputToggle: true,
    useCurrent: false,
    isRTL: true,
    keepOpen: false,
    hijri: true,
    debug: false,
    showClear: true,
    showTodayButton: false,
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


  
  $(document).ready(function() {
    getNotificationServiceStatus();
  });



  function getNotificationServiceStatus() {
    var jqxhr = $.ajax({
        url: "<?= site_url('') ?>schools/getNotificationServiceData",
        method: "GET",
        timeout: 0,
        headers: {
          "Authorization": token
        },
        data: {
          school_id: school_id,
        }
      })
      .done(function(response) {
        console.log(response);
        $("#notification-service-userName").html(response.data.name);
        $("#sms-balance").html(parseInt(response.data.sms_balance));
      })
      .fail(function(response) {
        console.log(response);
        toastr.error(response.msg, 'خطأ');
      });

  }
</script>
</body>

</html>