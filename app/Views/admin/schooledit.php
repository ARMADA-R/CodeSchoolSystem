<?php require(APPPATH . 'Views/admin/layouts/preContent.php') ?>

<div class="card">
  <div class="card-header "> <i class="fas fa-cogs"></i>
  <h6 class="text-bold d-inline-flex">    تعديل بيانات المدرسة
</h6>
  </div>
  <div class="card-body">


    <div class="row">
      <!-- starrt class parent -->

      <div class="col-xl-6">
        <!-- starrt crad1 -->




        <div class="card collapsed-card">
          <div class="">
            <h6 class="text-center text-bold" id="school_name"></h6>
          </div>
          <div class="card-header ">
            <div class="row">

              <div class="col-lg-12">
                <!-- <img src="<?php echo (base_url() . '/public/13.png'); ?>" class="img-thumbnail img2 d-flex justify-content-lg-around " style="width: 400px;  
    height:250px;
    object-fit: scale-down;

"> -->
  <div class="card-tools">
                  
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  <div class="btn-group">
                    
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-plus"></i>
                  </button>
                
                </div>
              </div>

            </div>

          </div>
          <div class="card-body">

            <div class="form-group">


              <div style="display: inline;"><i class="fas fa-align-justify" style="color: #1bc5bd;"></i></div>


              <label for="">الفئة:
              </label>

              <div class=" wh float-md-right d-inline-flex">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal1" style="color: #fff;
                  background-color: #1bc5bd;
                  border-color: #1bc5bd;"onclick="editschoollsave1()">

                  تعديل<i class="far fa-edit"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">تعديل البيانات
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <h5>القيمة الجديدة:</h5>
                        <p><input type="text" name="" id="category1" value="" class=" form-control"> </p>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"onclick="editschoollsave1()">حفظ التعديل</button>
                      
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end Modal -->

              </div>
              <!-- end wh  Modal -->
              <small id="category" class="form-text text-muted text-bold" style="padding-right: 18px;"></small>
             
                <!--end class1 -->




    <!-- class2 -->

    <div style="display: inline;"><i class="far fa-flag" style="color: #1bc5bd;"></i></div>
    
<label for="">الرقم الوزاري:
</label>

<div class=" wh float-md-right d-inline-flex">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;"onclick="editschoollsave2()">

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
          <p><input type="text" name="" id="sidtext1" value="" class=" form-control"> </p>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"onclick="editschoollsave2()">حفظ التعديل</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->

<small id="sidtext" class="form-text text-muted text-bold" style="padding-right: 18px;">00000</small>

<!--end class2 -->







<!-- class3 -->


<div style="display: inline;"><i class="fas fa-phone" style="color: #1bc5bd;"></i></div>


<label for="">    رقم الجوال:

</label>

<div class=" wh float-md-right d-inline-flex">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal3" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;" onclick="editschoollsave3()">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <p><input type="text" name="" id="phone1" value="" class=" form-control"> </p>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="editschoollsave3()">حفظ التعديل</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->






<small id="phone" class="form-text text-muted text-bold" style="padding-right: 18px;">0966451235</small>

<!--end class3 -->

<!-- class4 -->


<div style="display: inline;"><i class="fas fa-map-marked-alt" style="color: #1bc5bd;"></i></div>


<label for="">   المدينة:

</label>

<div class=" wh float-md-right d-inline-flex">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal4" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;"onclick="editschoollsave4()">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel4">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <p><input type="text" name="" id="city1" value="" class=" form-control"> </p>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"onclick="editschoollsave4()">حفظ التعديل</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->






<small id="city" class="form-text text-muted text-bold" style="padding-right: 18px;"></small>

<!--end class4 -->
<!-- class5 -->


<div style="display: inline;"><i class="fas fa-users" style="color: #1bc5bd;"></i></div>


<label for="">  اسم المسنخدم:

</label>

<div class=" wh float-md-right d-inline-flex">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal5" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;"onclick="editschoollsave6()">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel5">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <p><input type="text" name="" id="username1" value="" class=" form-control"> </p>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"onclick="editschoollsave6()">حفظ التعديل</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->






