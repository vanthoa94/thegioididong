
function eventSubMenu(th) {
   
    var top = th.offset().top - $(window).scrollTop();
    var a = th.parent().toggleClass("show").find("ul").css("top", top).slideToggle();
    $("#areasubmenu").css("top", top).html(a.html()).toggleClass('showsub');
    
}
$(document).ready(function () {
    $("#togglemenu").click(function () {
        $("#col-main,#col-left").toggleClass("hidemenu");
        if ($('#col-left').hasClass('hidemenu')) {
            $("#menu li.dropdownmenu ul:visible").hide();
            $("#areasubmenu").removeClass('showsub');
        }
    });

    $("#menu li.dropdownmenu > a").click(function () {
       
        eventSubMenu($(this));
        return false;
    });


    /*$('#content-col-left').css('overflow','hidden').bind('mousewheel', function (e) {
        if (e.originalEvent.wheelDelta / 120 > 0) {
            
        }
        else {
            
        }
    });*/
});