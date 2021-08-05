<?php require(APPPATH . 'Views/admin/layouts/preContent.php') ?>

<!-- start row1 -->

<!-- start card1 -->
<div class="card">

    <div class="card-header ">
        <i class="fas fa-door-open "></i>
        <h6 class=" text-bold d-inline-flex">البوابات</h6>
    </div>
    <!-- start card body1 -->

    <div class="card-body">
    <div class="row">
            <div class="col-lg-12" style="overflow-x: scroll;" >

                <table id="employee-table" class="table table-striped " style="width:100% ">
                    <thead>
                        <tr>
                            <th>م</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                        </tr>
                    </thead>
                </table>
            </div  >
        </div>
        <!-- end row1 -->

    </div>
    <!-- end card body1 -->


</div>

<!-- end card1 -->


























<?php require(APPPATH . 'Views/admin/layouts/postContent.php'); ?>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="<?php echo base_url() . '/public/'; ?>design/pdfMake/pdfmake.min.js"></script>
<script src="<?php echo base_url() . '/public/'; ?>design/pdfMake/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />

<script>
    var school_id = 24;
    var dataTable = null;

    $(document).ready(function() {
        dataTable = $('#employee-table').DataTable({
            dom: `<"row d-flex justify-content-end mx-1 my-1 mb-3 "B><"row d-flex justify-content-between mx-1 "fl>rtip`,
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

            columns: [{
                    data: 'id',
                    name: 'id',
                    title: 'م',
                    className: 'text-center ',
                    orderable: false,
                    searchable: false,
                    exportable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'username',
                    name: 'username',
                    className: 'text-center',
                    title: 'اسم المستخدم'
                },
                {
                    data: 'password',
                    name: 'password',
                    className: 'text-center ',
                    title: 'كلمة المرور	'
                },
                {
                    data: 'arabic_link',
                    name: 'arabic_link',
                    className: 'text-center ',
                    title: 'رابط الإرسال العربي	',
                    render: function(data, type, row, meta) {
                       
                       return `<a href="${data}" > ${data} </a>`;
                   }
                },
                {
                    data: 'english_link',
                    name: 'english_link',
                    className: 'text-center ',
                    title: 'رابط الإرسال الإنكليزي',
                    render: function(data, type, row, meta) {
                       
                        return `<a href="${data}" > ${data} </a>`;
                    }
                    
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center t-status align-middle',
                    title: 'حالة الإرسال',
                    render: function(data, type, row, meta) {
                        var checked = (row.form_status == 0) ? `checked` : ``;
                        return `<div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input"  ${checked} onchange="updateFormStatus(${row.id},this.checked)" id="customSwitch-${row.id}">
                                    <label class="custom-control-label" for="customSwitch-${row.id}">${data}</label>
                                </div>`;
                    }
                },
                {
                    data: 'email',
                    name: 'email',
                    className: 'text-center ',
                    title: 'البريد الالكتروني'
                },
                {
                    data: 'type_sender',
                    name: 'type_sender',
                    className: 'text-center',
                    title: 'نوع الإرسال '
                },
                {
                    data: 'encrypt_type',
                    name: 'encrypt_type',
                    className: 'text-center',
                    title: 'نوع التشفير '
                },

                {
                    data: "id",
                    name: 'action',
                    title: '&nbsp;&nbsp;&nbsp;&nbsp;خيارات&nbsp;&nbsp;&nbsp;&nbsp;',
                    className: 'text-center ',
                    orderable: false,
                    searchable: false,
                    printable: false,
                    render: function(data, type, row, meta) {
                        return `<div class="row justify-content-center  text-white ">
                                    <div class="m-1">
                                        <a type="button" class="btn btn-sm btn-info " title="edit" style="margin: 0px;" href="#" class="nav-link">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </div>

                                    <div class="m-1">
                                        <a type="button" class="btn btn-sm btn-danger " title="delete" style="margin: 0px;" onclick="DeleteGate('${row.id}')">
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

                    }, ]
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
        getsTable();
    });

    function getsTable() {
        var jqxhr = $.ajax({
                url: "https://sa.arsail.net/schools/Gates_Api/Gates",
                method: "GET",
                timeout: 0,
                data: {
                    school_id: school_id,
                    page: "1",
                    limit: "10000"
                },
                headers: {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTA4LTAzIiwiZXhwIjoiMjAyMi0wOC0wMyIsImRhdGEiOiIxNyJ9.nbG_Ip9QZLCa4yA0jFothG4Wd1lupOqB1M7GSd4PP9I"
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

    function updateFormStatus(id, status) {
        var jqxhr = $.ajax({
                "url": "https://sa.arsail.net/schools/Gates_Api/UpdateGateStatus",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTA4LTAzIiwiZXhwIjoiMjAyMi0wOC0wMyIsImRhdGEiOiIxNyJ9.nbG_Ip9QZLCa4yA0jFothG4Wd1lupOqB1M7GSd4PP9I",
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "id": id,
                    "status": status ? 1 : 0,
                }
            })
            .done(function(response) {
                toastr.success('تم تحديث حالة النموذج');

               
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
            });



    }




    
    function DeleteGate(id) {
        var jqxhr = $.ajax({
                url: "https://sa.arsail.net/schools/Gates_Api/DeleteGate",
                method: "DELETE",
                timeout: 0,
                data: {
                    id: id,
                    
                },
                headers: {
                  
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTA4LTAzIiwiZXhwIjoiMjAyMi0wOC0wMyIsImRhdGEiOiIxNyJ9.nbG_Ip9QZLCa4yA0jFothG4Wd1lupOqB1M7GSd4PP9I",
                "content-type": "application/x-www-form-urlencoded",

                },
            })
            .done(function(response) {
                // dataTable.clear().rows.add(response.data).draw()
                toastr.success('تم حذف  البيانات محددة بنجاح  ', 'صح ');
                getsTable();


            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء حذف  البيانات!', 'خطأ');
            });

    }


</script>