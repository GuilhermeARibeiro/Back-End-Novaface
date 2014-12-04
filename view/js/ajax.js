
var AJAX = {
	
	returns : "",
	
	submit : function( method, action, data, type, callback, loading ){
		
		if( typeof( loading ) == "undefined" )
		{
			loading = "body";
		}
		
		$( "#loading" ).show();
	
		$.ajax({
		
			type: method,
			url: action,
			data: data,
			dataType: type,
			success: function( returns ) { 
		  
				$( "#loading" ).hide();
		  
				AJAX.returns = returns;
				
				if( AJAX.returns.search( "form_login" ) > -1 )
				{
					location.href = PAGINA.logout;
					return;
				}
				
				eval( callback );
				
			}
		});
	},
	
	get_returns : function(){
	
		var returns = this.returns;
		this.returns = "";
		return returns;
	},
	
	not_log : function(){
		
		locationn.href = PAGINA.url;
	
	}
};