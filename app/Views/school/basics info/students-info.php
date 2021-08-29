<?php require(APPPATH . 'Views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col ">
            بيانات الطلاب
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
            <form onsubmit="addStudent(this); return false;">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="stud_num">رقم الطالب</label>
                                <input required type="number" class="form-control" name="student_number" id="stud_num">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="full-name">الاسم الكامل</label>
                                <input required type="text" class="form-control" name="full_name" id="full-name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="parent_email">بريد ولي الامر</label>
                                <input required type="email" class="form-control" name="parent_email" id="parent_email">
                            </div>
                        </div>
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
                                <label for="class">الصف</label>
                                <select required class="form-control" id="classes-selector" name="class">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="group">رقم الفصل</label>
                                <select required class="form-control" name="semestar" id="semesters-selector">
                                    <option value=""></option>
                                </select>
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

<div class="modal fade" id="edit-student" tabindex="-1" aria-labelledby="edit-studentLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-studentLabel">تعديل طالب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="UpdateStudent(this); return false;">
                <input type="hidden" name="id" id="record-id-edit">
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="stud_num">رقم الطالب</label>
                                <input type="number" class="form-control" name="student_number" id="stud_num-edit">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="full-name">الاسم الكامل</label>
                                <input type="text" class="form-control" name="full_name" id="full-name-edit">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="parent_email">بريد ولي الامر</label>
                                <input type="email" class="form-control" name="parent_email" id="parent_email-edit">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="phone">رقم الجوال</label>
                                <input type="number" class="form-control" name="phone" id="phone-edit">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="class">الصف</label>
                                <select required class="form-control" id="classes-selector-edit" name="class">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="group">رقم الفصل</label>
                                <select required class="form-control" name="semestar" id="semesters-selector-edit">
                                    <option value=""></option>
                                </select>
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
<button id="edit-student-btn" style="display: none;" class="btn btn-light" data-toggle="modal" data-target="#edit-student"></button>



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



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header  p-2 d-flex align-items-center justify-content-end bg-white">
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
                <table id="messages_forms" class="table table-striped " style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>م</th>
                            <th>رقم الطالب</th>
                            <th>اسم الطالب</th>
                            <th>الصف</th>
                            <th>رقم الفصل</th>
                            <th>الجوال</th>
                            <th>البريد الالكتروني</th>
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
        dataTable = $('#messages_forms').DataTable({
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
            columnDefs: [{
                responsivePriority: 20000,
                targets: 6
            }, ],
            columns: [{
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
                    orderable: false,
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
                    data: 'full_name',
                    name: 'full_name',
                    className: 'text-center t-name',
                    title: 'اسم الطالب'
                },
                {
                    data: 'class_name',
                    name: 'class_name',
                    className: 'text-center t-class_name',
                    title: 'الصف',
                },
                {
                    data: 'semaster_name',
                    name: 'semaster_name',
                    className: 'text-center t-semaster_name',
                    title: 'الفصل'
                },
                {
                    data: 'phone',
                    name: 'phone',
                    className: 'text-center t-phone',
                    title: 'الجوال'
                },
                {
                    data: 'parent_email',
                    name: 'parent_email',
                    className: 'text-center t-email',
                    title: 'البريد الالكتروني'
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
                                        <a type="button" class="btn btn-sm btn-info " title="edit" style="margin: 0px;" id="` + data + `"  onclick="editStudent('` + row.id + `','` + row.student_number + `','` + row.full_name + `','` + row.parent_email + `','` + row.phone + `','` + row.class_id + `','` + row.semaster_id + `')">
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
        refreshStudentsTable();
        getClasses();
        getSemesters();
    });

    $(document).ready(function() {
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
                    "url": "<?= site_url('') ?>StudentsExtends/DeleteStudents",
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
                    toastr.success(response.msg)
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error(response.responseJSON.msg, 'خطأ');
                })
        }
    }



    function refreshStudentsTable() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Students/GetStudents",
                method: "GET",
                timeout: 0,
                data: {
                    school_id: school_id,
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

    function deleteRecord(id) {
        if (confirm('هل انت متأكد من انك تريد حذف هذا القالب؟')) {
            var jqxhr = $.ajax({
                    "url": "<?= site_url('') ?>Students/DeleteStudent",
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

    function editStudent(id, student_number, full_name, parent_email, phone, class_id, semaster_id) {
        // var row = $('tr#' + id);
        $('#stud_num-edit').val(student_number);
        $('#full-name-edit').val(full_name);
        $('#parent_email-edit').val(parent_email);
        $('#phone-edit').val(phone);

        $('#classes-selector-edit').val(class_id);
        $('#semesters-selector-edit').val(semaster_id);
        $('#record-id-edit').val(id);
        $('#edit-student-btn').click();
    }

    function UpdateStudent(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('#edit-student-submit').attr("disabled", true);
        $('#edit-spinner').show();
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Students/EditStudent",
                method: "POST",
                timeout: 0,
                data: {
                    "id": formData.id,
                    "full_name": formData.full_name,
                    "student_number": formData.student_number,
                    "phone": formData.phone,
                    "class": formData.class,
                    "semestar": formData.semestar,
                    "school_id": school_id,
                    "parent_email": formData.parent_email
                },
                headers: {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
            .done(function(response) {
                refreshStudentsTable();
                toastr.success('تم تحديث البيانات بنجاح')
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
            }).always(function() {
                $('#edit-student-submit').removeAttr('disabled');
                $('#edit-spinner').hide();
            });
        return false;
    }

    function addStudent(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('#add-student-submit').attr("disabled", true);
        $('#add-spinner').show();

        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Students/AddStudent",
                method: "POST",
                timeout: 0,
                data: {
                    "full_name": formData.full_name,
                    "student_number": formData.student_number,
                    "phone": formData.phone,
                    "class": formData.class,
                    "semestar": formData.semestar,
                    "school_id": school_id,
                    "parent_email": formData.parent_email
                },
                headers: {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
            .done(function(response) {
                refreshStudentsTable();
                toastr.success('تم اضافة البيانات بنجاح')
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');

            }).always(function() {
                $('#add-student-submit').removeAttr('disabled');
                $('#add-spinner').hide();
            });

        return false;
    }

    function getClasses() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Schools/GetClasses",
                method: "GET",
                timeout: 0,
                headers: {
                    "Authorization": token
                },
            })
            .done(function(response) {
                setClassesOptions(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحميل بيانات الصفوف', 'خطأ');
            });

    }

    function getSemesters() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Schools/GetSemester",
                method: "GET",
                timeout: 0,
                headers: {
                    "Authorization": token
                },
            })
            .done(function(response) {
                setSemestersOptions(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحميل بيانات الفصول',
                    'خطأ ');
            });
    }

    // set classes options in classes select box
    function setClassesOptions(data) {
        var classSelectorsAdd = $('#classes-selector');
        var classSelectorsEdit = $('#classes-selector-edit');
        $.each(data, function(index, val) {
            classSelectorsAdd.append($('<option>', {
                value: val.id,
                text: val.name,
            }));
            classSelectorsEdit.append($('<option>', {
                value: val.id,
                text: val.name + ' ' + val.code,
            }));
        });
    }

    // set semester options in semesters select box
    function setSemestersOptions(data) {
        var semesterSelectorsAdd = $('#semesters-selector');
        var semesterSelectorsEdit = $('#semesters-selector-edit');
        $.each(data, function(index, val) {
            semesterSelectorsAdd.append($('<option>', {
                value: val.id,
                text: val.name,
            }));
            semesterSelectorsEdit.append($('<option>', {
                value: val.id,
                text: val.name,
            }));
        });
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
                url: "<?= site_url('StudentsExtends/AddStudentsFromFile') ?>", //"<?= site_url('') ?>Courses/AddCourse",
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
                refreshStudentsTable();
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
        console.log(selectedValues);
        if (selectedValues.length < 7) {
            alert('يجب تحديد جميع اسماء الاعمدة اولاً!!');
        } else {
            addFromFile(getdata());
            // console.log(JSON.parse(document.getElementById('jstable').value));
            document.getElementById('excel-form-submit').click();
        }
    };

    var columns = {
        'full_name': 'اسم الطالب',
        'student_number': 'رقم الطالب',
        'phone': 'الجوال',
        'class': 'الصف',
        'semestar': 'الفصل',
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