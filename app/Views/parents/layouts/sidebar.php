<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-navy ">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-navy">
        <img src="<?= site_url('public') ?>/design/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                    <a href="<?= site_url() ?>parent/school/exams/tables" class="nav-link <?php echo strpos(current_url(),'parent/school/exams/tables')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-clipboard-list" style="color:  <?php echo strpos(current_url(),'parent/school/exams/tables')? '#f4f6f9' :''; ?>;"></i>
                        <p>
                            جداول الاختبارات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>parent/school/global/table" class="nav-link <?php echo strpos(current_url(),'parent/school/global/table')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-clipboard-list" style="color:  <?php echo strpos(current_url(),'parent/school/global/table')? '#f4f6f9' :''; ?>;"></i>
                        <p>
                            الجدول المدرسي العام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>parent/school/questionnaires" class="nav-link <?php echo strpos(current_url(),'parent/school/questionnaires')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-clipboard-list" style="color:  <?php echo strpos(current_url(),'parent/school/questionnaires')? '#f4f6f9' :''; ?>;"></i>
                        <p>
                            الاستبانات الإلكترونية
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>parent/school/forms" class="nav-link <?php echo strpos(current_url(),'parent/school/forms')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-clipboard-list" style="color:  <?php echo strpos(current_url(),'parent/school/forms')? '#f4f6f9' :''; ?>;"></i>
                        <p>
                            النماذج الالكترونية
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= site_url() ?>parent/school/notification" class="nav-link <?php echo strpos(current_url(),'parent/school/notification')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-bell" style="color:  <?php echo strpos(current_url(),'parent/school/notification')? '#f4f6f9' :''; ?>;"></i>
                        <p>
                            التنبيهات المدرسية
                        </p>
                    </a>
                </li>


                <li class="nav-header">الدعم الفني</li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>parent/support/technical/sys-managers/messaging" class="nav-link <?php echo strpos(current_url(),'parent/support/technical/sys-managers/messaging')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-comments" style="color:  <?php echo strpos(current_url(),'parent/support/technical/sys-managers/messaging')? '#f4f6f9' :''; ?>;"></i>
                        <p>
                            مراسلة مدير النظام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>parent/support/technical/school-management/messaging" class="nav-link <?php echo strpos(current_url(),'parent/support/technical/school-management/messaging')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-comments" style="color:  <?php echo strpos(current_url(),'parent/support/technical/school-management/messaging')? '#f4f6f9' :''; ?>;"></i>
                        <p>
                            مراسلة ادارة المدرسة
                        </p>
                    </a>
                </li>




                <li class="nav-header">شركاء النجاح</li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>parent/partners/offers" class="nav-link <?php echo strpos(current_url(),'parent/partners/offers')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-star" style="color:  <?php echo strpos(current_url(),'parent/partners/offers')? '#f4f6f9' :''; ?>;"></i>
                        <p>
                            عروض من شركاء النجاح
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>parent/partners/support" class="nav-link <?php echo strpos(current_url(),'parent/partners/support')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-envelope-open-text" style="color:  <?php echo strpos(current_url(),'parent/partners/support')? '#f4f6f9' :''; ?>;"></i>
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


