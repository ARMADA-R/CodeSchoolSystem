<?php require(APPPATH . 'Views/admin/layouts/preContent.php') ?>


<style>
    .cbx {
        margin: auto;
        margin-left: 20px;
        -webkit-user-select: none;
        user-select: none;
        cursor: pointer;
    }

    .cbx span {
        display: inline-block;
        vertical-align: middle;
        transform: translate3d(0, 0, 0);
    }

    .cbx span:first-child {
        position: relative;
        width: 18px;
        height: 18px;
        border-radius: 3px;
        transform: scale(1);
        vertical-align: middle;
        border: 1px solid #9098A9;
        transition: all 0.2s ease;
    }

    .cbx span:first-child svg {
        position: absolute;
        top: 3px;
        left: 2px;
        fill: none;
        stroke: #FFFFFF;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 16px;
        stroke-dashoffset: 16px;
        transition: all 0.3s ease;
        transition-delay: 0.1s;
        transform: translate3d(0, 0, 0);
    }

    .cbx span:first-child:before {
        content: "";
        width: 100%;
        height: 100%;
        background: #506EEC;
        display: block;
        transform: scale(0);
        opacity: 1;
        border-radius: 50%;
    }

    .cbx span:last-child {
        padding-left: 8px;
    }

    .cbx:hover span:first-child {
        border-color: #506EEC;
    }

    .inp-cbx:checked+.cbx span:first-child {
        background: #001f3f;
        ;
        border-color: #001f3f;
        ;
        animation: wave 0.4s ease;
    }

    .inp-cbx:checked+.cbx span:first-child svg {
        stroke-dashoffset: 0;
    }

    .inp-cbx:checked+.cbx span:first-child:before {
        transform: scale(1.5);
        opacity: 0;
        transition: all 0.6s ease;
    }

    @keyframes wave {
        50% {
            transform: scale(0.9);
        }
    }
</style>


<div class="modal fade" id="add-class" tabindex="-1" aria-labelledby="add-classLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-classLabel">اضافة بوابة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="addClass(this); return false;">
                <input type="hidden" name="gate_id" id="add-classs-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add-class-name">اسم الصف</label>
                                <input required type="text" name="name" class="form-control" id="add-class-name">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add-class-code">رمز الصف</label>
                                <input required type="text" name="code" class="form-control" id="add-class-code">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="margin-left: auto;" data-dismiss="modal">الغاء</button>
                    <button type="reset" class="btn btn-secondary">مسح</button>
                    <button type="submit" id="add-class-submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="update-class" tabindex="-1" aria-labelledby="update-classLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update-classLabel">اضافة بوابة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updateClass(this); return false;">
                <input type="hidden" name="id" id="update-class-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="update-class-name">اسم الصف</label>
                                <input required type="text" name="name" class="form-control" id="update-class-name">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="update-class-code">رمز الصف</label>
                                <input required type="text" name="code" class="form-control" id="update-class-code">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="margin-left: auto;" data-dismiss="modal">الغاء</button>
                    <button type="reset" class="btn btn-secondary">مسح</button>
                    <button type="submit" id="update-class-submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" style="display: none;" id="update-class-btn" class="btn btn-primary" data-toggle="modal" data-target="#update-class"></button>

<div class="modal fade" id="add-period" tabindex="-1" aria-labelledby="add-periodLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-periodLabel">اضافة حصة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="addPeriod(this); return false;">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="add-period-name">العنوان</label>
                                <input required type="text" name="name" class="form-control" id="add-period-name">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="margin-left: auto;" data-dismiss="modal">الغاء</button>
                    <button type="reset" class="btn btn-secondary">مسح</button>
                    <button type="submit" id="add-period-submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="update-period" tabindex="-1" aria-labelledby="update-periodLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update-periodLabel">اضافة بوابة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updatePeriod(this); return false;">
                <input type="hidden" name="id" id="update-period-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="update-period-name">العنوان</label>
                                <input required type="text" name="name" class="form-control" id="update-period-name">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="margin-left: auto;" data-dismiss="modal">الغاء</button>
                    <button type="reset" class="btn btn-secondary">مسح</button>
                    <button type="submit" id="update-period-submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" style="display: none;" id="update-period-btn" class="btn btn-primary" data-toggle="modal" data-target="#update-period"></button>