<small id="username" class="form-text text-muted text-bold" style="padding-right: 18px;"></small>

<!--end class5 -->
<!-- class6 -->


<div style="display: inline;"><i class="far fa-envelope" style="color: #1bc5bd;"></i></div>


<label for="">   البريد الالكتروني:

</label>

<div class=" wh float-md-right d-inline-flex" >
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal6" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;"onclick="editschoollsave5()">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel6" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel6">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <p><input type="text" name="" id="email1" value="" class=" form-control"> </p>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"onclick="editschoollsave5()">حفظ التعديل</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->






<small id="email" class="form-text text-muted text-bold" style="padding-right: 18px;">
</small>

<!--end class6 -->

<!-- class7 -->


<div style="display: inline;"><i class="far fa-envelope" style="color: #1bc5bd;"></i></div>


<label for="">    كلمة المرور:

</label>

<div class=" wh float-md-right d-inline-flex" >
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#dal8" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;"onclick="editschoollsave8()">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="dal8" tabindex="-1" aria-labelledby="exampleLabel6" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleLabel6">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <p><input type="text" name="" id="password" value="" class=" form-control"> </p>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"onclick="editschoollsave8()">حفظ التعديل</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->






<small id="password" class="form-text text-muted text-bold" style="padding-right: 18px;">
</small>

<!--end class7 -->





<hr class="p-1">
        <div class="d-flex justify-content-center">
            <a class="btn btn-success " style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;" onclick="saveedite()">حفظ التعديلات</a>


</div>     







              <!-- end group forms -->
            </div>


          </div>
          <!-- end row crad bady -->



        </div>
    
    <!-- end card block1 -->
      </div>
    <!-- end  block1 -->



 <!-- starrt Block2 -->
      <!-- starrt crad2 -->
      <div class="col-xl-6"> 
    

      <div class="card collapsed-card">
          <div class="">
            <h6 class="text-center text-bold">الخدمات المفعلة
               </h6>
          </div>
          <div class="card-header ">
          <div class="card-tools">
                  
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  <div class="btn-group">
                    
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-plus"></i>
                  </button>
                
                </div>
            <div class="row">

              <div class="col-lg-12">
                <!-- <img src="<?php echo (base_url() . '/public/21.jpg'); ?>" class="img-thumbnail img2 d-flex justify-content-lg-around " style="width: 400px; height:250px;
          object-fit:scale-down;">
     -->
    

              </div>

            </div>

          </div>
          <div class="card-body">

            <div class="form-group">


              <div style="display: inline;"><i class="fab fa-google-wallet" style="color: #1bc5bd;"></i></div>



              <label for="" >
                             سحب الغياب من نظام نور
              </label>

              <div class=" wh float-md-right d-inline-flex">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal11" style="color: #fff;
                background-color: #1bc5bd;
    border-color: #1bc5bd;">

                  تعديل<i class="far fa-edit"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel11" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel11">تعديل البيانات
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <h5>القيمة الجديدة:</h5>
                        <input type="date" name="" id="end_date1" value="" class=" form-control"> 
                        <small id="emailHelp" class="form-text text-muted text-bold" style="padding-right: 18px;"> أدخل تاريخًا صالحًا </small>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="end_datesave1(), end_date1()">حفظ تاريخ الجديد</button>
                       
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end Modal -->

              </div>
              <!-- end wh  Modal -->
              <small id="end_date11" class="form-text text-muted text-bold" style="padding-right: 18px;">صالحة لغاية 30 كانون الثاني</small>
             
                <!--end class1 -->




    <!-- class2 -->

    <div style="display: inline;"><i class="fab fa-google-wallet" style="color: #1bc5bd;"></i></div>
    
<label for="">
رفع الغياب لنظام نور   
</label>

<div class=" wh float-md-right d-inline-flex">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal12" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel12" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel12">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <input type="date" name="" id="end_date2" value="" class=" form-control"> 
                        <small id="emailHelp" class="form-text text-muted text-bold" style="padding-right: 18px;"> أدخل تاريخًا صالحًا </small>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="end_datesave2(), end_date2()">حفظ تاريخ الجديد</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->

