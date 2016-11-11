var rolesdata = null;

function checkRole(role) {
    if (rolesdata != null) {
        if (typeof rolesdata == "string") {
            return true;
        }
        for (var k in rolesdata) {
            if (rolesdata[k].data == role) {
                return true;
            }
        }
    }
    return false;
}



$(document).ready(function () {
    var datarole = $("#userrolesdata");

    if (datarole.text() == "Supervisor") {
        $(".trole").removeClass("trole");
        rolesdata = "Supervisor";
        return false;
    }
    
    rolesdata = jQuery.parseJSON(datarole.text());

    if (typeof rolesdata !== "undefined") {
        $(".trole").each(function () {
            var t = $(this).attr("data-role");

            if (checkRole(t)) {
                $(this).removeClass("trole").removeAttr("data-role");
            } else {
                $(this).remove();
            }
        });

        $("#menu > li.dropdownmenu").each(function () {
            if ($(this).find("ul li").size() == 0) {
                $(this).remove();
            }
        });
    } else {
        rolesdata = null;
    }

    datarole.remove();
    datarole = null;
});