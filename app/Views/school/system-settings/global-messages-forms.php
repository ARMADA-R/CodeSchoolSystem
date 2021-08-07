<?php require(APPPATH . 'Views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col ">
            قوالب الرسائل العامة
        </div>
    </div>
</div>
<!-- /.content-header -->

<?php require(APPPATH . 'Views/school/layouts/notifications-service-status.php') ?>

<button type="button" id="edit-temblate-btn" class="btn" style="display: none;" data-toggle="modal" data-target="#edit-temblate"></button>

<div class="modal fade" id="edit-temblate" tabindex="-1" aria-labelledby="edit-temblateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-temblateLabel">تعديل قالب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updateTemplate(this); return false;">
                <input type="hidden" class="form-control" name="id" id="record-id-edit">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title-edit" class="col-form-label">العنوان</label>
                        <input type="text" class="form-control" name="name" id="title-edit">
                    </div>

                    <div class="form-group">
                        <label for="submit-type-edit">نوع الارسال</label>
                        <select required class="form-control" name="sender_type" id="submit-type-edit">
                            <option value="">--</option>
                            <option value="1">رسالة نصية</option>
                            <option value="2">رسالة واتساب</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message-text-edit" class="col-form-label">المحتوى</label>
                        <textarea oninput="checkMessagesNumber(this)" rows="4" name="content" class="form-control" id="message-text-edit"></textarea>
                        <small id="messagesNum" class="form-text text-muted">عدد الحروف <span id="lettersNum-edit"></span> عدد الرسائل <span id="messageNum-edit"></span> </small>
                        <input type="hidden" name="letters_number">
                        <input type="hidden" name="message_number">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <div id="edit-spinner" style="display: none" class="spinner-border text-secondary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" id="edit-temblate-submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="add-temblate" tabindex="-1" aria-labelledby="add-temblateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-temblateLabel">إنشاء قالب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="addTemplate(this); return false;">
                <input type="hidden" class="form-control" name="id" id="record-id-add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">العنوان</label>
                        <input type="text" class="form-control" name="name" id="recipient-name">
                    </div>

                    <div class="form-group">
                        <label for="submit-type">نوع الارسال</label>
                        <select required class="form-control" name="sender_type" id="submit-type">
                            <option value="">--</option>
                            <option value="1">رسالة نصية</option>
                            <option value="2">رسالة واتساب</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">المحتوى</label>
                        <textarea oninput="checkMessagesNumber(this)" name="content" rows="4" class="form-control" id="message-text"></textarea>
                        <small id="messagesNum" class="form-text text-muted">عدد الحروف 0 عدد الرسائل 0</small>
                        <input type="hidden" name="letters_number">
                        <input type="hidden" name="message_number">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <div id="add-spinner" style="display: none" class="spinner-border text-secondary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" id="add-temblate-submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-2 d-flex align-items-center bg-white">
                <div class="m-left-auto">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#add-temblate">اضف قالب</button>
                </div>
            </div>
            <div class="card-body p-2" style="overflow-x: scroll;">
                <table id="messages_forms" class="table table-striped datatable responsive " style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم القالب</th>
                            <th data-priority="1">النص</th>
                            <th>عدد الحروف</th>
                            <th>عدد الرسائل</th>
                            <th>نوع الإرسال</th>
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
<style>
    .min-width-100 {
        min-width: 100px;
    }

    .min-width-250 {
        min-width: 250px;
    }

    .max-width-200 {
        max-width: 200px;
    }
</style>
<?php include_once(APPPATH . 'Views/school/layouts/postContent.php') ?>




<script src="<?php echo base_url() . '/public/'; ?>Excel/jquery.table2excel.js"></script>

<script src="<?php echo base_url() . '/public/'; ?>design/js/datatable.all.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/public/'; ?>design/css/datatable.all.css" />


<script>
    var school_id = 24;
    var dataTable = null;
    $(document).ready(function() {
        dataTable = $('#messages_forms').DataTable({
            dom: `<"row d-flex"<"col-md-6 d-flex"fl><"col-md-6  d-flex align-items-center "<"m-right-auto"B>>>rtip`,
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
                    data: 'name',
                    name: 'name',
                    className: 'text-center t-name',
                    title: 'اسم القالب'
                },
                {
                    data: 'content',
                    name: 'content',
                    className: 'text-center t-content',
                    title: `&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;النص&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`,
                },
                {
                    data: 'letters_number',
                    name: 'letters_number',
                    className: 'text-center t-letters_number',
                    title: 'عدد الحروف'
                },
                {
                    data: 'message_number',
                    name: 'message_number',
                    className: 'text-center t-message_number',
                    title: 'عدد الرسائل'
                },
                {
                    data: 'sender_type',
                    name: 'sender_type',
                    className: 'text-center t-sender_type',
                    title: 'نوع الارسال'
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
                                        <a type="button" class="btn btn-sm btn-info " title="edit" style="margin: 0px;" id="` + data + `"  onclick="editRecordModal(${data})">
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
            buttons: [{
                    extend: 'collection',
                    text: 'تصدير',
                    className: 'btn btn-sm',
                    buttons: [{
                        extend: 'excel',

                    }, {
                        extend: 'pdf',

                    }, {
                        extend: 'csv',

                    }]
                },
                'colvis'
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
        refreshTemplatesTable();
    });

    function refreshTemplatesTable() {
        var jqxhr = $.ajax({
                url: "https://sa.arsail.net/schools/Templates/GetGeneralMessagingTempalte",
                method: "GET",
                timeout: 0,
                data: {
                    school_id: "24",
                    page: "1",
                    limit: "10000"
                },
                headers: {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTAyLTIyIiwiZXhwIjoiMjAyMi0wMi0yMiIsImRhdGEiOiIyMyJ9.ZITmmvk9fnZXo8Bfy30vw8uYK2kGZeN_M8XFPErmr_w"
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
        if (confirm('هل انت متأكد من انك تريد حذف هذا القالب؟')) {
            var jqxhr = $.ajax({
                    "url": "https://sa.arsail.net/schools/Templates/DeleteTemplate",
                    "method": "DELETE",
                    "timeout": 0,
                    "headers": {
                        "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTAxLTI5IiwiZXhwIjoiMjAyMi0wMS0yOSIsImRhdGEiOnsidXNlcl9pZCI6MTh9fQ.1EfRPKk8zdCvjmn7qkVRKflJDtJjaoN0R_xvphe1No0",
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

    function editRecordModal(id) {
        var row = $('tr#' + id);

        $('#title-edit').val(row.children('.t-name').html());
        $('#submit-type-edit').val(row.children('.t-sender_type').html() == `رسالة نصية` ? 1 : 2);
        $('#message-text-edit').val(row.children('.t-content').html());

        $('#message-text-edit').parent().children("input[name='letters_number']").val(row.children('.t-message_number').html());
        $('#message-text-edit').parent().children("input[name='message_number']").val(row.children('.t-letters_number').html());
        $('#messageNum-edit').html(row.children('.t-message_number').html());
        $('#lettersNum-edit').html(row.children('.t-letters_number').html());

        $('#record-id-edit').val(id);
        $('#edit-temblate-btn').click();
    }

    function updateTemplate(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('#edit-temblate-submit').attr("disabled", true);
        $('#edit-spinner').show();
        var jqxhr = $.ajax({
                url: "https://sa.arsail.net/schools/Templates/EditTemplate",
                method: "POST",
                timeout: 0,
                data: {
                    "name": formData.name,
                    "content": formData.content,
                    "letters_number": formData.letters_number,
                    "message_number": formData.message_number,
                    "id": formData.id,
                    "school_id": school_id,
                    "sender_type": formData.sender_type,
                },
                headers: {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTAxLTI5IiwiZXhwIjoiMjAyMi0wMS0yOSIsImRhdGEiOnsidXNlcl9pZCI6MTh9fQ.1EfRPKk8zdCvjmn7qkVRKflJDtJjaoN0R_xvphe1No0",
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
            .done(function(response) {
                refreshTemplatesTable();
                toastr.success('تم تحديث البيانات بنجاح')
                // alert("success");
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
            }).always(function() {
                $('#edit-temblate-submit').removeAttr('disabled');
                $('#edit-spinner').hide();
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

    function addTemplate(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
        $('#add-temblate-submit').attr("disabled", true);
        $('#add-spinner').show();

        var jqxhr = $.ajax({
                url: "https://sa.arsail.net/schools/Templates/AddTemplate",
                method: "POST",
                timeout: 0,
                data: {
                    "name": formData.name,
                    "content": formData.content,
                    "letters_number": formData.letters_number,
                    "message_number": formData.message_number,
                    "id": formData.id,
                    "school_id": school_id,
                    "sender_type": formData.sender_type,
                },
                headers: {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTAxLTI5IiwiZXhwIjoiMjAyMi0wMS0yOSIsImRhdGEiOnsidXNlcl9pZCI6MTh9fQ.1EfRPKk8zdCvjmn7qkVRKflJDtJjaoN0R_xvphe1No0",
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
            .done(function(response) {
                refreshTemplatesTable();
                toastr.success('تم اضافة البيانات بنجاح')
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء اضافة البيانات!', 'خطأ');

            }).always(function() {
                $('#add-temblate-submit').removeAttr('disabled');
                $('#add-spinner').hide();
            });

        return false;
    }

 
</script>