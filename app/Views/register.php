<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام المبرمجون لإدارة المدارس</title>


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
            font-family: Poppins;
            padding: 16px 30px 16px 140px;
        }
    </style>
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" onsubmit="register(this); return false;" class="signup-form">
                        <h2 class="form-title">انشاء حساب</h2>

                        <div class="form-radio">
                            <div class="row">
                                <div class="col-sm-4" style="padding-right: 0px;">
                                    <input type="radio" class="user-type" name="role" value="3" id="newbie" />
                                    <label for="newbie" class="w-100">ولي امر</label>
                                </div>
                                <div class="col-sm-4" style="padding-right: 0px;">
                                    <input type="radio" class="user-type" name="role" value="2" id="master" />
                                    <label for="master" class="w-100">مدرسة</label>
                                </div>
                                <div class="col-sm-4" style="padding-right: 0px;">
                                    <input type="radio" class="user-type" name="role" value="4" id="average" />
                                    <label for="average" class="w-100">شريك</label>
                                </div>
                            </div>
                        </div>
                        <div id="form-content">

                        </div>
                    </form>
                    <p class="loginhere">
                        لديك حساب؟ <a href="<?php echo base_url() . '/public/'; ?>login" class="loginhere-link">سجل دخول هنا</a>
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
            // getInfoData();
            // getSliderData();

            $(".user-type").change(function() {
                var type = $('input[name="role"]:checked').val();
                setFormContent(type);
                resetListners();
            });
        });

        function resetListners() {
            $(".toggle-password").click(function() {
                $(this).toggleClass("zmdi-eye zmdi-eye-off");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        }

        function setFormContent(type) {
            if (type == 3) {
                $("#form-content").html('');
                $("#form-content").append(`<div class="form-group">
                                <input type="email" class="form-input" name="email" id="email" placeholder="البريد الإلكتروني" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-input" name="password" id="password" min="8" placeholder="كلمة المرور" />
                                <span toggle="#password" class="zmdi zmdi-eye-off field-icon float-right toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-input" name="re_password" id="re_password" min="8" placeholder="اعادة كلمة المرور" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="انشاء حساب" />
                            </div>`);
            } else if (type == 4) {
                $("#form-content").html('');
                $("#form-content").append(`<div class="form-group">
                                            <input type="text" class="form-input" name="user_name" id="name" placeholder="الاسم" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-input" name="city" id="city" placeholder="المدينة" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-input" name="area" id="aria" placeholder="المنطقة" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-input" name="email" id="email" placeholder="البريد الإلكتروني" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-input" name="password" id="password" min="8" placeholder="كلمة المرور" />
                                                <span toggle="#password" class="zmdi zmdi-eye-off field-icon float-right toggle-password"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-input" name="re_password" id="re_password" min="8" placeholder="اعادة كلمة المرور" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-input" name="phone" id="phone" placeholder="الهاتف" />
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" id="submit" class="form-submit" value="انشاء حساب" />
                                            </div>`);
            } else if (type == 2) {
                $("#form-content").html('');
                $("#form-content").append(`<div class="form-group">
                                                <input type="text" class="form-input" name="school_name" id="name" placeholder="اسم المدرسة" />
                                            </div>
                                            <div class="form-group">
                                                <select type="text" class="form-input" name="edcution_type" id="edu_type" placeholder="نوع التعليم">
                                                    <option value="">نوع التعليم</option>
                                                    <option value="general">نظام عام</option>
                                                    <option value="memorize">تحفيظ</option>
                                                    <option value="subjects">نظام مقررات</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-input" name="school_number" id="number" placeholder="الرقم الوزاري" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-input" name="city" id="city" placeholder="المدينة" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-input" name="area" id="aria" placeholder="المنطقة" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-input" name="email" id="email" placeholder="البريد الإلكتروني" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-input" name="password" id="password" min="8" placeholder="كلمة المرور" />
                                                <span toggle="#password" class="zmdi zmdi-eye-off field-icon float-right toggle-password"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-input" name="re_password" id="re_password" min="8" placeholder="اعادة كلمة المرور" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-input" name="phone" id="phone" placeholder="الهاتف" />
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" id="submit" class="form-submit" value="انشاء حساب" />
                                            </div>`);
            }
        }


        function register(form) {
            formData = $(form).serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});

            var jqxhr = $.ajax({
                    url: "https://sa.arsail.net/schools/Auth/Register",
                    method: "POST",
                    timeout: 0,
                    data: formData,
                })
                .done(function(response) {
                    toastr.success("تم انشاء الحساب بنجاح!");
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error(response.msg, 'خطأ');
                });

        }

        function setInfoData(data) {
            $("#copyright").html(data.copyright);
            $("#phone").html(data.phone);
        }
    </script>
</body>

</html>