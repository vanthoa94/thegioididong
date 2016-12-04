
function dialog(obj,options){
	var th=this;
	var init=false;

	this.init=function(){	
		if(!obj.hasClass("dialog")){
			obj.addClass("dialog");
		}

		var widthobj=0;
		var heightobj=0;

		if(options.width!=null){
			widthobj=options.width;
		}else{
			widthobj=obj.width();
			options.width=widthobj;
		}

		if(options.height!=null){
			heightobj=options.height;
		}else{
			heightobj=obj.height();
			options.height=heightobj;
		}

		if(options.title==null){
			options.title="Tiêu Đề Dailog";
		}

		var widthw=$(window).width();
		var widthh=$(window).height();

		var left=(widthw-widthobj)/2;
		var top=(widthh-heightobj)/2;
		left=left*100/widthw;
		top=top*100/widthh;

		if(widthobj>widthw){
			widthobj=widthw-10;
			left=1;
		}
		if(heightobj>widthh){
			heightobj=widthh-10;
			top=1;
		}

		
		if(top<=20){
			top=21;
		}

		obj.css({"width":widthobj,"height":heightobj,"left":left+"%","top":(top-20)+"%"});
		obj.find(".ct").css({"height":heightobj-40});

		if(!$(".dimb").length){
			$("body").append("<div class='dimb'></div>");
			$(".dimb").click(function(){
				th.hide();
			});
		}
		obj.find(".closedialog").click(function(){
			th.hide();
		});
		if(!init){
			init=true;
			$(window).resize(function(){
				th.init();
			});
		}

	};
	this.show=function(){
		obj.fadeIn();
		$(".dimb").fadeIn();
	};
	this.hide=function(){
		$(".dialog").fadeOut();
		$(".dimb").fadeOut();
		if(options.removeObj!=null){
			obj.find(".ct "+options.removeObj).html("");
		}
	};
	
	this.getObj=function(){
		return obj;
	};
	this.resize=function(){
		th.init();
	};
}
