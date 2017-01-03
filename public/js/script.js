var dialogLogin=null;

var isFrameParent=true;

var callbackSuccessLogin=null;

 function RunAjax(url, dt, callback) {
    $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: dt,
        beforeSend: function () {
        },
        success: function (result) {
            callback(result);
        },
        error: function (e, e2, e3) {
            alert("Lỗi: " + e.status + e3);
        }
    });
}

function LoginFaceSuccess(result,token){
    var data={};
    data["email"]=result.email;
    data["name"]=result.name;
    data["gender"]=result.gender;
    data["id"]=result.id;
    data["type"]=1;
    data["_token"]=token;
    RunAjax(base_url+"/loginweb",data,function(r){
        loginSuccessF(r);
    });
}

function loginSuccessF(r){
    if(r.success){
        if(r.block==null){
            dialogLogin.hide();
            $("#tass i,#boxmenumobile2 i").html('<a href="'+(base_url+"/user/profile")+'"><img src="'+(base_url+"/public/images/inf.png")+'" width="13px" /> <b>Thông tin cá nhân</b></a><span>|</span><a href="#" onclick="logoutWeb()"><img src="'+(base_url+"/public/images/logout.png")+'" width="13px" /> <b>Thoát</b></a>');
            if(callbackSuccessLogin!=null){
                window[callbackSuccessLogin](true);
            }
        }else{
            dialogLogin.getObj().addClass("block");

            dialogLogin.getObj().find(".ct").html('Tài khoản của bạn đã bị khóa. Nếu bạn không biết nguyên nhân vui lòng <a href="'+(base_url+"/lien-he.html")+'">liên hệ</a> cho chúng tôi để biết thêm thông tin. Cảm ơn.');
        }

        $("#listscus").attr('href',base_url+'/sach-cua-ban.html').removeClass('loginweb').off('click');
    }else{
        alert(r.message);
    }

    hideProgressIcon();
}

function LoginGoogleSuccess(result,token){
    var data={};
    data["email"]=result.getEmail();
    data["name"]=result.getName();
    data["gender"]="male";
    data["id"]=result.getId();
    data["type"]=2;
    data["_token"]=token;
    RunAjax(base_url+"/loginweb",data,function(r){
        loginSuccessF(r);
    });
}

function showProgressIcon(){
     dialogLogin.getObj().find("#progressicon").show();
}

function hideProgressIcon(){
     dialogLogin.getObj().find("#progressicon").hide();
}

function logoutWeb(){
     $.get(base_url+"/user/logout", function(data){
        if(data=="OK")
            window.location.reload();
        else
            alert(data);
    });
}

$(document).ready(function(){
$("#boxmenumobile1").html("<h2>DANH MỤC SÁCH</h2>"+$("#dmgmobile").html());
$("#boxmenumobile2").html($("#tass").html());
    
   
    $(".loginweb").click(function(){
        if(dialogLogin==null){
            dialogLogin=new dialog($("#dialogLogin"),{
                "width":320,
                "height":240
            });
            dialogLogin.init();
            dialogLogin.getObj().find("#iframe").html('<iframe style="border:0;width:272px;height:170px" src="'+(base_url+"/login-face")+'"></iframe>');
            showProgressIcon();
        }
        if($(this).attr("data-callback")){
            callbackSuccessLogin=$(this).attr("data-callback");
        }
        if($(this).attr("data-title")){
            dialogLogin.getObj().find(".header span").html($(this).attr("data-title"));
        }else{
            dialogLogin.getObj().find(".header span").html("Đăng nhập");
        }
        dialogLogin.show();
        return false;
    });


    $(".addthis_toolbox a.at300b").click(function () {
        if (!$(this).hasClass("printpage")) {
            window.open($(this).attr("href"), '_blank', "menubar=no,toolbar=no,resizable=no,scrollbars=no,height=450,width=710");

            return false;
        }
    });
    var collapsemenumo=null;
    $("#menumobile").click(function(){
        if(collapsemenumo==null){

        collapsemenumo=$("#collapsemenumo");
        }
        collapsemenumo.slideToggle(function(){

            if(collapsemenumo.css('display')!=='none'){
               $(document.body).addClass("showmenumo");
            }else{
                $(document.body).removeClass("showmenumo");
            }
        });

    });

$(window).load(function(){
    setTimeout(function(){
          jQuery.ajax({
            type: "POST",
            url: base_url+'/position_user',
            dataType: 'json',
            data: {"page":currentPage==''?document.title:(currentPage+': '+document.title),"url":window.location.href,'_token':_t,'pageId':pageId},
            success: function (result) {
                

            },
            error: function (e, e2, e3) {
                
            }
        });
    },15000);

});

    
});
