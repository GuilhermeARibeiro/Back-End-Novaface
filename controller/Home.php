<?php
ini_set("display_errors", 0);

require_once MODEL_DIR."home_conteudo.class.php";

class Home{

	public function index(){
		
		$instrumentos = new Pesquisa();
		$retorno = $instrumentos->busca();
		$array_tipo = array(0 => "Ativo",1 => "Excluido");

		$smarty = new Smarty();
		$smarty->assign("titulo" , "Painel de Controle Nova Face");
		$smarty->assign("HTTP" , HTTP);
		$smarty->assign("retorno", $retorno);
		$smarty->assign("tipo", $array_tipo);
		
		$smarty->display("home/index.tpl");

		exit;
	}

	public function insere_instrumento(){

		$inserir = new Pesquisa();
		$nome = $_POST['nome'];
		$categoria = $_POST['categoria'];
		$retorno = $inserir->inserir_instrumento($nome, $categoria);

		if(count( $retorno ) > 0 )
		{
			echo json_encode($retorno);
		}
		else
		{
			echo $selecionar_pesquisa->mensagem;
		}

		exit;
	}

	public function editar_instrumento(){
		
		$instrumento = new Pesquisa();
		$id = $_POST['id'];
		$retorno = $instrumento->selecionar_instrumento($id);

		if(count( $retorno ) > 0 )
		{
			echo json_encode($retorno);
		}
		else
		{
			echo $selecionar_pesquisa->mensagem;
		}

	}

	public function atualizar_instrumento(){

		$id        = $_POST['id'];
		$nome      = $_POST['nome'];
		$categoria = $_POST['categoria'];

		$instrumento = new Pesquisa();
		$retorno = $instrumento->atualizar_instrumento($id, $nome, $categoria);

		if(count( $retorno ) > 0 )
		{
			echo json_encode($retorno);
		}
		else
		{
			echo $selecionar_pesquisa->mensagem;
		}

	}

	public function excluir_instrumento(){

		$id = $_POST['id'];
		$instrumento = new Pesquisa();
		$retorno = $instrumento->excluir_instrumento($id);

		if(count( $retorno ) > 0 )
		{
			echo json_encode($retorno);
		}
		else
		{
			echo $selecionar_pesquisa->mensagem;
		}

	}
	
	public function ativar_instrumento(){

		$id = $_POST['id'];
		
		$instrumento = new Pesquisa();
		$retorno = $instrumento->ativar_instrumento($id);

		if(count( $retorno ) > 0 )
		{
			echo json_encode($retorno);
		}
		else
		{
			echo $selecionar_pesquisa->mensagem;
		}

	}
}
?>