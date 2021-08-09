<?php require(APPPATH . 'Views/admin/layouts/preContent.php'); ?>


<div class="card ">
    <div class="card-header">
        <div class="heder1" id="yu">
            <div class="card-title"> <i class="fas fa-desktop"></i> <b>المعلومات الأساسية</b>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-lg-5  d-flex align-self-baseline ">

                <label class="m-2" style="white-space: nowrap;"> رقم الدعم الفني:</label>

                <input class="form-control " id="phone" style="border-radius:5px ;box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);" type="namber" name="" value="" placeholder="966+">
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-3  "><label class="">شعار النظام:</label></div>
                    <div class="col-lg-6">
                        <img id="image" src="<?php echo (base_url() . '/public/12.png'); ?>" class="img-thumbnail img2" style="width: 50%;box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);">

                        <div class="input-group" style="display: block;">
                            <label for="file" class="btn btn-success" style="margin-top: 6px;color: #fff;
                          background-color: #5883ba;width: 50%;
                           border-color: #ffffff; ">أختر صورة <i class="far fa-folder-open"></i></label>

                            <input class="btn btn-success a1" type="file" name="" style="margin-top: 6px;display:none;" id="file">
                            <h6 class="help-block sp1" style="display: block">أضف PNG أو JPG فقط
                            </h6>

                        </div>
                    </div>

                </div>
            </div>


        </div>
        <div class="row l1">
            <div class="col-md-6 d-flex align-self-baseline">

                <label class="m-2" style="white-space: nowrap;">جملة الحقوق: </label>
                <textarea name="" id="copyright" class="form-control " rows="3" style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);  "></textarea>
            </div>



        </div>
        <hr>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success m-2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">الغاء</a>
            <a class="btn btn-success m-2" onclick="setBasicData()" id="" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">تحديث</a>
        </div>

    </div>
</div>


<!-- /.row2 -->


<?php require(APPPATH . 'Views/admin/layouts/postContent.php'); ?>

<script>
   

    $(document).ready(function() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Info/GetInfo",
            method: "GET",
            data: {
                "phone":"",
                "copyright":'',
                "file":"" },

        }).done(function(response) {
          //  toastr.success('تم تحديث البيانات بنجاح')
          $("#copyright").val(response.data.copyright);
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
    });

    function setBasicData() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Info/EditInfo",
            method: "POST",
            // timeout: 0,
            headers: {
                'authorization': token,
                'content-type': 'multipart/form-data; boundary=----WebKitFormBoundary4mNmbXjLH5bIyIUi'
            },
            data: {
                "phone":$("#phone").val(),
                "copyright":$("#copyright").val(),
                "file": $("#file").val(),},
                
        }).done(function(response) {
            toastr.success('تم تحديث البيانات بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
    }

    function getAndsend() {
        setBasicData($("#phone").val(),$("#copyright").val() ,$("#file").val() );
    }

    function print(msg) {

        $("#copyright").html(msg)
        
    }
</script>