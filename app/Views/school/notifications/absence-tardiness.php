<?php require(APPPATH . 'Views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col-sm ">
            إشعارات الغياب والتأخر
        </div>
        <div class="col-sm-3">
            <span>
                عدد الرسائل الكلي
            </span>
            <span id="total-messages-number"></span>
        </div>
    </div>
</div>

<?php require(APPPATH . 'Views/school/layouts/notifications-service-status.php') ?>

<div class="row mt-4  mb-4" style="font-size: 1rem;">
    <div class="col-lg-4">
        <div class="form-group">
            <select required class="form-control determenators" name="" id="edu-type-selector">
                <option value="0">النظام</option>
                <option value="1">عام</option>
                <option value="2">مقررات</option>
            </select>
        </div>
    </div>

    <div id="students-determenators" class="col-lg-8" style="display: none;">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <select required class="form-control determenators" name="submit-type" id="classes-selector">
                        <option>الصف</option>
                        <option value="">الكل</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <select required class="form-control determenators" name="submit-type" id="semesters-selector">
                        <option>الفصل</option>
                        <option value="">الكل</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div id="courses-students-determenators" class="col-lg-8" style="display: none;">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <select required class="form-control determenators" name="" id="levels">
                        <option value="">المستوى</option>
                        <option value="">الكل</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <select required class="form-control determenators" name="" id="divisions">
                        <option value="">الشعبة</option>
                        <option value="">الكل</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg">
        <button type="button" id="registeration-btn" style="width: inherit; background-color: #fff;" class="btn btn-light" data-toggle="modal" data-target="#add-temblate">رصد</button>
        <div class="form-group">
        </div>
    </div>

    <div class="col-lg">
        <button type="button" id="send-btn" style="width: inherit; background-color: #fff;" onclick="sendNotificationsToSelected()" class="btn btn-light">
            <div id="spinner" style="display: none;">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="sr-only">Loading...</span>
            </div>
            <div id="send-btn-txt">
                ارسال للمحدد
            </div>

        </button>
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
                                <label for="hijri-date-picker" class="col-form-label">التاريخ</label>
                                <input required type="text" class="form-control" id="hijri-date-picker">
                                <input required type="hidden" name="date" class="form-control" id="date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="template-selector" class="col-form-label">قالب الرسالة</label>
                                <select required class="form-control" name="template" id="template-selector">
                                    <option title="" value=""></option>
                                </select>
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
                                <input required type="text" class="form-control" id="hijri-date-picker-updateOne">
                                <input required type="hidden" class="form-control" name="date" id="update-date">
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
            <div class="card-body p-2" style="overflow-x: scroll;">
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
                            <th>الرسالة</th>
                            <th>عدد الرسائل</th>
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


<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/public/'; ?>design/css/datatable.all.css" />

<script>
    var dataTable = null;
    var studentsData = [];


    //Hijri date bicker configration
    $("#hijri-date-picker-updateOne").hijriDatePicker({
        locale: "ar-sa",
        format: "DD-MM-YYYY",
        hijriFormat: "iYYYY-iMM-iDD",
        dayViewHeaderFormat: "MMMM YYYY",
        hijriDayViewHeaderFormat: "iMMMM iYYYY",
        showSwitcher: true,
        allowInputToggle: true,
        useCurrent: false,
        isRTL: true,
        keepOpen: false,
        hijri: true,
        debug: false,
        showClear: true,
        showTodayButton: false,
        showClose: true,
    });

    $("#hijri-date-picker-updateOne").on('dp.change', function(arg) {

        if (!arg.date) {
            $("#date").val('');
            return;
        };
        let date = arg.date;
        $("input#update-date").val(date.format("YYYY-MM-DD"));
    });

    $(document).ready(function() {
        dataTable = $('#content-table').DataTable({
            dom: `<"row d-flex justify-content-end mx-1 my-1 mb-3 "B><"row d-flex justify-content-between mx-1 "fl>rtip`,
            "lengthMenu": [
                [25, 50, 100, 200],
                [25, 50, 100, 200]
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
                    className: `text-center t-full_name align-middle`,
                    title: 'اسم الطالب',
                    render: function(data, type, row, meta) {
                        return `<div id="t-student-name-${row.student_id}">${data}</div>`;
                    }
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
                    title: 'جوال ولي الامر',
                    render: function(data, type, row, meta) {
                        return `<span class="span-phone-${row.student_id}" id="span-phone-${row.student_id}")">${data? data : 'لا يوجد'}</span>`;
                    }
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
                            return `<button class="btn btn-link day-btn button-day-${row.student_id}" style="color: #212529;" id="button-day-${row.student_id}" onclick="showUpdateDayModal(${row.student_id})">تحديد</button>
                            <div class="class-student-${row.student_id}" id="class-student-${row.student_id}" style="display: none;">${row.class_id}</div>
                            <div class="semesters-student-${row.student_id}" id="semesters-student-${row.student_id}" style="display: none;">${row.semaster_name}</div>`;
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
                {
                    data: 'student_id',
                    className: 'text-center t-date align-middle',
                    title: 'عدد الرسائل',
                    render: function(data, type, row, meta) {
                        return `<div class="t-message-number-${data} s-messages-number" id="t-message-number-${data}"></div>`;
                    }
                },
                {
                    data: 'student_id',
                    className: 'text-center t-date align-middle',
                    title: 'نص رسالة الرصد',
                    render: function(data, type, row, meta) {
                        return `<div class="t-message-student-${data}" id="t-message-student-${data}"></div>`;
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


                            var pageTitle = 'تقرير الحضور' + ' (الصف:' + $('#classes-selector').val() + ' , الفصل: ' + $('#semesters-selector').val() + ')',
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

    function setListenrs() {
        $('#select-all').change(function() {
            if (this.checked) {
                selects();
            } else {
                deSelect();
            }
        });
    }

    $(document).ready(function() {
        // refreshStudentsContentTable();
        getClasses();
        getSemesters();
        getPeriods();
        getTemplates()
        levels();
        divisions();

        $('#select-all').change(function() {
            if (this.checked) {
                selects();
            } else {
                deSelect();
            }
        });

        $('.determenators').change(function() {

            if ($("#edu-type-selector").val() == 1) {
                dataTable.destroy();
                buildStudentsTable();
                refreshStudentsContentTable();
                $("#students-determenators").show();
                $("#courses-students-determenators").hide();
            } else if ($("#edu-type-selector").val() == 2) {
                dataTable.destroy();
                buildCourseStudentsTable();
                refreshCourseStudentsContentTable();
                $("#courses-students-determenators").show();
                $("#students-determenators").hide();
            } else {
                dataTable.clear().draw();
                $("#courses-students-determenators").hide();
                $("#students-determenators").hide();
            }
            setListenrs();
        });


    });


    function buildCourseStudentsTable() {
        dataTable = $('#content-table').DataTable({
            dom: `<"row d-flex justify-content-end mx-1 my-1 mb-3 "B><"row d-flex justify-content-between mx-1 "fl>rtip`,
            "lengthMenu": [
                [25, 50, 100, 200],
                [25, 50, 100, 200]
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
                    title: `<input type="checkbox"  id="select-all">`,
                    orderable: false,
                    searchable: false,
                    exportable: false,
                    render: function(data, type, row, meta) {
                        return `<input type="checkbox" class='align-middle' value='${data}' name="students[]" id="${data}"/>`;
                    }
                },
                {
                    data: 'id',
                    name: 'id',
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
                    data: 'student_name',
                    name: 'student_name',
                    className: `text-center t-student_name align-middle`,
                    title: 'اسم الطالب',
                    render: function(data, type, row, meta) {
                        return `<div id="t-student-name-${row.id}">${data}</div>`;
                    }
                },
                {
                    data: 'level',
                    name: 'level',
                    className: 'text-center t-level align-middle',
                    title: 'المستوى',
                },
                {
                    data: 'division',
                    name: 'division',
                    className: 'text-center t-division align-middle',
                    title: 'الشعبة'
                },
                {
                    data: 'phone',
                    name: 'phone',
                    className: 'text-center t-phone align-middle',
                    title: 'جوال ولي الامر',
                    render: function(data, type, row, meta) {
                        return `<span class="span-phone-${row.id}" id="span-phone-${row.id}")">${data? data : 'لا يوجد'}</span>`;
                    }
                },
                {
                    data: null,
                    name: 'monitoring_case',
                    className: 'text-center t-monitoring_case align-middle',
                    title: 'حالة الرصد',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-link status-btn button-status-${row.id}" style="color: #212529;" id="button-status-${row.id}" onclick="showUpdateStatusModal(${row.id})">تحديد</button>`;

                    }
                },
                {
                    data: null,
                    name: 'period',
                    className: 'text-center t-period align-middle',
                    title: 'الحصة',
                    render: function(data, type, row, meta) {

                        return `<button class="btn btn-link period-btn button-period-${row.id}" style="color: #212529;" id="button-period-${row.id}" onclick="showUpdatePeriodModal(${row.id})">تحديد</button>`;
                    }
                },
                {
                    data: null,
                    name: 'day',
                    className: 'text-center t-day align-middle',
                    title: 'اليوم',
                    render: function(data, type, row, meta) {

                        return `<button class="btn btn-link day-btn button-day-${row.id}" style="color: #212529;" id="button-day-${row.id}" onclick="showUpdateDayModal(${row.id})">تحديد</button>
                            <div class="level-student-${row.id}" id="level-student-${row.id}" style="display: none;">${row.level}</div>
                            <div class="division-student-${row.id}" id="division-student-${row.id}" style="display: none;">${row.division}</div>`;
                    }
                },
                {
                    data: null,
                    name: 'date',
                    className: 'text-center t-date align-middle',
                    title: 'التاريخ',
                    render: function(data, type, row, meta) {

                        return `<button class="btn btn-link date-btn button-date-${row.id}" style="color: #212529;" id="button-date-${row.id}" onclick="showUpdateDateModal(${row.id})">تحديد</button>`;
                    }
                },
                {
                    data: 'id',
                    className: 'text-center t-date align-middle',
                    title: 'عدد الرسائل',
                    render: function(data, type, row, meta) {
                        return `<div class="t-message-number-${row.id} s-messages-number" id="t-message-number-${row.id}"></div>`;
                    }
                },
                {
                    data: 'id',
                    className: 'text-center t-date align-middle',
                    title: 'نص رسالة الرصد',
                    render: function(data, type, row, meta) {
                        return `<div class="t-message-student-${data}" id="t-message-student-${data}"></div>`;
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


                            var pageTitle = 'تقرير الحضور' + ' (الصف:' + $('#classes-selector').val() + ' , الفصل: ' + $('#semesters-selector').val() + ')',
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
    }

    function buildStudentsTable() {
        dataTable = $('#content-table').DataTable({
            dom: `<"row d-flex justify-content-end mx-1 my-1 mb-3 "B><"row d-flex justify-content-between mx-1 "fl>rtip`,
            "lengthMenu": [
                [25, 50, 100, 200],
                [25, 50, 100, 200]
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
                    className: `text-center t-full_name align-middle`,
                    title: 'اسم الطالب',
                    render: function(data, type, row, meta) {
                        return `<div id="t-student-name-${row.student_id}">${data}</div>`;
                    }
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
                    title: 'جوال ولي الامر',
                    render: function(data, type, row, meta) {
                        return `<span class="span-phone-${row.student_id}" id="span-phone-${row.student_id}")">${data? data : 'لا يوجد'}</span>`;
                    }
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
                            return `<button class="btn btn-link day-btn button-day-${row.student_id}" style="color: #212529;" id="button-day-${row.student_id}" onclick="showUpdateDayModal(${row.student_id})">تحديد</button>
                            <div class="class-student-${row.student_id}" id="class-student-${row.student_id}" style="display: none;">${row.class_id}</div>
                            <div class="semesters-student-${row.student_id}" id="semesters-student-${row.student_id}" style="display: none;">${row.semaster_name}</div>`;
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
                {
                    data: 'student_id',
                    className: 'text-center t-date align-middle',
                    title: 'عدد الرسائل',
                    render: function(data, type, row, meta) {
                        return `<div class="t-message-number-${data} s-messages-number" id="t-message-number-${data}"></div>`;
                    }
                },
                {
                    data: 'student_id',
                    className: 'text-center t-date align-middle',
                    title: 'نص رسالة الرصد',
                    render: function(data, type, row, meta) {
                        return `<div class="t-message-student-${data}" id="t-message-student-${data}"></div>`;
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


                            var pageTitle = 'تقرير الحضور' + ' (الصف:' + $('#classes-selector').val() + ' , الفصل: ' + $('#semesters-selector').val() + ')',
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
    }

    function refreshCourseStudentsContentTable() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Courses/GetCourses",
                method: "GET",
                timeout: 0,
                data: {
                    school_id: school_id,
                    level_id: $("#levels").val(),
                    division_id: $("#divisions").val(),
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
                toastr.error(response.responseJSON.msg, 'خطأ');
            });

    }

    function refreshStudentsContentTable() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Schools/GetStudentAbsenceAndLag",
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
                    "Authorization": token
                },
            })
            .done(function(response) {

                studentsData = response.data;

                dataTable.clear().rows.add(response.data).draw()
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
            });

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
                toastr.error(response.responseJSON.msg, 'خطأ');
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
                toastr.error(response.responseJSON.msg, 'خطأ');
            });

    }

    function getPeriods() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Schools/GetPeriods?school_id=" + school_id,
                method: "GET",
                timeout: 0,
                headers: {
                    "Authorization": token
                },
            })
            .done(function(response) {
                setPeriodsOptions(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
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
        var oldValue = $('tr#' + id).children('.t-date').children('button').html();

        $('input[name="row_id"]').each(function(index, value) {
            $(value).val(id);
        });

        $('#hijri-date-picker-updateOne').val(oldValue != "تحديد" ? oldValue : '');
        $('#update-date-modal').click()
    }

    function updateStatus(element) {
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

        putPreparedMessageData(formData.attendance_status, $("#button-period-" + formData.row_id).html(), $("#button-day-" + formData.row_id).html(), moment($("#button-date-" + formData.row_id).html(), "iYYYY/iM/iD").format("YYYY-MM-DD"), formData.row_id);
        $(element).closest(".modal").modal('toggle');
    }

    function updatePeriod(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('.button-period-' + formData.row_id).each(function(index, value) {
            $(value).html(formData.period);
        });

        putPreparedMessageData($("#button-status-" + formData.row_id).html(), formData.period, $("#button-day-" + formData.row_id).html(), moment($("#button-date-" + formData.row_id).html(), "iYYYY/iM/iD").format("YYYY-MM-DD"), formData.row_id);
        $(element).closest(".modal").modal('toggle');
    }

    function updateDay(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('.button-day-' + formData.row_id).each(function(index, value) {
            $(value).html(formData.day);
        });

        putPreparedMessageData($("#button-status-" + formData.row_id).html(), $("#button-period-" + formData.row_id).html(), formData.day, moment($("#button-date-" + formData.row_id).html(), "iYYYY/iM/iD").format("YYYY-MM-DD"), formData.row_id);
        $(element).closest(".modal").modal('toggle');
    }

    function updateDate(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('.button-date-' + formData.row_id).each(function(index, value) {
            $(value).html(moment(formData.date, "YYYY-MM-DD").format("iYYYY/iM/iD"));
        });

        putPreparedMessageData($("#button-status-" + formData.row_id).html(), $("#button-period-" + formData.row_id).html(), $("#button-day-" + formData.row_id).html(), formData.date, formData.row_id);
        $(element).closest(".modal").modal('toggle');
    }

    function getSelectedStudents() {
        var selectedStudents = [];
        var studentCheckBoxes = document.getElementsByName('students[]');
        for (var i = 0; i < studentCheckBoxes.length; i++) {
            if (studentCheckBoxes[i].type == 'checkbox' && studentCheckBoxes[i].checked) {
                selectedStudents.push(studentCheckBoxes[i].value)
            }
        }

        return selectedStudents;
    }

    function updateMultiFullStatus(element) {
        var selectedStudents = getSelectedStudents();

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
                $(value).html(moment(formData.date, "YYYY-MM-DD").format("iYYYY/iM/iD"));
            });

            $('.t-message-student-' + selectedStudents[i]).each(function(index, value) {

                putPreparedMessageData(formData.attendance_status, formData.period, formData.day, formData.date, selectedStudents[i]);

            });

        }
    }

    function putPreparedMessageData(attendance_status, period, day, date, studentID) {

        var studentName = $('#t-student-name-' + studentID).html();
        var templateText = $("#template-selector").find(":selected").attr("title");

        if (!templateText) {
            alert("يرجى تحديد قالب لعرض الرسائل وعددها!");
            // $("#registeration-btn").click();
            $('#add-temblate').modal('toggle');

            $("#template-selector").focus();

        } else {
            var message = getPreparedTemplateMessage(attendance_status, period, day, date, studentName, templateText);
            $('#t-message-student-' + studentID).html(message);
            $("#t-message-number-" + studentID).html(getMessagesNumberForText(message));
        }
        getTotalMessagesNumber()
    }


    function getPreparedTemplateMessage(attendance_status, period, day, date, student_name, template) {

        if (attendance_status != 'حاضر' && attendance_status != 'تحديد') {
            if (template.includes("@STATUS@")) {
                template = template.replaceAll('@STATUS@', attendance_status); //replaceAll
            }

            if (template.includes("@STUDENT@")) {
                template = template.replaceAll('@STUDENT@', student_name);
            }

            if (template.includes("@DATE@")) {
                template = template.replaceAll('@DATE@', moment(date, "YYYY-MM-DD").format("iYYYY/iM/iD"));
            }

            if (template.includes("@DAY@")) {
                template = template.replaceAll('@DAY@', day);
            }

            if (template.includes("@PERIOD@")) {
                template = template.replaceAll('@PERIOD@', period);
            }
        } else {
            template = '';
        }


        return template;

    }

    function getMessagesNumberForText(messageText) {
        var messageLength = messageText.length;

        if (messageText.includes("@URL@")) {
            messageLength += 22;
        }

        if (messageText.split(/\r\n|\r|\n/).length > 1) {
            messageLength += (messageText.split(/\r\n|\r|\n/).length - 1);
        }

        var messagesNumber = 0;
        if (messageLength != 0) {
            if (messageLength <= 70) {
                var messagesNumber = parseInt((messageLength - 1) / 70) + 1;
            } else {
                var messagesNumber = parseInt((messageLength - 1) / 67) + 1;
            }
        }

        return messagesNumber;

    }


    function sendNotificationsToSelected() {

        var selectedRows = getSelectedStudents();
        console.log(selectedRows);
        var dataToSend = [];
        var totalSelectedMessageNumber = 0;
        var totalNotificationToSend = 0;
        var eduType = $("#edu-type-selector").val();

        for (let i = 0; i < selectedRows.length; i++) {

            student_id = selectedRows[i];


            var toSend = 0;
            var attendance_status = $("#button-status-" + student_id).html();
            var phone = $("#span-phone-" + student_id).html();
            console.log(attendance_status, phone);

            if (attendance_status != 'حاضر' && attendance_status != 'تحديد' && phone != 'لا يوجد') {
                totalSelectedMessageNumber += parseInt($("#t-message-number-" + student_id).html()) ? parseInt($("#t-message-number-" + student_id).html()) : 0;
                totalNotificationToSend++;
                toSend = 1;
            }

            if (eduType == 1 && toSend == 1) {
                dataToSend.push({
                    isToSend: toSend,
                    school: school_id,
                    studentId: student_id,
                    message: $("#t-message-student-" + student_id).html(),
                    studentName: $("#t-student-name-" + student_id).html(),
                    period: $("#button-period-" + student_id).html(),
                    day: $("#button-day-" + student_id).html(),
                    date: moment($("#button-date-" + student_id).html(), "iYYYY/iM/iD").format("YYYY-MM-DD"),
                    attendance_status: attendance_status,
                    phone: phone,
                    class_id: $("#class-student-" + student_id).html(),
                    semaster_id: $("#semesters-student-" + student_id).html(),
                });

            } else if (eduType == 2 && toSend == 1) {
                dataToSend.push({
                    isToSend: toSend,
                    school: school_id,
                    studentId: student_id,
                    message: $("#t-message-student-" + student_id).html(),
                    studentName: $("#t-student-name-" + student_id).html(),
                    period: $("#button-period-" + student_id).html(),
                    day: $("#button-day-" + student_id).html(),
                    date: moment($("#button-date-" + student_id).html(), "iYYYY/iM/iD").format("YYYY-MM-DD"),
                    attendance_status: attendance_status,
                    phone: phone,
                    level_id: $("#level-student-" + student_id).html(),
                    division_id: $("#division-student-" + student_id).html(),
                });
            }



        }

        if (selectedRows.length > 0) {
            if (confirm(`
             هل انت متأكد من حفظ بيانات الغياب ل${selectedRows.length} طالب
             وارسال اشعارات الى ${totalNotificationToSend}  طالب
             علما ان كلفة الرصيد المخصوم ${totalSelectedMessageNumber} رسالة`)) {

                if ($("#edu-type-selector").val() == 1) {
                    sendToGeneralNotifications(dataToSend);
                } else if ($("#edu-type-selector").val() == 2) {
                    sendToCourseNotifications(dataToSend);
                }
            }

        } else {
            alert('حدد عناصر اولاً!');
        }

    }

    function sendNotifications(data = []) {


        $('#send-btn').attr("disabled", true);
        $('#spinner').show();
        $('#send-btn-txt').hide();


        var jqxhr = $.ajax({
                "url": "<?= site_url('') ?>Schools/SendAbsenceAndLagNotifications",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "school_id": school_id,
                    "data": JSON.stringify(data),
                    "notifications_type": $("#edu-type-selector").val(),
                }
            })
            .done(function(response) {
                // refreshStudentsContentTable();
                console.log(response);
                toastr.success(response.msg);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
            }).always(function() {
                $('#send-btn').removeAttr('disabled');
                $('#spinner').hide();
                $('#send-btn-txt').show();
            });
    }

    function sendToGeneralNotifications(data = []) {


        $('#send-btn').attr("disabled", true);
        $('#spinner').show();
        $('#send-btn-txt').hide();


        var jqxhr = $.ajax({
                "url": "<?= site_url('') ?>Schools/SendAbsenceAndLagNotifications",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "school_id": school_id,
                    "data": JSON.stringify(data),
                    "notifications_type": $("#edu-type-selector").val(),
                }
            })
            .done(function(response) {
                // refreshStudentsContentTable();
                console.log(response);
                toastr.success(response.msg);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
            }).always(function() {
                $('#send-btn').removeAttr('disabled');
                $('#spinner').hide();
                $('#send-btn-txt').show();
            });
    }

    function sendToCourseNotifications(data = []) {


        $('#send-btn').attr("disabled", true);
        $('#spinner').show();
        $('#send-btn-txt').hide();


        var jqxhr = $.ajax({
                "url": "<?= site_url('') ?>Schools/SendCoursesAbsenceAndLagNotifications",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "school_id": school_id,
                    "data": JSON.stringify(data),
                    "notifications_type": $("#edu-type-selector").val(),
                }
            })
            .done(function(response) {
                // refreshStudentsContentTable();
                console.log(response);
                toastr.success(response.msg);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
            }).always(function() {
                $('#send-btn').removeAttr('disabled');
                $('#spinner').hide();
                $('#send-btn-txt').show();
            });
    }

    function getTemplates() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Templates/GetGeneralMessagingTempalte",
                method: "GET",
                timeout: 0,
                data: {
                    school_id: school_id,
                    page: "1",
                    limit: "40"
                },
                headers: {
                    "Authorization": token
                },
            })
            .done(function(response) {
                setTemplateOptions(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء تحميل بيانات القوالب!', 'خطأ');
            });
    }

    function setTemplateOptions(data) {
        var templatesSelect = $('#template-selector');
        $.each(data, function(index, val) {
            templatesSelect.append($('<option>', {
                value: val.id,
                text: val.name,
                title: val.content
            }));
        });
    }


    function getTotalMessagesNumber() {
        var totalMessagesNumber = 0;
        $('.s-messages-number').each(function(index, value) {
            totalMessagesNumber += parseInt($(value).html()) ? parseInt($(value).html()) : 0;
        });
        // console.log(totalMessagesNumber);
        $("#total-messages-number").html(totalMessagesNumber);

        return totalMessagesNumber;
    }


    function levels() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>schools/GetLevels",
                method: "GET",
                timeout: 0,
                headers: {
                    "Authorization": token,
                },
                data: {
                    school_id: school_id
                }
            })
            .done(function(response) {
                setLevelsOptions(response.data)
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
            });

    }

    function divisions() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Schools/GetDivisions",
                method: "GET",
                timeout: 0,
                headers: {
                    "Authorization": token
                },
                data: {
                    school_id: school_id
                }
            })
            .done(function(response) {
                setDivisionsOptions(response.data);
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg,
                    'خطأ ');
            });

    }

    function setLevelsOptions(data) {
        var levelSelect = $('#levels');
        $.each(data, function(index, val) {
            levelSelect.append($('<option>', {
                value: val.id,
                text: val.title
            }));
        });
    }

    function setDivisionsOptions(data) {
        var divisionSelect = $('#divisions');
        $.each(data, function(index, val) {
            console.log(val.id);
            divisionSelect.append($('<option>', {
                value: val.id,
                text: val.title,
            }));
        });
    }
</script>