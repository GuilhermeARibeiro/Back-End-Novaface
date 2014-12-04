(function ($) {

        $.fn.openDialog = function (option) {

                var config = $.extend({
                    title: "",
                    close: true,
                    top: true


                }, option);

                var title = $(config).attr("title");
                var close = $(config).attr("close");
                var top = $(config).attr("top");

                $(this).parent().addClass("dialogTrue");

                var jNewSession1 = $("#jNewSession1").val();

                $(this).parent().css({
                        zIndex: jNewSession1++
                });

                $("#jNewSession1").val(jNewSession1);
                
				$(this).parent().find(".jNewHeaderDialog h4").text(title);

                if ($(".shadow").length < 1) {
                    $("body").prepend("<div class='shadow'/>");
                }

                $(".shadow").css({
                    background: "#444",
                    width: "100%",
                    height: "100%",
                    position: "fixed",
                    left: "0",
                    top: "0",
                    opacity: 0.4,
                    zIndex: "2"
                });

                if (close == false) {
                       
					   $(this).parent().find(".jNewHeaderDialog").find(
                                ".jNewButtonDialogClose").remove();
                }


                if (top == false) {
                       
					   $(this).parent().find(".jNewHeaderDialog").remove();
                        
						$(this).find("p").css({
                            marginTop: "-36px"
                        });
                }

				$(this).find(".jNewDialogButton").css({
					position: "absolute",
					bottom: "10px",
					margin: "0 0 0 10px"
				});	
			

				$(this).find(".jNewDialogButton").find("input[type=button]").css({
					padding: "5px 10px 4px 10px",
					border: "none",
					background: "#E1736C",
					color: "#FFF",
					fontSize: "12px",
					fontFamily: 'ubuntulight',
					cursor: "pointer",
					float: "left"
				});				

				
				for(i=0; i<1; i++){
				
				$(this).find(".jNewDialogButton").find("input[type=button]").eq(i).css({
					margin: "0 10px 0 0"
				});
				
				}
                $(this).parent().show();
						

                return false;

        }

        $.fn.closeDialog = function () {

                $(this).parent().hide();
                $(this).parent().removeClass("dialogTrue");

                if ($(".dialogTrue").length < 1) {
                    $(".shadow").remove();
                }
				

                return false;

        }

        $.fn.removeDialog = function () {

                $(this).parent(".jNewDialog").remove();
                $(this).parent().removeClass("dialogTrue");

                if ($(".dialogTrue").length < 1) {
                    $(".shadow").remove();
                }

                return false;

        }

		

})(jQuery);