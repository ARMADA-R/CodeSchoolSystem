<?php require(APPPATH . 'Views/school/layouts/preContent.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header my-2 bg-white">

    <div class="row ">
        <div class="col  d-flex align-items-center ">
            إضافة استبانة
        </div>
    </div>
</div>
<!-- /.content-header -->



<?php require(APPPATH . 'Views/school/layouts/notifications-service-status.php') ?>


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
                                <input type="text" class="form-control" id="survey-title" name="title">
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
                    <div class="question-row">
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title"> السؤال</label>
                                    <textarea class="form-control questions" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4 d-flex">
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
                                        <input class="form-control answer">
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
                <button id="send-survey-btn" onclick="addSurvey()" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </div>
</div>


<?php include_once(APPPATH . 'Views/school/layouts/postContent.php') ?>




<script>
    var questions = '';
    var qAnswers = '';
    
    $(document).ready(function() {


    });

    function addQuestion() {
        $('#questions').append(`
                    <div class="question-row">
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title"> السؤال</label>
                                    <textarea class="form-control questions" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4 d-flex">
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
                                        <input class="form-control answer" >
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
                                        <input class="form-control answer" >
                                    </div>
                                </div>
                            </div>`);
    }


    function getQustions() {
        questions = '';
        qAnswers = '';

        $('.questions').each(function(index, element) {
            if ($(element).val() != '') {
                if (index != 0) {
                    questions += "," + $(element).val();
                } else {
                    questions += $(element).val();
                }
                getAnswers(element);
            }

        });
    }

    function getAnswers(element) {

        var anss = $(element).closest('.question-row').find(".answer");
        var ansVal = '';

        anss.each(function(index, element) {
            var eleVal = $(element).val();
            if (eleVal) {
                if (ansVal == '') {
                    ansVal += eleVal;
                } else {
                    ansVal += "|" + eleVal;
                }
            }
        });

        if (ansVal != '') {
            if (qAnswers == '') {
                qAnswers += ansVal;
            } else {
                qAnswers += "," + ansVal;
            }
        }
    }

    function addSurvey() {
        getQustions();
        $("#send-survey-btn").attr('disabled', 'true');
        $("#send-survey-btn").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span class="sr-only">جارٍ الارسال...</span>`);
        $.ajax({
                "url": "https://sa.arsail.net/schools/Servies/AddSurvey",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": token,
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "school_id": school_id,
                    "title": $('#survey-title').val(),
                    "questions": questions,
                    "anwsers": qAnswers,
                    "status": "1"
                }
            }).done(function(response) {
                toastr.success('تم اضافة تذكرة!');
                $("#send-survey-btn").html('حفظ');
                $("#send-survey-btn").removeAttr('disabled');
            })
            .fail(function(response) {
                console.log(response);
                toastr.error(response.responseJSON.msg, 'خطأ');
                $("#send-survey-btn").html('حفظ');
                $("#send-survey-btn").removeAttr('disabled');
            });
    }
</script>