<?php require(APPPATH . 'views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col ">
            إشعارات الغياب والتأخر
        </div>
    </div>
</div>
<!-- /.content-header -->



<div class="row mt-4 pb-5" style="font-size: 1rem;">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-2">
                <p class="mb-1">23,508</p>
                <p class="mb-1">رصيد الإشعارات « خدمة الرسائل القصيرة »</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-2">
                <p class="mb-1">23,508</p>
                <p class="mb-1">رصيد الإشعارات « خدمة الرسائل القصيرة »</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-2">
                <p class="mb-1">23,508</p>
                <p class="mb-1">رصيد الإشعارات « خدمة الرسائل القصيرة »</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


<div class="row mt-4  mb-4" style="font-size: 1rem;">
    <div class="col-lg-3">
        <div class="form-group">
            <select required class="form-control determenators" name="submit-type" id="classes-selector">
                <option value="">الصف</option>
            </select>
        </div>

    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <select required class="form-control determenators" name="submit-type" id="semesters-selector">
                <option value="">الفصل</option>
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <button type="button" style="width: inherit; background-color: #fff;" class="btn btn-light" data-toggle="modal" data-target="#add-temblate">رصد</button>
        <div class="form-group">
        </div>
    </div>

    <div class="col-lg-3">
        <button type="button" style="width: inherit; background-color: #fff;" onclick="checkBeforSend()" class="btn btn-light">ارسال</button>
        <div class="form-group">
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="modal fade" id="add-temblate" tabindex="-1" aria-labelledby="add-temblateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-temblateLabel">رصد حالة الحضور والغياب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updateMultiFullStatus(this); return false;">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="attendance_status">حالة الرصد</label>
                                <select required class="form-control" name="attendance_status" id="attendance_status">
                                    <option value=""></option>
                                    <option value="غائب">غائب</option>
                                    <option value="غائب بعذر">غائب بعذر</option>
                                    <option value="متأخر">متأخر</option>
                                    <option value="متأخر بعذر">متأخر بعذر</option>
                                    <option value="حاضر">حاضر</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="periods-selector">الحصة</label>
                                <select required class="form-control" name="period" id="periods-selector">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="group">اليوم</label>
                                <select required class="form-control" name="day" id="day">
                                    <option value=""></option>
                                    <option value="السبت">السبت</option>
                                    <option value="الاحد">الاحد</option>
                                    <option value="الاثنين">الاثنين</option>
                                    <option value="الثلاثاء">الثلاثاء</option>
                                    <option value="الاربعاء">الاربعاء</option>
                                    <option value="الخميس">الخميس</option>
                                    <option value="الجمعة">الجمعة</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="date" class="col-form-label">التاريخ</label>
                                <input required type="date" name="date" class="form-control" id="date">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <small class="form-text text-muted">يتم تعيين الحالة المحددة اعلاه لجميع الطلاب المحددين في الجدول. يجب الارسال بعد التحديد لتثبيت الحالة</small>
                        </div>
                        <div class="d-flex">
                            <button type="button" class="btn btn-secondary mx-1" data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-primary mx-1">رصد</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<button id="update-status-modal" type="button" style="display: none;" class="btn btn-link" data-toggle="modal" data-target="#status"></button>
<div class="modal fade" id="status" tabindex="-1" aria-labelledby="statusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusLabel">حالة الرصد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updateStatus(this); return false;">
                <div class="modal-body">
                    <input type="hidden" name="row_id">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="attendance_status">حالة الرصد</label>
                                <select required class="form-control" name="attendance_status" id="set_attendance_status">
                                    <option value="">اختر حالة</option>
                                    <option value="غائب">غائب</option>
                                    <option value="غائب بعذر">غائب بعذر</option>
                                    <option value="متأخر">متأخر</option>
                                    <option value="متأخر بعذر">متأخر بعذر</option>
                                    <option value="حاضر">حاضر</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="dismiss-status-modal" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<button id="update-day-modal" type="button" style="display: none;" class="btn btn-link" data-toggle="modal" data-target="#update-day"></button>
<div class="modal fade" id="update-day" tabindex="-1" aria-labelledby="dayLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="periodsLabel">اليوم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updateDay(this); return false;">
                <div class="modal-body">
                    <input type="hidden" name="row_id">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="group">اليوم</label>
                                <select required class="form-control" name="day" id="update-day">
                                    <option value=""></option>
                                    <option value="السبت">السبت</option>
                                    <option value="الاحد">الاحد</option>
                                    <option value="الاثنين">الاثنين</option>
                                    <option value="الثلاثاء">الثلاثاء</option>
                                    <option value="الاربعاء">الاربعاء</option>
                                    <option value="الخميس">الخميس</option>
                                    <option value="الجمعة">الجمعة</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="dismiss-day-modal" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<button id="update-date-modal" type="button" style="display: none;" class="btn btn-link" data-toggle="modal" data-target="#date-modal"></button>
<div class="modal fade" id="date-modal" tabindex="-1" aria-labelledby="dateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dateLabel">التاريخ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updateDate(this); return false;">
                <div class="modal-body">
                    <input type="hidden" name="row_id">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="date" class="col-form-label">التاريخ</label>
                                <input required type="date" class="form-control" name="date" id="update-date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="dismiss-date-modal" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<button id="update-period-modal" type="button" style="display: none;" class="btn btn-link" data-toggle="modal" data-target="#periods"></button>
<div class="modal fade" id="periods" tabindex="-1" aria-labelledby="periodsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="periodsLabel">الحصة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updatePeriod(this); return false;">
                <div class="modal-body">
                    <input type="hidden" name="row_id">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="periods-selector">الحصة</label>
                                <select required class="form-control" name="period" id="update-periods-selector">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="dismiss-periods-modal" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-2">
                <table id="content-table" class="table table-striped " style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>م</th>
                            <th>رقم الطالب</th>
                            <th>اسم الطالب</th>
                            <th>الصف</th>
                            <th>الفصل</th>
                            <th>جوال ولي الامر</th>
                            <th>حالة الرصد</th>
                            <th>الحصة</th>
                            <th>اليوم</th>
                            <th>تاريخ الرصد</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <style>
    table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: transparent;
    }

    table th,
    table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }

    table {
        border: 1px solid #dee2e6;
    }

    table th,
    table td {
        border: 1px solid #dee2e6;
    }

    table thead th,
    table thead td {
        border-bottom-width: 2px;
    }

    table tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }
