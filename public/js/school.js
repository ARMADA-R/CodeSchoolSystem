
function getShortenLink() {
    $("#get-shorrten-btn").attr('disabled', 'true');
    $("#get-shorrten-btn").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span class="sr-only">جارٍ التحميل...</span>`);
    $.ajax({
        "url": "https://sa.arsail.net/schools/Servies/GetTinyUrl",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Authorization": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUaGVfc2Nob29sIiwiYXVkIjoiVGhlX3Jld3IiLCJpYXQiOiIyMDIxLTAxLTI1IiwiZXhwIjoiMjAyMi0wMS0yNSIsImRhdGEiOiIxNCJ9.IN0TgoaZbO3b9NiH1eRO7eTmEwvV4ymVpVQR_h_g-Ww",
            "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
            "url": $("#link-to-short").val()
        }
    }).done(function (response) {
        $("#link-to-short").val(response.data);
        $("#get-shorrten-btn").html('اختصر');
        $("#get-shorrten-btn").removeAttr('disabled');
    }).fail(function (response) {
            console.log(response);
            toastr.error(response.responseJSON.msg, 'خطأ');
            $("#get-shorrten-btn").html('اختصر');
            $("#get-shorrten-btn").removeAttr('disabled');
        });
}
