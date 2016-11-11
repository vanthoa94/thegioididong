$(document).ready(function () {
    $(".box.boxhide .titlebox,.box.boxhide .titlebox span").click(function () {
        $(this).parent().find(".titlebox span").toggleClass("fa-chevron-circle-down");
        $(this).parents(".box").find(".boxcontent").slideToggle();
        return false;
    });
});