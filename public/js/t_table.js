/*
T Table
Copyright 2016 by Tran Van Thoa
*/

var tcurrent_page = 0;
var titeminpage = 0;

function ffilter(th, obj,flag,value) {
    var filter = th.attr("data-filter");
    if(flag)
        var trtable = obj.find("tbody tr:not(.hide)");
    else
        var trtable = obj.find("tbody tr");

    if (filter == "all" || (value != null && (value == "-1" || value == ''))) {
        trtable.removeClass('hide');        
    } else {
        filter = jQuery.parseJSON(filter);
        if (filter.type == null) {
            filter.type == "column";
        }

        if(filter.value==null){
        	filter.value=value;
        }

        filter.value = $.trim(filter.value);
       
        if (filter.type == "attr") {
            if (filter.attr_name == null) {
                filter.attr_name = "data-filter";
            }

            trtable.addClass('hide').removeClass("hidepage");
            
            if (filter.value != null)
                obj.find("tbody tr[" + filter.attr_name + "='" + filter.value + "']").removeClass('hide');
            else {
                obj.find("tbody tr[" + filter.attr_name + "='" + th.val() + "']").removeClass('hide');
            }
        } else {
            if (filter.column != "all") {
                if (filter.column == "select") {
                    filter.column = th.find(':selected').attr('data-column');
                }

                if (filter.filtertype==null) {
                    filter.filtertype = "=";
                }

                trtable.addClass("hide").removeClass("hidepage").each(function () {
                    var text = $(this).find("td:eq(" + filter.column + ")");
                    if (text.find(".row-action").length) {
                        text = text.find("span:eq(0)");
                    }
                    switch (filter.filtertype) {
                        case "=":
                            if ($.trim(text.text()) == filter.value) {
                                $(this).removeClass("hide");
                            }
                            break;
                        case "^":
                            var length=filter.value.length;
                            if ($.trim(text.text()).substr(0, length) == filter.value) {
                                $(this).removeClass("hide");
                            }
                            break;
                        case "$":
                            var length = filter.value.length;
                            if ($.trim(text.text()).substr(length) == filter.value) {
                                $(this).removeClass("hide");
                            }
                            break;
                        case "<":
                            if ($.trim(text.text()) < filter.value) {
                                $(this).removeClass("hide");
                            }
                            break;
                        case ">":
                            if ($.trim(text.text()) > filter.value) {
                                $(this).removeClass("hide");
                            }
                            break;
                        case ">=":
                            if ($.trim(text.text()) >= filter.value) {
                                $(this).removeClass("hide");
                            }
                            break;
                        case "<=":
                            if ($.trim(text.text()) <= filter.value) {
                                $(this).removeClass("hide");
                            }
                            break;
                        case "null":
                            if ($.trim(text.text())=="") {
                                $(this).removeClass("hide");
                            }
                            break;
                    }
                    
                });
        	}else{
                filter.value=filter.value.toLowerCase();
        	    trtable.addClass('hide').removeClass("hidepage").each(function () {
        	        var par = $(this);
        	        if (filter.fiter_column != null) {
        	            for (var i = 0; i < filter.fiter_column.length; i++) {
        	                var text = par.find('td:eq(' + filter.fiter_column[i] + ')');
        	                if (text.find(".row-action").length) {
        	                    text = text.find("span:eq(0)").text();
        	                }
        	                else {
        	                    if (text.attr('data-time')) {
        	                        text = text.attr("data-time");
        	                    } else {
        	                        text = text.text();
        	                    }
        	                }
                            text=text.toLowerCase();
                            if ($.trim(text).indexOf(filter.value) !== -1) {
        	                    par.removeClass('hide');
        	                }
        	            }
        	        } else {
        	            par.find("td").each(function () {
        	                var text = $(this);
        	                if (text.find(".row-action").length) {
        	                    text = text.find("span:eq(0)");
        	                }
                            text=text.text().toLowerCase();
        	                if ($.trim(text).indexOf(filter.value) !== -1) {
        	                    par.removeClass('hide');
        	                }
        	            });
        	        }
        		});

        	}
        }
    }
    changePage(obj);
    trtable = null;
    filter = null;
    th = null;
}

