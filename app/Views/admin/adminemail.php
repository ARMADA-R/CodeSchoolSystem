<?php require(APPPATH . 'Views/admin/layouts/preContent.php') ?>


<!-- start row1 -->

<!-- start card1 -->
<div class="card">

    <div class="card-header ">
    <i class="fas fa-envelope-open-text"></i>  <h6 class=" text-bold d-inline-flex">بريد رسائل الأدمن«الأرشيف»</h6> 
 

    </div>
    <!-- start card body1 -->

    <div class="card-body">
     
<div class="row" >
    <div class="col-xl-12">
        <div class="card">
            
            <div class="card-body p-2"style="overflow-x: scroll;">
                <table id="employee-table" class="table table-striped " style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
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
            </div>
        </div>
    </div>
</div>
<!-- end row1 -->

    </div>
   <!-- end card body1 -->


</div>

<!-- end card1 -->

 <!-- Button trigger modal -->
 <button id="btnmasseg" type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal1" style="color: #fff ;
                  background-color: #1bc5bd; 
                  border-color: #1bc5bd; display: none; ">

                    <i class="far fa-envelope-open"></i>
                </button>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">نص الرسالة « »

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                       
                        <h5 id="textmasseg"></h5>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end Modal -->




















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


<script src="<?php echo base_url() . '/public/'; ?>Excel/jquery.table2excel.js"></script>

<script src="<?php echo base_url() . '/public/'; ?>design/js/datatable.all.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/public/'; ?>design/css/datatable.all.css" />


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

            columns: [
                {
                    data: 'gate_name',
                    name: 'gate_name',
                    className: 'text-center t-name',
                    title: 'اسم البوابة'
                },
                {
                    data: 'reciver_name',
                    name: 'reciver_name',
                    className: 'text-center t-phone',
                    title: 'اسم المستخدم'
                },
                {
                    data: 'sender_name',
                    name: 'sender_name',
                    className: 'text-center t-phone',
                    title: 'اسم المرسل'
                },
                {
                    data: 'gate_name',
                    name: 'gate_name',
                    className: 'text-center t-phone',
                    title: ' اسم المدرسة	'
                },
                {
                    data: 'reciver_name',
                    name: 'reciver_name',
                    className: 'text-center t-phone',
                    title: 'الجوال'
                },

                {
                    data: "messages",
                    name: 'messages',
                    title: 'نص الرسالة',
                    className: 'text-center ',
                    orderable: false,
                    searchable: false,
                    printable: false,
                    render: function(data, type, row, meta) {
                        return `<div class="row justify-content-center  text-white ">
                        <button type="button" class="btn btn-success  " onclick="btnmasseg('${data}')" style="color: #fff ;
                  background-color: #1bc5bd; 
                  border-color: #1bc5bd;">

                 <i class="far fa-envelope-open"></i>
                </button>

                                </div>`;
                    }
                },
                    {
                    data: 'discount_point',
                    name: 'discount_point',
                    className: 'text-center t-phone',
                    title: 'النقاط المخصومة'
                },
                {
                    data: 'date',
                    name: 'date',
                    className: 'text-center t-phone',
                    title: 'وقت الإرسال	 '
                },
                {
                    data: 'note',
                    name: 'note',
                    className: 'text-center t-phone',
                    title: 'ملاحظات '
                },
                {
                    data: 'reply',
                    name: 'reply',
                    className: 'text-center t-phone',
                    title: 'رد بوبابة الإرسال'

                },



             
            ],

            buttons: [{
                    extend: 'collection',
                    text: 'تصدير',
                    className: 'btn btn-sm',
                    buttons: [
                        {
                            extend: 'excel' 
                        },
                        {
                            extend: 'print' 
                        },
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
        adminmaile();
    });

    function adminmaile() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Messaging/MailArchive",
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

function btnmasseg(msg) {
    console.log(0);
    $('#textmasseg').html(msg);
    $('#btnmasseg').click();
    
}
   
</script>
<?php require(APPPATH . 'Views/admin/layouts/postContent.php'); ?>
