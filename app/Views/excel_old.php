<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>excel</title>
</head>

<body>
    <form action="<?= site_url('excel') ?>" method="post" enctype='multipart/form-data'>
        <input type="file" name="excel" id="excel-to-upload">
        <input type="submit" value="submit">
    </form>
    <button onclick="uploadExcel()">API</button>

    <button onclick="uploadExcelByCourseController()">upload Excel By Course Controller</button>










    <!-- jQuery 3.4.1 -->
    <script src="<?php echo base_url() . '/public/'; ?>design/js/jquery-3.4.1.min.js"></script>

    <script>
        var school_id = '24';
        var user_id = '24';
        var token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTA4LTEyIiwiZXhwIjoiMjAyMi0wOC0xMiIsImRhdGEiOiIyNCJ9.IJDouAtgp4BtQHg0v1a1GbVxna-517QW0rwHQrR_d9A';


        function uploadExcel() {

            var form = new FormData();
            form.append("excel", $("#excel-to-upload")[0].files[0]);

            var jqxhr = $.ajax({
                    url: "<?= site_url('excel') ?>",
                    method: "POST",
                    timeout: 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    
                    data: form
                })
                .done(function(response) {
                    console.log(response);
                })
                .fail(function(response) {
                    console.log(response);
                });

        }


        function uploadExcelByCourseController() {

            var form = new FormData();
            form.append("excel", $("#excel-to-upload")[0].files[0]);
            form.append("school_id", school_id);
            form.append("user_id", user_id);

            var jqxhr = $.ajax({
                    url: "<?= site_url('CoursesExtends/AddCoursesFromFile') ?>",
                    method: "POST",
                    timeout: 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "headers": {
                        "Authorization": token,
                        // "Content-Type": "application/x-www-form-urlencoded"
                    },
                    data: form
                })
                .done(function(response) {
                    console.log(response);
                })
                .fail(function(response) {
                    console.log(response);
                });

        }
    </script>
</body>

</html>