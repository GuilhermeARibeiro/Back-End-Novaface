var NOVA = {

	inserir: function(){

		var instrumento_nome      = $("#nome_teste").val();
		var instrumento_categoria = $("#categoria").val();

		var method = "POST";
		
		var action  = URL+"index.php";
		
		var data = { metodo: "insere_instrumento" , classe: "Home" , nome: instrumento_nome , categoria: instrumento_categoria };
		
		var callback = "NOVA.sucesso_instrumento()";
		
		AJAX.submit( "POST", action, data, "text", callback, "");
	},

	sucesso_instrumento: function(){
		
		alert("Instrumento inserido com sucesso !");
		location.reload();

	},

	ativar: function(id){
		
		var id_instrumento = id;

		var method = "POST";
		
		var action  = URL+"index.php";
		
		var data = { metodo: "ativar_instrumento" , classe: "Home" , id: id_instrumento };
		
		var callback = "NOVA.instrumento_atualizado()";
		
		AJAX.submit( "POST", action, data, "text", callback, "");
	
	},

	excluir: function(id){
		
		var id_instrumento = id;

		var method = "POST";
		
		var action  = URL+"index.php";
		
		var data = { metodo: "excluir_instrumento" , classe: "Home" , id: id_instrumento };
		
		var callback = "NOVA.instrumento_atualizado()";
		
		AJAX.submit( "POST", action, data, "text", callback, "");

	},

	editar: function(id){
		
		var id_instrumento = id;

		var method = "POST";
		
		var action  = URL+"index.php";
		
		var data = { metodo: "editar_instrumento" , classe: "Home" , id: id_instrumento };
		
		var callback = "NOVA.refresh_instrumento()";
		
		AJAX.submit( "POST", action, data, "text", callback, "");

	},

	refresh_instrumento: function(){
		
		var retorno = JSON.parse( AJAX.get_returns() );

		$("#nome_teste").val(retorno[0].nome);
		$("#categoria").val(retorno[0].categoria);
		$("#botao_atualizar").val(retorno[0].id);

		$("#botao_cadastrar").hide();
		$("#botao_atualizar").show();

	},

	atualizar: function(){

		var instrumento_id        = $("#botao_atualizar").val();
		var instrumento_nome      = $("#nome_teste").val();
		var instrumento_categoria = $("#categoria").val();

		var method = "POST";
		
		var action  = URL+"index.php";
		
		var data = { metodo: "atualizar_instrumento" , classe: "Home" , id: instrumento_id, nome: instrumento_nome , categoria: instrumento_categoria };
		
		var callback = "NOVA.instrumento_atualizado()";
		
		AJAX.submit( "POST", action, data, "text", callback, "");
	},

	instrumento_atualizado: function(){

		alert("Instrumento Atualizado com Sucesso !")
		location.reload();

	}

};