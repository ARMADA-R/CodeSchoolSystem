<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-navy ">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-navy">
        <img src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-white-50">Partner Dashboard</span>
    </a>
<div class="p-3"></div>
    <!-- Sidebar -->
    <div class="sidebar hide-scrollbar">
       
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                <li class="nav-header">المعلومات الاساسية</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>partner/offers" class="nav-link <?php echo strpos(current_url(),'partner/offers')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-star" style=" color: <?php echo strpos(current_url(),'partner/offers')? '#f4f6f9' :''; ?>"></i>
                        <p>
                           العروض
                        </p>
                    </a>
                </li>
         

                <li class="nav-header">الدعم الفني</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>partner/support/technical/sys-managers/messaging" class="nav-link <?php echo strpos(current_url(),'partner/support/technical/sys-managers/messaging')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-comments" style=" color: <?php echo strpos(current_url(),'partner/support/technical/sys-managers/messaging')? '#f4f6f9' :''; ?>"></i>
                        <p>
                            مراسلة مدير النظام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>partner/support/technical/parents/messaging" class="nav-link <?php echo strpos(current_url(),'partner/support/technical/parents/messaging')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-comments" style=" color: <?php echo strpos(current_url(),'partner/support/technical/parents/messaging')? '#f4f6f9' :''; ?>"></i>
                        <p>
                            مراسلة أولياء الامور
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>partner/support/technical/schools/messaging" class="nav-link <?php echo strpos(current_url(),'partner/support/technical/schools/messaging')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-comments" style=" color: <?php echo strpos(current_url(),'partner/support/technical/schools/messaging')? '#f4f6f9' :''; ?>"></i>
                        <p>
                            مراسلة المدارس
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


