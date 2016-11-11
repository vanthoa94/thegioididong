$(document).ready(function () {
    if (typeof currentPage !== "undefined")
        $("#menu li" + currentPage).addClass("active");

    if (typeof subPage !== "undefined") {
        var a = $("#menu li" + currentPage + " ul li[data-action='" + subPage + "']").addClass("active");
        if (!$("#col-left").hasClass("hidemenu") && $('#col-left').is(":visible")) {
            eventSubMenu(a.parents(".dropdownmenu").find(" > a"));
        }
       
    }
});