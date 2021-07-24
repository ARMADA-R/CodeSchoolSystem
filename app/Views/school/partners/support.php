<?php require(APPPATH . 'views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col  d-flex align-items-center ">
            نظام الدعم الفني لشريك النجاح
        </div>
        
    </div>
</div>
<!-- /.content-header -->
<?php require(APPPATH . 'views/school/layouts/notifications-service-status.php') ?>


<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <p class="card-text" style="font-size: 0.9rem;">الاسم الكامل:</p>
                <p class="card-text" style="font-size: 0.9rem;">البريد الإلكتروني:</p>
                <p class="card-text" style="font-size: 0.9rem;">الهاتف:</p>

                <a href="<?php echo base_url() . '/public/'; ?>school/support/technical/ticket/3" class="btn btn-outline-primary" style="width: -webkit-fill-available;">استعراض التذاكر</a>
            </div>
        </div>
    </div>
</div>


<?php include_once(APPPATH . 'views/school/layouts/postContent.php') ?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    $(document).ready(function() {


    });
</script>