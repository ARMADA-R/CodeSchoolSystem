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


<div class="modal fade" id="update-gate" tabindex="-1" aria-labelledby="update-gateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update-gateLabel">تعديل بوابة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="updateGate(this); return false;">
                <input type="hidden" name="id" id="update-record-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="update-gate-name">اسم البوابة</label>
                                <input required type="text" name="gate_name" class="form-control" id="update-gate-name">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="send-method">طريقة الارسال</label>
                                <select required class="form-control" name="method" id="update-send-method">
                                    <option value="">--</option>
                                    <option value="get">GET</option>
                                    <option value="post">POST</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="success_code">رمز نجاح الارسال</label>
                                <input required type="text" name="success_code" class="form-control" id="success_code">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control">
                                    <input class="inp-cbx" type="checkbox" style="display: none;" name="isNeedPlusSign" value="true" id="update-plus-sign" />
                                    <label class="cbx" for="update-plus-sign">
                                        <span>
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                        <span class="text-secondary">تحتاج اشارة + للرقم المستلم</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control">
                                    <input class="inp-cbx" type="checkbox" style="display: none;" name="isReturnStatus" value="true" id="update-send-status" />
                                    <label class="cbx" for="update-send-status">
                                        <span>
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                        <span class="text-secondary">تعيد حالة الارسال</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control">
                                    <input class="inp-cbx" type="checkbox" style="display: none;" name="doubleEnter" value="true" id="update-double-enter" />
                                    <label class="cbx" for="update-double-enter">
                                        <span>
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                        <span class="text-secondary">مضاعفة الرسالة مع رمز ENTER</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr class="pb-3">
                        </div>
                        <div class="col-sm-12">
                            <div class="url-container">
                                <div class="form-group">
                                    <label for="add-username">رابط ارسال الرسائل العربية</label>
                                    <!-- <input required type="text" name="username" class="form-control" id="add-username"> -->
                                    <textarea required name="arabic_messages_link" class="form-control dir-ltr" id="update-arabic-messages-link" maxlength="500" rows="3"></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@USERNAME@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            اسم المستخدم
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@PASSWORD@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            كلمة المرور
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@SENDERNAME@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            اسم المرسل
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@RECEIVENUMBER@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            المستلم
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@MESSAGE@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            الرسالة
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr class="pb-3">
                        </div>
                        <div class="col-sm-12">
                            <div class="url-container">
                                <div class="form-group">
                                    <label for="add-username">رابط ارسال الرسائل اللاتينية</label>
                                    <!-- <input required type="text" name="username" class="form-control" id="add-username"> -->
                                    <textarea name="latin_messages_link" class="form-control dir-ltr" id="update-latin-messages-link" maxlength="500" required rows="3"></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@USERNAME@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            اسم المستخدم
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@PASSWORD@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            كلمة المرور
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@SENDERNAME@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            اسم المرسل
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@RECEIVENUMBER@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            المستلم
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@MESSAGE@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            الرسالة
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr class="pb-3">
                        </div>
                        <div class="col-sm-12">
                            <div class="url-container">
                                <div class="form-group">
                                    <label for="add-username">رابط استعلام الرصيد</label>
                                    <!-- <input required type="text" name="username" class="form-control" id="add-username"> -->
                                    <textarea name="balance_link" class="form-control dir-ltr" id="update-balance-link" maxlength="500" required rows="3"></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@USERNAME@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            اسم المستخدم
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@PASSWORD@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            كلمة المرور
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr class="pb-3">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="margin-left: auto;" data-dismiss="modal">الغاء</button>
                    <button type="reset" class="btn btn-secondary">مسح</button>
                    <button type="submit" id="update-gate-submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<button type="button" style="display: none;" id="update-gate-btn" class="btn btn-light" data-toggle="modal" data-target="#update-gate"></button>