<small id="end_date12" class="form-text text-muted text-bold" style="padding-right: 18px;">صالحة لغاية 30 كانون الثاني</small>

<!--end class2 -->







<!-- class3 -->


<div style="display: inline;"><i class="fab fa-google-wallet" style="color: #1bc5bd;"></i></div>


<label for="">   
مراسلة المدرسة

</label>

<div class=" wh float-md-right d-inline-flex">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModa13" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModa13" tabindex="-1" aria-labelledby="exampleModalLabel13" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <input type="date" name="" id="end_date3" value="" class=" form-control"> 
                        <small id="emailHelp" class="form-text text-muted text-bold" style="padding-right: 18px;"> أدخل تاريخًا صالحًا </small>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="end_datesave3(), end_date3()">حفظ تاريخ الجديد</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->






<small id="end_date13" class="form-text text-muted text-bold" style="padding-right: 18px;">صالحة لغاية 30 كانون الثاني</small>

<!--end class3 -->

<!-- class4 -->


<div style="display: inline;"><i class="fab fa-google-wallet" style="color: #1bc5bd;"></i></div>


<label for="">  
النماذج الالكترونية

</label>

<div class=" wh float-md-right d-inline-flex">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal14" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal14" tabindex="-1" aria-labelledby="exampleModalLabel14" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel14">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <input type="date" name="" id="end_date4" value="" class=" form-control"> 
                        <small id="emailHelp" class="form-text text-muted text-bold" style="padding-right: 18px;"> أدخل تاريخًا صالحًا </small>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="end_datesave4(), end_date4()">حفظ تاريخ الجديد</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->






<small id="end_date14" class="form-text text-muted text-bold" style="padding-right: 18px;">صالحة لغاية 30 كانون الثاني</small>
 
<!--end class4 -->
<!-- class5 -->


<div style="display: inline;"><i class="fab fa-google-wallet" style="color: #1bc5bd;"></i></div>


<label for="">  
خدمة OTP

</label>

<div class=" wh float-md-right d-inline-flex" >
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModal15" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal15" tabindex="-1" aria-labelledby="exampleModalLabel15" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel7">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <input type="date" name="" id="end_date5" value="" class=" form-control"> 
                        <small id="emailHelp" class="form-text text-muted text-bold" style="padding-right: 18px;"> أدخل تاريخًا صالحًا </small>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="end_datesave5(), end_date5()">حفظ تاريخ الجديد</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->







<small id="end_date15" class="form-text text-muted text-bold" style="padding-right: 18px;">صالحة لغاية 30 كانون الثاني</small>

<!--end class5 -->

<!-- class6 -->


<div style="display: inline;"><i class="fab fa-google-wallet" style="color: #1bc5bd;"></i></i></div>


<label for="">   
خدمة تصميم الاستبانات الالكترونية

</label>

<div class=" wh float-md-right d-inline-flex" >
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#Modal66" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="Modal66" tabindex="-1" aria-labelledby="Modal6654" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel6">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <input type="date" name="" id="end_date6" value="" class=" form-control"> 
                        <small id="emailHelp" class="form-text text-muted text-bold" style="padding-right: 18px;"> أدخل تاريخًا صالحًا </small>
        </div>
        <div class="modal-footer">
        <button id="gggg" type="button" class="btn btn-secondary" data-dismiss="modal" onclick="end_datesave6(), end_date6()">حفظ تاريخ الجديد</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->







<small id="end_date16" class="form-text text-muted text-bold" style="padding-right: 18px;">صالحة لغاية 30 كانون الثاني
</small>

<!--end class6 -->

<!-- class7 -->


<div style="display: inline;"><i class="fab fa-google-wallet" style="color: #1bc5bd;"></i></div>


<label for="">   
خدمة نظام الرد

</label>

<div class=" wh float-md-right d-inline-flex" >
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#eModal7" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">

    تعديل<i class="far fa-edit"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="eModal7" tabindex="-1" aria-labelledby="eModal73" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eModal7">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <input type="date" name="" id="end_date7" value="" class=" form-control"> 
                        <small id="emailHelp" class="form-text text-muted text-bold" style="padding-right: 18px;"> أدخل تاريخًا صالحًا </small>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="end_datesave7(), end_date7()">حفظ تاريخ الجديد</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->

