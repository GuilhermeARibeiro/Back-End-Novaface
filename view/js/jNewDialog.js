(function($){

	$.fn.jNewDialog = function(option){
	
	//- Parametros Default Config -//
		var config = $.extend({
		bgDialog: "#FFF",
		bgContent: "",
		borderRadius: "0",
		close:true

		}, option);
		
		//- Variáveis Parâmetros Default Config -//
		var bgDialog = $(config).attr("bgDialog");
		var bgContent = $(config).attr("bgContent");
		var borderRadius = $(config).attr("borderRadius");
		var close = $(config).attr("close");
		
		
		//INICIAR FUNÇÕES
		
		if ($("#jNewSession1").length < 1) {
            
			$("body").prepend("<input type='hidden' value='100' id='jNewSession1'/>");
			
        }
		
	$(this).each(function(){

		
		//MONTAGEM
		$(this).wrap('<div class="jNewDialog" />');
		$(this).parent().append('<div class="jNewHeaderDialog" />');
		$(this).addClass("jNewContentDialog");
		$(this).parent().find(".jNewHeaderDialog").append('<h4></h4>');
		$(this).parent().find(".jNewHeaderDialog").append('<div class="jNewButtonDialogClose"><img src="'+URL+'images/btn-close.png"/></div>');
		$(this).find("input[type=button]").parent().wrap("<div class='jNewDialogButton'/>");	

		
		var widthDialog = $(this).width();
		var heightDialog = $(this).height();
		var paddingTopDialog = $(this).css("paddingTop");
		var paddingRightDialog = $(this).css("paddingRight");
		var paddingBottomDialog = $(this).css("paddingBottom");
		var paddingLeftDialog = $(this).css("paddingLeft");
		var borderWidthDialog = $(this).css("border-right-width");
		var borderStyleDialog = $(this).css("border-right-style");
		var borderColorDialog = $(this).css("border-right-color"); 
		
		
		var paddingLeftRightDialog = parseInt(paddingRightDialog) + parseInt(paddingLeftDialog);
		
		$(this).parent().css({width: widthDialog, height: heightDialog + 30});
		$(this).css({position: "absolute"});
		
		//CSS
	
		$(this).parent().css({
		
			background: bgDialog,
			position: "fixed", 
			top: "50%", 
			left: "50%", 
			borderRadius: borderRadius,
			borderWidth: borderWidthDialog,
			borderStyle: borderStyleDialog,
			borderColor: borderColorDialog,
			display: "none",
			border: "solid 1px #EEE",
			behavior: "url(PIE.htc)"
			
		});
		
		$(this).css({
			
			width:  widthDialog,
			background: "bgContent",
			position: "absolute",
			left: "0",
			top: "30px"
			
		});
		
		$(this).find("p").css({
		
			padding: "20px 15px 0 14px",
			textAlign: "justify",
			fontFamily: "Helvetica, Arial",
			fontSize: "12px",
			color: "#777",
			lineHeight: "18px"
			
		});
		
		$(this).parent().find(".jNewHeaderDialog").find("h4").css({

			fontFamily: "ubunturegular",
			fontSize: "16px",
			color: "#DE655F",
			float: "left",
			lineHeight: "44px",
			textIndent: "10px",
			fontWeight: "normal",
			textTransform: "uppercase",
			overflow: "hidden"
			
		});
		
		$(this).parent().find(".jNewHeaderDialog").css({
			
			width: widthDialog,
			height: "44px",
			borderBottom: "1px solid #EEE"
			
		});
		
		$(this).parent().find(".jNewHeaderDialog").find(".jNewButtonDialogClose").css({
		
			position: "absolute",
			right: "0",
			margin: "10px 10px 0 0",
			zIndex: "999", 
			cursor: "pointer"	
			
		});
		
		$(this).parent().find(".jNewHeaderDialog").find(".jNewButtonDialogClose").find("img").css({	
		
			margin: "6px 3px 0 0"	
			
		});
			
		
		$(this).parent().find(".jNewHeaderDialog").find(".jNewButtonDialogClose").click(function(){
		
			$(this).parent().closeDialog();
			
		});	
	
		
		$(this).parent().css({marginLeft: "-"+widthDialog / 2+"px"});
		$(this).parent().css({marginTop: "-"+heightDialog / 2+"px"});
		
		
		}); //FIM EACH
		
			} //End function

		})(jQuery);
