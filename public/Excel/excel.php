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

    <hr>
    <hr>
    <hr>

    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="xlfile" id="xlf" accept=".xlsx" required>
            <label class="custom-file-label" for="xlf">upload-file</label>
        </div>
        <hr>
        <select name="" id="excelSheets">

        </select>
        <hr>
        <div id="htmlout"></div>
        <br>
        <button type="button" onclick="ExcelSubmit();" class="btn btn-info">save</button>
        <button type="reset" class="btn btn-outline-secondary">reset</button>
        <input type="hidden" class="form-control" name="table" id="jstable" required>
        <input type="" id="excel-form-submit" style="visibility: hidden;" value="">
    </div>








    <!-- jQuery 3.4.1 -->
    <script src="<?php echo base_url() . '/public/'; ?>design/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/parseTable.js"></script>
    <script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/shim.js"></script>
    <script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/xlsx.full.min.js"></script>
    <script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/jquery.dragtable.js"></script>
    <script src="<?php echo base_url() . '/public/'; ?>Excel/EXCEL/FileSaver.min.js"></script>

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

    <script>
        function ExcelSubmit() {

            getdata();

            console.log(JSON.parse(document.getElementById('jstable').value));
            document.getElementById('excel-form-submit').click();
        };

        var columns = {
            'fname': 'fname',
            'lname': 'lname',
            'father_name': 'father-name',
            'mother_name': 'mother-name',
        };

        $('.custom-file input').change(function(e) {
            if (e.target.files.length) {
                $(this).next('.custom-file-label').html(e.target.files[0].name);
            }
        });
    </script>


    <script>
        function getdata() {
            //rename and get data from table as js array 
            var index = 0;
            var thArray = [];

            $('#excel-table > thead > tr > th > select').each(function() {
                thArray.push($(this).val());
            });

            $('#excel-table > thead > tr > th').each(function() {
                $(this).text(thArray[index++]);
            });

            var table = document.getElementById("excel-table");
            var data = parseTable(table);

            //convert js array to JSON and passing it to php by html input
            document.getElementById('jstable').value = JSON.stringify(data);
        };

        function uniqueSelects() {
            $('select').on('change', function() {
                var selectedValues = [];
                $('select').each(function() {
                    var thisValue = this.value;
                    if (thisValue !== '')
                        selectedValues.push(thisValue);
                }).each(function() {
                    $(this).find('option:not(:selected)').each(function() {
                        if ($.inArray(this.value, selectedValues) === -1) {
                            $(this).removeAttr('hidden');
                        } else {
                            if (this.value !== '')
                                $(this).attr('hidden', 'hidden');
                        }
                    });
                });
            });
        }
    </script>




    <script>
        var sheetNames = [];
        var sheetToView = 0;
        var xlf = document.getElementById('xlf');
        var X = XLSX;
        var XW = {
            /* worker message */
            msg: 'xlsx',
            /* worker scripts */
            worker: '<?= base_url('') . '/public/' ?>Excel/EXCEL/xlsxworker.js'
        };
        var global_wb;

        var process_wb = (function() {
            $("#htmlout").html('');
            var OUT = document.getElementById('out');
            var HTMLOUT = document.getElementById('htmlout');

            var to_html = function to_html(workbook) {
                HTMLOUT.innerHTML = "";

                console.log(workbook);

                workbook.SheetNames.forEach(function(sheetName, index) {

                    console.log(index);
                    console.log(sheetName);



                    if (index == $("#excelSheets").val()) {


                        // if (condition) {
                        // }
                        var htmlstr = X.write(workbook, {
                            id: "excel-table",
                            editable: true,
                            sheet: sheetName,
                            type: 'string',
                            bookType: 'html'
                        });
                        // console.log(htmlstr);
                        var counter = 0;
                        for (var index = 1; index < htmlstr.length - 3; index++) {
                            if (htmlstr[index - 1] == '<' && htmlstr[index] == 't' && htmlstr[index + 1] == 'd') {
                                counter++;
                            }
                            if (htmlstr[index] == '/' && htmlstr[index + 1] == 't' && htmlstr[index + 2] == 'r')
                                break;
                        }

                        var head = "<thead><tr>";
                        for (let index = 0; index < counter; index++) {
                            let options = '';
                            Object.keys(columns).forEach(function(key) {
                                // do something with obj[key]
                                options += '<option value="' + key + '"> ' + columns[key] + ' </option>'
                            });

                            head += "<th>" +
                                ' <select required name="column_' + index + '" id="column_' + index + '" class="form-control">' +
                                '<option value="" selected> -- </option>' +
                                options +
                                '</select>' +
                                "</th>"

                        }
                        head += "</tr></thead>";
                        HTMLOUT.innerHTML += htmlstr;
                        document.getElementById('excel-table').innerHTML += head;
                        document.getElementById('excel-table').className += "draggable table table-striped table-bordered table-hover";
                        uniqueSelects();
                        // drag();

                    }
                });
                return "";
            };
            return function process_wb(wb) {
                global_wb = wb;
                var output = "";
                output = to_html(wb);


                if (typeof console !== 'undefined') console.log("output", new Date());
            };

        })();

        var do_file = (function() {
            var rABS = typeof FileReader !== "undefined" && (FileReader.prototype || {}).readAsBinaryString;
            var use_worker = typeof Worker !== 'undefined';
            var xw = function xw(data, cb) {
                var worker = new Worker(XW.worker);
                worker.onmessage = function(e) {
                    switch (e.data.t) {
                        case 'ready':
                            break;
                        case 'e':
                            console.error(e.data.d);
                            break;
                        case XW.msg:
                            cb(JSON.parse(e.data.d));
                            break;
                    }
                };
                worker.postMessage({
                    d: data,
                    b: rABS ? 'binary' : 'array'
                });
            };

            return function do_file(files) {
                var f = files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    if (typeof console !== 'undefined') console.log("onload", new Date(), rABS, use_worker);
                    var data = e.target.result;
                    if (!rABS) data = new Uint8Array(data);
                    if (use_worker) xw(data, process_wb);
                    else process_wb(X.read(data, {
                        type: rABS ? 'binary' : 'array'
                    }));

                    // set sheets names as options in select box
                    sheetNames = X.read(data, {
                        type: rABS ? 'binary' : 'array'
                    }).SheetNames;
                    $("#excelSheets").html("");
                    for (let i = 0; i < sheetNames.length; i++) {
                        $("#excelSheets").append($('<option>', {
                            value: i,
                            text: sheetNames[i],
                        }));
                    }
                };
                if (rABS) reader.readAsBinaryString(f);
                else reader.readAsArrayBuffer(f);

                // console.log(process_wb);
                // sheetNames = process_wb.SheetNames;

                // $("#excelSheets").html("");

                // for (let i = 0; i < sheetNames.length; i++) {
                //     $("#excelSheets").append($('<option>', {
                //         value: i,
                //         text: sheetNames[i],
                //     }));
                // }

            };

        })();

        (function() {
            if (!xlf.addEventListener) return;

            function handleFile(e) {
                do_file(e.target.files);
            }
            xlf.addEventListener('change', handleFile, false);

            $("#excelSheets").change(function() {
                process_wb(global_wb)
            })
        })();
    </script>

</body>

</html>