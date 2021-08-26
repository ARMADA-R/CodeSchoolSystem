<!-- Navbar -->
<nav class="main-header navbar navbar-dark navbar-expand navbar-navy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= site_url() ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
    </ul>

 
    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">

        <li class="nav-item">
            <!-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                <i class="fas fa-th-large"></i>
            </a> -->
            <form action="<?= site_url('logout') ?>" method="post">
                <button  class="btn text-white-50 " style="color: #343a40; padding: 0;">
                    <div class=" mx-2 d-flex">
                        <div class="p-2 pl-3">
                            <div class="d-block">تسجيل الخروج</div>
                        </div>
                        <i class=" fas fa-sign-out-alt" style="align-self: center;"></i>
                    </div>
                </button>
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->