</div>
<!-- end wh  Modal -->






<small id="end_date17" class="form-text text-muted text-bold" style="padding-right: 18px;">صالحة لغاية 30 كانون الثاني
</small>
<div>
<br>

</div>

<!--end class7 -->







              <!-- end group forms -->
            </div>


          </div>
          <!-- end row crad bady -->



        </div>
    
    <!-- end card block1 -->
      </div>
    <!-- end  block2 -->
  
    <!-- end class container parent -->

  </div>


<!-- end class row parent parent -->







  <!-- start prenet 2 -->

  <div class="row" >
      <!-- start block1 -->
    <div class="col-xl-6">
<div class="card collapsed-card ">
  <div class="card-header">
  <h6 class="text-center text-bold">إحصائيات الرصيد</h6>

  <div class="card-tools">
                 
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  <div class="btn-group">
                    
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                
                </div>
  </div>
  <div class="card-body" style="display: none;">
  <div class="alert alert-info text-bold" role="alert" style="width: 68%;    padding: 3px;    box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 30%);
    border-radius: 50px;
">
     <img src="<?php echo (base_url() . '/public/24.png'); ?>" class="img-thumbnail img2" style="width: 75px;
    height: 45px;
    object-fit: contain;
    border-color: #17a2b8;
    background-color: #17a2b8;
    border-radius: 50px;
          ">
    
 <a href="#"style=" text-decoration: auto;padding: 1px;

">بوابة WhatsApp Web</a>


</div>
<div class="alert  alert-warning text-bold" role="alert"; style=" width: 68%; padding: 3px;
    border-radius: 50px;         box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 30%);">


     <img src="<?php echo (base_url() . '/public/25.png'); ?>" class="img-thumbnail img2" style="width: 75px;
    height: 45px;
    object-fit: contain;
    border-color: #ffeeba;
    background-color: #ffeeba;    border-radius: 50px;

          ">
    
 <a href="#" style=" text-decoration: auto; color: white!important
;">
    بوابة SMS</a>


</div>



  </div>
  
</div>



    </div>
     <!-- start block2 -->
    <div class="col-xl-6">
    <div class="card collapsed-card">
  <div class="card-header">
  <h6 class="text-center text-bold">مراسلة المدرسة

  
</h6>

  <div class="card-tools">
                 
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  <div class="btn-group">
                    
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-plus"></i>
                  </button>
                
                </div>
  </div>
  <div class="card-body">
    <div class="row" >
    <div class="col-lg-12 ">

<input id="message_title" class=" form-control m-2 p-2" type="text" placeholder="عنوان الرسالة"style="background-color: #f5f5f5;
    padding-top: 16px;
    padding-bottom: 16px;
    padding-left: 20px;
    border-style: solid;
    border-width: 2px;
    border-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);">


<textarea id="message_text" class=" form-control m-2" name="" id="" cols="7" rows="5" style="background-color: #f5f5f5;
    padding-top: 16px;
    padding-bottom: 16px;
    padding-left: 20px;
    border-style: solid;
    border-width: 2px;
    border-color: #ffffff;
    border-radius:15px;
    box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);" >نص الرسالة </textarea>

</div>



    </div>
    
    <hr>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success m-2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;" onclick="SendAdminEmailtoSchool()">إرسال</a>


</div>     

  </div>
  
</div>








    </div>
     <!-- end block2 -->




    </div>
      <!-- end prenet 2 -->
    
    
      </div>







<?php require(APPPATH . 'Views/admin/layouts/postContent.php'); ?>



