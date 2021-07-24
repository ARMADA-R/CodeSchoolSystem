<?php require(APPPATH . 'views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col  d-flex align-items-center ">
            إضافة استبانة
        </div>
    </div>
</div>
<!-- /.content-header -->



<div class="row mt-4 pb-5" style="font-size: 1rem;">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-2">
                <p class="mb-1">23,508</p>
                <p class="mb-1">رصيد الإشعارات « خدمة الرسائل القصيرة »</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-2">
                <p class="mb-1">23,508</p>
                <p class="mb-1">رصيد الإشعارات « خدمة الرسائل القصيرة »</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-2">
                <p class="mb-1">23,508</p>
                <p class="mb-1">رصيد الإشعارات « خدمة الرسائل القصيرة »</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <hr class="mt-5">
                <div class="questionnaire-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">عنوان الاستبانة</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">

                            <div class="form-group d-flex">
                                <button class="btn btn-light align-self-end" onclick="addQuestion()">
                                    اضف سؤالاً
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="questions">
                    <div id="Q1">
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title"> السؤال</label>
                                    <textarea class="form-control" rows="1" id="title"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="form-group d-flex">
                                    <button class="btn btn-light align-self-end" onclick="addAnswer(this)">
                                        اضف جواباً
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="QAnswers" class="mr-3">
                            <label for="title"> الاجوبة</label>
                            <div class="row">
                                <div class="col-md-8 ml-1">
                                    <div class="form-group">
                                        <input class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <p>
                    سيتم تجاهل السؤال الذي لايحتوي على أجوبة.

                </p>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </div>
</div>


<?php include_once(APPPATH . 'views/school/layouts/postContent.php') ?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    $(document).ready(function() {


    });

    function addQuestion() {
        $('#questions').append(`
                    <div id="Q1">
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title"> السؤال</label>
                                    <textarea class="form-control" rows="1" id="title"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="form-group d-flex">
                                    <button class="btn btn-light align-self-end" onclick="addAnswer(this)">
                                        اضف جواباً
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="QAnswers" class="mr-3">
                            <label for="title"> الاجوبة</label>
                            <div class="row">
                                <div class="col-md-8 ml-1">
                                    <div class="form-group">
                                        <input class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
    }

    function addAnswer(element) {
        $(element).parent().parent().parent().parent().children("div#QAnswers").append(`
                            <div class="row">
                                <div class="col-md-8 ml-1">
                                    <div class="form-group">
                                        <input class="form-control" id="">
                                    </div>
                                </div>
                            </div>`);
    }
</script>