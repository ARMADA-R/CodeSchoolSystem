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
        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="القسم" style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 10%);">
    </div>

</div>
<div class="col-lg-3">
<label class="sr-only" for="inlineFormInputGroupUsername2">النوع</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="far fa-comment-dots"></i></div>
        </div>
    
        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="نوع المشكلة" style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 10%);">
    </div>
    </div>
    <div class="col-lg-3">
<label class="sr-only" for="inlineFormInputGroupUsername2">الحالة</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fab fa-atlassian"></i></div>
        </div>
    
        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder=" حالة:مفتوحة...." style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 10%);">
    </div>
    </div>
    <div class="col-lg-3">
<label class="sr-only" for="inlineFormInputGroupUsername2">الأولوية</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fas fa-vote-yea"></i></div>
        </div>
    
        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder=" الأولوية" style="box-shadow: 0px 10px 18px 1px rgb(0 0 0 / 10%);">
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


























<?php require(APPPATH . 'views/admin/layouts/postContent.php'); ?>