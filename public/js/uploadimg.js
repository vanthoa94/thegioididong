function isImageUpload(file) {
    file = file.split(".").pop();
    switch (file) {
        case "jpg": case "png": case "gif": case "bimap": case "jpeg": case "ico":
            return true;
        default:
            return false;
    }
    return false;
}
function readURL(input) {
    if (input.files && input.files[0]) {
        if (isImageUpload(input.files[0].name)) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(input).parent().find("img").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            input = $(input);
            input.replaceWith(input.val('').clone(true));
            input.parent().find(".removefile").hide();
            alert("vui lòng chọn 1 hình ảnh");
            
        }
    }
    
}
$(document).ready(function () {
    $('.uploadimg .removefile').click(function () {
        
        var file = $(this).parent().find("input[type='file']");
        file.replaceWith(file.val('').clone(true));
        $(this).parent().find("img").attr("src", $(this).parent().find("img").attr("data-img"));
        $(this).hide();
        return false;
    });
    $(".uploadimg input[type='file']").change(function () {
        if (this.files) {
            readURL(this);
            $(this).parent().find(".removefile").show();
        }
    });
    
});