function ffilters(groupname, obj) {
    obj.find('table tbody tr').removeClass('hide');
    obj.find('*[data-group-filter="' + groupname + '"]').each(function () {
        var ths = $(this);

        if (ths.attr('data-subsubsub')) {
            if (ths.hasClass('current')) {
                ffilter(ths, obj, true);
            }
        } else {
          
            ffilter(ths, obj, true,ths.val());
        }
    });
    
}

function TRunAjax(url, dt, callback) {
   
	$.ajax({
		type: "POST",
		url: url,
		dataType: 'json',
		data:dt,
		beforeSend: function () {
            if(typeof ajaxrun!=='undefined')
		    ajaxrun.show();
		},
		success: function (result) {
		    if(typeof ajaxrun!=='undefined')
            ajaxrun.hide();
		    callback(result);
		   
		},
		error: function (e, e2, e3) {
		    if(typeof ajaxrun!=='undefined')
                ajaxrun.hide();
		   var result={"success":false,"message":e2+" "+e.status+": "+e3};
           callback(result);
		}
	});
}

function tremoves(message, target,options,result) {
    options.alert(message);
    if (result.idSuccess == null) {
        target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
            if ($(this).hasClass("checked")) {
                $(this).parents("tr").remove();
            }
        });
    } else {
        target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
            if ($(this).hasClass("checked")) {
                if ($.inArray($(this).attr('data-value'), result.idSuccess)!==-1) {
                    $(this).parents("tr").eq(0).remove();
                }
            }
        });
    }
    if (options.showcount != null) {
        var tar = target.parents(".ttable");
        options.showcount(tar, tar.find("table tbody tr").size());
    }

    
    changePage(target.parents(".ttable"),tcurrent_page);
}

function tremove(message, target, options,result) {
    if (result.idSuccess != null) {
        if (result.idSuccess.length > 0) {
            target.parents("tr").remove();
            if (options.showcount != null) {
                var tar = target.parents(".ttable").eq(0);
                options.showcount(tar, tar.find("table tbody tr").size());
            }

            changePage(target.parents(".ttable"), tcurrent_page);
        }
    } else {
        target.parents("tr").remove();
        if (options.showcount != null) {
            var targ = target.parents(".ttable").eq(0);
            
            options.showcount(targ, targ.find("table tbody tr").size());
        }

        changePage(target.parents(".ttable"), tcurrent_page);
    }
    if(message.indexOf('{name}')!==-1){
        message=message.replace('{name}',target.attr('data-name'));
        options.alert(message);
    }else{
        options.alert(message);
    }
}

function fdataajax(url, data, target, options, value) {
    if (target.hasClass('running')) {
        return false;
    }
    if (typeof data == "object") {
        data = data.join();
    }

    if (data == "") {
        return false;
    }

    if (url.substr(0, 1) == "{") {
        url = jQuery.parseJSON(url);

        url = url[value];
    }

    var dataajax={ "data": data };

    if(target.attr("data-ajax-value")){
        dataajax[target.attr("data-ajax-value")] = value;
    }

    target.addClass('running');

    if(options.token!=null){
        if(typeof options.token=='object')
            dataajax[options.token.name]=options.token.value;
        else
            dataajax['_token']=options.token;
    }

    TRunAjax(url, dataajax, function (result) {
        target.removeClass('running');
        if (result.success) {
            if (target.attr("data-success")) {
                options[target.attr("data-success")](result.message, target, data, value,result);
                return false;
            }
            if (target.attr("data-success-remove")) {
                tremove(result.message, target, options, result);
                return false;
            }
            if (target.attr("data-success-type")) {
                if (target.attr("data-success-type") == "option") {
                    if (target.find(":selected").attr("data-success")) {
                        options[target.find(":selected").attr("data-success")](result.message, target, data, value, result);
                        return false;
                    }

                    if (target.find(":selected").attr("data-success-removes")) {
                        tremoves(result.message, target, options, result);
                        return false;
                    }
                }
            }
        }
        if(result.message.indexOf('{name}')!==-1){
            result.message=result.message.replace('{name}',target.attr('data-name'));
            options.alert(result.message);
        }else{
            options.alert(result.message);
        }
    });

}

