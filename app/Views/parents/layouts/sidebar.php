<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-navy ">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-navy">
        <img src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-white-50">Parent Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar hide-scrollbar">
       
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                <li class="nav-header">الإدارة المدرسية</li>
                
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>parent/school/exams/tables" class="nav-link">
                        <i class="text-navy nav-icon fas fa-clipboard-list"></i>
                        <p>
                            جداول الاختبارات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>parent/school/global/table" class="nav-link">
                        <i class="text-navy nav-icon fas fa-clipboard-list"></i>
                        <p>
                            الجدول المدرسي العام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>parent/school/questionnaires" class="nav-link">
                        <i class="text-navy nav-icon fas fa-question"></i>
                        <p>
                            الاستبانات الإلكترونية
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>parent/school/forms" class="nav-link">
                        <i class="text-navy nav-icon fas fa-clipboard-list"></i>
                        <p>
                            النماذج الالكترونية
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>parent/school/notification" class="nav-link">
                        <i class="text-navy nav-icon fas fa-chevron-left"></i>
                        <p>
                            التنبيهات المدرسية
                        </p>
                    </a>
                </li>


                <li class="nav-header">الدعم الفني</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>parent/support/technical/sys-managers/messaging" class="nav-link">
                        <i class="text-navy nav-icon fas fa-comments"></i>
                        <p>
                            مراسلة مدير النظام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>parent/support/technical/school-management/messaging" class="nav-link">
                        <i class="text-navy nav-icon fas fa-comments"></i>
                        <p>
                            مراسلة ادارة المدرسة
                        </p>
                    </a>
                </li>




                <li class="nav-header">شركاء النجاح</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>parent/partners/offers" class="nav-link">
                        <i class="text-navy nav-icon fas fa-star"></i>
                        <p>
                            عروض من شركاء النجاح
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>parent/partners/support" class="nav-link">
                        <i class="text-navy nav-icon fas fa-envelope-open-text"></i>
                        <p>
                            نظام الدعم الفني لشريك النجاح
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