<script>
   

    $(document).ready(function() {
      getschoolbyid();
      GetServicesSchools();
      GetServicesBySchoolID();
    });
 function getschoolbyid() {
  $.ajax({
            url: "https://sa.arsail.net/schools/Schools/GetSchoolByID",
            method: "GET",
            data: {
                id:<?php echo $id;?>
              },
              headers: {
                authorization: token,
               
            },

        }).done(function(response) {
          
          $("#school_name").html(response.data.school_name);
          $("#category").html(response.data.category);
          $("#sidtext").html(response.data.school_number);
          $("#city").html(response.data.city);
          $("#phone").html(response.data.phone);
          $("#email").html(response.data.email);
          $("#username").html(response.data.username);
          
          $("#category1").val(response.data.category);

           $("#sidtext1").val(response.data.school_number);
          $("#city1").val(response.data.city);
          $("#phone1").val(response.data.phone);
          $("#email1").val(response.data.email);
          $("#username1").val(response.data.username);
           // toastr.success('تم تحديث البيانات بنجاح')
         
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
 }

 function editschoollsave1() {
   
         var rr= $("#category1").val();
       $("#category").val(rr).html(rr);
       


 }
 function editschoollsave2() {
   
   var rr1=   $("#sidtext1").val();
   $("#sidtext").val(rr1).html(rr1);


}
function editschoollsave4() {
   
   
   var rr2=  $("#city1").val();
   $("#city").val(rr2).html(rr2);

   
}

function editschoollsave3() {
   
 

   var rr3=  $("#phone1").val();
   $("#phone").val(rr3).html(rr3);


}
function editschoollsave5() {
   

   var rr4=  $("#email1").val();
   $("#email").val(rr4).html(rr4);




  }
  function editschoollsave8() {
   

   var rr4=  $("#password").val();
   $("#password").val(rr4).html(rr4);


}


function editschoollsave6() {
   
   


   var rr5=  $("#username1").val();
   $("#username").val(rr5).html(rr5);

}



 function GetServicesSchools() {
  $.ajax({
            url: "https://sa.arsail.net/schools/Schools/GetServicesSchools",
            method: "GET",
          
              headers: {
                authorization: token,
               
            },

        }).done(function(response) {
           // toastr.success('تم تحديث البيانات  2بنجاح')
          $("#copyright").val(response.data.copyright);
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!2', 'خطأ');
        });
 }
 function GetServicesBySchoolID() {
  $.ajax({
            url: "https://sa.arsail.net/schools/Schools/GetServicesBySchoolID",
            method: "GET",
           
            data: {
              school_id:<?php echo $id;?>
              },
              headers: {
                authorization: token,
               
            },

        }).done(function(response) {
            //toastr.success('تم تحديث خدمات  بنجاح')
          $("#copyright").val(response.data.copyright);
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث خدمات!', 'خطأ');
        });
 }











    function saveedite() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Schools/EditSchool",
            method: "POST",
            // timeout: 0,
            headers: {
                authorization: token,
               

            },
            data: {



                "id":<?php echo $id;?>,
                "email": $("#email1").val(),
                
                "city": $("#city1").val(),
                "phone": $("#phone1").val(),
                "education_type": $("#file1").val(),
                "school_number": $("#sidtext1").val(),
                "username":  $("#username1").val(),
                "school_name": $("#school_name1").val(),
                "category": $("#category1").val(),
                "password": <?php echo $id;?>,

                
              
              },
                
        }).done(function(response) {
            toastr.success('تم حفظ جميع البيانات بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء حفظ البيانات!', 'خطأ');
        });
    }




    function SendAdminEmailtoSchool() {
  $.ajax({
            url: "https://sa.arsail.net/schools/Schools/SendAdminEmailtoSchool",
            method: "POST",
           
            data: {
              "id":<?php echo $id;?>,
                "message_title":$("#message_title").val(),
                "message_text":$("#message_text").val(),
                "school_email":$("#email1").val(),
                "admin_email":$("#email1").val(),

              },
              headers: {
                authorization: token,
              "content-type": "application/x-www-form-urlencoded"
            },

        }).done(function(response) {
            toastr.success('تم ارسال  الرسالة  بنجاح')
          $("#copyright").val(response.data.copyright);
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء ارسال الرسالة !', 'خطأ');
        });
 }




 function end_datesave1() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Schools/EditServiceSchool",
            method: "POST",
            // timeout: 0,
            headers: {
                authorization: token,
               

            },
            data: {



                "school_id":<?php echo $id;?>,
                
                "end_date": $("#end_date1").val(),
                "status": 1,
               

                "service_id":  6,
                

                
              
              },
                
        }).done(function(response) {
            toastr.success('تم حفظ  تاريخ الجديد بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء حفظ تاريخ الجديد!', 'خطأ');
        });
    }

    function end_date1() {
   

   var v1=  $("#end_date1").val();
   $("#end_date11").val(v1).html(v1);



}



