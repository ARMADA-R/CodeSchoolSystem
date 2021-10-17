<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اعادة ضبط كلمة المرور</title>
</head>

<body>

    <div class="main">
        <div class="container" style="margin: 10px; text-align: center;">
            <div class="signup-content" style="margin-top: 200px; overflow: hidden;">
                <span>
                    بناء على الخدمات المقدمة في نظام راصد وتبعا لطلبكم الحصول على 
                <?= $service_name ?>
                المقدم من 
                <?= $offer->username ?>   <?= $offer->city ?>
                يمكنكم الكود التالي
                </span>
                <br>
                <?= $cobon ?>
                امسؤل استقبال شريكنا
                علما ان نهاية العرض سيكون نهاية دوام يوم 
                 <?= $offer->end_date ?>
                 
            </div>
        </div>
    </div>
</body>

</html>