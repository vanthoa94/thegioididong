$(document).ready(function(){
	var nicObj={};

	var wintop;
	setTimeout(function(){
		var tNicEdit=$("#tNicEdit");
		nicObj={
			"obj":tNicEdit.find(".nicEdit-panelContain:eq(0)"),
			"objheight":tNicEdit.find(".nicEdit-main:eq(0)"),
			"top":tNicEdit.offset().top-50,
			"height":parseInt(tNicEdit.attr("data-height")),
			"width":0,
			"isNeo":false
		};
		nicObj.width=nicObj.obj.width()


		$(window).scroll(function(){
			wintop=$(this).scrollTop();
			var cheight=nicObj.objheight.height();
			if(cheight>nicObj.height && wintop>nicObj.top && wintop<((nicObj.top+cheight)-50)){
				if(!nicObj.isNeo){
					nicObj.obj.addClass("on");
					nicObj.obj.css("width",nicObj.width);
					nicObj.isNeo=true;
				}
			}else{
				if(nicObj.isNeo){
					nicObj.obj.removeClass("on");
					nicObj.isNeo=false;
				}
			}
		});

	},1500);

	

});