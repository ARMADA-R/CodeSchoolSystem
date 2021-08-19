<?php require(APPPATH . 'Views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col ">
            ربط بوابات الاشعارات
        </div>
    </div>
</div>
<!-- /.content-header -->


<?php require(APPPATH . 'Views/school/layouts/notifications-service-status.php') ?>

<div class="modal fade" id="add-gate" tabindex="-1" aria-labelledby="add-gateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-gateLabel">اضف بوابة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="addGate(this); return false;">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="gates-selector">البوابة</label>
                                <select required class="form-control" name="gate_id" id="gates-selector">
                                    <option value="">--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="sender-name">اسم المرسل</label>
                                <input type="text" name="sender_name" class="form-control" id="sender-name">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="username">اسم المستخدم</label>
                                <input type="text" name="username" class="form-control" id="username">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="password">كلمة المرور</label>
                                <input type="text" name="password" class="form-control" id="password">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="status">الحالة</label>
                                <select required class="form-control" name="isActive" id="status">
                                    <option value="">--</option>
                                    <option value="1">مفعل</option>
                                    <option value="0">معطل</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" id="add-gate-submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="update-gate" tabindex="-1" aria-labelledby="update-gateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update-gateLabel">تعديل بوابة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updateGate(this); return false;">
                <input type="hidden" name="id" id="update-record-id">
                <input type="hidden" name="gate_id" id="update-gates-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="update-sender-name">اسم المرسل</label>
                                <input required type="text" name="sender_name" class="form-control" id="update-sender-name">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="update-username">اسم المستخدم</label>
                                <input required type="text" name="username" class="form-control" id="update-username">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="update-password">كلمة المرور</label>
                                <input required type="text" name="password" class="form-control" id="update-password">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="update-status">الحالة</label>
                                <select required class="form-control" name="isActive" id="update-status">
                                    <option value="">--</option>
                                    <option value="1">مفعل</option>
                                    <option value="0">معطل</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" id="update-gate-submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="m-left-auto">
    <button type="button" style="display: none;" id="update-gate-btn" class="btn btn-light" data-toggle="modal" data-target="#update-gate"></button>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-2 d-flex align-items-center bg-white">
                <div class="m-left-auto">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#add-gate">تسجيل بوابة</button>
                </div>

            </div>
            <div class="card-body p-2" style="overflow-x: scroll;">
                <table id="messages_forms" class="table table-striped datatable responsive " style="width:100%">
                    <thead>
                        <tr>
                            <th>م</th>
                            <th>البوابة</th>
                            <th>اسم المستخدم</th>
                            <th>اسم المرسل</th>
                            <th>الحالة</th>
                            <th>خيارات</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once(APPPATH . 'Views/school/layouts/postContent.php') ?>


<script src="<?php echo base_url() . '/public/'; ?>Excel/jquery.table2excel.js"></script>

<script src="<?php echo base_url() . '/public/'; ?>design/js/datatable.all.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/public/'; ?>design/css/datatable.all.css" />




<script>
    var dataTable = null;
    $(document).ready(function() {
        dataTable = $('#messages_forms').DataTable({
            dom: `<"row d-flex justify-content-between mx-1 "fl>rtip`,
            "lengthMenu": [
                [25, 50, 100, 500],
                [25, 50, 100, 500]
            ],
            order: [
                [1, 'asc']
            ],

            responsive: true,
            autoWidth: false,
            rowId: 'id',
            columnDefs: [{
                responsivePriority: 20000,
                targets: 2
            }, ],
            columns: [{
                    data: 'id',
                    name: 'id',
                    className: 'text-center t-id',
                    orderable: false,
                    searchable: false,
                    exportable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'gate',
                    name: 'gate',
                    className: 'text-center t-gate',
                    title: 'البوابة'
                },
                {
                    data: 'username',
                    name: 'username',
                    className: 'text-center t-username',
                    title: `اسم المستخدم`,
                },
                {
                    data: 'sender_name',
                    name: 'sender_name',
                    className: 'text-center t-sender_name',
                    title: 'اسم المرسل'
                },
                {
                    data: 'isActive',
                    name: 'isActive',
                    className: 'text-center t-isActive',
                    title: 'الحالة',
                    render: function(data, type, row, meta) {
                        return data == 0 ? 'غير مفعل' : 'مفعل';
                    }
                },
                {
                    data: 'id',
                    name: 'action',
                    title: '&nbsp;&nbsp;&nbsp;&nbsp;خيارات&nbsp;&nbsp;&nbsp;&nbsp;',
                    className: 'text-center ',
                    orderable: false,
                    searchable: false,
                    printable: false,
                    render: function(data, type, row, meta) {

                        return `<div class="row justify-content-center  text-white ">
                                    <div class="m-1">
                                        <a type="button" class="btn btn-sm btn-info " title="edit" style="margin: 0px;" id="` + data + `"  onclick="editRecordModal(${data},'${row.gate_id}')">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </div>

                                    <div class="m-1">
                                        <a type="button" class="btn btn-sm btn-danger " title="delete" style="margin: 0px;" onclick="deleteRecord(${data})">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>`;
                    }
                }
            ],
            "language": {
                "emptyTable": "ليست هناك بيانات متاحة في الجدول",
                "loadingRecords": "جارٍ التحميل...",
                "processing": "جارٍ التحميل...",
                "lengthMenu": "أظهر _MENU_ مدخلات",
                "zeroRecords": "لم يعثر على أية سجلات",
                "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "infoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "infoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "search": "ابحث:",
                "paginate": {
                    "first": "الأول",
                    "previous": "السابق",
                    "next": "التالي",
                    "last": "الأخير"
                },
                "aria": {
                    "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
                },
                "select": {
                    "rows": {
                        "_": "%d قيمة محددة",
                        "0": "",
                        "1": "1 قيمة محددة"
                    },
                    "1": "%d سطر محدد",
                    "_": "%d أسطر محددة",
                    "cells": {
                        "1": "1 خلية محددة",
                        "_": "%d خلايا محددة"
                    },
                    "columns": {
                        "1": "1 عمود محدد",
                        "_": "%d أعمدة محددة"
                    }
                },
                "buttons": {
                    "print": "طباعة",
                    "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                    "copySuccess": {
                        "_": "%d قيمة نسخت",
                        "1": "1 قيمة نسخت"
                    },
                    "pageLength": {
                        "-1": "اظهار الكل",
                        "_": "إظهار %d أسطر"
                    },
                    "collection": "مجموعة",
                    "copy": "نسخ",
                    "copyTitle": "نسخ إلى الحافظة",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pdf": "PDF",
                    "colvis": "إظهار الأعمدة",
                    "colvisRestore": "إستعادة العرض"
                },
                "autoFill": {
                    "cancel": "إلغاء",
                    "info": "مثال عن الملئ التلقائي",
                    "fill": "املأ جميع الحقول بـ <i>%d&lt;\\\/i&gt;<\/i>",
                    "fillHorizontal": "تعبئة الحقول أفقيًا",
                    "fillVertical": "تعبئة الحقول عموديا"
                },
                "searchBuilder": {
                    "add": "اضافة شرط",
                    "clearAll": "ازالة الكل",
                    "condition": "الشرط",
                    "data": "المعلومة",
                    "logicAnd": "و",
                    "logicOr": "أو",
                    "title": [
                        "منشئ البحث"
                    ],
                    "value": "القيمة",
                    "conditions": {
                        "date": {
                            "after": "بعد",
                            "before": "قبل",
                            "between": "بين",
                            "empty": "فارغ",
                            "equals": "تساوي",
                            "not": "ليس",
                            "notBetween": "ليست بين",
                            "notEmpty": "ليست فارغة"
                        },
                        "number": {
                            "between": "بين",
                            "empty": "فارغة",
                            "equals": "تساوي",
                            "gt": "أكبر من",
                            "gte": "أكبر وتساوي",
                            "lt": "أقل من",
                            "lte": "أقل وتساوي",
                            "not": "ليست",
                            "notBetween": "ليست بين",
                            "notEmpty": "ليست فارغة"
                        },
                        "string": {
                            "contains": "يحتوي",
                            "empty": "فاغ",
                            "endsWith": "ينتهي ب",
                            "equals": "يساوي",
                            "not": "ليست",
                            "notEmpty": "ليست فارغة",
                            "startsWith": " تبدأ بـ "
                        }
                    },
                    "button": {
                        "0": "فلاتر البحث",
                        "_": "فلاتر البحث (%d)"
                    },
                    "deleteTitle": "حذف فلاتر"
                },
                "searchPanes": {
                    "clearMessage": "ازالة الكل",
                    "collapse": {
                        "0": "بحث",
                        "_": "بحث (%d)"
                    },
                    "count": "عدد",
                    "countFiltered": "عدد المفلتر",
                    "loadMessage": "جارِ التحميل ...",
                    "title": "الفلاتر النشطة"
                },
                "searchPlaceholder": "ابحث ...",
                "infoThousands": ",",
                "datetime": {
                    "previous": "السابق",
                    "next": "التالي",
                    "hours": "الساعة",
                    "minutes": "الدقيقة",
                    "seconds": "الثانية",
                    "unknown": "-",
                    "amPm": [
                        "صباحا",
                        "مساءا"
                    ],
                    "weekdays": [
                        "الأحد",
                        "الإثنين",
                        "الثلاثاء",
                        "الأربعاء",
                        "الخميس",
                        "الجمعة",
                        "السبت"
                    ],
                    "months": [
                        "يناير",
                        "فبراير",
                        "مارس",
                        "أبريل",
                        "مايو",
                        "يونيو",
                        "يوليو",
                        "أغسطس",
                        "سبتمبر",
                        "أكتوبر",
                        "نوفمبر",
                        "ديسمبر"
                    ]
                },
                "editor": {
                    "close": "إغلاق",
                    "create": {
                        "button": "إضافة",
                        "title": "إضافة جديدة",
                        "submit": "إرسال"
                    },
                    "edit": {
                        "button": "تعديل",
                        "title": "تعديل السجل",
                        "submit": "تحديث"
                    },
                    "remove": {
                        "button": "حذف",
                        "title": "حذف",
                        "submit": "حذف",
                        "confirm": {
                            "_": "هل أنت متأكد من رغبتك في حذف السجلات %d المحددة؟",
                            "1": "هل أنت متأكد من رغبتك في حذف السجل؟"
                        }
                    },
                    "error": {
                        "system": "حدث خطأ ما"
                    },
                    "multi": {
                        "title": "قيم متعدية",
                        "restore": "تراجع"
                    }
                }
            }
        });
    });

    $(document).ready(function() {
        refreshContentTable();
        getSystemGates();
    });

    function refreshContentTable() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Schools/getSchoolGates",
                method: "GET",
                timeout: 0,
                data: {
                    school_id: school_id,
                },
                headers: {
                    "Authorization": token
                },
            })
            .done(function(response) {
                dataTable.clear().rows.add(response.data).draw()
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحميل البيانات!', 'خطأ');
            });

    }

    function deleteRecord(id) {
        if (confirm('هل انت متأكد من انك تريد حذف اعدادات هذه البوابة؟')) {
            var jqxhr = $.ajax({
                    "url": "<?= site_url('') ?>Schools/deleteSchoolGate",
                    "method": "DELETE",
                    "timeout": 0,
                    "headers": {
                        "Authorization": token,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    "data": {
                        "id": id
                    }
                })
                .done(function(response) {
                    dataTable.row($('tr#' + id)).remove().draw();
                    toastr.success('تم حذف السجل بنجاح!')
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error('حدث خطأ ما اثناء حذف البيانات!', 'خطأ');
                })
        }
    }


    function editRecordModal(id, gate_id) {
        var row = $('tr#' + id);

        $("#update-gates-id").val(gate_id);
        $('#update-sender-name').val(row.children('.t-sender_name').html());
        $('#update-username').val(row.children('.t-username').html());
        $('#update-status').val(row.children('.t-isActive').html() == 'مفعل' ? 1 : 0);
        $('#update-record-id').val(id);
        $('#update-gate-btn').click();
    }

    function updateGate(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('#update-gate-submit').attr("disabled", true);
        $('#update-spinner').show();

        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Schools/setSchoolGate",
                method: "POST",
                timeout: 0,
                data: {
                    "school_id": school_id,
                    "gate_id": formData.gate_id,
                    "password": formData.password,
                    "username": formData.username,
                    "sender_name": formData.sender_name,
                    "isActive": formData.isActive,
                },
                headers: {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
            .done(function(response) {
                refreshContentTable();
                toastr.success('تم تعديل البيانات بنجاح')
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');

            }).always(function() {
                $('#update-gate-submit').removeAttr('disabled');
                $('#update-spinner').hide();
            });

        return false;
    }

    function checkMessagesNumber(element) {
        var message = element.value;
        var messageLength = message.length;
        var messagesNumber = 0;
        if (messageLength <= 70) {
            var messagesNumber = parseInt((messageLength / 70)) + 1;
        } else {
            var messagesNumber = parseInt((messageLength - 1) / 67) + 1;
        }
        $(element).parent().children("small#messagesNum").html(`عدد الحروف ${messageLength} عدد الرسائل ${messagesNumber}`);
        $(element).parent().children("input[name='letters_number']").val(messageLength);
        $(element).parent().children("input[name='message_number']").val(messagesNumber);
    }

    function addGate(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('#add-gate-submit').attr("disabled", true);
        $('#add-spinner').show();

        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Schools/setSchoolGate",
                method: "POST",
                timeout: 0,
                data: {
                    "school_id": school_id,
                    "gate_id": formData.gate_id,
                    "password": formData.password,
                    "username": formData.username,
                    "sender_name": formData.sender_name,
                    "isActive": formData.isActive,
                    // "sender_type": formData.sender_type,
                },
                headers: {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
            .done(function(response) {
                refreshContentTable();
                toastr.success('تم اضافة البيانات بنجاح')
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg , 'خطأ');

            }).always(function() {
                $('#add-gate-submit').removeAttr('disabled');
                $('#add-spinner').hide();
            });

        return false;
    }

    function getSystemGates() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Gates_Api/Gates?key=all",
                method: "GET",
                timeout: 0,
                headers: {
                    "Authorization": token
                },
            })
            .done(function(response) {
                setGatesOptions(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحميل البيانات!', 'خطأ');
            });
    }


    function setGatesOptions(data) {
        var gatesSelect = $('#gates-selector');

        $.each(data, function(index, val) {
            gatesSelect.append($('<option>', {
                value: val.id,
                text: val.name,
            }));
        });
    }
</script>