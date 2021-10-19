<?php require(APPPATH . 'Views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col  d-flex align-items-center ">
            مراسلة أولياءالأمور

        </div>
        <div class="col-3">
            <button type="button" style="width: inherit; padding: .375rem .75rem;" class="btn btn-light" data-toggle="modal" data-target="#add-temblate">
                إضافة تذكرة جديدة
            </button>
        </div>
    </div>
</div>
<!-- /.content-header -->



<?php require(APPPATH . 'Views/school/layouts/notifications-service-status.php') ?>



<!-- <div class="row mt-4  mb-4  d-flex justify-content-center " style="font-size: 1rem;">
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
            <input required type="text" class="form-control  dependencies" id="hijri-date-picker" placeholder="التاريخ">
            <input required type="hidden" name="date" class="form-control dependencies" id="date">
        
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <input type="text" id="name" class="form-control dependencies" placeholder="الاسم">
        </div>
    </div>
</div> -->
<!-- /.row -->
<style>
    .select2-container--default{
        width: 100% !important;
    }
    .select2-selection--single {
    height: unset !important;
}
</style>

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
                                <select id="department" name="department" class="custom-select" id="inputGroupSelect02" style="cursor: pointer;">
                                    <option value="" selected> أختر...</option>
                                    <option value="اقتراحات">اقتراحات</option>
                                    <option value="استفسارات">استفسارات</option>
                                    <option value="شكوى">شكوى</option>
                                    <option value="اخرى">اخرى</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="type" class="col-form-label">النمط</label>
                                <select id="type" name="type" class="custom-select" id="inputGroupSelect02" style="cursor: pointer;">
                                    <option value="-" selected>--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="prority" class="col-form-label">الأولوية</label>
                                <select required id="prority" name="prority" class="custom-select" id="inputGroupSelect02" style="cursor: pointer; ">
                                    <option value="" selected> أختر...</option>
                                    <option value="منخفض">منخفض </option>
                                    <option value="متوسط">متوسط </option>
                                    <option value="هام جدا">هام جدا </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md">
                            <div class="form-group">
                                <select  required class=" form-control js-data-example-ajax" name="parente" id="parent"></select>
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


<?php include_once(APPPATH . 'Views/school/layouts/postContent.php') ?>

<script src="<?php echo base_url() . '/public/'; ?>select2/dist/js/select2.min.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/public/'; ?>select2/dist/css/select2.min.css" />

<script type="text/javascript" class="js-code-placeholder">

    $(".js-data-example-ajax").select2({
        ajax: {
            url: "<?= site_url() ?>/Parents/searchParents",
            dataType: 'json',
            delay: 250,
            headers: {
                "Authorization": token
            },
            data: function(params) {
                console.log(params);
                return {
                    key: params.term, // search term
                };
            },
            processResults: function(data) {
                return {
                    results: data.data
                };
            },
        },
        placeholder: 'ولي الامر',
    });
    
</script>

<script>
    $(document).ready(function() {
        getTickets();
        $('.dependencies').change(function() {
            getTickets();
        });
        $('.dependencies').on('dp.change', function() {
            getTickets();
        });

    });

    function formatRepo(repo) {
        if (repo.loading) {
            return repo.text;
        }

        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'></div>" +
            "<div class='select2-result-repository__description'></div>" +
            "<div class='select2-result-repository__statistics'>" +
            "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
            "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
            "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
            "</div>" +
            "</div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text(repo.full_name);
        $container.find(".select2-result-repository__description").text(repo.description);
        $container.find(".select2-result-repository__forks").append(repo.forks_count + " Forks");
        $container.find(".select2-result-repository__stargazers").append(repo.stargazers_count + " Stars");
        $container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");

        return $container;
    }

    function formatRepoSelection(repo) {
        return repo.full_name || repo.text;
    }

    function getTickets() {
        $.ajax({
                "url": "<?= site_url('') ?>Tickets/GetSchoolsParentTicketsBySchoolId",
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": token
                },
                data: {
                    school_id: school_id,
                    page: 1,
                    limit: 10000,
                    status: $('#status').val(),
                    date: $('#date').val(),
                    parent_name: $('#name').val(),
                }
            }).done(function(response) {
                displayTickets(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
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
                                                        <a href="<?= site_url() ?>school/support/technical/ticket/${data[i].id}" class="btn btn-outline-primary" style="width: -webkit-fill-available;">استعراض التذاكر</a>
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
                    "school_id": school_id,
                    "department": $("#department").val(),
                    "type": $("#type").val(),
                    "parent_id": $("#parent").val(),
                    "prority": $("#prority").val()
                }
            }).done(function(response) {
                toastr.success('تم اضافة تذكرة!');
                $("#send-ticket-btn").html('حفظ');
                $("#send-ticket-btn").removeAttr('disabled');
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء اضافة تذكرة!', 'خطأ');
                $("#send-ticket-btn").html('حفظ');
                $("#send-ticket-btn").removeAttr('disabled');
            });
    }
</script>