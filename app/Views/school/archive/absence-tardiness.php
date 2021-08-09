<?php require(APPPATH . 'Views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col ">
            أرشيف إشعارات الغياب والتأخر
        </div>
    </div>
</div>
<!-- /.content-header -->


<?php require(APPPATH . 'Views/school/layouts/notifications-service-status.php') ?>

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body p-2" style="overflow-x: scroll;">
                <table id="content-table" class="table table-striped " style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>م</th>
                            <th>رقم الطالب</th>
                            <th>اسم الطالب</th>
                            <th>الصف</th>
                            <th>الفصل</th>
                            <th>جوال ولي الأمر</th>
                            <th>حالة الرصد</th>
                            <th>الحصة</th>
                            <th>تاريخ الرصد</th>
                            <th>نص الرسالة</th>
                            <!-- <th>حالة الإرسال</th> -->
                        </tr>
                    </thead>
                    <tbody> </tbody>
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
    // var studentsData = [];

    $(document).ready(function() {

        dataTable = $('#content-table').DataTable({
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
            columns: [{
                    "className": 'details-control align-middle',
                    "orderable": false,
                    searchable: false,
                    exportable: false,
                    "data": null,
                    "defaultContent": ''
                },
                {
                    data: null,
                    title: 'م',
                    className: 'text-center t-id align-middle',
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
                    className: 'text-center t-student_number align-middle',
                    title: 'رقم الطالب'
                },
                {
                    data: 'full_name',
                    name: 'full_name',
                    className: 'text-center t-full_name align-middle',
                    title: 'اسم الطالب'
                },
                {
                    data: 'class_name',
                    name: 'class_name',
                    className: 'text-center t-class_name align-middle',
                    title: 'الصف'
                },
                {
                    data: 'semaster_name',
                    name: 'semaster_name',
                    className: 'text-center t-semaster_name align-middle',
                    title: 'الفصل'
                },
                {
                    data: 'parent_phone',
                    name: 'parent_phone',
                    className: 'text-center t-parent_phone align-middle',
                    title: 'جوال ولي الامر'
                },
                {
                    data: 'monitoring_case',
                    name: 'monitoring_case',
                    className: 'text-center t-monitoring_case align-middle',
                    title: 'حالة الرصد'
                },


                {
                    data: 'period',
                    name: 'period',
                    className: 'text-center t-period align-middle',
                    title: 'الحصة'
                },
                {
                    data: 'date',
                    name: 'date',
                    className: 'text-center t-date align-middle',
                    title: 'تاريخ الرصد'
                },
                {
                    data: 'message',
                    name: 'message',
                    className: 'text-center t-message align-middle',
                    title: 'نص الرسالة'
                },
                // {
                //     data: 'send_status',
                //     name: 'send_status',
                //     className: 'text-center t-send_status align-middle',
                //     title: 'حالة الارسال'
                // },

            ],
            buttons: [{
                    extend: 'collection',
                    text: 'تصدير',
                    className: 'btn btn-sm',
                    buttons: [{
                            text: 'Excel',
                            action: function(e, dt, node, config) {
                                $("#content-table").table2excel({
                                    // exclude CSS class
                                    exclude: ".noExl",
                                    name: "تقرير",
                                    filename: "أرشيف إشعارات الغياب والتأخر-" + moment().format('DD-MM-YYYY'), //do not include extension
                                    fileext: ".xlsx", // file extension
                                    exclude_inputs: true
                                });
                            }
                        },
                        {
                            text: 'طباعة',
                            action: function(e, dt, node, config) {
                                var tableContainer = $('#content-table').clone();
                                tableContainer.css('border-collapse', 'collapse');
                                tableContainer.css('font-family', 'Arial, Helvetica, sans-serif');

                                tableContainer.find('td').each(function(index, value) {
                                    $(value).css('border', ' 0.6px solid #dee2e6');
                                    $(value).css('padding', ' 8px');
                                    $(value).css('display', '');

                                });

                                tableContainer.find('th').each(function(index, value) {
                                    $(value).css('border', ' 1px solid #dee2e6');
                                    $(value).css('display', '');
                                });


                                var pageTitle = 'أرشيف إشعارات الغياب والتأخر' + ' (الصف:' + $('#classes-selector').val() + ' , الفصل: ' + $('#semesters-selector').val() + ')',
                                    win = window.open('', 'Print');
                                win.document.write(`<html dir="rtl" lang="ar"><head><title>` + pageTitle + '</title>' +
                                    `<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
                                    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/fontawesome-free/css/all.min.css">
                                    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
                                    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/RTL/dist/css/custom.css">
                                    <style>table {width: 100%;margin-bottom: 1rem;color: #212529;background-color: transparent;text-align: center!important;}table th,table td {padding: 0.75rem;vertical-align: top;border-top: 1px solid #dee2e6;}table thead th {vertical-align: bottom;border-bottom: 2px solid #dee2e6;}table tbody + tbody {border-top: 2px solid #dee2e6;}table {border: 1px solid #dee2e6;}table th,table td {border: 1px solid #dee2e6;}table thead th,table thead td {border-bottom-width: 2px;}table tbody tr:nth-of-type(odd) {background-color: rgba(0, 0, 0, 0.05);}</style>` +
                                    '</head><body style="padding-top: 4rem">' + tableContainer[0].outerHTML + '</body></html>');
                                win.document.close();
                                win.print();
                                win.close();
                            }
                        }
                    ]
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
    });

    function refreshContentTable() {
        var jqxhr = $.ajax({
                url: "https://sa.arsail.net/schools/Schools/GetArchiveAbsenceAndLag",
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
                studentsData = response.data;
                dataTable.clear().rows.add(response.data).draw()
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحميل البيانات!', 'خطأ');
            });
    }
</script>