function tcc(s, self, obj,options,value,callbackp) {

    if (s.attr("data-callback")) {
        options.s.attr("data-callback")(self, obj);
    } else {
        if (s.attr("data-filter")) {
            if (!s.attr('data-group-filter'))
                ffilter(s, obj, false, value);
            else 
                ffilters(s.attr('data-group-filter'), obj);
        } else {
            if (s.attr("data-ajax")) {
                if (value == "-1")
                    return false;

                var datatarget = s.attr("data-ajax");
                var arrdata = value;
                if(datatarget!="true"){
	                arrdata = [];
	                obj.find("table tbody " + datatarget).each(function() {
	                    arrdata.push($(this).attr("data-value"));
	                });
            	}

                if (s.attr("data-confirm")) {
                    var confirm_text = s.attr("data-confirm");
                    confirm_text = confirm_text.replace('{value}', value);
                    
                    if(typeof arrdata=="object"){
                    	confirm_text = confirm_text.replace('{item}',arrdata.length);
                    }

                    confirm_text = confirm_text.replace('{item}',"");


                    options.confirm(confirm_text, function(result) {
                        if (result) {
                            if (s.attr("data-before")) {
                                options[s.attr("data-before")](s.attr("data-href"), arrdata, s);
                                return false;
                            }
                            callbackp(s.attr("data-href"), arrdata, s, value);
                        	return false;
                        }
                    });

                } else {
                   
                    if (s.attr("data-before")) {
                        options[s.attr("data-before")](s.attr("data-href"), arrdata, s);
                        return false;
                    }
                    callbackp(s.attr("data-href"), arrdata, s,value);
                }

            }
        }
    }
}

function mpage(page,th) {
    th = $(th);

    var table = th.parents(".ttable").find("table tbody tr:not(.hide)");
    tcurrent_page = page;

    table.addClass("hidepage");
    for (var i = tcurrent_page * titeminpage; i < tcurrent_page * titeminpage + titeminpage; i++) {
        table.eq(i).removeClass("hidepage");
    }

    th.parent().find(".active").removeClass("active");
    th.addClass("active");

    return false;
    
}

function changePage(obj,currentpage) {
    var table = obj.find("table tbody tr:not(.hide)");
    if(currentpage==null)
        tcurrent_page = 0;
    else
        tcurrent_page = currentpage;
    
    var countitem = table.size();
    
    if (countitem > titeminpage) {

        var page = parseInt(countitem / titeminpage);

        if (countitem % titeminpage == 0) {
            page--;
        }

        if (page >= 1) {

            if (tcurrent_page > page) {
                tcurrent_page = page;
            }

            if (!obj.find(".paginator").length) {
                obj.find("table").after('<div class="paginator"></div>');
            }

            var paginator = obj.find(".paginator");
            paginator.html("");
            for (var i = 0; i <= page; i++) {
                paginator.append('<a href="#" onclick="return mpage('+i+',this)">' + (i + 1) + '</a>');
            }

            paginator.append('<div class="clearfloat"></div>');

            paginator.find('a:eq(' + tcurrent_page + ')').addClass('active');

            table.addClass("hidepage");
            for (var i = tcurrent_page * titeminpage; i < tcurrent_page * titeminpage + titeminpage; i++) {
                table.eq(i).removeClass("hidepage");
            }

        }

    } else {
        if (obj.find(".paginator").length) {
            obj.find(".paginator").html("");
        }
    }
}

function ajaxCheckBox(target, options) {
    var confirm_text = "Bạn có chắc?";
    var checked = target.hasClass("checked");
    if(target.attr("data-confirm")){
        confirm_text = target.attr("data-confirm");
        var matcher1 = /{yes=(.*?)}/i;
        var matcher = /{no=(.*?)}/i;
        if (checked) {
            var temp = matcher1;
            matcher1 = matcher;
            matcher = temp;
        }

        var ar = confirm_text.match(matcher);

        if (ar != null) {
            confirm_text = confirm_text.replace(matcher, ar[1]);
            confirm_text = confirm_text.replace(matcher1, "");
           
        }
        if (target.attr('data-name'))
            confirm_text = confirm_text.replace('{name}', target.attr('data-name'));
    }

    options.confirm(confirm_text, function (f) {
        if (f) {
            if (!target.attr("data-href")) {
                options.alert("data-href không tồn tại.");
                target.toggleClass("checked");
                return false;
            }
            target.addClass('running');
            var dataajax={ "data": target.attr('data-value'), "ischeck": checked };
            if(options.token!=null){
                if(typeof options.token=='object')
                    dataajax[options.token.name]=options.token.value;
                else
                    dataajax['_token']=options.token;
            }
            TRunAjax(target.attr("data-href"),dataajax , function (result) {
                target.removeClass('running');
                if (result.success) {
                    if (target.attr('data-success')) {
                        options[target.attr('data-success')](target, result);
                        return false;
                    }
                    options.alert(result.message);
                    return false;
                }
                target.toggleClass("checked");

                options.alert(result.message);
            });
        } else {
            target.toggleClass("checked");
        }
    });
}

