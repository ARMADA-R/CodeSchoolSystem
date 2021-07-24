<?php require(APPPATH . 'Views/admin/layouts/preContent.php') ?>


    <div class="card ">
        <div class="card-header">
            <div class="heder1">
            <h3 class="card-title" style="font-weight: 700;">السلايدر</h3>
        </div>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="col-md-3"> <label class="la1 pull-left">نص العرض: </label> </div>
                <div class="col-md-6">


                    <textarea name="" class="form-control"  rows="3" placeholder="أدخل نص العرض:"></textarea></div>
                <div class="col-md-3"></div>

            </div>
            <!-- /.row2 -->


            <div class="row l1">
                <div class="col-md-3 input-sm"> <label class="la1">الصور: </label> </div>

                <div class="col-md-6 ca">

                    <form role="form" class="form-group">
                        <div class="input-group" style="display: block;">
                            <label for="file1" class="btn btn-success"style="margin-top:auto ;color: #fff;
                          background-color: #5883ba;
                           border-color: #ffffff;width: 50%; ">أختر صورة  <i class="far fa-folder-open"></i></label>

                            <input class="btn btn-success a1" type="file" name="" style="margin-top: 6px;display:none;" id="file1">
                            <h6 class="help-block sp1" style="display: block">أضف PNG أو JPG فقط
                            </h6>



                        </div>




                    </form>
                </div>





        </div>

    </div>

<!-- <div class="row">-->
<!--     <div class="col-md-10"></div>-->
<!--     <div class="col-md-2"><a class="btn btn-success " style="-->
<!--     margin: 9px 42px 22px 10px;color: #fff;-->
<!--    background-color: #1bc5bd;-->
<!--    border-color: #1bc5bd;">حفظ </a></div>-->
<!---->
<!---->
<!-- </div>-->
        <hr>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success m-2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">حفظ</a>

        </div>
<!--end panel 1 -->




        <div class="card ">
            <div class="card-header">
                <div class="heder1">
                   <i class="fas fa-images" style="display: inline"></i>
                    <h3 class="card-title" style="font-weight: 700; display: inline">استعراض صور السلايدر السابقة
                    </h3>

                </div>
            </div>
            <div class="card-body">



                <div class="row l1">
                    <div class="col-md-4">
                        <img src="<?php echo (base_url() .'/public/1.jpg'); ?>" class="img-thumbnail" style="width:50%">

                    </div>





                            </div>




                    </div>





                </div>

            </div>









            <?php require(APPPATH . 'views/admin/layouts/postContent.php') ?>

