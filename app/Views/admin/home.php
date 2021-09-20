<?php require(APPPATH . 'Views/admin/layouts/preContent.php') ?>


<div class="card ">
  <div class="card-header">


    <div class="heder">



      <div class="card-title"> <i class="fas fa-desktop"></i>
        <h6 class=" text-bold  d-inline-flex">السلايدر</h6>
      </div>

    </div>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-md-6 ">
        <div class="row">
          <div class="col-md-6 ">
            <input type="hidden" id="id">
            <label class="p-2 " style="white-space: nowrap;;">نص العرض: </label>

            <textarea id="text8" name="" class="form-control" rows="5" cols="20" placeholder="أدخل نص العرض:" style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);"></textarea>
          </div>


        </div>
        <!-- /.row2 -->

      </div>
      <div class="col-md-6 ">
        <div class="row ">

          <div class="col-md-8  ">
            <label class="m-lg-2" style="display: block; ">الصور: </label>


            <div class="m-m-6">

              <label for="file8" class="btn btn-success  " style="color: #fff;
                          background-color: #5883ba;
                           border-color: #ffffff;width: 75%; ">أختر صورة <i class="far fa-folder-open"></i></label>

              <input class="btn btn-success a1 form-control  " type="file" name="" style="margin-top: 50px;display:none;" id="file8">
              <h6 class="help-block sp1">الحجم الأعظمي المسموح للصورة 1MB، والحد الأقصى لعدد الصور 5..
              </h6>
            </div>

          </div>

        </div>






      </div>
    </div>

  </div>
  <hr>
  <div class="d-flex justify-content-end">
    <a onclick="AddSlider()" class="btn btn-success m-2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;">حفظ</a>

  </div>
  <!--end panel 1 -->




  <div class="card ">
    <div class="card-header">
      <div class="heder">


        <div class="card-title"> <i class="fas fa-images "></i>
          <h6 class=" text-bold  d-inline-flex">استعراض صور السلايدر السابقة </h6>

        </div>

      </div>
    </div>
    <div class="card-body">


      <div id="lider" class="row l1  ">



      </div>

    </div>


  </div>







  <!-- Modal -->
  <div class="modal fade" id="edite1" tabindex="-1" aria-labelledby="edite1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edite1l">تعديل البيانات
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>القيمة الجديدة:</h5>
          <div class="row">

            <div class="col-md-12 ">
              <label class="p-2 " style="white-space: nowrap;">نص العرض: </label>

              <textarea id="text2" name="" class="form-control" rows="5" cols="20" placeholder="أدخل نص العرض:" style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);width: 75%;
" model=""> </textarea>
            </div>


          </div>



          <div class="row ">

            <div class="col-md-12  ">
              <label class="m-lg-2" style="display: block; ">الصور: </label>


              <div class="m-m-6">

                <label for="file2" class="btn btn-success  " style="color: #fff;
      background-color: #5883ba;
       border-color: #ffffff;width: 40%; ">أختر صورة <i class="far fa-folder-open"></i></label>

                <input class="btn btn-success a1 form-control  " type="file" name="" style="margin-top:50px; display:none;" id="file2">
                <h6 class="help-block sp1">الحجم الأعظمي المسموح للصورة 1MB، والحد الأقصى لعدد الصور 5..
                </h6>
              </div>

            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="EditSlider()">حفظ</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->



  <button style="display: none;" id="lunchEdit" data-toggle="modal" data-target="#edite1"></button>

  <!-- Modal -->
  <div class="modal fade" id="delete1" tabindex="-1" aria-labelledby="delete1l" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel12">حذف البيانات
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
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="DeleteSlider()">حذف </button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal -->





  <?php require(APPPATH . 'Views/admin/layouts/postContent.php') ?>

  <script>
    $(document).ready(function() {
      getliders();


    });

    function getliders() {
      $.ajax({
        url: "<?= site_url('') ?>Slider_Api/Slider",
        method: "GET",

      }).done(function(response) {
        // toastr.success('تم تعديل البيانات بنجاح');
        y22(response.data);

      }).fail(function(response) {
        toastr.error('حدث خطأ ما اثناء تعديل البيانات!', 'خطأ');
      });
    }


    function prent(msg) {
      console.log(msg);
      $('#text2').val(msg);
      $('#text2').html(msg);
      $('#lunchEdit').click();

    }

    function AddSlider() {
      var form = new FormData();
      form.append("text", $("#text8").val());
      form.append("file", $("#file8")[0].files[0]);

      $.ajax({
        url: "<?= site_url('') ?>Slider_Api/AddSlider",
        method: "POST",
        timeout: 0,
        headers: {
          'authorization': token,
        },
        "processData": false,
        "mimeType": "multipart/form-data",

        "contentType": false,
        "data": form

      }).done(function(response) {
        toastr.success('تم اضافة البيانات بنجاح');
        getliders();
      }).fail(function(response) {
        toastr.error(response.responseJSON.msg, 'خطأ');

      });
    }

    function Slider() {
      AddSlider($("#text").val(), $("#file").val());
    }




    function EditSlider() {
      var form = new FormData();
      form.append("id", $('.imgee').attr('id'));

      form.append("text", $("#text2").val());
      form.append("file", $("#file2")[0].files[0]);
      $.ajax({
        url: "<?= site_url('') ?>Slider_Api/EditSlider",
        method: "POST",

        timeout: 0,
        headers: {
          'authorization': token,
        },
        "processData": false,
        "mimeType": "multipart/form-data",

        "contentType": false,


        "data": form




      }).done(function(response) {
        toastr.success('تم تحديث البيانات بنجاح');
        // location.href = '';
        getliders();

      }).fail(function(response) {
        toastr.error('حدث خطأ ما اثناء التحديث!', 'خطأ');
      });
    }



    function DeleteSlider(id) {
      if (!confirm("هل انت متأكد من حذف العنصر المحدد؟")) {
        return;
      }
      $.ajax({
        url: "<?= site_url('') ?>Slider_Api/DeleteSlider",
        method: "DELETE",
         timeout: 0,
        headers: {
          'authorization': token,
        },
        data: {
          id: id,
        },

      }).done(function(response) {
        toastr.success('تم حذف البيانات بنجاح');
        getliders();
      }).fail(function(response) {
        toastr.error('حدث خطأ ما اثناء حذف البيانات!', 'خطأ');
      });
    }

    function Deleteset() {
      DeleteSlider($("#file").val());
    }




    function y22(data) {
      $("#lider").html('');
      for (let i = 0; i < data.length; i++) {
        $("#lider").append(`
                <div class="col-md-3">
                          <img src="${data[i].image_url}" class="imgee img-thumbnail d-flex justify-content-lg-around  " style=" height:200px;    width: -webkit-fill-available; object-fit: scale-down; " id="${data[i].id}">

                          <div class="d-flex justify-content-center">

                          <!-- Button trigger modal -->
                          <button  type="button" class="btn btn-info m-2  btnmg"  style="color: #fff;
                          background-color: #1bc5bd;
                          border-color: #1bc5bd;" onclick="prent('${data[i].text}')">

                          تعديل<i class="far fa-edit"></i>
                          </button>

                          <!-- Button trigger modal -->
                          <button id="" type="button" onclick="DeleteSlider('${data[i].id}')" class="btn btn-success m-2   " style="color: #fff;
                          background-color: #ffc000;
                          border-color: #ffc000;">

                          حذف <i class="far fa-trash-alt"></i> </button>




                          </div>

`);




      }

    }
  </script>