function end_datesave2() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Schools/EditServiceSchool",
            method: "POST",
            // timeout: 0,
            headers: {
                authorization: token,
               

            },
            data: {



                "school_id":<?php echo $id;?>,
                
                "end_date": $("#end_date2").val(),
                "status": 1,
               

                "service_id":  7,
                

                
              
              },
                
            }).done(function(response) {
            toastr.success('تم حفظ  تاريخ الجديد بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء حفظ تاريخ الجديد!', 'خطأ');
        });
    }


function end_date2() {
   

   var v2=  $("#end_date2").val();
   $("#end_date12").val(v2).html(v2);


}
function end_date3() {
   

   var v3=  $("#end_date3").val();
   $("#end_date13").val(v3).html(v3);


}

function end_datesave3() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Schools/EditServiceSchool",
            method: "POST",
            // timeout: 0,
            headers: {
                authorization: token,
               

            },
            data: {



                "school_id":<?php echo $id;?>,
                
                "end_date": $("#end_date3").val(),
                "status": 1,
               

                "service_id":  4,
                

                
              
              },
                
            }).done(function(response) {
            toastr.success('تم حفظ  تاريخ الجديد بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء حفظ تاريخ الجديد!', 'خطأ');
        });
    }

function end_date4() {
   

   var v4=  $("#end_date4").val();
   $("#end_date14").val(v4).html(v4);


}

function end_datesave4() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Schools/EditServiceSchool",
            method: "POST",
            // timeout: 0,
            headers: {
                authorization: token,
               

            },
            data: {



                "school_id":<?php echo $id;?>,
                
                "end_date": $("#end_date4").val(),
                "status": 1,
               

                "service_id":  5,
                

                
              
              },
                
            }).done(function(response) {
            toastr.success('تم حفظ  تاريخ الجديد بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء حفظ تاريخ الجديد!', 'خطأ');
        });
    }

function end_date5() {
   

   var v5=  $("#end_date5").val();
   $("#end_date15").val(v5).html(v5);


}

function end_datesave5() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Schools/EditServiceSchool",
            method: "POST",
            // timeout: 0,
            headers: {
                authorization: token,
               

            },
            data: {



                "school_id":<?php echo $id;?>,
                
                "end_date": $("#end_date5").val(),
                "status": 1,
               

                "service_id":  2,
                

                
              
              },
                
            }).done(function(response) {
            toastr.success('تم حفظ  تاريخ الجديد بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء حفظ تاريخ الجديد!', 'خطأ');
        });
    }

function end_date6() {
   

   var v6=  $("#end_date6").val();
   $("#end_date16").val(v6).html(v6);


}

function end_datesave6() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Schools/EditServiceSchool",
            method: "POST",
            // timeout: 0,
            headers: {
                authorization: token,
               

            },
            data: {



                "school_id":<?php echo $id;?>,
                
                "end_date": $("#end_date6").val(),
                "status": 1,
               

                "service_id":  3,
                

                
              
              },
                
            }).done(function(response) {
            toastr.success('تم حفظ  تاريخ الجديد بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء حفظ تاريخ الجديد!', 'خطأ');
        });
    }



function end_datesave7() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Schools/EditServiceSchool",
            method: "POST",
            // timeout: 0,
            headers: {
                authorization: token,
               

            },
            data: {



                "school_id":<?php echo $id;?>,
                
                "end_date": $("#end_date7").val(),
                "status": 1,
               

                "service_id":  1,
                

                
              
              },
            }).done(function(response) {
            toastr.success('تم حفظ  تاريخ الجديد بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء حفظ تاريخ الجديد!', 'خطأ');
        });
    }
    function end_date7() {
   

   var v7=  $("#end_date7").val();
   $("#end_date17").val(v7).html(v7);


}

    
</script>