<?php require(APPPATH . 'Views/admin/layouts/preContent.php') ?>
<div class="card">
    <div class="card-header">
    <i class="fas fa-filter"></i> فلترة القوالب <br/>
    لاستبعاد العبارات والألفاظ غير المرغوبة
    </div>
    <div class="card-body">
<div class="row">

       


  
   <div class="col-m-6">
       <div class="form-group d-flex align-self-baseline">
         <label for=""style="white-space: nowrap;"class="p-2"> النص المرفوض:</label>
         <textarea id="text" class="form-control" name="" model="" rows="8"cols="50"style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);"></textarea>
       </div>
     

       </div>
    


</div>

          
    <hr>
        <div class="d-flex justify-content-end">
            <a class="btn btn-success m-2" style="color: #fff;
    background-color: #1bc5bd;
    border-color: #1bc5bd;" onclick="EditBlacklist() " >إرسال</a>


</div>  
    </div>
   
</div>
  



<?php require(APPPATH . 'Views/admin/layouts/postContent.php'); ?>


<script>
  $(document).ready(function() {
        $.ajax({
            url: "<?= site_url('') ?>Contact_us/GetBlacklist",
            method: "GET",
            "headers": {
                    "Authorization": token
                },
                data: {
               text:"" ,
                
            },

        }).done(function(response) {
           // toastr.success('تم تحديث البيانات بنجاح')
            $("#text").val(response.data.text);

        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
    });

    function EditBlacklist() {
        $.ajax({
            url: "<?= site_url('') ?>Contact_us/EditBlacklist",
            method: "POST",
          //  timeout: 0,
            headers: {
                'authorization': token,
                

            },
            data: {
               text:$("#text").val() ,
                
            },
                
        }).done(function(response) {
            toastr.success('تم تحديث البيانات بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
    }
    


    </script>