<?php require(APPPATH . 'Views/admin/layouts/preContent.php') ?>


    <div class="card ">
        <div class="card-header">


            <div class="heder">
           


            <div class="card-title"> <i class="fas fa-desktop"></i> <h6 class=" text-bold  d-inline-flex">السلايدر</h6>
</div>

        </div>
        </div>
        <div class="card-body">

           <div class="row">
           <div class="col-md-6 ">
            <div class="row">
                <div class="col-md-6 ">
                  <input  type="hidden" id="id">
                <label class="p-2 "style="white-space: nowrap;;">نص العرض: </label> 

                    <textarea  id="text8" name="" class="form-control"  rows="5" cols="20" placeholder="أدخل نص العرض:"style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);"></textarea></div>
         

            </div>
            <!-- /.row2 -->

            </div>
                            <div class="col-md-6 ">
                                  <div class="row ">
                                  
                                  <div class="col-md-8  ">
                                   <label class="m-lg-2"style="display: block; ">الصور: </label> 


                                  <div class="m-m-6">

                                  <label for="file8" class="btn btn-success  "style="color: #fff;
                          background-color: #5883ba;
                           border-color: #ffffff;width: 75%; ">أختر صورة  <i class="far fa-folder-open"></i></label>

                            <input class="btn btn-success a1 form-control  " type="file" name="" style="margin-top: 50px;display:none;" id="file8">
                            <h6 class="help-block sp1" >الحجم الأعظمي المسموح للصورة 1MB، والحد الأقصى لعدد الصور 5..
                            </h6>
                                  </div>
                                 
                                   </div>   
                                  
                                 </div>
                




         
                                 </div>
    </div>

    </div>
        <hr>
        <div class="d-flex justify-content-end">
            <a onclick="AddSlider()"  class="btn btn-success m-2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">حفظ</a>

        </div>
<!--end panel 1 -->




        <div class="card ">
            <div class="card-header">
                <div class="heder">
     
     
                   <div class="card-title">                   <i class="fas fa-images " ></i>
 <h6 class=" text-bold  d-inline-flex">استعراض صور السلايدر السابقة  </h6>

</div>

                </div>
            </div>
            <div class="card-body">
             

                <div class="row l1">
                
              
                    <div class="col-md-3">

                    <img src="<?php echo (base_url() .'/public/1.jpg'); ?>" class="img-thumbnail" style="width:100%">
                    

                      
        <div class="d-flex justify-content-center">
    

            
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-info m-2 " data-toggle="modal" data-target="#exampleModal2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <div class="row">
            
            <div class="col-md-12 ">
            <label class="p-2 "style="white-space: nowrap;;">نص العرض: </label> 

                <textarea id="text2" name="" class="form-control"  rows="5" cols="20" placeholder="أدخل نص العرض:"style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);width: 75%;
               ">مرحبا بكم في نظام راصد نت المدرسي </textarea></div>
     

        </div>



                                 <div class="row ">
                               
                                  <div class="col-md-12  ">
                                   <label class="m-lg-2"style="display: block; ">الصور: </label> 


                                  <div class="m-m-6">

                                  <label for="file2" class="btn btn-success  "style="color: #fff;
                          background-color: #5883ba;
                           border-color: #ffffff;width: 40%; ">أختر صورة  <i class="far fa-folder-open"></i></label>

                            <input class="btn btn-success a1 form-control  " type="file" name="" style="margin-top: 50px;display:none;" id="file2">
                            <h6 class="help-block sp1" >الحجم الأعظمي المسموح للصورة 1MB، والحد الأقصى لعدد الصور 5..
                            </h6>
                                  </div>
                                 
                                   </div>   
                                  
                                 </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">تراجع</button>
          <button type="button" class="btn btn-primary" onclick="EditSliderseet()" id=""  >حفظ </button>
               </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->





 <!-- Button trigger modal -->
 <button type="button" class="btn btn-success m-2   " data-toggle="modal" data-target="#exampleModal1" style="color: #fff;
                  background-color: #ffc000;
                  border-color: #ffc000;">

حذف <i class="far fa-trash-alt"></i>                  </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">حذف البيانات
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <h5>هل أنت متأكد من رغبتك بالحذف؟
</h5>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">تراجع</button>
                        <button type="button" class="btn btn-primary" onclick="DeleteSlider()">حذف </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end Modal -->


                </div>













</div>     
</div>
   
   </div>


</div>
                   







            <?php require(APPPATH . 'Views/admin/layouts/postContent.php') ?>

<script>
  $(document).ready(function() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Slider_Api/Slider",
            method: "GET",
           
            

        }).done(function(response) {
            toastr.success('تم تحديث البيانات بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
    });

    function AddSlider() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Slider_Api/AddSlider",
            method: "POST",
          //  timeout: 0,
            headers: {
                'authorization': "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTA4LTAxIiwiZXhwIjoiMjAyMi0wOC0wMSIsImRhdGEiOiIxNyJ9.wb3NNCYPAdtG3qnvJiELl0mEhQ9tshj5T6AQvAHcDQU",
                'content-type': "multipart/form-data"

            },
            data: {
               text: $("#text8").val() ,
                file: $("#file8").val(),
            },
                
        }).done(function(response) {
            toastr.success('تم تحديث البيانات بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
    }

    function Slider() {
      AddSlider($("#text").val() ,$("#file").val());
    }




    function EditSlider(text2,file2) {
        $.ajax({
            url: "https://sa.arsail.net/schools/Slider_Api/EditSlider",
            method: "POST",
          //  timeout: 0,
            headers: {
                'authorization': "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTA4LTAxIiwiZXhwIjoiMjAyMi0wOC0wMSIsImRhdGEiOiIxNyJ9.wb3NNCYPAdtG3qnvJiELl0mEhQ9tshj5T6AQvAHcDQU",
                 'contentType:': "multipart/form-data"

            },
            data: {
                "text": text2,
                "file": file2
            },
                
        }).done(function(response) {
            toastr.success('تم تحديث البيانات بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
    }

    function  EditSliderseet() {
      EditSlider($("#text2").val() ,$("#file2").val());
    }

    function DeleteSlider() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Slider_Api/DeleteSlider",
            method: "DELETE",
          //  timeout: 0,
            headers: {
                'authorization': "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTA4LTAxIiwiZXhwIjoiMjAyMi0wOC0wMSIsImRhdGEiOiIxNyJ9.wb3NNCYPAdtG3qnvJiELl0mEhQ9tshj5T6AQvAHcDQU",
                 'contentType:': "application/x-www-form-urlencoded"

            },
            data: {
                
                
                "id":$("#id").val(),
                
            },
                
        }).done(function(response) {
            toastr.success('تم تحديث البيانات بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
    }

    function  Deleteset() {
      DeleteSlider($("#file").val());
    }




















</script>