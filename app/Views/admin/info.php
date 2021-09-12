<?php require(APPPATH . 'Views/admin/layouts/preContent.php'); ?>


<div class="card ">
    <div class="card-header">
        <div class="heder1" id="yu">
            <div class="card-title"> <i class="fas fa-desktop"></i> <b>المعلومات الأساسية</b>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-lg-5  d-flex align-self-baseline ">

                <label class="m-2" style="white-space: nowrap;"> رقم الدعم الفني:</label>

                <input class="form-control " id="phone" style="border-radius:5px ;box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);" type="text" name="" value="" placeholder="966+">
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-3  "><label class="">شعار النظام:</label></div>
                    <div class="col-lg-6">
                        <img id="image" src="<?php echo (base_url() . '/public/12.png'); ?>" class="img-thumbnail img2" style="width: 50%;box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);">

                        <div class="input-group" style="display: block;">
                            <label for="file" class="btn btn-success" style="margin-top: 6px;color: #fff;
                          background-color: #5883ba;width: 50%;
                           border-color: #ffffff; ">أختر صورة <i class="far fa-folder-open"></i></label>

                            <input class="btn btn-success a1" type="file" name="" style="margin-top: 6px;display:none;" id="file">
                            <h6 class="help-block sp1" style="display: block">أضف PNG أو JPG فقط
                            </h6>

                        </div>
                    </div>

                </div>
            </div>


        </div>
        <div class="row l1">
            <div class="col-md-6 d-flex align-self-baseline">

                <label class="m-2" style="white-space: nowrap;">جملة الحقوق: </label>
                <textarea name="" id="copyright" class="form-control " rows="3" style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);  "></textarea>
            </div>
        </div>

        <hr>

        <div class="d-flex justify-content-end">
            <a class="btn btn-success m-2" style="color: #fff; background-color: #1bc5bd; border-color: #1bc5bd;">الغاء</a>
            <a class="btn btn-success m-2" onclick="setBasicData()" id="" style="color: #fff; background-color: #1bc5bd; border-color: #1bc5bd;">تحديث</a>
        </div>

        <hr>

        <div class="modal fade" id="add-support" tabindex="-1" aria-labelledby="add-supportLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add-supportLabel">اضف معلومات دعم</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form onsubmit="addSupport(this); return false;">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="title">العنوان</label>
                                        <input required type="text" class="form-control" name="title" id="title">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="link">الرابط</label>
                                        <textarea required type="email" rows="2" class="form-control" name="link" id="link"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="description">الوصف</label>
                                        <textarea type="text" class="form-control" rows="4" name="description" id="description"></textarea>
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
                                    <button type="submit" id="add-support-submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="update-support" tabindex="-1" aria-labelledby="update-supportLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="update-supportLabel">تعديل معلومات دعم</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form onsubmit="upateSupport(this); return false;">
                        <input type="hidden" class="form-control" name="update_id" id="update_id">
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="update_title">العنوان</label>
                                        <input required type="text" class="form-control" name="update_title" id="update_title">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="update_link">الرابط</label>
                                        <textarea required type="email" rows="2" class="form-control" name="update_link" id="update_link"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="update_description">الوصف</label>
                                        <textarea type="text" class="form-control" rows="4" name="update_description" id="update_description"></textarea>
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
                                    <button type="submit" id="update-support-submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <button type="button" id="edit-student-btn" style="display: none;" class="btn btn-light" data-toggle="modal" data-target="#update-support"></button>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="align-items-center card-header d-flex justify-content-center text-center">
                        <div class="" style=" margin-right: auto;">
                            بيانات الدعم
                        </div>
                        <div class="mx-1" style="margin-right: auto !important;">
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#add-support">اضافة</button>

                        </div>
                    </div>
                    <div class="card-body p-2" style="overflow-x: scroll;">
                        <table id="content-table" class="table table-striped " style="width:100%">
                            <thead>

                                <tr>
                                    <th></th>
                                    <th>م</th>
                                    <th>العنوان</th>
                                    <th>الوصف</th>
                                    <th>الرابط</th>
                                    <th>خيارات</th>
                                </tr>
                            </thead>
                            <tbody></tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- /.row2 -->


<?php require(APPPATH . 'Views/admin/layouts/postContent.php'); ?>

