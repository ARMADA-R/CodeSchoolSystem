<?php require(APPPATH . 'Views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col ">
            بيانات طلاب نظام المقررات
        </div>
    </div>
</div>
<!-- /.content-header -->



<?php require(APPPATH . 'Views/school/layouts/notifications-service-status.php') ?>


<div class="modal fade" id="add-student" tabindex="-1" aria-labelledby="add-studentLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-studentLabel">اضف طالب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="addCourse(this); return false;">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="student_number">رقم الطالب</label>
                                <input required type="number" class="form-control" name="student_number" id="student_number">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="student_name">اسم الطالب</label>
                                <input required type="text" class="form-control" name="student_name" id="student_name">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md">
                            <div class="form-group">
                                <label for="phone">رقم الجوال</label>
                                <input required type="number" class="form-control" name="phone" id="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="level">المستوى</label>
                                <input required type="text" class="form-control" name="level" id="level">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="division">الشعبة</label>
                                <input required type="text" class="form-control" name="division" id="division">
                            </div>
                        </div>
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
                            <button type="submit" id="add-student-submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="add-student-from-file" tabindex="-1" aria-labelledby="add-student-from-fileLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-student-from-fileLabel">اضافة طلاب من ملف</h5>
                <div class="d-flex justify-content-center ml-auto mr-auto">
                    <div class="spinner-border" style="visibility: hidden;" id="proccesingFileSpenner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="addFromFile(); return false;">
                <div class="modal-body p-4">
                    <div class="row">

                        <div class="col-md">
                            <div class="form-group">
                                <input required type="file" class="form-control" name="xlfile" id="xlf" accept=".xlsx, .xls">
                                <!-- <small class="form-text text-danger">لسلامة البيانات المدخلة يرجى التأكد من ان الملف يتبع الشكل المحدد ولا يتعارض مع طريقة الادخال المحددة</small> -->
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md">
                            <div class="form-group">
                                <!-- <label for="excelSheets">الورقة</label> -->
                                <select class="form-control " name="" id="excelSheets"></select>
                            </div>

                        </div>
                        <div class="col-sm-3">

                            <button type="button" id="add-from-file-submit" onclick="ExcelSubmit();" class="btn btn-primary w-100">
                                <span class="spinner-border spinner-border-sm" style="display: none;" id="add-from-file-spinner" role="status" aria-hidden="true"></span>
                                <span id="save-file-btn-text">حفظ</span>
                            </button>
                            <input type="hidden" class="form-control" name="table" id="jstable" required>
                            <input type="" id="excel-form-submit" style="visibility: hidden;" value="">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md">
                            <div id="htmlout" style="overflow-x: scroll;"></div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <div id="add-from-file-spinner" style="display: none" class="spinner-border text-secondary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" class="form-control" name="table" id="jstable" required>
                            <input type="" id="excel-form-submit" style="visibility: hidden;" value="">
                            <button type="button" id="add-from-file-submit2" onclick="ExcelSubmit();" class="btn btn-primary w-100">
                                <span class="spinner-border spinner-border-sm" style="display: none;" id="add-from-file-spinner2" role="status" aria-hidden="true"></span>
                                <span id="save-file-btn-text">حفظ</span>
                            </button>
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="button" onclick="addFromFile()" id="add-from-file-submit" class="btn btn-primary">حفظ</button> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="edit-course" tabindex="-1" aria-labelledby="edit-courseLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-courseLabel">تعديل طالب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updateCourse(this); return false;">
                <input type="hidden" name="id" id="record-id-edit">

                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="course_number">رقم الطالب</label>
                                <input required type="number" class="form-control" name="student_number" id="student_number-edit">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="student_name">اسم الطالب</label>
                                <input required type="text" class="form-control" name="student_name" id="student_name-edit">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md">
                            <div class="form-group">
                                <label for="phone">رقم الجوال</label>
                                <input required type="number" class="form-control" name="phone" id="phone-edit">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="level">المستوى</label>
                                <input required type="text" class="form-control" name="level" id="level-edit">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="division">الشعبة</label>
                                <input required type="text" class="form-control" name="division" id="division-edit">
                            </div>
                        </div>
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
                            <button type="submit" id="edit-student-submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<button id="edit-course-btn" style="display: none;" class="btn btn-light" data-toggle="modal" data-target="#edit-course"></button>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-2 d-flex align-items-center justify-content-end bg-white">

                <div class="" style="margin-left: auto;">
                    <button type="button" onclick="deleteRecords()" class="btn btn-outline-danger">حذف المحدد</button>
                </div>
                <div class="mx-1">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#add-student">اضف طالب</button>
                </div>
                <div class="mx-1">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#add-student-from-file">تحميل ملف</button>
                </div>
            </div>
            <div class="card-body p-2" style="overflow-x: scroll;">
                <table id="content-table" class="table table-striped " style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>م</th>
                            <th>رقم الطالب</th>
                            <th>اسم الطالب</th>
                            <th>المستوى</th>
                            <th>الشعبة</th>
                            <th>الجوال</th>
                            <th>خيارات</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once(APPPATH . 'Views/school/layouts/postContent.php') ?>


<script src="<?php echo base_url() . '/public/'; ?>Excel/jquery.table2excel.js"></script>

<script src="<?php echo base_url() . '/public/'; ?>design/js/datatable.all.js"></script>

<script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/parseTable.js"></script>
<script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/shim.js"></script>
<script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/xlsx.full.min.js"></script>
<script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/jquery-ui.min.js"></script>
<script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/jquery.dragtable.js"></script>
<script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/FileSaver.min.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/public/'; ?>design/css/datatable.all.css" />


<script>
    var dataTable = null;

    $(document).ready(function() {
        dataTable = $('#content-table').DataTable({
            dom: `<"row d-flex justify-content-end mx-1 my-1 mb-3 "B><"row d-flex justify-content-between mx-1 "fl>rtip`,
            "lengthMenu": [
                [25, 50, 100, 500, 1000],
                [25, 50, 100, 500, 1000]
            ],
            order: [
                [2, 'asc']
            ],

            responsive: true,
            autoWidth: false,
            rowId: 'id',
            columns: [{
                    "className": 'details-control align-middle',
                    "orderable": false,
                    searchable: false,
                    exportable: false,
                    "data": null,
                    "defaultContent": ''
                },
                {
                    data: 'id',
                    className: 'text-center align-middle',
                    title: `<input type="checkbox" class="select-all"  id="select-all">`,
                    orderable: false,
                    searchable: false,
                    exportable: false,
                    render: function(data, type, row, meta) {
                        return `<input type="checkbox" class="align-middle selected_data" value='${data}' name="selected_data[]" id="${data}"/>`;
                    }
                },
                {
                    data: 'id',
                    name: 'id',
                    title: 'م',
                    className: 'text-center t-id',
                    // orderable: false,
                    searchable: false,
                    exportable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'student_number',
                    name: 'student_number',
                    className: 'text-center t-student_number',
                    title: 'رقم الطالب'
                },
                {
                    data: 'student_name',
                    name: 'student_name',
                    className: 'text-center t-student_name',
                    title: 'اسم الطالب'
                },
                {
                    data: 'level',
                    name: 'level',
                    className: 'text-center t-level',
                    title: 'المستوى'
                },
                {
                    data: 'division',
                    name: 'division',
                    className: 'text-center t-division',
                    title: 'الشعبة'
                },
                {
                    data: 'phone',
                    name: 'phone',
                    className: 'text-center t-phone',
                    title: 'الجوال'
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
                                        <a type="button" class="btn btn-sm btn-info " title="edit" style="margin: 0px;" id="` + data + `"  onclick="editCourse('` + row.id + `','` + row.level + `','` + row.division + `','` + row.student_name + `','` + row.student_number + `','` + row.phone + `')">
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
        refreshContentTable();
        $('#select-all').change(function() {
            if (this.checked) {
                selects();
            } else {
                deSelect();
            }
        });
    });

    function selects() {
        var ele = document.getElementsByName('selected_data[]');
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox')
                ele[i].checked = true;
            $(ele[i]).closest('.datatable-row').addClass('toprint');
            $(ele[i]).closest('.datatable-row').removeClass('notToExcel');
        }
    }

    function deSelect() {
        var ele = document.getElementsByName('selected_data[]');
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox')
                ele[i].checked = false;
            $(ele[i]).closest('.datatable-row').removeClass('toprint');
            $(ele[i]).closest('.datatable-row').addClass('notToExcel');
        }
    }

    function refreshContentTable() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Courses/GetCourses",
                method: "GET",
                timeout: 0,
                data: {
                    school_id: school_id,
                    page: "1",
                    limit: "7000"
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

    function deleteRecord(id) {
        if (confirm('هل انت متأكد من انك تريد حذف هذا السجل؟')) {
            var jqxhr = $.ajax({
                    "url": "<?= site_url('') ?>Courses/DeleteCourse",
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
                    toastr.error(response.responseJSON.msg, 'خطأ');
                })
        }
    }

    function getSelected() {
        var selected = [];
        var CheckBoxes = document.getElementsByName('selected_data[]');
        for (var i = 0; i < CheckBoxes.length; i++) {
            if (CheckBoxes[i].type == 'checkbox' && CheckBoxes[i].checked) {
                selected.push(CheckBoxes[i].value)
            }
        }

        return selected;
    }

    function deleteRecords() {
        var ids = getSelected();

        if (confirm('هل انت متأكد من انك تريد حذف السجلات المحددة؟')) {
            var jqxhr = $.ajax({
                    "url": "<?= site_url('') ?>Courses/DeleteCourses",
                    "method": "DELETE",
                    "timeout": 0,
                    "headers": {
                        "Authorization": token,
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    "data": {
                        "ids": ids
                    }
                })
                .done(function(response) {
                    for (let i = 0; i < ids.length; i++) {
                        dataTable.row($('tr#' + ids[i])).remove();
                    }
                    dataTable.draw();
                    toastr.success('تم حذف السجلات بنجاح!')
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error(response.responseJSON.msg, 'خطأ');
                })
        }
    }

    function editCourse(id, level, division, student_name, student_number, phone) {
        // var row = $('tr#' + id);
        $('#level-edit').val(level);
        $('#division-edit').val(division);
        $('#student_name-edit').val(student_name);
        $('#student_number-edit').val(student_number);
        $('#phone-edit').val(phone);

        $('#record-id-edit').val(id);
        $('#edit-course-btn').click();
    }

    function updateCourse(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('#edit-employee-submit').attr("disabled", true);
        $('#edit-spinner').show();
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Courses/EditCourse",
                method: "POST",
                timeout: 0,
                data: {
                    "id": formData.id,
                    "level": formData.level,
                    "division": formData.division,
                    "student_name": formData.student_name,
                    "student_number": formData.student_number,
                    "phone": formData.phone,
                    "school_id": school_id,
                    "user_id": user_id,
                },
                headers: {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
            .done(function(response) {
                refreshContentTable();
                toastr.success('تم تحديث البيانات بنجاح')
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
            }).always(function() {
                $('#edit-employee-submit').removeAttr('disabled');
                $('#edit-spinner').hide();
            });
        return false;
    }

    function addCourse(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('#add-employee-submit').attr("disabled", true);
        $('#add-spinner').show();

        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Courses/AddCourse",
                method: "POST",
                timeout: 0,
                data: {
                    "level": formData.level,
                    "division": formData.division,
                    "student_name": formData.student_name,
                    "student_number": formData.student_number,
                    "phone": formData.phone,
                    "school_id": school_id,
                    "user_id": user_id,
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
                toastr.error(response.responseJSON.msg, 'خطأ');

            }).always(function() {
                $('#add-employee-submit').removeAttr('disabled');
                $('#add-spinner').hide();
            });

        return false;
    }
</script>

<script>
    var selectedValues = [];

    function addFromFile(data) {

        var form = new FormData();
        form.append("excelData", JSON.stringify(data));
        form.append("school_id", school_id);
        form.append("user_id", user_id);

        $('#add-from-file-submit').attr("disabled", true);
        $('#add-from-file-spinner').show();
        $('#add-from-file-submit2').attr("disabled", true);
        $('#add-from-file-spinner2').show();

        var jqxhr = $.ajax({
                url: "<?= site_url('CoursesExtends/AddCoursesFromFile') ?>", //"<?= site_url('') ?>Courses/AddCourse",
                method: "POST",
                timeout: 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "headers": {
                    "Authorization": token,
                },
                data: form
            })
            .done(function(response) {
                refreshContentTable();
                toastr.success(JSON.parse(response).msg)
            })
            .fail(function(response) {
                console.log([response, response.responseText]);
                toastr.error(JSON.parse(response.responseText).msg, 'خطأ');
            }).always(function() {
                $('#add-from-file-submit').removeAttr('disabled');
                $('#add-from-file-spinner').hide();
                $('#add-from-file-submit2').removeAttr('disabled');
                $('#add-from-file-spinner2').hide();
            });

        return false;
    }

    function ExcelSubmit() {

        if (selectedValues.length < 5) {
            alert('يجب تحديد جميع اسماء الاعمدة اولاً!!');
        } else {
            addFromFile(getdata());
            // console.log(JSON.parse(document.getElementById('jstable').value));
            document.getElementById('excel-form-submit').click();
        }
    };

    var columns = {
        'student_number': 'رقم الطالب',
        'student_name': 'اسم الطالب',
        'phone': 'الجوال',
    };

    $('.custom-file input').change(function(e) {
        if (e.target.files.length) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        }
    });

    function getdata() {
        //rename and get data from table as js array 
        var index = 0;
        var thArray = [];

        $('#excel-table > thead > tr > th > select').each(function() {
            thArray.push($(this).val());
        });

        $('#excel-table > thead > tr > th').each(function() {
            $(this).text(thArray[index++]);
        });

        var table = document.getElementById("excel-table");
        var data = parseTable(table);

        console.log(data);
        //convert js array to JSON and passing it to php by html input
        // document.getElementById('jstable').value = JSON.stringify(data);

        return data;
    };

    function uniqueSelects() {
        $('select').on('change', function() {
            selectedValues = [];
            $('select').each(function() {
                var thisValue = this.value;
                if (thisValue !== '')
                    selectedValues.push(thisValue);
            }).each(function() {
                $(this).find('option:not(:selected)').each(function() {
                    if ($.inArray(this.value, selectedValues) === -1) {
                        $(this).removeAttr('hidden');
                    } else {
                        if (this.value !== '')
                            $(this).attr('hidden', 'hidden');
                    }
                });
            });
        });
    }

    function deleteRow(element) {
        if (confirm("هل انت متأكد من حذف هذا السطر؟ \n الاسطر المحذوفة لا تضاف الى قاعدة البيانات")) {
            $(element).closest('tr').remove();
        }
    }
</script>

<script>
    var proccesingFileSpenner = $("#proccesingFileSpenner");
    var sheetNames = [];
    var sheetToView = 0;
    var xlf = document.getElementById('xlf');
    var X = XLSX;
    var XW = {
        /* worker message */
        msg: 'xlsx',
        /* worker scripts */
        worker: '<?= base_url('') . '/public/' ?>Excel/EXCEL/xlsxworker.js'
    };
    var global_wb;

    var process_wb = (function() {
        $("#htmlout").html('');
        var OUT = document.getElementById('out');
        var HTMLOUT = document.getElementById('htmlout');

        var to_html = function to_html(workbook) {
            HTMLOUT.innerHTML = "";
            showSpinner();
            // console.log(workbook);

            workbook.SheetNames.forEach(function(sheetName, index) {





                if (index == $("#excelSheets").val()) {


                    // if (condition) {
                    // }
                    var htmlstr = X.write(workbook, {
                        id: "excel-table",
                        editable: true,
                        sheet: sheetName,
                        type: 'string',
                        bookType: 'html'
                    });


                    // set button to each row
                    var jqueryHtmlStr = $(htmlstr);
                    var tableRows = jqueryHtmlStr.find("tbody").children();
                    var tbodtHtml = '';
                    for (let i = 0; i < tableRows.length; i++) {
                        tbodtHtml += $(tableRows[i]).append(`<td id="sjs-xxx${i}"><div class="row justify-content-center  text-white "><button type="button" class="btn btn-outline-danger" onclick="deleteRow(this);" >حذف</button></row></td>`)[0].outerHTML;
                    }

                    jqueryHtmlStr.find("tbody");
                    (jqueryHtmlStr.find("tbody").html(''));
                    jqueryHtmlStr.find("tbody").html(tbodtHtml);

                    htmlstr = '';
                    jqueryHtmlStr.each(function(index) {
                        htmlstr += jqueryHtmlStr[index].outerHTML
                    });


                    var counter = 0;
                    for (var index = 1; index < htmlstr.length - 3; index++) {
                        if (htmlstr[index - 1] == '<' && htmlstr[index] == 't' && htmlstr[index + 1] == 'd') {
                            counter++;
                        }
                        if (htmlstr[index] == '/' && htmlstr[index + 1] == 't' && htmlstr[index + 2] == 'r')
                            break;
                    }

                    var head = "<thead><tr>";
                    for (let index = 0; index < counter - 1; index++) { // counter - 1 case we have a delete button
                        let options = '';
                        Object.keys(columns).forEach(function(key) {
                            // do something with obj[key]
                            options += '<option value="' + key + '"> ' + columns[key] + ' </option>'
                        });

                        head += "<th>" +
                            ' <select required name="column_' + index + '" id="column_' + index + '" class="form-control">' +
                            '<option value="" selected> -- </option>' +
                            options +
                            '</select>' +
                            "</th>"

                    }
                    head += "<th class=\"align-middle text-center\">خيارات</th>";

                    head += "</tr></thead>";
                    // console.log(htmlstr);
                    HTMLOUT.innerHTML += htmlstr;
                    document.getElementById('excel-table').innerHTML += head;
                    document.getElementById('excel-table').className += "draggable table table-striped table-bordered table-hover";
                    uniqueSelects();

                    // hiding spinner 
                    // drag();

                }
            });
            proccesingFileSpenner.attr('style', 'visibility:hidden');
            return "";
        };
        return function process_wb(wb) {
            showSpinner();

            global_wb = wb;
            var output = "";
            output = to_html(wb);


            if (typeof console !== 'undefined') console.log("output", new Date());


        };

    })();

    var do_file = (function() {
        var rABS = typeof FileReader !== "undefined" && (FileReader.prototype || {}).readAsBinaryString;
        var use_worker = typeof Worker !== 'undefined';
        var xw = function xw(data, cb) {
            var worker = new Worker(XW.worker);
            worker.onmessage = function(e) {
                switch (e.data.t) {
                    case 'ready':
                        break;
                    case 'e':
                        console.error(e.data.d);
                        break;
                    case XW.msg:
                        cb(JSON.parse(e.data.d));
                        break;
                }
            };
            worker.postMessage({
                d: data,
                b: rABS ? 'binary' : 'array'
            });
        };

        return function do_file(files) {

            showSpinner();

            var f = files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                if (typeof console !== 'undefined') console.log("onload", new Date(), rABS, use_worker);
                var data = e.target.result;
                if (!rABS) data = new Uint8Array(data);
                if (use_worker) xw(data, process_wb);
                else process_wb(X.read(data, {
                    type: rABS ? 'binary' : 'array'
                }));

                // set sheets names as options in select box
                sheetNames = X.read(data, {
                    type: rABS ? 'binary' : 'array'
                }).SheetNames;
                $("#excelSheets").html("");
                for (let i = 0; i < sheetNames.length; i++) {
                    $("#excelSheets").append($('<option>', {
                        value: i,
                        text: sheetNames[i],
                    }));
                }
            };
            if (rABS) reader.readAsBinaryString(f);
            else reader.readAsArrayBuffer(f);


        };

    })();

    (function() {
        if (!xlf.addEventListener) return;

        function handleFile(e) {
            showSpinner();

            do_file(e.target.files);

        }
        xlf.addEventListener('change', handleFile, false);

        $("#excelSheets").change(function() {
            console.log("sheet changed");
            showSpinner();
            process_wb(global_wb);
        })
    })();

    function showSpinner() {
        // showing spinner while prccess file
        proccesingFileSpenner.attr('style', 'visibility:visible');
    }
</script>