<div class="modal fade" id="add-gate" tabindex="-1" aria-labelledby="add-gateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-gateLabel">اضافة بوابة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="addGate(this); return false;">
                <input type="hidden" name="gate_id" id="add-gates-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="add-gate-name">اسم البوابة</label>
                                <input required type="text" name="gate_name" class="form-control" id="add-gate-name">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="send-method">طريقة الارسال</label>
                                <select required class="form-control" name="method" id="send-method">
                                    <option value="">--</option>
                                    <option value="get">GET</option>
                                    <option value="post">POST</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="success_code_add">رمز نجاح الارسال</label>
                                <input required type="text" name="success_code" class="form-control" id="success_code_add">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control">
                                    <input class="inp-cbx" type="checkbox" style="display: none;" name="isNeedPlusSign" value="true" id="plus-sign" />
                                    <label class="cbx" for="plus-sign">
                                        <span>
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                        <span class="text-secondary">تحتاج اشارة + للرقم المستلم</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control">
                                    <input class="inp-cbx" type="checkbox" style="display: none;" name="isReturnStatus" value="true" id="send-status" />
                                    <label class="cbx" for="send-status">
                                        <span>
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                        <span class="text-secondary">تعيد حالة الارسال</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control">
                                    <input class="inp-cbx" type="checkbox" style="display: none;" name="doubleEnter" value="true" id="double-enter" />
                                    <label class="cbx" for="double-enter">
                                        <span>
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span>
                                        <span class="text-secondary">مضاعفة الرسالة مع رمز ENTER</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr class="pb-3">
                        </div>
                        <div class="col-sm-12">
                            <div class="url-container">
                                <div class="form-group">
                                    <label for="add-username">رابط ارسال الرسائل العربية</label>
                                    <!-- <input required type="text" name="username" class="form-control" id="add-username"> -->
                                    <textarea required name="arabic_messages_link" class="form-control dir-ltr" maxlength="500" rows="3"></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@USERNAME@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            اسم المستخدم
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@PASSWORD@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            كلمة المرور
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@SENDERNAME@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            اسم المرسل
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@RECEIVENUMBER@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            المستلم
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@MESSAGE@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            الرسالة
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr class="pb-3">
                        </div>
                        <div class="col-sm-12">
                            <div class="url-container">
                                <div class="form-group">
                                    <label for="add-username">رابط ارسال الرسائل اللاتينية</label>
                                    <!-- <input required type="text" name="username" class="form-control" id="add-username"> -->
                                    <textarea name="latin_messages_link" class="form-control dir-ltr" maxlength="500" required rows="3"></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@USERNAME@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            اسم المستخدم
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@PASSWORD@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            كلمة المرور
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@SENDERNAME@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            اسم المرسل
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@RECEIVENUMBER@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            المستلم
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@MESSAGE@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            الرسالة
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr class="pb-3">
                        </div>
                        <div class="col-sm-12">
                            <div class="url-container">
                                <div class="form-group">
                                    <label for="add-username">رابط استعلام الرصيد</label>
                                    <!-- <input required type="text" name="username" class="form-control" id="add-username"> -->
                                    <textarea name="balance_link" class="form-control dir-ltr" maxlength="500" required rows="3"></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@USERNAME@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            اسم المستخدم
                                        </button>
                                    </div>
                                    <div class="col-md">
                                        <button type="button" onclick="setTextToNearTextarea('@PASSWORD@', this)" class="btn btn-primary w-100 my-2 h-75">
                                            كلمة المرور
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr class="pb-3">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="margin-left: auto;" data-dismiss="modal">الغاء</button>
                    <button type="reset" class="btn btn-secondary">مسح</button>
                    <button type="submit" id="add-gate-submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" style="display: none;" id="display-link-btn" class="btn btn-primary" data-toggle="modal" data-target="#d-link-Modal"></button>

<div class="modal fade" id="d-link-Modal" tabindex="-1" aria-labelledby="d-link-ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="d-link-ModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 id="display-link" class="dir-ltr" style="overflow-wrap: break-word;">

                </h6>
            </div>

        </div>
    </div>
</div>


<div class="m-left-auto">
    <button type="button" style="display: none;" id="add-gate-btn" class="btn btn-light" data-toggle="modal" data-target="#add-gate"></button>
