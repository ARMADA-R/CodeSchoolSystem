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
            url: "https://sa.arsail.net/schools/Contact_us/GetBlacklist",
            method: "GET",
            "headers": {
                    "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTA4LTAyIiwiZXhwIjoiMjAyMi0wOC0wMiIsImRhdGEiOiIxNyJ9.xH9VpqElqG-dIbZPO3zEfC68qmQ1xoBWGpQTuh5WrBU"
                },
                data: {
               text:"" ,
                
            },

        }).done(function(response) {
            toastr.success('تم تحديث البيانات بنجاح')
            $("#text").val(response.data.text);

        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
    });

    function EditBlacklist() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Contact_us/EditBlacklist",
            method: "POST",
          //  timeout: 0,
            headers: {
                'authorization': "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTA4LTAyIiwiZXhwIjoiMjAyMi0wOC0wMiIsImRhdGEiOiIxNyJ9.xH9VpqElqG-dIbZPO3zEfC68qmQ1xoBWGpQTuh5WrBU",
                

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