<div class="row">
    <div class="col-md-7">
        <div class="card">

            <div class="card-header  p-2 d-flex align-items-center justify-content-end bg-white">
                <div style="margin-left: auto;">
                    <h6 class=" text-bold">الصفوف</h6>
                </div>
                <div class="mx-1">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#add-class">اضافة صف</button>
                </div>
            </div>
            <!-- start card body1 -->

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="overflow-x: scroll;">

                        <table id="employee-table" class="table table-striped " style="width:100% ">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th>الاسم</th>
                                    <th>الرمز</th>
                                    <th>خيارات</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- end row1 -->

            </div>
            <!-- end card body1 -->


        </div>
    </div>
    <div class="col-md-5">

        <div class="card">

            <div class="card-header  p-2 d-flex align-items-center justify-content-end bg-white">
                <div style="margin-left: auto;">
                    <h6 class=" text-bold">الحصص</h6>
                </div>
                <div class="mx-1">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#add-period">اضافة حصة</button>
                </div>
            </div>
            <!-- start card body1 -->

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="overflow-x: scroll;">

                        <table id="periods-table" class="table table-striped " style="width:100% ">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th>الاسم</th>
                                    <th>خيارات</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- end row1 -->

            </div>
            <!-- end card body1 -->


        </div>
    </div>
</div>





<!-- end card1 -->



<?php require(APPPATH . 'Views/admin/layouts/postContent.php'); ?>
<script src="<?php echo base_url() . '/public/'; ?>Excel/jquery.table2excel.js"></script>
<script src="<?php echo base_url() . '/public/'; ?>design/js/datatable.all.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/public/'; ?>design/css/datatable.all.css" />


