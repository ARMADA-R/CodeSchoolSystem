<?php require(APPPATH . 'Views/partner/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col  d-flex align-items-center ">
            تذاكر اولياء الامور
        </div>
    </div>
</div>
<!-- /.content-header -->




<div class="row mt-4  mb-4  d-flex justify-content-center" style="font-size: 1rem;">
    <div class="col-4">
        <div class="form-group">
            <select required class="form-control determenators" id="status">
                <option value="">حالة التذكرة</option>
                <option value="1">مفتوحة</option>
                <option value="2">مغلقة</option>
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <input type="date" id="date" class="form-control determenators" placeholder="التاريخ">
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <input type="text" id="parent_name" class="form-control  determenators" placeholder="اسم ولي الامر">
        </div>
    </div>
</div>
<!-- /.row -->


<div class="row" id="tickets-container">
    <!-- <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <p class="card-text" style="font-size: 0.9rem;">الاسم الكامل:</p>
                <p class="card-text" style="font-size: 0.9rem;">البريد الإلكتروني:</p>
                <p class="card-text" style="font-size: 0.9rem;">الهاتف:</p>

                <a href="<?php echo base_url() . '/public/'; ?>school/support/technical/ticket/3" class="btn btn-outline-primary" style="width: -webkit-fill-available;">استعراض التذاكر</a>
            </div>
        </div>
    </div> -->


</div>


<?php include_once(APPPATH . 'Views/partner/layouts/postContent.php') ?>

<script src="<?php echo base_url() . '/public/'; ?>design/js/jquery-3.4.1.min.js"></script>


<script>
    

    $(document).ready(function() {
        getTickets();
        $('.determenators').change(function() {
            getTickets();
        });
    });

    function getTickets() {
        $.ajax({
                "url": "https://sa.arsail.net/schools/Tickets/GetPartnersparentsTickets",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": token
                },
                data: {
                    partner_id: partner_id,
                    page: 1,
                    limit: 10000,
                    status: $('#status').val(),
                    date: $('#date').val(),
                    parent_name: $('#parent_name').val(),
                }
            }).done(function(response) {
                displayTickets(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحميل البيانات!', 'خطأ');
            });
    }

    function displayTickets(data) {
        $("#tickets-container").html('');

        for (let i = 0; i < data.length; i++) {
            $("#tickets-container").append(`<div class="col-lg-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-text d-flex pb-3 justify-content-between " style="font-size: 0.9rem;">
                                                          <div>  الاسم الكامل: </div><div> ${data[i].username} </div>
                                                        </div>
                                                        <div class="card-text d-flex pb-3 justify-content-between " style="font-size: 0.9rem;">
                                                          <div>  البريد الإلكتروني: </div><div> ${data[i].email} </div>
                                                        </div>
                                                        <div class="card-text d-flex pb-3 justify-content-between " style="font-size: 0.9rem;">
                                                          <div>  الهاتف: </div><div> ${data[i].phone} </div>
                                                        </div>
                                                        <a href="<?php echo base_url() . '/public/'; ?>partner/support/technical/parent-tickets/${data[i].parent_id}" class="btn btn-outline-primary" style="width: -webkit-fill-available;">استعراض التذاكر</a>
                                                    </div>
                                                </div>
                                            </div>`);

        }
    }

    
</script>