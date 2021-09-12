<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام المبرمجون لإدارة المدارس | تعديل بيانات نظام المقررات </title>


    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/RTL/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- toastr  -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/css/toastr.css">

    <!-- Font Icon -->
    <!-- <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>register-form/fonts/material-icon/css/material-design-iconic-font.min.css"> -->

    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>register-form/css/style.css">

    <style>
        .bg-navy {
            background-color: #001f3f !important;
        }

        .carousel-image {
            object-fit: cover;
            height: 60%;
            width: 100%;
        }

        .rounded-4 {
            border-radius: .4rem;
        }

        .wave.wave-success .svg-icon svg g [fill] {
            fill: #1bc5bd;
        }

        .card-title {
            float: right;
            font-size: 1.1rem;
            font-weight: 400;
            margin: 0;
        }

        .navbar-light {
            background-color: #f8f9fa !important;
        }



        .m-right-auto {
            margin-right: auto !important;
        }

        .m-left-auto {
            margin-right: auto !important;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .hide-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .page-item.active .page-link {
            background-color: #001f3f;
            border-color: #001f3f;
        }

        .btn-secondary {
            background-color: #334c65;
            border-color: #334c65;
        }

        .btn-secondary:hover {
            background-color: #334c65e0;
        }

        table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
            background-color: #001f3f !important;
        }

        .custom-control-input:checked~.custom-control-label::before {
            color: #fff;
            border-color: #334c65;
            background-color: #001f3f;
        }

        .btn-primary {
            color: #fff;
            background-color: #001f3f;
            border-color: #001f3f;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #001a35;
            border-color: #001a35;
        }

        .btn-primary.focus,
        .btn-primary:focus {
            color: #fff;
            background-color: #001f3f;
            border-color: #001f3f;
            box-shadow: 0 0 0 0.2rem rgb(0 31 63 / 34%);
        }

        .btn-primary:not(:disabled):not(.disabled).active,
        .btn-primary:not(:disabled):not(.disabled):active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #001f3f;
            border-color: #001831;
        }

        .btn-primary.disabled,
        .btn-primary:disabled {
            color: #fff;
            background-color: #001f3f;
            border-color: #001f3f;
            border-top-color: rgb(0, 31, 63);
            border-right-color: rgb(0, 31, 63);
            border-bottom-color: rgb(0, 31, 63);
            border-left-color: rgb(0, 31, 63);
        }

        .btn-outline-primary {
            color: #001f3f;
            border-color: #001f3f;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #001f3f;
            border-color: #001f3f;
        }

        .btn-outline-primary:not(:disabled):not(.disabled).active,
        .btn-outline-primary:not(:disabled):not(.disabled):active,
        .show>.btn-outline-primary.dropdown-toggle {
            color: #fff;
            background-color: #001f3f;
            border-color: #001f3f;
        }

        .btn-outline-primary.focus,
        .btn-outline-primary:focus {
            box-shadow: 0 0 0 0.2rem rgb(0 31 63 / 19%);
        }

        .page-link {
            color: #001f3f;
        }
    </style>
    <style>
        body {
            font-family: 'Tajawal', sans-serif !important;
            font-weight: 500;
        }

        .field-icon {
            float: right;
            margin: 17px;
            margin-top: -32px;
        }

        input[type=radio] {
            appearance: radio !important;
            -moz-appearance: radio !important;
            -webkit-appearance: radio !important;
            -o-appearance: radio !important;
            -ms-appearance: radio !important;
        }

        .form-radio {
            margin: 0 -10px;
            margin-bottom: 40px;
        }

        .form-radio input {
            width: 0;
            height: 0;
            position: absolute;
            left: -9999px;
        }

        .form-radio input+label {
            margin: 0 8px;
            padding: 11px 31px;
            box-sizing: border-box;
            position: relative;
            display: inline-block;
            border: solid 2px #ebebeb;
            background-color: #FFF;
            font-size: 14px;
            font-weight: 600;
            color: #888;
            text-align: center;
            transition: border-color .15s ease-out, color .25s ease-out, background-color .15s ease-out, box-shadow .15s ease-out;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
        }

        .form-radio input:checked+label {
            background-color: #1da0f2;
            color: #FFF;
            border-color: #1da0f2;
            z-index: 1;
        }

        .form-radio input:focus+label {
            outline: none;
        }

        .form-radio input:hover {
            background-color: #1da0f2;
            color: #FFF;
            border-color: #1da0f2;
        }

        input {
            border: solid 2px #ebebeb;
            box-sizing: border-box;
            width: 100%;
            font-weight: 700;
            font-size: 14px;
            /* font-family: Poppins; */
            padding: 16px 30px 16px 140px;
        }

        h2 {
            font-family: unset;
        }

        .loginhere {
            color: #555;
            font-weight: 500;
            text-align: center;
            margin-top: 34px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container-lg">
                <div class="signup-content">
                    <form method="POST" id="signup-form" action="" onsubmit="getStudent(this); return false;" class="signup-form">
                        <h2 class="form-title" id="form-title">تعديل بيانات الطالب</h2>
                        <div id="content-toShow">

                        </div>
                        <div id="form-content">
                            <div class="form-group">
                                <input type="text" class="form-input" name="school_num" id="school_num" placeholder="رقم المدرسة" />
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-input" name="stud_num" id="stud_num" placeholder="رقم الطالب" />
                            </div>

                            <div class="form-group " style="font-size: 4rem;">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="بحث" />
                            </div>
                        </div>
                    </form>

                    <div id="student_info" style="display: none;">
                        <form method="POST" id="update-data-form" action="" onsubmit="updateStudent(this); return false;" class="signup-form">
                            <input type="hidden" class="form-input" name="student_id" id="student_id"/>
                            <input type="hidden" class="form-input" name="school_id" id="school_id"/>
                            <div id="content-toShow">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input disabled type="text" class="form-input" name="student_number" id="student_number" placeholder="رقم الطالب" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input disabled type="text" class="form-input" name="student_name" id="student_name" placeholder="اسم الطالب" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input disabled type="text" class="form-input" name="phone" id="phone" placeholder="الجوال" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="form-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-input" name="level" id="level" placeholder="الصف" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-input" name="division" id="division" placeholder="الشعبة" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group " style="font-size: 4rem;">
                                            <input type="submit" name="submit" id="submit" class="form-submit" value="حفظ" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="loginhere">
                        <a href="<?= site_url('') ?>" class="loginhere-link">الرئيسية</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
    <!-- jQuery 3.4.1 -->
    <script src="<?php echo base_url() . '/public/'; ?>design/js/jquery-3.4.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- tostar -->
    <script src="<?php echo base_url() . '/public/'; ?>design/js/toastr.js"></script>

    <script>
        var msg = '<?php echo isset($data['msg']) ? $data['msg'] : '' ?>';
        var code = '<?php echo isset($data['msg']) ? $data['code'] : 0 ?>';
        // var user_data = '<?php //dd(session('user_data')) 
                            ?>'
        (function($) {
            $(".toggle-password").click(function() {

                $(this).toggleClass("zmdi-eye zmdi-eye-off");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

        })(jQuery);

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "4000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "toastClass": 'toastr'
        };

        $(document).ready(function() {
            if (code == -1) {
                toastr.error(msg);
            }
        });


        function getStudent(element) {
            formData = $(element).serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});

            var jqxhr = $.ajax({
                    url: "<?= site_url('') ?>CoursesExtends/getCoursesStudent",
                    method: "GET",
                    timeout: 0,
                    data: {
                        "student_num": formData.stud_num,
                        "school_num": formData.school_num,
                    },
                })
                .done(function(response) {
                    setStudentData(response.data);
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error(response.responseJSON.msg, 'خطأ');
                });
            return false;
        }

        function setStudentData(data) {

            $("#student_id").val(data.id);
            $("#school_id").val(data.school_id);
            $("#student_number").val(data.student_number);
            $("#student_name").val(data.student_name);
            $("#phone").val(data.phone);
            $("#form-content").css("display", "none");
            $("#student_info").css("display", "unset");

            console.log(data);
        }

        function updateStudent(element) {
            formData = $(element).serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});

            var jqxhr = $.ajax({
                    url: "<?= site_url('') ?>CoursesExtends/updateCoursesStudent",
                    method: "GET",
                    timeout: 0,
                    data: {
                        "student_id": formData.student_id,
                        "school_id": formData.school_id,
                        "student_number": $("#student_number").val(),
                        "level": formData.level,
                        "division": formData.division,
                    },
                })
                .done(function(response) {
                    toastr.success('تم اضافة البيانات بنجاح');
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error(response.responseJSON.msg, 'خطأ');
                });
            return false;
        }

    </script>
</body>

</html>