<?php require(APPPATH . 'Views/admin/layouts/preContent.php'); ?>


<div class="card ">
    <div class="card-header">
        <div class="heder1">
            <h3 class="card-title" style="font-weight: 700;">المعلومات الأساسية
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-lg-5  d-flex align-self-baseline ">
                
                <label class="m-2" style="white-space: nowrap;"> رقم الدعم الفني:</label>

                <input  class="form-control " style="border-radius:5px ;" type="namber" name="" value="" placeholder="966+"></div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-3  "><label class="">شعار النظام:</label></div>
                    <div class="col-lg-6">
                        <img src="<?php echo(base_url() . '/public/12.png'); ?>" class="img-thumbnail img2" style="width: 50%;">

                        <div class="input-group" style="display: block;">
                          <label for="file1" class="btn btn-success"style="margin-top: 6px;color: #fff;
                          background-color: #5883ba;width: 50%;
                           border-color: #ffffff; ">أختر صورة <i class="far fa-folder-open"></i></label>

                            <input class="btn btn-success a1" type="file" name="" style="margin-top: 6px;display:none;" id="file1">
                            <h6 class="help-block sp1" style="display: block">أضف PNG أو JPG فقط
                                                                </h6>

                        </div></div>

                </div>
            </div>


        </div>
        <div class="row l1">
            <div class="col-md-6 d-flex align-self-baseline">

                <label class="m-2" style="white-space: nowrap;">جملة الحقوق: </label>
                <textarea name="" class="form-control " rows="3">الحقوق محفوظة لمؤسسة إرسال</textarea></div>



        </div>
        <hr>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success m-2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">الغاء</a>
            <a class="btn btn-success m-2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">تحديث</a>
        </div>

    </div>
</div>


<!-- /.row2 -->


<?php require(APPPATH . 'views/admin/layouts/postContent.php'); ?>

