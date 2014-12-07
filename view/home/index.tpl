<html>
<head>
	<title>{$titulo}</title>
	<link rel="stylesheet" href="{$HTTP}view/css/bootstrap.min.css" />
	<script type='text/javascript' src="{$HTTP}view/js/jquery-2.1.1.min.js"></script>
	<script type='text/javascript' src="{$HTTP}view/js/ajax.js"></script>
	<script type='text/javascript' src="{$HTTP}view/js/novaface.js"></script>
	<script>
		var URL = "{$HTTP}";

		$(document).ready(function(){
			$("#botao_atualizar").hide();
		});
	</script>
</head>
<body>
<div class="xarabas">
	<div class="table-responsive">
		<table class="table table-striped">
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Categoria</th>
				<th>Excluido</th>
				<th>Imagens</th>
				<th>Ação</th>
			</tr>
			{foreach from=$retorno key=key item=item}
			<tr>
				<td>{$retorno[$key]['id']}</td>
				<td>{$retorno[$key]['nome']}</td>
				<td>{$retorno[$key]['categoria']}</td>
				<td>{$tipo[$retorno[$key]['excluir']]}</td>
				<td><img src="{$HTTP}view/imagens/{$tipo[$retorno[$key]['excluir']]}.png" width="20" height="20"></td>
				<td>
					<button class="btn btn-info  " onclick="NOVA.editar({$retorno[$key]['id']});"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
					<button class="btn btn-success " onclick="NOVA.ativar({$retorno[$key]['id']});">Ativar</button>
					<button class="btn btn-danger" onclick="NOVA.excluir({$retorno[$key]['id']});">Excluir</button>
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>
<div class="xarabas2">
			<input type="text" name="nome" id="nome_teste" placeholder="digitar o nome" />
			<input type="text" name="categoria" id="categoria" placeholder="digitar a categoria" maxlength="1"/>
			<button class="btn btn-success" id="botao_atualizar" onclick="NOVA.atualizar()">Atualizar</button>
			<button class="btn btn-primary" id="botao_cadastrar" onclick="NOVA.inserir()">Cadastrar</button>
</div>
</body>
</html>