<script>
    var dataTable = null;
    var periodsDataTable = null;
    $(document).ready(function() {
        dataTable = $('#employee-table').DataTable({
            dom: `<"row d-flex justify-content-end mx-1 my-1 mb-3 "B><"row d-flex justify-content-between mx-1 "fl>rtip`,
            "lengthMenu": [
                [25, 50, 100, 500],
                [25, 50, 100, 500]
            ],

            responsive: true,
            autoWidth: false,
            rowId: 'id',

            columns: [{
                    data: 'id',
                    name: 'id',
                    title: 'م',
                    className: 'text-center ',
                    // orderable: false,
                    searchable: false,
                    // exportable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                    className: 'text-center',
                    title: 'اسم'
                },
                {
                    data: 'code',
                    name: 'code',
                    className: 'text-center ',
                    title: 'الرمز'
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
                                        <button type="button" class="btn btn-sm btn-info " title="edit" style="margin: 0px;" onclick="showUpdateClassModal('${row.id}', '${row.name}', '${row.code}')" class="nav-link">

                                            <i class="far fa-edit"></i>
                                        </button>
                                    </div>

                                    <div class="m-1">
                                        <a type="button" class="btn btn-sm btn-danger " title="delete" style="margin: 0px;" onclick="DeleteClass('${row.id}')">
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
                'colvis',


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
        periodsDataTable = $('#periods-table').DataTable({
            dom: `<"row d-flex justify-content-end mx-1 my-1 mb-3 "B><"row d-flex justify-content-between mx-1 "fl>rtip`,
            "lengthMenu": [
                [25, 50, 100, 500],
                [25, 50, 100, 500]
            ],

            responsive: true,
            autoWidth: false,
            rowId: 'id',

            columns: [{
                    data: 'id',
                    name: 'id',
                    title: 'م',
                    className: 'text-center ',
                    // orderable: false,
                    searchable: false,
                    // exportable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                    className: 'text-center',
                    title: 'اسم'
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
                                        <button type="button" class="btn btn-sm btn-info " title="edit" style="margin: 0px;" onclick="showUpdatePeriodModal('${row.id}', '${row.name}')" class="nav-link">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </div>

                                    <div class="m-1">
                                        <a type="button" class="btn btn-sm btn-danger " title="delete" style="margin: 0px;" onclick="DeletePeriod('${row.id}')">
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
                'colvis',


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
        classes();
        periods();
    });

    function classes() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>schools/GetClasses",
                method: "GET",
                timeout: 0,
                data: {
                    page: "1",
                    limit: "10000"
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
                toastr.error(response.responseJSON.msg, 'خطأ');
            });

    }

    function periods() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>schools/GetPeriods",
                method: "GET",
                timeout: 0,
                headers: {
                    "Authorization": token
                },
            })
            .done(function(response) {
                periodsDataTable.clear().rows.add(response.data).draw()
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
            });

    }

    function DeleteClass(id) {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>schools/deleteClass",
                method: "DELETE",
                timeout: 0,
                data: {
                    id: id,
                },
                headers: {

                    "Authorization": token,
                    "content-type": "application/x-www-form-urlencoded",

                },
            })
            .done(function(response) {
                // dataTable.clear().rows.add(response.data).draw()
                toastr.success('تم حذف البيانات بنجاح');
                classes();


            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء حذف  البيانات!', 'خطأ');
            });

    }


    function addClass(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $.ajax({
            url: "<?= site_url('') ?>schools/addClass",
            method: "POST",
            "headers": {
                "Authorization": token
            },
            data: {
                name: formData.name,
                code: formData.code,
            },

        }).done(function(response) {
            toastr.success('تم اضافةالصف بنجاح');
            classes();
        }).fail(function(response) {
            console.log(response);
            toastr.error(response.responseJSON.msg, 'خطأ');
        });
    }

    function showUpdateClassModal(id, name, code) {

        $("#update-class-id").val(id);
        $("#update-class-name").val(name);
        $("#update-class-code").val(code);

        $("#update-class-btn").click();

    }

    function updateClass(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $.ajax({
            url: "<?= site_url('') ?>schools/updateClass",
            method: "POST",
            "headers": {
                "Authorization": token
            },
            data: {
                id: formData.id,
                name: formData.name,
                code: formData.code,
            },
        }).done(function(response) {
            toastr.success('تم تعديل الصف بنجاح')
            classes();
        }).fail(function(response) {
            console.log(response);
            toastr.error(response.responseJSON.msg, 'خطأ');
        });
    }

    function addPeriod(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $.ajax({
            url: "<?= site_url('') ?>schools/AddPeriod",
            method: "POST",
            "headers": {
                "Authorization": token
            },
            data: {
                name: formData.name,
            },
        }).done(function(response) {
            toastr.success('تم الاضافة بنجاح');
            periods()
        }).fail(function(response) {
            console.log(response);
            toastr.error(response.responseJSON.msg, 'خطأ');
        });
    }

    function showUpdatePeriodModal(id, name, code) {

        $("#update-period-id").val(id);
        $("#update-period-name").val(name);

        $("#update-period-btn").click();
    }

    function updatePeriod(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $.ajax({
            url: "<?= site_url('') ?>schools/updatePeriod",
            method: "POST",
            "headers": {
                "Authorization": token
            },
            data: {
                id: formData.id,
                name: formData.name,
            },
        }).done(function(response) {
            toastr.success('تم تعديل الصف بنجاح')
            periods();
        }).fail(function(response) {
            console.log(response);
            toastr.error(response.responseJSON.msg, 'خطأ');
        });
    }

    function DeletePeriod(id) {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>schools/deletePeriod",
                method: "DELETE",
                timeout: 0,
                data: {
                    id: id,
                },
                headers: {

                    "Authorization": token,
                    "content-type": "application/x-www-form-urlencoded",

                },
            })
            .done(function(response) {
                toastr.success('تم حذف البيانات بنجاح');
                periods();
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء حذف  البيانات!', 'خطأ');
            });

    }
    
</script>