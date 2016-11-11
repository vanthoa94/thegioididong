function RunAjax(url, dt, callback, error,cerror) {

    $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: dt,
        beforeSend: function () {
            if (typeof error !== 'boolean')
            ajaxrun.show();
        },
        success: function (result) {
            if (typeof error !== 'boolean') {
                ajaxrun.hide();
                
            }
            callback(result);

        },
        error: function (e, e2, e3) {
            if (typeof error !== 'boolean') {
                ajaxrun.hide();
                
            }
            if (typeof LoadPage !== 'undefined') {
                LoadPage.removeClass('process').hide();
            }
            if (error != null && typeof error == 'function') {
                error();
            } else {
                alert("Lỗi: " + e.status + e3);
            }
            if (cerror != null) {
                cerror();
            }
        }
    });
}
function RunAjaxArray(url, dt, callback, error,cerror) {

    $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: dt,
        traditional: true,
        beforeSend: function () {
            if (typeof error !== 'boolean')
            ajaxrun.show();
        },
        success: function (result) {
            if (typeof error !== 'boolean') {
                ajaxrun.hide();
               
            }
            callback(result);

        },
        error: function (e, e2, e3) {
            if (typeof error !== 'boolean') {
                ajaxrun.hide();
                
            }

            if (typeof LoadPage !== 'undefined') {
                LoadPage.removeClass('process').hide();
            }

            if (error != null && typeof error=='function') {
                error();
            } else {
                alert("Lỗi " + e.status+": " + e3);
            }
            if (cerror != null) {
                cerror();
            }

        }
    });
}