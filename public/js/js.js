function getConfirm(confirmMessage, callback) {
    confirmMessage = confirmMessage || '';

    $('#confirmbox').modal({
        show: true,
        backdrop: false,
        keyboard: false,
    });

    $('#confirmMessage').html(confirmMessage);
    $('#confirmFalse').on('click', function () {
        $('#confirmbox').modal('hide');
        $(this).off('click');
        $('#confirmTrue').off('click');
        if (callback) callback(false);

    });
    $('#confirmTrue').on('click', function () {
        $('#confirmbox').modal('hide');
        $(this).off('click');
        $('#confirmFalse').off('click');
        if (callback) callback(true);
    });
}
function getAlert(message) {
    var alertDialog = $('#alterdialog');
    alertDialog.find(".modal-body p").html(message);
    alertDialog.modal({
        show: true,
        backdrop: false,
        keyboard: false,
    });
    
}

function AjaxProcess() {
    this.obj = null;

    this.init = function () {
        obj = $("#ajaxloader");
    }

    this.show = function () {
        obj.css("display","block");
    }

    this.hide = function () {
        obj.css("display", "none");
    }
}

function huybo(url) {
    getConfirm("Bạn có chắc muốn hủy bỏ?", function (result) {
        if (result) {
            window.location.href=url;
        }
    });
}

var ajaxrun = null;
$(document).ready(function () {

   $("a.logout").click(function () {
        var th = $(this);
        getConfirm("Bạn có chắc muốn thoát?", function (result) {
            if (result) {
                window.location.href = th.attr("href");
            }
        });

        return false;
    });
   
    ajaxrun = new AjaxProcess();
    ajaxrun.init();

    $("#RemoveCookie").click(function () {
        getConfirm("Bạn có chắc muốn xóa dữ liệu cookie của trang web này?", function (result) {
            if (result) {
                ajaxrun.show();
                $.get(base_url + "/removecookie", function (r) {
                    if (r === "ok") {
                        window.location.reload();
                    }
                    ajaxrun.hide();
                });
            }
        })
        
    });
});