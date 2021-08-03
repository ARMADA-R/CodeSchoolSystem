
<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-light">
        <img src="<?php echo base_url().'/public/';?>design/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">نظام المدارس</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mx-2 mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url().'/public/';?>design/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">اسم المستخدم</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">

                <li class="nav-header">المحددات الرئيسية</li>
                <li class="nav-item">
                    <a href="<?php echo base_url().'/public/admin/info';?>" class="nav-link">
                   
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            المعلومات الأساسية
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url().'/public/admin/slider';?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            السلادير
                        </p>
                    </a>
                </li>
                     <!-- اتصل بنا-->
                     
                <li class="nav-item">
                <!-- <a href="//<?php //echo base_url().'/public/admin/callus';?>" class="nav-link"> -->

                <a href="<?php echo base_url().'/public/admin/tebel';?>" class="nav-link">
                    <i class="nav-icon fas fa-phone"></i>
                    <p>
                        أتصل بنا
                    </p>
                </a>
                </li>
                <!-- end المحددات الرئيسية-->

                    
                <li class="nav-header">إعدادات النظام</li>
                <li class="nav-item">
                    <a href="<?php echo base_url().'/public/admin/gets';?>" class="nav-link">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>
                           البوابات
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url().'/public/admin/filter';?>" class="nav-link">
                        <i class="nav-icon fas fa-filter"></i>
                        <p>
                           نظام فلترة القوالب
                        </p>
                    </a>
                </li>

                <!-- end إعدادات النظام-->



                


                <li class="nav-header"> إدارة المدارس</li>
                
                <li class="nav-item">
                    <a href="<?php echo base_url().'/public/admin/mangeschool';?>" class="nav-link">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            إدارة المدارس
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>


                <!-- end إدارة المدارس-->
                <li class="nav-header"> إعدادات شركاءالنجاح
                </li>
            
                <li class="nav-item">
                <!-- <a href="<?php echo base_url().'/public/admin/user';?>" class="nav-link"> -->

                    <a href="<?php echo base_url().'/public/admin/schooledit';?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                           الأعضاء
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>


                <!-- end إدارة المدارس-->

                <li class="nav-header">  تذاكر الدعم الفني للمدارس</li>

                <li class="nav-item">
                    <a href="<?php echo base_url().'/public/admin/ticket';?>" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                         مدارس
                        </p>
                    </a>
                </li>
                <!-- -->
                <li class="nav-item">
                    <a href="<?php echo base_url().'/public/admin/parent';?>" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                         مدارس وأولياء الأمور
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?php echo base_url().'/public/admin/partner';?>" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                         شريك النجاح
                        </p>
                    </a>
                </li>
                <!-- end تذاكر الدعم الفني للمدارس-->

                <!-- end إدارة المدارس-->
                <li class="nav-header">أرشيف الرسائل
                </li>
                
                <li class="nav-item">

                    <!-- <a href="<?php echo base_url().'/public/admin/adminemail';?>" class="nav-link"> -->
                    <a href="<?php echo base_url().'/public/admin/problem';?>" class="nav-link">

                        <i class="nav-icon fas fa-mail-bulk"></i>
                        <p>
                          بريد مدير لوحة التحكم
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