<script src="<?php echo base_url() . '/public/'; ?>design/js/datatable.all.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/public/'; ?>design/css/datatable.all.css" />


<script>
    var dataTable = null;

    $(document).ready(function() {

        dataTable = $('#content-table').DataTable({
            dom: `<"row d-flex justify-content-between mx-1 "fl>rtip`,
            "lengthMenu": [
                [5, 10, 15, 25],
                [5, 10, 15, 25]
            ],
            order: [
                [1, 'asc']
            ],

            responsive: true,
            autoWidth: false,
            rowId: 'id',
            columns: [{
                    "className": 'details-control',
                    "orderable": false,
                    searchable: false,
                    exportable: false,
                    "data": null,
                    "defaultContent": ''
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
                    data: 'title',
                    name: 'title',
                    className: 'text-center t-title',
                    title: 'العنوان'
                },
                {
                    data: 'description',
                    name: 'description',
                    className: 'text-center t-description',
                    title: 'الوصف'
                },
                {
                    data: 'link',
                    name: 'link',
                    className: 'text-center t-link',
                    title: 'الرابط'
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
                                        <a type="button" class="btn btn-sm btn-info " title="edit" style="margin: 0px;" id="` + data + `"  onclick="editSupport('` + row.id + `','` + row.title + `','` + row.description + `','` + row.link + `')">
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
        refreshSupportTable();
    });


    function refreshSupportTable() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Support/getSupport",
                method: "GET",
                timeout: 0,
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
                    "url": "<?= site_url('') ?>Support/deleteSupport",
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
                    refreshSupportTable();
                    dataTable.row($('tr#' + id)).remove().draw();
                    toastr.success('تم حذف السجل بنجاح!')
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error('حدث خطأ ما اثناء حذف البيانات!', 'خطأ');
                })
        }
    }

    function editSupport(id, title, description, link) {

        $('#update_id').val(id);
        $('#update_title').val(title);
        $('#update_description').val(description);
        $('#update_link').val(link);

        $('#edit-student-btn').click();
    }

    function upateSupport(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('#edit-student-submit').attr("disabled", true);
        $('#edit-spinner').show();
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Support/editSupport",
                method: "POST",
                timeout: 0,
                data: {
                    "id": formData.update_id,
                    "title": formData.update_title,
                    "link": formData.update_link,
                    "description": formData.update_description,
                },
                headers: {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
            .done(function(response) {
                refreshSupportTable();
                toastr.success('تم تحديث البيانات بنجاح')
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
            }).always(function() {
                $('#edit-student-submit').removeAttr('disabled');
                $('#edit-spinner').hide();
            });
        return false;
    }

    function addSupport(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $('#add-support-submit').attr("disabled", true);
        $('#add-spinner').show();

        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Support/addSupport",
                method: "POST",
                timeout: 0,
                data: {
                    "title": formData.title,
                    "link": formData.link,
                    "description": formData.description,
                },
                headers: {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded",
                },
            })
            .done(function(response) {
                refreshSupportTable();
                toastr.success('تم اضافة البيانات بنجاح')
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');

            }).always(function() {
                $('#add-support-submit').removeAttr('disabled');
                $('#add-spinner').hide();
            });

        return false;
    }



    $(document).ready(function() {
        $.ajax({
            url: "<?= site_url('') ?>Info/GetInfo",
            method: "GET"

        }).done(function(response) {
            //  toastr.success('تم تحديث البيانات بنجاح')
            $("#copyright").val(response.data.copyright);
            $("#phone").val(response.data.phone);

        }).fail(function(response) {
            toastr.error(response.responseJSON.msg, 'خطأ');
        });
    });

    function setBasicData() {
        var form2 = new FormData();
        form2.append("phone", $("#phone").val());
        form2.append("copyright", $("#copyright").val());
        form2.append("file", $("#file")[0].files[0]);

        $.ajax({
            url: "<?= site_url('') ?>Info/EditInfo",
            method: "POST",
            timeout: 0,
            headers: {
                'authorization': token,
            },
            "processData": false,
            "mimeType": "multipart/form-data",

            "contentType": false,
            "data": form2

        }).done(function(response) {
            toastr.success('تم تحديث البيانات بنجاح');

        }).fail(function(response) {
            toastr.error(response.responseJSON.msg, 'خطأ');
        });
    }
</script>