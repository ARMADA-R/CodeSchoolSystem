<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-light">
        <img src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">School System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mx-2 mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url() . '/public/'; ?>design/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                <li class="nav-header">اعدادات النظام</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/messageForms/global" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            قوالب الرسائل العامة
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/exams/tables" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            جداول الاختبارات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/global/table" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            الجدول المدرسي العام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/course/add" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            إضافة مادة
                        </p>
                    </a>
                </li>
                <li class="nav-header">البيانات الأساسية</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/students/info" class="nav-link">
                        <i class="nav-icon fas fa-chevron-left"></i>
                        <p>
                            بيانات الطلاب
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/teachers/info" class="nav-link">
                        <i class="nav-icon fas fa-chevron-left"></i>
                        <p>
                            بيانات المعلمين
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/employees/info" class="nav-link">
                        <i class="nav-icon fas fa-chevron-left"></i>
                        <p>
                            بيانات الإداريين
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/subjects/info" class="nav-link">
                        <i class="nav-icon fas fa-chevron-left"></i>
                        <p>
                            بيانات نظام المقررات

                        </p>
                    </a>
                </li>
                <li class="nav-header">الإشعارات المدرسية</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/notifications/absence-tardiness" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            اشعارات الغياب والتأخر

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/notifications/public-messages" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            اشعارات الرسائل العامة

                        </p>
                    </a>
                </li>

                <li class="nav-header">الأرشيف العام</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/archive/absence-tardiness" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            أرشيف اشعارات الغياب والتأخر
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/archive/public-messages" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            أرشيف الرسائل العامة
                        </p>
                    </a>
                </li>

                <li class="nav-header">نظام الرد لولي الامر</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/parents-responce/responce-archive" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            أرشيف نظام الرد
                        </p>
                    </a>
                </li>

                <li class="nav-header">تذاكر الدعم الفني</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/support/technical/tickets/sys-managers" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            مراسلة مدير النظام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/support/technical/tickets/parents" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            مراسلة أولياء الأمور
                        </p>
                    </a>
                </li>




                <li class="nav-header">خدمات إضافية</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/services/questionnaires" class="nav-link">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            الاستبانات الإلكترونية
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/services/forms" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            النماذج الالكترونية
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school" class="nav-link" data-toggle="modal" data-target="#linkShortnerModal">
                        <i class="nav-icon fas fa-link"></i>
                        <p>
                            اختصار الروابط
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/subjects/info" class="nav-link" data-toggle="modal" data-target="#uploadImageModal">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>
                            رفع صورة /اعلان
                        </p>
                    </a>
                </li>

                <li class="nav-header">متجر شريك النجاح</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/partners/offers" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            العروض
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() . '/public/'; ?>school/partners/support" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>
                            نظام الدعم الفني
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<div class="modal fade" id="linkShortnerModal" tabindex="-1" aria-labelledby="linkShortnerModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linkShortnerModalLabel">خدمة اختصار الروابط</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="title" class="col-form-label">الرابط</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title">
                                        <small id="link" class="form-text text-muted">اضف الرابط كاملا ابتداءً من http او https</small>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary">اختصر</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadImageModal" tabindex="-1" aria-labelledby="uploadImageModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadImageModalLabel">خدمة رفع صورة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="image" class="col-form-label">الملف</label>
                                <input id="image" type="file" class="form-control" size="1025" accept="image/*">
                                <small id="link" class="form-text text-muted">الحجم الأعظمي المسموح للصورة 1MB.</small>
                            </div>
                        </div>
                        <div class="col-sm-2 align-self-center">
                            <button type="button" style="width: inherit;" class="btn btn-outline-primary">معالجة</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="link" class="col-form-label">الرابط</label>
                                <input id="link" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
            </div>
        </div>
    </div>
</div>