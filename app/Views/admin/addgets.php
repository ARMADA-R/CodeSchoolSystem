<?php require(APPPATH . 'Views/admin/layouts/preContent.php') ?>

<!-- start row1 -->

<!-- start card1 -->
<div class="card">

    <div class="card-header ">
    <i class="far fa-plus-square"></i>  <h6 class=" text-bold d-inline-flex">اضافة بوابة </h6>
    </div>
    <!-- start card body1 -->

    <div class="card-body">
        <div class="row">
            <!-- <div class="col-lg-6">
                <form>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="username">اسم المستخدم:</label>
                            <input type="text" class="form-control" id="username" value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password">كلمة المرور:</label>
                            <input type="text" class="form-control" id="password" value="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="email">البريد الإلكتروني:</label>
                            <input type="text" class="form-control" id="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="arabic_link" style="white-space: nowrap;">رابط الإرسال العربي:</label>

                            <input type="text" class="form-control" id="arabic_link" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="english_link" style="white-space: nowrap;">رابط الإرسال الإنجليزي:</label>
                            <input type="text" class="form-control" id="english_link" required>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-6">
                <form>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="status">حالة الإرسال:
                            </label>
                            <select class="custom-select" id="status" required>
                                <option selected disabled value="">اختر...</option>
                                <option value="0">مفعّل</option>
                                <option value="1"> غير مفعّل
                                </option>

                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="type_sender">نوع إرسال البيانات:
                            </label>
                            <select class="custom-select" id="type_sender" required>
                                <option selected disabled value="">اختر...</option>
                                <option>جلب</option>
                                <option>إرسال</option>

                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="encrypt_type">نوع التشفير
                            </label>
                            <input type="text" class="form-control" id="encrypt_type" required>
                        </div>


                    </div>

                </form>



            </div> -->

        </div>
        <hr>
        <div class="d-flex justify-content-end">
            <a onclick="save()" class="btn btn-success m-2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">حفظ</a>

        </div>
    </div>
    <!-- end card body1 -->


</div>

<!-- end card1 -->







<?php require(APPPATH . 'Views/admin/layouts/postContent.php'); ?>


<script>
   
   function save() 
      
   {
        $.ajax({
            url: "<?= site_url('') ?>Gates_Api/AddGate",
            method: "POST",
            "headers": {
                "Authorization": token
            },
            data: {
                username:  $("#username").val(),
                password:  $("#password").val(),
                arabic_link: $("#arabic_link").val(),
                english_link: $("#english_link").val(),
                email:$("#email").val(),
                type_sender: $("#type_sender").val(),
                status:$("#status").val(),
                encrypt_type:$("#encrypt_type").val()


            },

        }).done(function(response) {
            toastr.success('تم اضافةالبوابة  بنجاح')
           
            

        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء اضافة البوابة !', 'خطأ');
        });
    };

</script>