function tInsertData(obj,options){
    var self=this;
    this.init=function(){

        obj.find(options.insert.target).on('click',function(){
                if(options.insert.type=="table")
                    self.ontable();
                else
                    self.ondialog();
        });
    }; 
    this.ontable=function(){
        var tnewdata=obj.find("table .tnewdata");
        if(!tnewdata.length){
            obj.find("table tbody").before("<tr class='tnewdata'></tr>");
            tnewdata=obj.find("table .tnewdata");

            for(var i=0;i<options.insert.field.length;i++){
                var item=options.insert.field[i];
                tnewdata.append(self.getType(item.type,item.attr));
            }
        }
        

        
    };
    this.ondialog=function(){

    };

    this.getType=function(type,attr){
        var tag="<td>";
        switch(type){
            case "text":
            tag+="<input type='text' />";
            break;
        }
        return tag+"</td>";
    };
}

function TTable(obj, options) {
    if (!obj.hasClass("ttable")) {
        obj.addClass("ttable");
    }

    var countitem = obj.find("table tbody tr").size();

    if (countitem == 0) {
        var sizec = obj.find("table thead th").size();
        obj.find("table tbody").append("<tr><td colspan='"+sizec+"'>Chưa có dữ liệu...</td></tr>");
        return false;
    }

    if (options == null) {
        options = {};
    }

     obj.find(".subsubsub li:eq(0) .count").html('(' + countitem + ')');

    if (options.showcount != null) {
        options.showcount(obj, countitem);
    }

    if(options.NoScript==null){
        options.NoScript=false;
    }
    if(!options.NoScript){
        //phân trang
        if (options.pageitem == null) {
            options.pageitem = 10;
        }

        titeminpage = options.pageitem;

        changePage(obj);
    }

    //end phân trang

    //cat chuoi
    obj.find('table tbody tr .cutlength').each(function () {
        var th=$(this);
        var length = parseInt(th.attr("max-length"));
        var text=th.text().trim();
        if (text.length > length) {
            th.html(text.substr(0, length) + '...<a href="#">Xem thêm</a><p style="display:none">' + text + '</p>');
            
        }
    }).find("a").click(function () {
        $(this).parent().parent().html($(this).parent().find("p").html());
    });
    //cat chuoi


    if (options.alert == null) {
        options.alert = function (message) {
            try{
                message=message.replace(/<(?:.|\n)*?>/gm, '');
            }catch(e){}
            alert(message);
        }
    }


    if (options.confirm == null) {
        options.confirm = function (confirm_text, callback) {
            try{
                confirm_text=confirm_text.replace(/<(?:.|\n)*?>/gm, '');
            }catch(e){}
            if (confirm(confirm_text)) {
                callback(true);
            } else {
                callback(false);
            }
        }
    }

    if(!options.NoScript){
        //filtertop
        if (options.filter_top != null) {
            options.filter_top(obj);
        } else {
            obj.find(".subsubsub a").click(function() {
                var th = $(this);
                if (!th.hasClass("current")) {
                    th.parents("ul").find(".current").removeClass("current");
                    th.addClass("current");
                    if(!th.attr('data-group-filter'))
                        ffilter(th, obj,false);
                    else
                        ffilters(th.attr('data-group-filter'), obj);
                }
                return false;
            });
        }

        //end filtertop

        //search table
        obj.find(".captiontable .searchtable").keydown(function (e) {
            if (e.keyCode == 13) {
                $(this).parents(".gsearchtable").find(".button").click();
            }
        });
        obj.find(".captiontable .gsearchtable .button").click(function () {
            var thsub = $(this);
            if (thsub.parent().find(".searchtable").val() != "") {
                thsub.parent().find("i").show().on("click", function () {
                    obj.find("table tbody tr").removeClass("hide");
                    $(this).hide().off("click");
                    thsub.parent().find(".searchtable").val("").focus();

                    changePage(obj);
                });

            } else {
                thsub.parent().find("i").hide();
            }
            return false;
        });
        //end search table

        //sort table
        obj.find("table thead th.tsort,table tfoot th.tsort").click(function () {
        	var th=$(this);
        	var index=th.index();
        	var sorttype = "desc";
        	if(!th.hasClass("sortup")){
        		th.addClass("sortup");
        		sorttype = "asc";
        	}else{
        		th.removeClass("sortup");
        	}

        	sorttype = (sorttype == "asc");


            var trtable = obj.find("table tbody tr:visible");
            var size = trtable.size();
        	if (size > 0) {

        	    for (var i = 0; i < size; i++) {
        	        var current = trtable.eq(i).find("td:eq(" + index + ")");
        	        if (current.find(".row-action").length) {
        	            current = current.find("span").eq(0);
        	            current = current.text().trim();
        	        } else {
        	            if (current.attr('data-time')) {
        	                current = current.attr('data-time');
        	            } else {
        	                current = current.text().trim();
        	            }
        	        }
        	        
        	        for (var j = i + 1; j < size; j++) {
        	            
        	            var current2 = trtable.eq(j).find("td:eq(" + index + ")");
        	            if (current2.find(".row-action").length) {
        	                current2 = current2.find("span").eq(0);
        	                current2 = current2.text().trim();
        	            } else {
        	                if (current2.attr('data-time')) {
        	                    current2 = current2.attr('data-time');
        	                } else {
        	                    current2 = current2.text().trim();
        	                }
        	            }
        	            if (sorttype) {
        	                if (current.localeCompare(current2) == 1) {
                                if(i==0)
                                    trtable.eq(j).before(trtable.eq(i));
                                else
                                    trtable.eq(i).before(trtable.eq(j));
        	                }
        	            } else {
        	                if (current.localeCompare(current2) == -1) {
                                if(i<size-1)
                                    trtable.eq(j).after(trtable.eq(i));
                                else
                                    trtable.eq(j).after(trtable.eq(i));
        	                }
        	            }
        	        }
        	    }
        	}

        });
        //sort table
    }
    obj.find(".ascheckbox:not(.disabled)").each(function() {
        if (!$(this).find("i").length) {
            $(this).append("<i></i>");
        }
    }).click(function () {
        var th = $(this);
        if (th.hasClass('running')) {
            return false;
        }
        th.toggleClass("checked");
       
        if (!th.attr("data-background"))
            th.parents("tr").toggleClass("checkboxcheck");
        if (th.attr("data-callback")) {
            options[th.attr("data-callback")](th);
            return false;
        }
        if (th.attr("data-ajax")) {
            ajaxCheckBox(th, options);
        }
    });

    obj.find(".ascheckbox.checkall:not(.disabled)").click(function () {
        var th = $(this);
        if (th.hasClass("checked")) {
            th.parents("table").find("tbody tr " + th.attr("data-target")).each(function () {
                $(this).addClass("checked");
                $(this).parents("tr").addClass("checkboxcheck");
            });
        } else {
            th.parents("table").find("tbody tr " + th.attr("data-target")).each(function () {
                $(this).removeClass("checked");
                $(this).parents("tr").removeClass("checkboxcheck");
            });
        }
    });

    if(!options.NoScript){
        obj.find(".captiontable .button").click(function () {
            var th = $(this);
          
            var target = th.attr("data-target");

            var s = $(target);
            tcc(s, th, obj, options, s.val(), function (href, data, targetc, value) {
                fdataajax(href, data, targetc, options, value);
            });
            return false;
        });
    }

    obj.find("table tbody tr .row-action a.event").click(function () {
        var th=$(this);
        if (th.hasClass('running')) {
            return false;
        }
        tcc(th, th, obj, options, th.attr("data-value"), function (href, data, target, value) {
            fdataajax(href, data, target, options, value);
        });

        return false;
    });


    //insert
    if(options.insert!=null){
        new tInsertData(obj,options).init();
    }
}
