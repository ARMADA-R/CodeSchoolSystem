<?php require(APPPATH . 'Views/parents/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col d-flex align-items-center ">
            نظام الدعم الفني لشريك النجاح
        </div>
        <div class="col-3">
            <button type="button" style="width: inherit; padding: .375rem .75rem;" class="btn btn-light" data-toggle="modal" data-target="#add-temblate">
                إضافة تذكرة جديدة
            </button>
        </div>
    </div>
</div>
<!-- /.content-header -->


<div class="row mt-4  mb-4  d-flex justify-content-center " style="font-size: 1rem;">
    <div class="col-4">
        <div class="form-group">
            <select required class="form-control dependencies" id="status">
                <option value="">حالة التذكرة</option>
                <option value="1">مفتوحة</option>
                <option value="2">مغلقة</option>

            </select>
        </div>

    </div>
    <div class="col-4">
        <div class="form-group">
            <input type="date" id="date" class="form-control dependencies" placeholder="التاريخ">
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <input type="text" id="name" class="form-control dependencies" placeholder="الاسم">
        </div>
    </div>
</div>
<!-- /.row -->


<div class="modal fade" id="add-temblate" tabindex="-1" aria-labelledby="add-temblateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-temblateLabel">إضافة تذكرة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="addTicket(); return false">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                            <label for="text" class="col-form-label">نص التذكرة</label>

<textarea name="" id="ticket_text" cols="30" rows="3" class=" form-control"></textarea>
   

       </div>
   </div>
</div>
<div class="row">
   <div class="col-md">
       <div class="form-group">
           <label for="department" class="col-form-label">القسم</label>
       
           
   <select id="department" name="department"  class="custom-select" id="inputGroupSelect02" style="cursor: pointer;">
   <option value="" selected> أختر...</option>
   <option value="1">اقتراحات</option>
   <option value="2">استفسارات</option>
   <option value="3">شكوى</option>
   <option value="4">اخرى</option>

   </select>
       </div>
   </div>
</div>
<div class="row">
   <div class="col-md">
       <div class="form-group">
           <label for="type" class="col-form-label">النمط</label>

                      
   <select id="type" name="type"  class="custom-select" id="inputGroupSelect02" style="cursor: pointer;">

   <option value="-"selected>--</option>
  

   </select>
       </div>
   </div>
</div>
<div class="row">
   <div class="col-md">
       <div class="form-group">
           <label for="prority" class="col-form-label">الأولوية</label>
        
                                           
   <select  required id="prority" name="prority"  class="custom-select" id="inputGroupSelect02" style="cursor: pointer; ">
   <option value="" selected> أختر...</option>
   <option value="1">منخفض </option>
   <option value="2">متوسط </option>
   <option value="3">هام جدا </option>


   </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="partner" class="col-form-label">شريك النجاح</label>
                                <select required class="form-control" name="partner" id="partners">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" id="send-ticket-btn" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row" id="tickets-container">
    <!-- <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <p class="card-text" style="font-size: 0.9rem;">الاسم الكامل:</p>
                <p class="card-text" style="font-size: 0.9rem;">البريد الإلكتروني:</p>
                <p class="card-text" style="font-size: 0.9rem;">الجوال:</p>

                <a href="<?php echo base_url() . '/public/'; ?>school/support/technical/ticket/3" class="btn btn-outline-primary" style="width: -webkit-fill-available;">استعراض التذاكر</a>
            </div>
        </div>
    </div> -->
</div>


<?php include_once(APPPATH . 'Views/parents/layouts/postContent.php') ?>

<script src="<?php echo base_url() . '/public/'; ?>design/js/jquery-3.4.1.min.js"></script>


<script>
        

    $(document).ready(function() {
        getTickets();
        getPartners();
        $('.dependencies').change(function() {
            getTickets();
        });
    });

    function getTickets() {
        $.ajax({
                "url": "<?= site_url('') ?>Tickets/GetParentsPartnersTickets",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": token
                },
                data: {
                    parent_id: parent_id,
                    "status": $("#status").val(),
                    "date": $("#date").val(),
                    "partner_name": $("#name").val()
                }
            }).done(function(response) {
                displayTickets(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
            });
    }

    function getPartners() {
        $.ajax({
                "url": "<?= site_url('') ?>Partners/GetPartnersData?key=all",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": token
                },
                data:{
                    user_id: user_id,
                }
            }).done(function(response) {
                setPartnersOptions(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
            });
    }

    function setPartnersOptions(data) {
        var classSelect = $('#partners');
        $.each(data, function(index, val) {
            classSelect.append($('<option>', {
                value: val.id,
                text: val.username,
            }));
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
                                                          <div>  الجوال: </div><div> ${data[i].phone} </div>
                                                        </div>
                                                        <a href="<?= site_url() ?>parent/partner/support/technical/ticket/${data[i].partner_id}" class="btn btn-outline-primary" style="width: -webkit-fill-available;">استعراض التذاكر</a>
                                                    </div>
                                                </div>
                                            </div>`);

        }
    }

     
    function addTicket() {
        $("#send-ticket-btn").attr('disabled', 'true');
        $("#send-ticket-btn").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span class="sr-only">جارٍ الارسال...</span>`);
        $.ajax({
                "url": "<?= site_url('') ?>Tickets/AddParentSchoolTicket",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "ticket_text": $("#ticket_text").val(),
                    "partner_id": $("#partner").val(),
                    "parent_id": parent_id,
                    "department": $("#department").val(),
                    "type": $("#type").val(),
                    "prority": $("#prority").val()
                }
            }).done(function(response) {
                toastr.success('تم اضافة تذكرة!');
                $("#send-ticket-btn").html('حفظ');
                $("#send-ticket-btn").removeAttr('disabled');
                getTickets();
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء اضافة تذكرة!', 'خطأ');
                $("#send-ticket-btn").html('حفظ');
                $("#send-ticket-btn").removeAttr('disabled');
            });
    }
    
</script>