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

        body {
            font-family: 'Tajawal', sans-serif !important;
            font-weight: 500;
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

        .svg-icon.svg-icon-4x svg {
            height: 4rem !important;
            width: 4rem !important;
        }

        svg {
            overflow: hidden;
            vertical-align: middle;
        }

        .svg-icon.svg-icon-primary svg g [fill] {
            -webkit-transition: fill .3s ease;
            transition: fill .3s ease;
            fill: #3699ff !important;
        }

        .svg-icon.svg-icon-danger svg g [fill] {
            -webkit-transition: fill .3s ease;
            transition: fill .3s ease;
            fill: #f64e60 !important;
        }

        .svg-icon.svg-icon-success svg g [fill] {
            -webkit-transition: fill .3s ease;
            transition: fill .3s ease;
            fill: #1bc5bd !important;
        }

        .card {

            border: 0px;
            border-radius: .25rem;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-navy" style=" direction: ltr;">
            <div class="container">
                <!-- <a class="navbar-brand" href="#">Arsail</a> -->
                <ul class="navbar-nav " style="flex-direction: inherit; padding-inline-start: 10px;">
                    <?php if (!session()->has('user_data')) echo " 
                        <li class='nav-item px-1'>
                            <a class='nav-link' href='" . site_url('login') . "'>تسجيل دخول</a>
                        </li>
                        <li class='nav-item px-1'>
                            <a class='nav-link' href='" . site_url('register') . "'>انشاء حساب</a>
                        </li>";

                    else {
                        echo " 
                             <form id=\"logoutForm\" action=\"" . site_url('logout') . "\" method=\"post\"></form>
                        <li class='nav-item px-1'>
                            <a onclick=\"$('#logoutForm').submit()\" style=\"cursor: pointer;\" class='nav-link' >تسجيل خروج</a>
                        </li>";
                    }
                    ?>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse font-weight-bold" id="navbarsExample07">
                    <ul class="navbar-nav mr-auto">
                        <!-- <li class="nav-item px-1">
                            <a class="nav-link" href="#">نتيجة الطلاب <span class="sr-only">(current)</span></a>
                        </li> -->
                        <li class="nav-item px-1">
                            <a class="nav-link" href="#links">روابط</a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" href="#contact_us_section">تواصل معنا</a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" href="#service_section">خدماتنا</a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" href="#whoWeAre_section">من نحن</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main" class="bg-light">

        <section class="text-center pb-5">
            <div id="slider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators" id="slides-indicators-container">
                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner" id="slides-container">
                    <div class="carousel-item active">
                        <img src="https://sa.arsail.net/assets/media/bg/bg-9.jpg" class="carousel-image " alt="">
                        <div class="container">
                            <div class="carousel-caption mb-5">
                                <h1>نظام المبرمجون لإدارة المدارس</h1>

                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">السابق</span>
                </a>
                <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">التالي</span>
                </a>
            </div>
        </section>

        <div class="py-4 " id="service_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm rounded-4" style="height: 88%!important;">
                            <div class="card-body  p-0">
                                <div class="d-flex align-items-center p-4  py-5">
                                    <div class="mx-2">
                                        <span class="svg-icon svg-icon-primary svg-icon-4x">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z" fill="#000000" fill-rule="nonzero"></path>
                                                    <path d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z" fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="">تعليم الاطفال</h5>
                                        <p class="card-text">مناهج حديثة وكوادر مؤهلة</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm rounded-4" style="height: 88%!important;">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center p-4  py-5">
                                    <div class="mx-2">
                                        <span class="svg-icon svg-icon-danger svg-icon-4x">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000"></path>
                                                    <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="">تتبع اولياء الامور</h5>
                                        <p class="card-text">تتبع طفلك وتواصل مع الإداريين</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm rounded-4" style="height: 88%!important;">
                            <div class="card-body d-flex  p-0">
                                <div class="d-flex align-items-center p-4  py-5">
                                    <div class="mx-2">
                                        <span class="svg-icon svg-icon-success svg-icon-4x">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8"></polygon>
                                                    <polygon fill="#000000" points="23 8 12 20 1 8"></polygon>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 class="">خدمات متنوعة</h5>
                                        <p class="card-text">أنشطة ومناسبات</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="py-4" id="whoWeAre_section">
            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="p-6">
                            <h2 class="text-dark mb-8 font-weight-bold">من نحن</h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="accordionExample7" class="accordion accordion-light accordion-light-borderless accordion-svg-toggle">
                                        <div class="card" style="border: unset;">
                                            <div id="headingOne7" style="border: unset;" class="card-header bg-white">
                                                <div data-toggle="collapse" data-target="#collapseOne7" aria-expanded="false" role="button" class="d-flex w-100  card-title collapsed">
                                                    <span class="svg-icon svg-icon-primary"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                                            </g>
                                                        </svg></span>
                                                    <div class="card-label text-dark pl-4">النشأة والتأسيس</div>
                                                </div>
                                            </div>
                                            <div id="collapseOne7" aria-labelledby="headingOne7" data-parent="#accordionExample7" class="collapse">
                                                <div class="card-body text-dark-50 font-size-lg pl-12">تأسس نظام المبرمجون لإدارة المدارس في عام 2020، على يد نخبة من ذوي الكفاءات لإدارة تجمع من المدارس.</div>
                                            </div>
                                        </div>
                                        <div class="card" style="border: unset;">
                                            <div id="headingTwo7" style="border: unset;" class="card-header bg-white">
                                                <div data-toggle="collapse" data-target="#collapseTwo7" aria-expanded="true" role="button" class="d-flex w-100  card-title collapsed">
                                                    <span class="svg-icon svg-icon-primary"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                                            </g>
                                                        </svg></span>
                                                    <div class="card-label text-dark pl-4">أهدافنا</div>
                                                </div>
                                            </div>
                                            <div id="collapseTwo7" aria-labelledby="headingTwo7" data-parent="#accordionExample7" class="collapse">
                                                <div class="card-body text-dark-50 font-size-lg pl-12">نهدف إلى تحقيق حلقة تواصل بين الأهل والمدرسة لتحقيق أفضل النتائج التي تصب في مصلحة الطلاب في المقام الأول.</div>
                                            </div>
                                        </div>
                                        <div class="card" style="border: unset;">
                                            <div id="headingThree7" style=" border: unset;" class="card-header bg-white">
                                                <div data-toggle="collapse" data-target="#collapseThree7" aria-expanded="true" role="button" class="d-flex w-100 card-title collapsed">
                                                    <span class="svg-icon svg-icon-primary"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                                            </g>
                                                        </svg></span>
                                                    <div class="card-label text-dark pl-4">تطلعاتنا</div>
                                                </div>
                                            </div>
                                            <div id="collapseThree7" aria-labelledby="headingThree7" data-parent="#accordionExample7" class="collapse">
                                                <div class="card-body text-dark-50 font-size-lg pl-12">نتطلع إلى بناء جيل متميز من الطلاب القادرين على رفع سوية المجتمع على جميع الأصعدة العلمية والأدبية والفنية.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4" id="contact_us_section">
            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="">
                            <h2 class="text-dark font-weight-bolder mb-4">معلومات التواصل</h2>
                        </div>
                        <div class="form-group  my-2">
                            <label class="col-4 col-form-label">رقم الجوال:</label>
                            <div class="col-8"><span class="form-control-plaintext" id="phone"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4">
            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-body" style="padding-bottom: unset;">
                        <div class="">
                            <div class="col-sm-7">
                                <h2 class="text-dark font-weight-bolder mb-4">أرسل شيئًا</h2>
                            </div>
                            <div class="col-sm-5">
                            </div>
                        </div>
                        <form onsubmit="sendContactUsRequest(this); return false;">
                            <div class="form-group mb-6">
                                <input type="email" name="email" required placeholder="البريد الالكتروني" class="bg-light form-control border-0 form-control-solid ">
                            </div>
                            <div class="form-group mb-6">
                                <input type="text" name="message_title" required placeholder="عنوان الرسالة" class="bg-light form-control border-0 form-control-solid ">
                            </div>
                            <div class="form-group mb-6">
                                <textarea name="message_text" rows="4" required placeholder="نص الرسالة" class="bg-light form-control border-0 form-control-solid d"></textarea>
                            </div>
                            <div class="form-group mb-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary font-weight-bold">إرسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4" id="support">
            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="p-6">
                            <h2 class="text-dark mb-8 font-weight-bold">الدعم</h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="supportAccordion" class="accordion accordion-light accordion-light-borderless accordion-svg-toggle">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4" id="links">
            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-body" style="padding-bottom: unset;">
                        <div class="">
                            <div class="col-sm-7">
                                <h2 class="text-dark font-weight-bolder mb-4">روابط</h2>
                            </div>
                            <div class="col-sm-5">
                            </div>
                        </div>
                        <div class="pb-5">
                            <div class="mt-5 d-flex justify-content-between">
                                <a href="<?= site_url(); ?>school" class="mx-4 btn btn-outline-primary">المدرسة</a>
                                <a href="<?= site_url(); ?>parent" class="mx-4 btn btn-outline-primary">ولي الامر</a>
                                <a href="<?= site_url(); ?>partner" class="mx-4 btn btn-outline-primary">الشركاء</a>
                                <a href="<?= site_url(); ?>admin" class="mx-4 btn btn-outline-primary">المشرفين</a>
                                <a href="<?= site_url(""); ?>courses/updateStudent" class="mx-4 btn btn-outline-primary">تعديل بيانات طلاب نظام المقررات</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="text-muted mt-2">
        <div class="container">
            <p id="copyright"></p>
        </div>
    </footer>

    <!-- 
    <div class="d-flex h-75 justify-content-center">
        <h1 class="align-self-center">Coming Soon</h1>
    </div>
    <div class="mt-5 d-flex justify-content-center">
        <a href="<?= site_url(); ?>school" class="mx-4 btn btn-outline-primary">المدرسة</a>
        <a href="<?= site_url(); ?>parent" class="mx-4 btn btn-outline-primary">ولي الامر</a>
        <a href="<?= site_url(); ?>partner" class="mx-4 btn btn-outline-primary">الشركاء</a>
        <a href="<?= site_url(); ?>admin" class="mx-4 btn btn-outline-primary">المشرفين</a>
    </div>
    -->


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
            getInfoData();
            getSliderData();
            getSupportData();
        });

        function sendContactUsRequest(form) {
            formData = $(form).serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});

            var jqxhr = $.ajax({
                    url: "<?= site_url('') ?>Contact_us/SendRequest",
                    method: "POST",
                    timeout: 0,
                    data: {
                        email: formData.email,
                        message_title: formData.message_title,
                        message_text: formData.message_text,
                    }
                })
                .done(function(response) {
                    toastr.success('تم الإرسال!');
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error('حدث خطأ ما اثناء ارسال البيانات!', 'خطأ');
                });

        }

        function getSliderData() {
            var jqxhr = $.ajax({
                    url: "<?= site_url('') ?>Slider_Api/Slider",
                    method: "GET",
                    timeout: 0,
                })
                .done(function(response) {
                    setSliderData(response.data);
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error(response.responseJSON.msg, 'خطأ');
                });
        }


        function getSupportData() {
            var jqxhr = $.ajax({
                    url: "<?= site_url('') ?>Support/getSupport",
                    method: "GET",
                    timeout: 0,
                })
                .done(function(response) {
                    setSupportData(response.data);
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error(response.responseJSON.msg, 'خطأ');
                });
        }

        function getInfoData() {
            var jqxhr = $.ajax({
                    url: "<?= site_url('') ?>Info/GetInfo",
                    method: "GET",
                    timeout: 0,
                })
                .done(function(response) {
                    setInfoData(response.data);
                })
                .fail(function(response) {
                    console.log(response);
                    toastr.error(response.responseJSON.msg, 'خطأ');
                });

        }

        function setSliderData(data) {
            var slides_indicators_container = $("#slides-indicators-container");
            var slides_container = $("#slides-container");
            if (data.length) {
                slides_container.html('');
                slides_indicators_container.html('');

                for (let i = 0; i < data.length; i++) {
                    slides_indicators_container.append(`<li data-target="#slider" data-slide-to="${i}" class="${i==0? 'active':''}"></li>`)
                    slides_container.append(`<div class="carousel-item ${i==0? 'active':''}">
                        <img src="${data[i].image_url}" class="carousel-image " alt="">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <p>${data[i].text}</p>
                            </div>
                        </div>
                    </div>`)
                }
            }
        }

        function setInfoData(data) {
            $("#copyright").html(data.copyright);
            $("#phone").html(data.phone);
        }

        function setSupportData(data) {

            data.forEach(element => {
                $("#supportAccordion").append(`<div class="card" style="border: unset;">
                                                    <div id="supportHeadingOne${element.id}" style="border: unset;" class="card-header bg-white">
                                                        <div data-toggle="collapse" data-target="#supportCollapseOne${element.id}" aria-expanded="false" role="button" class="d-flex w-100  card-title collapsed">
                                                            <span class="svg-icon svg-icon-primary"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                                                    </g>
                                                                </svg></span>
                                                            <div class="card-label text-dark pl-4">${element.title}</div>
                                                        </div>
                                                    </div>
                                                    <div id="supportCollapseOne${element.id}" aria-labelledby="supportHeadingOne${element.id}" data-parent="#supportAccordion" class="collapse px-5">
                                                        <div class="card-body text-dark-50 font-size-lg pl-12 pb-0">${element.description}</div>
                                                        <a href="${element.link}" class="btn btn-link">الرابط</a>
                                                    </div>
                                                </div>`);
            });
        }
    </script>
</body>

</html>