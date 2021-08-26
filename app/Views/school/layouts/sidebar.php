<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-navy ">
    <!-- Brand Logo -->
    <a href="<?= site_url() ?>" class="brand-link navbar-navy">
        <img src="<?= site_url('public') ?>/design/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-white-50">School System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar hide-scrollbar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mx-2 mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= site_url() ?>design/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">اسم المستخدم</a>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                <li class="nav-header">اعدادات النظام</li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/messageForms/global" class="nav-link <?php echo strpos(current_url(),'school/messageForms/global')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-clipboard-list" style="display:  <?php echo strpos(current_url(),'school/messageForms/global')? 'none' :''; ?>;"></i>
                        <p>
                            قوالب الرسائل العامة
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/exams/tables" class="nav-link <?php echo strpos(current_url(),'school/exams/tables')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-clipboard-list" style="display:  <?php echo strpos(current_url(),'school/exams/tables')? 'none' :''; ?>;"></i>
                        <p>
                            جداول الاختبارات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/global/table" class="nav-link <?php echo strpos(current_url(),'school/global/table')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-clipboard-list" style="display:  <?php echo strpos(current_url(),'school/global/table')? 'none' :''; ?>;"></i>
                        <p>
                            الجدول المدرسي العام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/gates/link" class="nav-link <?php echo strpos(current_url(),'school/gates/link')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-clipboard-list" style="display:  <?php echo strpos(current_url(),'school/gates/link')? 'none' :''; ?>;"></i>
                        <p>
                            ربط بوابات الاشعارات
                        </p>
                    </a>
                </li>
                <li class="nav-header">البيانات الأساسية</li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/students/info" class="nav-link <?php echo strpos(current_url(),'school/students/info')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-chevron-left" style="display:  <?php echo strpos(current_url(),'school/students/info')? 'none' :''; ?>;"></i>
                        <p>
                            بيانات الطلاب
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/teachers/info" class="nav-link <?php echo strpos(current_url(),'school/teachers/info')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-chevron-left" style="display:  <?php echo strpos(current_url(),'school/teachers/info')? 'none' :''; ?>;"></i>
                        <p>
                            بيانات المعلمين
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/employees/info" class="nav-link <?php echo strpos(current_url(),'school/employees/info')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-chevron-left" style="display:  <?php echo strpos(current_url(),'school/employees/info')? 'none' :''; ?>;"></i>
                        <p>
                            بيانات الإداريين
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/subjects/info" class="nav-link <?php echo strpos(current_url(),'school/subjects/info')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-chevron-left" style="display:  <?php echo strpos(current_url(),'school/subjects/info')? 'none' :''; ?>;"></i>
                        <p>
                            بيانات نظام المقررات

                        </p>
                    </a>
                </li>
                <li class="nav-header">الإشعارات المدرسية</li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/notifications/absence-tardiness" class="nav-link <?php echo strpos(current_url(),'school/notifications/absence-tardiness')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-bell" style="display:  <?php echo strpos(current_url(),'school/notifications/absence-tardiness')? 'none' :''; ?>;"></i>
                        <p>
                            اشعارات الغياب والتأخر

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/notifications/public-messages" class="nav-link <?php echo strpos(current_url(),'school/notifications/public-messages')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-bell" style="display:  <?php echo strpos(current_url(),'school/notifications/public-messages')? 'none' :''; ?>;"></i>
                        <p>
                            اشعارات الرسائل العامة

                        </p>
                    </a>
                </li>

                <li class="nav-header">الأرشيف العام</li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/archive/absence-tardiness" class="nav-link <?php echo strpos(current_url(),'school/archive/absence-tardiness')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-inbox" style="display:  <?php echo strpos(current_url(),'school/archive/absence-tardiness')? 'none' :''; ?>;"></i>
                        <p>
                            أرشيف اشعارات الغياب
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/archive/public-messages" class="nav-link <?php echo strpos(current_url(),'school/archive/public-messages')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-inbox" style="display:  <?php echo strpos(current_url(),'school/archive/public-messages')? 'none' :''; ?>;"></i>
                        <p>
                            أرشيف الرسائل العامة
                        </p>
                    </a>
                </li>

                <li class="nav-header">نظام الرد لولي الامر</li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/parents-responce/responce-archive" class="nav-link <?php echo strpos(current_url(),'school/parents-responce/responce-archive')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-inbox" style="display:  <?php echo strpos(current_url(),'school/parents-responce/responce-archive')? 'none' :''; ?>;"></i>
                        <p>
                            أرشيف نظام الرد
                        </p>
                    </a>
                </li>

                <li class="nav-header">تذاكر الدعم الفني</li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/support/technical/tickets/sys-managers" class="nav-link <?php echo strpos(current_url(),'school/support/technical/tickets/sys-managers')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-comments" style="display:  <?php echo strpos(current_url(),'school/support/technical/tickets/sys-managers')? 'none' :''; ?>;"></i>
                        <p>
                            مراسلة مدير النظام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/support/technical/tickets/parents" class="nav-link <?php echo strpos(current_url(),'school/support/technical/tickets/parents')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-comments" style="display:  <?php echo strpos(current_url(),'school/support/technical/tickets/parents')? 'none' :''; ?>;"></i>
                        <p>
                            مراسلة أولياء الأمور
                        </p>
                    </a>
                </li>




                <li class="nav-header">خدمات إضافية</li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/services/questionnaires" class="nav-link <?php echo strpos(current_url(),'school/services/questionnaires')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-question" style="display:  <?php echo strpos(current_url(),'school/services/questionnaires')? 'none' :''; ?>;"></i>
                        <p>
                            الاستبانات الإلكترونية
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/services/forms" class="nav-link <?php echo strpos(current_url(),'school/services/forms')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-clipboard-list" style="display:  <?php echo strpos(current_url(),'school/services/forms')? 'none' :''; ?>;"></i>
                        <p>
                            النماذج الالكترونية
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school" class="nav-link" data-toggle="modal" data-target="#linkShortnerModal">
                        <i class="text-navy nav-icon fas fa-link"></i>
                        <p>
                            اختصار الروابط
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/subjects/info" class="nav-link" data-toggle="modal" data-target="#uploadImageModal">
                        <i class="text-navy nav-icon fas fa-file-upload"></i>
                        <p>
                            رفع صورة /اعلان
                        </p>
                    </a>
                </li>

                <li class="nav-header">متجر شريك النجاح</li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/partners/offers" class="nav-link <?php echo strpos(current_url(),'school/partners/offers')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-star" style="display:  <?php echo strpos(current_url(),'school/partners/offers')? 'none' :''; ?>;"></i>
                        <p>
                            العروض
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url() ?>school/partners/support" class="nav-link <?php echo strpos(current_url(),'school/partners/support')? 'active' :''; ?>">
                        <i class="text-navy nav-icon fas fa-envelope-open-text" style="display:  <?php echo strpos(current_url(),'school/partners/support')? 'none' :''; ?>;"></i>
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
                                <label for="link-to-short" class="col-form-label">الرابط</label>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="link-to-short">
                                        <small class="form-text text-muted">اضف الرابط كاملا ابتداءً من http او https</small>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" onclick="getShortenLink()" id="get-shorrten-btn" class="btn btn-primary">اختصر</button>
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
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="image-to-upload" class="col-form-label">الملف</label>
                                <input id="image-to-upload" type="file" class="form-control" size="1025" accept="image/*">
                                <small class="form-text text-muted">الحجم الأعظمي المسموح للصورة 1MB.</small>
                            </div>
                        </div>
                        <div class="col-sm-3 align-self-center">
                            <button type="button" id="image-to-upload-btn" style="width: inherit;" onclick="uploadImage()" class="btn btn-outline-primary">معالجة</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="uploaded-image-link" class="col-form-label">الرابط</label>
                                <input id="uploaded-image-link" type="text" class="form-control">
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