</div>
<!-- start card1 -->
<div class="card">

    <div class="card-header ">
        <i class="fas fa-door-open "></i>
        <h6 class=" text-bold d-inline-flex">البوابات</h6>
    </div>
    <!-- start card body1 -->

    <div class="card-body">
        <div class="row">
            <div class="col-lg-12" style="overflow-x: scroll;">

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
            </div>
        </div>
        <!-- end row1 -->

    </div>
    <!-- end card body1 -->


</div>

<!-- end card1 -->



<?php require(APPPATH . 'Views/admin/layouts/postContent.php'); ?>
<script src="<?php echo base_url() . '/public/'; ?>Excel/jquery.table2excel.js"></script>
<script src="<?php echo base_url() . '/public/'; ?>design/js/datatable.all.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/public/'; ?>design/css/datatable.all.css" />


<script>
    var dataTable = null;

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
                    data: 'method',
                    name: 'method',
                    className: 'text-center ',
                    title: 'طريقة الارسال'
                },
                {
                    data: 'arabic_link',
                    name: 'arabic_link',
                    className: 'text-center ',
                    title: 'رابط الإرسال العربي	',
                    render: function(data, type, row, meta) {

                        return `<a href="${data}" onclick = "showLink(this); return false;"> عرض </a>`;
                    }
                },
                {
                    data: 'latin_link',
                    name: 'latin_link',
                    className: 'text-center ',
                    title: 'رابط الإرسال اللاتيني',
                    render: function(data, type, row, meta) {

                        return `<a href="${data}" onclick = "showLink(this); return false;"> عرض </a>`;
                    }

                },
                {
                    data: 'balance_link',
                    name: 'balance_link',
                    className: 'text-center ',
                    title: 'رابط استعلام الرصيد',
                    render: function(data, type, row, meta) {

                        return `<a href="${data}" onclick = "showLink(this); return false;"> عرض </a>`;
                    }

                },
                {
                    data: 'isReturnStatus',
                    name: 'isReturnStatus',
                    className: 'text-center t-isReturnStatus align-middle',
                    title: 'حالة الإرسال',
                    render: function(data, type, row, meta) {
                        return (row.isReturnStatus == 1) ? `مفعل` : `معطل`;
                    }
                },
                {
                    data: 'isNeedPlusSign',
                    name: 'isNeedPlusSign',
                    className: 'text-center t-isNeedPlusSign align-middle',
                    title: 'تحتاج اشارة +',
                    render: function(data, type, row, meta) {
                        return (row.isNeedPlusSign == 1) ? `مفعل` : `معطل`;
                    }
                },
                {
                    data: 'doubleEnter',
                    name: 'doubleEnter',
                    className: 'text-center t-doubleEnter align-middle',
                    title: 'مضاعفة عند ENTER',
                    render: function(data, type, row, meta) {
                        return (row.doubleEnter == 1) ? `مفعل` : `معطل`;
                    }
                },
                {
                    data: 'success_code',
                    name: 'success_code',
                    className: 'text-center t-success_code align-middle',
                    title: 'رمز نجاح الارسال'
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
                                        <button type="button" class="btn btn-sm btn-info " title="edit" style="margin: 0px;" onclick="showUpdateModal('${row.id}', '${row.name}', '${row.method}', '${row.arabic_link}', '${row.latin_link}', '${row.balance_link}', '${row.isReturnStatus}', '${row.isNeedPlusSign}', '${row.doubleEnter}', '${row.success_code}')" class="nav-link">

                                            <i class="far fa-edit"></i>
                                        </button>
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
                'colvis',
                {
                    text: 'اضافة بوابة <i class="far fa-plus-square"></i>',
                    className: 'btn btn-sm',
                    action: function(e, dt, node, config) {
                        showAddGateModal();
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
        getsTable();
    });



    function setTextToNearTextarea(text, element) {
        var textArea = $(element).closest(".url-container").find('textarea');
        var cursorPosition = textArea.prop('selectionStart');
        var textAreaValue = textArea.val();
        var textBefore = textAreaValue.substring(0, cursorPosition);
        var textAfter = textAreaValue.substring(cursorPosition, textAreaValue.length);
        textArea.val(textBefore + text + textAfter);

        // textArea.val(textArea.val() + text);

    }

    function getsTable() {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Gates_Api/Gates",
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

    function updateFormStatus(id, status) {
        var jqxhr = $.ajax({
                "url": "<?= site_url('') ?>Gates_Api/addGateStatus",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": token,
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
                toastr.error(response.responseJSON.msg, 'خطأ');
            });



    }

    function DeleteGate(id) {
        var jqxhr = $.ajax({
                url: "<?= site_url('') ?>Gates_Api/DeleteGate",
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
                toastr.success('تم حذف  البيانات محددة بنجاح  ', 'صح ');
                getsTable();


            })
            .fail(function(response) {
                console.log(response);
                toastr.error('حدث خطأ ما اثناء حذف  البيانات!', 'خطأ');
            });

    }

    function showAddGateModal() {
        $("#add-gate-btn").click();
    }

    function addGate(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $.ajax({
            url: "<?= site_url('') ?>Gates_Api/AddGate",
            method: "POST",
            "headers": {
                "Authorization": token
            },
            data: {
                gate_name: formData.gate_name,
                method: formData.method,
                success_code: formData.success_code,
                isNeedPlusSign: formData.isNeedPlusSign ? true : false,
                isReturnStatus: formData.isReturnStatus ? true : false,
                doubleEnter: formData.doubleEnter ? true : false,
                arabic_messages_link: formData.arabic_messages_link,
                latin_messages_link: formData.latin_messages_link,
                balance_link: formData.balance_link,

            },

        }).done(function(response) {
            toastr.success('تم اضافةالبوابة  بنجاح')
            getsTable() ;
        }).fail(function(response) {
            console.log(response);
            toastr.error(response.responseJSON.msg, 'خطأ');
        });
    }

    function showLink(element) {

        $("#display-link").html($(element).attr('href'));

        $("#display-link-btn").click();
    }

    function showUpdateModal(id, name, method, arabic_link, latin_link, balance_link, isReturnStatus, isNeedPlusSign, doubleEnter, success_code) {
        // console.log(id, name, method, arabic_link, latin_link, balance_link, isReturnStatus, isNeedPlusSign, doubleEnter);
        $("#update-record-id").val(id);
        $("#update-gate-name").val(name);
        $("#update-send-method").val(method);
        $("#success_code").val(success_code);
        $("#update-arabic-messages-link").val(arabic_link);
        $("#update-latin-messages-link").val(latin_link);
        $("#update-balance-link").val(balance_link);
        $("#update-send-status").attr('checked', isReturnStatus == '1'? true:false);
        $("#update-plus-sign").attr('checked', isNeedPlusSign == '1'? true:false);
        $("#update-double-enter").attr('checked', doubleEnter == '1'? true:false);

        $("#update-gate-btn").click();

    }

    function updateGate(element) {
        formData = $(element).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $.ajax({
            url: "<?= site_url('') ?>Gates_Api/updateGate",
            method: "POST",
            "headers": {
                "Authorization": token
            },
            data: {
                id: formData.id,
                gate_name: formData.gate_name,
                method: formData.method,
                success_code: formData.success_code,
                isNeedPlusSign: formData.isNeedPlusSign ? true : false,
                isReturnStatus: formData.isReturnStatus ? true : false,
                doubleEnter: formData.doubleEnter ? true : false,
                arabic_messages_link: formData.arabic_messages_link,
                latin_messages_link: formData.latin_messages_link,
                balance_link: formData.balance_link,
            },
        }).done(function(response) {
            toastr.success('تم تعديل البوابة بنجاح')
            getsTable() ;
        }).fail(function(response) {
            console.log(response);
            toastr.error(response.responseJSON.msg, 'خطأ');
        });
    }

</script>