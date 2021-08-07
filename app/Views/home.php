<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/RTL/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/fontawesome-free/css/all.min.css">
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
    </style>
</head>

<body>
    <!-- <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-navy">
            <div class="container">
                <a class="navbar-brand" href="#">Arsail</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse font-weight-bold" id="navbarsExample07">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item px-1">
                            <a class="nav-link" href="#">نتيجة الطلاب <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" href="#">تواصل معنا</a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" href="#">خدماتنا</a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" href="#">من نحن</a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" href="#">تسجيل دخول</a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="nav-link" href="#">انشاء حساب</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
    </header>

    <main role="main">

        <section class="text-center">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="https://sa.arsail.net/schools/assets/files/1628168915_a659a18f44336dbfb794.jpg" class="carousel-image " alt="">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>Example headline.</h1>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item active">
                        <img src="https://sa.arsail.net/schools/assets/files/1628168915_a659a18f44336dbfb794.jpg" class="carousel-image " alt="">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Another example headline.</h1>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://sa.arsail.net/schools/assets/files/1628168915_a659a18f44336dbfb794.jpg" class="carousel-image " alt="">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1>One more for good measure.</h1>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>


        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm rounded-4">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center p-4 justify-content-end py-5">
                                    <div class="d-flex flex-column">
                                        <h5 class="card-title">تعليم الاطفال</h5>
                                        <p class="card-text">مناهج حديثة وكوادر مؤهلة</p>
                                    </div>
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
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm rounded-4">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center p-4 justify-content-end py-5">
                                    <div class="d-flex flex-column">
                                        <h5 class="card-title">تتبع اولياء الامور</h5>
                                        <p class="card-text">تتبع طفلك وتواصل مع الإداريين</p>
                                    </div>
                                    <div class="mx-2">
                                        <span class="svg-icon svg-icon-primary svg-icon-4x">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000"></path>
                                                    <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm rounded-4">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center p-4 justify-content-end py-5">
                                    <div class="d-flex flex-column">
                                        <h5 class="card-title">خدمات متنوعة</h5>
                                        <p class="card-text">أنشطة ومناسبات</p>
                                    </div>
                                    <div class="mx-2">
                                        <span class="svg-icon svg-icon-primary svg-icon-4x">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="52px" height="52px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8"></polygon>
                                                    <polygon fill="#000000" points="23 8 12 20 1 8"></polygon>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="https://bootstrap.rtlcss.com/">Visit the homepage</a> or read our <a href="/docs/4.5/getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer> -->

    <div class="d-flex h-100 justify-content-center">
        <h1 class="align-self-center">Coming Soon</h1>
    </div>


    <!-- jQuery 3.4.1 -->
    <script src="<?php echo base_url() . '/public/'; ?>design/js/jquery-3.4.1.min.js"></script>


    <script>
        window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>