</style> -->
<?php include_once(APPPATH . 'views/school/layouts/postContent.php') ?>

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
<script src="<?php echo base_url() . '/public/'; ?>Excel/jquery.table2excel.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />

<script>
    var school_id = 24;
    var user_id = 24;
    var dataTable = null;
    var studentsData = [];

    $(document).ready(function() {
        dataTable = $('#content-table').DataTable({
            dom: `<"row d-flex"<"col-md-6 d-flex"fl><"col-md-6  d-flex align-items-center "<"m-right-auto"B>>>rtip`,
            "lengthMenu": [
                [25, 50, 100, 500],
                [25, 50, 100, 500]
            ],
            order: [
                [2, 'asc']
            ],

            responsive: true,
            autoWidth: false,
            rowId: 'student_id',
            columns: [{
                    "className": 'details-control align-middle',
                    "orderable": false,
                    searchable: false,
                    exportable: false,
                    "data": null,
                    "defaultContent": ''
                },
                {
                    data: 'student_id',
                    className: 'text-center align-middle',
                    title: `<input type="checkbox"  id="select-all">`,
                    orderable: false,
                    searchable: false,
                    exportable: false,
                    render: function(data, type, row, meta) {
                        return `<input type="checkbox" class='align-middle' value='${data}' name="students[]" id="${data}"/>`;
                    }
                },
                {
                    data: 'student_id',
                    name: 'student_id',
                    title: 'م',
                    className: 'text-center t-student_id align-middle',
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
                    title: 'حالة الرصد',
                    render: function(data, type, row, meta) {
                        if (data) {
                            return data;
                        } else {
                            return `<button class="btn btn-link status-btn button-status-${row.student_id}" style="color: #212529;" id="button-status-${row.student_id}" onclick="showUpdateStatusModal(${row.student_id})">تحديد</button>`;
                        }

                    }
                },
                {
                    data: 'period',
                    name: 'period',
                    className: 'text-center t-period align-middle',
                    title: 'الحصة',
                    render: function(data, type, row, meta) {
                        if (data) {
                            return data;
                        } else {
                            return `<button class="btn btn-link period-btn button-period-${row.student_id}" style="color: #212529;" id="button-period-${row.student_id}" onclick="showUpdatePeriodModal(${row.student_id})">تحديد</button>`;
                        }
                    }
                },
                {
                    data: 'day',
                    name: 'day',
                    className: 'text-center t-day align-middle',
                    title: 'اليوم',
                    render: function(data, type, row, meta) {
                        if (data) {
                            return data;
                        } else {
                            return `<button class="btn btn-link day-btn button-day-${row.student_id}" style="color: #212529;" id="button-day-${row.student_id}" onclick="showUpdateDayModal(${row.student_id})">تحديد</button>`;
                        }
                    }
                },
                {
                    data: 'date',
                    name: 'date',
                    className: 'text-center t-date align-middle',
                    title: 'التاريخ',
                    render: function(data, type, row, meta) {
                        if (data) {
                            return data;
                        } else {
                            return `<button class="btn btn-link date-btn button-date-${row.student_id}" style="color: #212529;" id="button-date-${row.student_id}" onclick="showUpdateDateModal(${row.student_id})">تحديد</button>`;
                        }
                    }
                },

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
                                filename: "تقرير الحضور", //do not include extension
                                fileext: ".xls", // file extension
                                exclude_inputs: true
                            });
                        }
                    }, {
                        text: 'طباعة',
                        action: function(e, dt, node, config) {
                            var tableContainer = $('#content-table').clone();
                            tableContainer.css('border-collapse', 'collapse');
                            tableContainer.css('font-family', 'Arial, Helvetica, sans-serif');

                            tableContainer.find('button').each(function(index, value) {
                                JElement = $(value);
                                if (JElement.html() != 'تحديد') {
                                    JParentElement = JElement.parent().html(JElement.html());
                                } else {
                                    JParentElement = JElement.parent().html('');
                                }

                            });
                            tableContainer.find('td').each(function(index, value) {
                                $(value).css('border', ' 0.6px solid #dee2e6');
                                $(value).css('padding', ' 8px');
                                $(value).css('display', '');

                            });

                            tableContainer.find('th').each(function(index, value) {
                                $(value).css('border', ' 1px solid #dee2e6');
                                $(value).css('display', '');
                            });


                            var pageTitle = 'تقرير الحضور'+' (الصف:'+ $('#classes-selector').val()+ ' , الفصل: '+$('#semesters-selector').val()+')',
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
        refreshContentTable();
        getClasses();
        getSemesters();
        getPeriods();

        $('#select-all').change(function() {
            if (this.checked) {
                selects();
            } else {
                deSelect();
            }
        });

        $('.determenators').change(function() {
            refreshContentTable();
        });


    });

    function refreshContentTable() {
        var jqxhr = $.ajax({
                url: "https://sa.arsail.net/schools/Schools/GetStudentAbsenceAndLag",
                method: "GET",
                timeout: 0,
                data: {
                    school_id: school_id,
                    class_id: $('#classes-selector').val(),
                    semaster_id: $('#semesters-selector').val(),
                    page: "1",
                    limit: "7000"
                },
                headers: {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTAyLTIyIiwiZXhwIjoiMjAyMi0wMi0yMiIsImRhdGEiOiIyMyJ9.ZITmmvk9fnZXo8Bfy30vw8uYK2kGZeN_M8XFPErmr_w"
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

    function getClasses() {
        var jqxhr = $.ajax({
                url: "https://sa.arsail.net/schools/Schools/GetClasses",
                method: "GET",
                timeout: 0,
                headers: {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTAyLTIyIiwiZXhwIjoiMjAyMi0wMi0yMiIsImRhdGEiOiIyMyJ9.ZITmmvk9fnZXo8Bfy30vw8uYK2kGZeN_M8XFPErmr_w"
                },
            })
            .done(function(response) {
                setClassesOptions(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحميل البيانات!', 'خطأ');
            });

    }

    function getSemesters() {
        var jqxhr = $.ajax({
                url: "https://sa.arsail.net/schools/Schools/GetSemester",
                method: "GET",
                timeout: 0,
                headers: {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTAyLTIyIiwiZXhwIjoiMjAyMi0wMi0yMiIsImRhdGEiOiIyMyJ9.ZITmmvk9fnZXo8Bfy30vw8uYK2kGZeN_M8XFPErmr_w"
                },
            })
            .done(function(response) {
                setSemestersOptions(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحميل البيانات!', 'خطأ');
            });

    }

    function getPeriods() {
        var jqxhr = $.ajax({
                url: "https://sa.arsail.net/schools/Schools/GetPeriods?school_id=" + school_id,
                method: "GET",
                timeout: 0,
                headers: {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTAyLTIyIiwiZXhwIjoiMjAyMi0wMi0yMiIsImRhdGEiOiIyMyJ9.ZITmmvk9fnZXo8Bfy30vw8uYK2kGZeN_M8XFPErmr_w"
                },
            })
            .done(function(response) {
                setPeriodsOptions(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحميل البيانات!', 'خطأ');
            });

    }
    // set classes options in classes select box
    function setClassesOptions(data) {
        var classSelect = $('#classes-selector');
        $.each(data, function(index, val) {
            classSelect.append($('<option>', {
                value: val.id,
                text: val.name + ' ' + val.code,
            }));
        });
    }
    // set semester options in semesters select box
    function setSemestersOptions(data) {
        var semesterSelect = $('#semesters-selector');
        $.each(data, function(index, val) {
            semesterSelect.append($('<option>', {
                value: val.id,
                text: val.name,
            }));
        });
    }
    // set semester options in semesters select box
    function setPeriodsOptions(data) {
        var periodsSelect = $('#periods-selector');
        var updatePeriodsSelect = $('#update-periods-selector');

        $.each(data, function(index, val) {
            periodsSelect.append($('<option>', {
                value: val.name,
                text: val.name,
            }));
            updatePeriodsSelect.append($('<option>', {
                value: val.name,
                text: val.name,
            }));
        });
    }

    function selects() {
        var ele = document.getElementsByName('students[]');
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox')
                ele[i].checked = true;
        }
    }

    function deSelect() {
        var ele = document.getElementsByName('students[]');
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox')
                ele[i].checked = false;

        }
    }

    function showUpdateStatusModal(id) {
        var oldValue = $('tr#' + id).children('.t-monitoring_case').html();

        $('input[name="row_id"]').each(function(index, value) {
            $(value).val(id);
        });

        $('#set_attendance_status').val(oldValue);
        $('#update-status-modal').click()
    }

    function showUpdatePeriodModal(id) {
        var oldValue = $('tr#' + id).children('.t-period').html();

        $('input[name="row_id"]').each(function(index, value) {
            $(value).val(id);
        });

        $('#update-periods-selector').val(oldValue);
        $('#update-period-modal').click()
    }

    function showUpdateDayModal(id) {
        var oldValue = $('tr#' + id).children('.t-day').html();

        $('input[name="row_id"]').each(function(index, value) {
            $(value).val(id);
        });

        $('#update-day').val(oldValue);
        $('#update-day-modal').click()
    }

    function showUpdateDateModal(id) {
        var oldValue = $('tr#' + id).children('.t-date').html();

        $('input[name="row_id"]').each(function(index, value) {
            $(value).val(id);
        });

        $('#update-date').val(oldValue);
        $('#update-date-modal').click()
    }

    function updateStatus(element) {
        console.log(1);
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('.button-status-' + formData.row_id).each(function(index, value) {
            $(value).html(formData.attendance_status);

            if (formData.attendance_status == 'اختر حالة') {
                $(value).css('color', '#000')
            } else if (formData.attendance_status == 'حاضر') {
                $(value).css('color', '#28a745')
            } else {
                $(value).css('color', '#dc3545')
            }
        });
    }

    function updatePeriod(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('.button-period-' + formData.row_id).each(function(index, value) {
            $(value).html(formData.period);
        });

    }

    function updateDay(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('.button-day-' + formData.row_id).each(function(index, value) {
            $(value).html(formData.day);
        });
    }

    function updateDate(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('.button-date-' + formData.row_id).each(function(index, value) {
            $(value).html(formData.date);
        });

    }

    function updateMultiFullStatus(element) {
        var selectedStudents = [];
        var studentCheckBoxes = document.getElementsByName('students[]');
        for (var i = 0; i < studentCheckBoxes.length; i++) {
            if (studentCheckBoxes[i].type == 'checkbox' && studentCheckBoxes[i].checked) {
                selectedStudents.push(studentCheckBoxes[i].value)
            }
        }
        console.log(selectedStudents);

        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        for (var i = 0; i < selectedStudents.length; i++) {

            $('.button-status-' + selectedStudents[i]).each(function(index, value) {
                $(value).html(formData.attendance_status);

                if (formData.attendance_status == 'اختر حالة') {
                    $(value).css('color', '#000')
                } else if (formData.attendance_status == 'حاضر') {
                    $(value).css('color', '#28a745')
                } else {
                    $(value).css('color', '#dc3545')
                }
            });

            $('.button-period-' + selectedStudents[i]).each(function(index, value) {
                $(value).html(formData.period);
            });

            $('.button-day-' + selectedStudents[i]).each(function(index, value) {
                $(value).html(formData.day);
            });

            $('.button-date-' + selectedStudents[i]).each(function(index, value) {
                $(value).html(formData.date);
            });

        }
    }

    function checkBeforSend() {
        if (confirm('هل انت متأكد من ارسال الاشعارات؟')) {
            checkAndSendNotifications();
        }
    }

    function checkAndSendNotifications() {

        console.log('checkAndSendNotifications');
        for (let i = 0; i < studentsData.length; i++) {
            var status = $('button#button-status-' + studentsData[i].student_id).html();
            var period = $('button#button-period-' + studentsData[i].student_id).html();
            var day = $('button#button-day-' + studentsData[i].student_id).html();
            var date = $('button#button-date-' + studentsData[i].student_id).html();
            // status != 'حاضر' &&
            // console.log([status, period, day, date, studentsData[i].student_id, studentsData]);
            if (status != 'تحديد' && status != studentsData.monitoring_case && period != 'تحديد' && day != 'تحديد' && date != 'تحديد') {
                sendNotifications(studentsData[i].student_id, studentsData[i].class_id, studentsData[i].semaster_name, status, period, day, date);
            }
        }
    }

    function sendNotifications(students_id, class_id, semaster_name, status, period, day, date) {

        var jqxhr = $.ajax({
                "url": "https://sa.arsail.net/schools/Schools/SendAbsenceAndLag",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTAxLTI5IiwiZXhwIjoiMjAyMi0wMS0yOSIsImRhdGEiOnsidXNlcl9pZCI6MTh9fQ.1EfRPKk8zdCvjmn7qkVRKflJDtJjaoN0R_xvphe1No0",
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "students_id": students_id,
                    "class_id": class_id,
                    "semaster_id": semaster_name,
                    "monitoring_case": status,
                    "period": period,
                    "day": day,
                    "date": date,
                    "school_id": school_id
                }
            })
            .done(function(response) {
                refreshContentTable();
                toastr.success('تم تحديث حالة الغياب')
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
            }).always(function() {
                $('#edit-employee-submit').removeAttr('disabled');
                $('#edit-spinner').hide();
            });
    }

</script>

