<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/RTL/dist/css/adminlte.min.css">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/RTL/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/RTL/dist/css/custom.css">
    <!-- toastr  -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/css/toastr.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . '/public/'; ?>design/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <style>
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
    </style>

</head>


<body id="body" class="sidebar-mini layout-fixed layout-navbar-fixed- layout-footer-fixed" style="height: auto;">

    <div class="wrapper">