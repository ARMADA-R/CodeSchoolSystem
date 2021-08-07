<?php

use CodeIgniter\CLI\Console;

require(APPPATH . 'Views/admin/layouts/preContent.php') ?>


<!-- start card1 -->
<div class="card">

    <div class="card-header ">
    <i class="fas fa-key"></i>  <h6 class=" text-bold d-inline-flex">كيف أحل المشكلة
</h6> 




    </div>
    <!-- start card body1 -->

    <div class="card-body">
   <!-- start row1 --> 
    <div class="row">

    <div class="col-lg-3">

<label class="sr-only" for="inlineFormInputGroupUsername2">القسم</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fas fa-building"></i></div>
        </div>
        <label class="form-control" id="inlineFormInputGroupUsername2" placeholder="" style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 10%);cursor: wait;
">القسم</label>
    </div>

</div>
<div class="col-lg-3">
<label class="sr-only" for="inlineFormInputGroupUsername2">النوع</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="far fa-comment-dots"></i></div>
        </div>
    
        <label type="" class="form-control" id="inlineFormInputGroupUsername2" placeholder="" style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 10%);cursor: wait;">نوع المشكلة</label>
    </div>
    </div>
    <div class="col-lg-3">
<label class="sr-only" for="inlineFormInputGroupUsername2">الحالة</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fab fa-atlassian"></i></div>
        </div>
    
        <label type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder=" " style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 10%);cursor: wait;">حالة:مفتوحة</label>
    </div>
    </div>
    <div class="col-lg-3">
<label class="sr-only" for="inlineFormInputGroupUsername2">الأولوية</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fas fa-vote-yea"></i></div>
        </div>
    
        <label class="form-control" id="inlineFormInputGroupUsername2"  style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 10%);cursor: wait;">الأولوية</label>
    </div>
    </div>




    </div>
<!-- end row1 -->





<!-- start row2 -->
<div class="row">
<div class="col-lg-12">
<label class="m-2" style="white-space: nowrap;">رسالتك: </label>
                <textarea name="" class="form-control " rows="10" style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 15%);">أكتب رسالتك....</textarea></div>




</div>


</div>
<!-- end row2 -->









    </div>
   <!-- end card body1 -->


</div>

<!-- end card1 -->


























<?php require(APPPATH . 'Views/admin/layouts/postContent.php'); ?>



<script>
  $(document).ready(function() {
        $.ajax({
            url: "https://sa.arsail.net/schools/Tickets/GetTicketsReply",
            method: "GET",
            headers: {
                'authorization': "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTA4LTAyIiwiZXhwIjoiMjAyMi0wOC0wMiIsImRhdGEiOiIxNyJ9.xH9VpqElqG-dIbZPO3zEfC68qmQ1xoBWGpQTuh5WrBU",
         

            },
            data: {
                ticket_id:<?php  echo $id; ?>
                
            },
            
            

        }).done(function(response) {
            toastr.success('تم تحديث البيانات بنجاح')
        }).fail(function(response) {
            toastr.error('حدث خطأ ما اثناء تحديث البيانات!', 'خطأ');
        });
    });























</script>