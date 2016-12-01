$(function(){
 	$(".addthis_toolbox a.at300b").click(function () {
	    if (!$(this).hasClass("printpage")) {
	        window.open($(this).attr("href"), '_blank', "menubar=no,toolbar=no,resizable=no,scrollbars=no,height=450,width=710");

	        return false;
	    }
	});
});


function initslide(obj,o){
	new slide(obj,(o!=null && typeof(o)=="object")?o:null).init();
}

function slide(obj,o){
	var th=this;
	this.content=null;
	var current=0;
	var max=0;
	this.sleepanimate=null;
	this.timer=null;
	this.sleep=null;
	var widthobj=null;
	this.init=function(){	
		var arr=[];

		obj.find("a").each(function(){
			arr.push({"name":$(this).find("img").attr("src"),"alt":$(this).find("img").attr("alt"),"href":$(this).attr("href")});
		});

		obj.find("a").remove();
		th.widthobj=(o!=null && o.width!=null)?o.width:720;
		th.start(arr);
	};
	this.create=function(){
		sleepanimate=(o!=null && o.sleepanimate!=null)?o.sleepanimate:500;
		sleep=(o!=null && o.sleep!=null)?o.sleep:5000;
		
		
		
		if(o==null || (o!=null && ((o.nextprev!=null && o.nextprev) || o.nextprev==null))){
			var slidehide="slidehide";
			if(o!=null && (o.shownextprev!=null && o.shownextprev)){
				slidehide="";
			}
			obj.append("<div id='prev' class='"+slidehide+"'></div><div id='next' class='"+slidehide+"'></div>");

			obj.find("#prev").click(function(){
				if(--current<0){
					current=max-1;
				}
				th.move(current,sleepanimate);
				th.resetTimer();
			});
			obj.find("#next").click(function(){
				th.movenext();
				th.resetTimer();
			});
		}
		if(o==null || (o!=null && ((o.arrow!=null && o.arrow) || o.arrow==null))){
			var slidehide="slidehide";
			if(o!=null && (o.showarrow!=null && o.showarrow)){
				slidehide="";
			}
			obj.append("<div id='arrow' class='"+slidehide+"'></div>");

			for(var i=0;i<max;i++){
				obj.find("#arrow").append("<li></li>");
			}
			obj.find("#arrow li").click(function(){
				current=th.se($(this));
				th.resetTimer();
				th.move(current,500);
			}).eq(0).addClass("active");
		}
		th.content.mouseover(function(){
			clearInterval(timer);
		});
		th.content.mouseout(function(){
			th.run();
		});
	};
	this.se=function(cc){
		var aa=obj.find("#arrow li");
		for(var i=0;i<max;i++){
			if(aa.eq(i)[0]==cc[0])
				return i;
		}
		return 0;
	};
	this.resetTimer=function(){
		clearInterval(timer);
		th.run();
	};
	this.loadImage=function(arr,po){
		if(po<max){
			$("<img />", {
	                src: arr[po].name,
					alt:arr[po].alt,
	                load: function () {
						th.content.append("<a href='"+arr[po].href+"'><img src='"+this.src+"' alt='"+this.alt+"' /></a>");
	                   
	                    th.loadImage(arr,po+1);
	                },
	                error: function () {
						th.loadImage(arr,po+1);
	                }
	             });

		}else{
			th.create();
		

			th.run();
		}
	};
	this.start=function(arr){

		th.content=document.createElement("div");
		th.content.id="contentslide";

		obj.html(th.content);
		th.content=$(th.content);
		max=arr.length;
		th.content.css("width",max*th.widthobj);
		th.loadImage(arr,0);
	};
	
	this.move=function(po,sle){
		obj.find("#arrow li.active").removeClass("active").parent().find("li").eq(po).addClass("active");
		th.content.animate({"margin-left":-(po*th.widthobj)},sle);
	};

	this.movenext=function(){
			if(++current==max){
				current=0;
			}
			th.move(current,sleepanimate);
	};
	
	this.run=function(){
		timer=setInterval(function(){
			th.movenext();
		},sleep);
	};
}



(function ($) {
    $.fn.slider=function(options){
        initslide($(this),options);
    }
})($);

$(document).ready(function(){
	$(window).load(function(){
		$("#slide").slider({
			"sleep":5000,
			"sleepanimate":500,
			"showarrow":true,
			"width":770
		});
	});
});