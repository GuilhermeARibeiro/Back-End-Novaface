<?php
ini_set("display_errors", 0);

require_once MODEL_DIR."home_conteudo.class.php";

class Home{

	public function index(){
		$smarty = new Smarty();
		$smarty->assign("titulo" , "Painel de Controle Nova Face");
		$smarty->assign("HTTP" , HTTP);
		
		// if(@$_SESSION['login']){
		// 	$smarty->assign("login" , $_SESSION['login']);
		// }
		
		$smarty->display("home/index.tpl");
	}
	
	public function galeria(){
		
		$selecionar_pesquisa = new Pesquisa();
		$teste = $selecionar_pesquisa->galeria();
		$smarty = new Smarty();
		$smarty->assign("titulo" , "CCR DESENHOS");
		$smarty->assign("HTTP" , HTTP);
		$smarty->assign($teste , TESTE);
		
		// if(@$_SESSION['login']){
		// 	$smarty->assign("login" , $_SESSION['login']);
		// }
		
		$smarty->display("home/galeria.tpl");		
		
		exit;
	}
	
	
	
	// public function insere_like(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
	// 	$id = $_POST['id_base'];
	// 	$like = $_POST['total_like']+1;
	// 	$usuario = $_POST['identificador_usuario'];
		
	// 	$array = $selecionar_pesquisa->insere_like($id , $like);
	// 	$array_relatorio = $selecionar_pesquisa->insere_like2($id , $usuario);
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function insere_comentario(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
	// 	$id = $_POST['idconteudo'];
	// 	$id_usuario = $_POST['idusuario'];
	// 	$mensagem = $_POST['comentario'];
	// 	$selecionar_pesquisa->set_conteudo($mensagem);
	// 	$array = $selecionar_pesquisa->insere_comentario($id , $id_usuario);
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function insere_categoria(){
	// 	$selecionar_pesquisa = new Pesquisa();

	// 	$id_usuario = $_POST['idusuario'];
	// 	$mensagem = $_POST['categoria'];
		
	// 	$selecionar_pesquisa->set_conteudo($mensagem);
	// 	$array = $selecionar_pesquisa->insere_categoria($id_usuario);
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function insere_assunto(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$mensagem = $_POST['assunto'];
	// 	$id_usuario = $_POST['idusuario'];
	// 	$id_categoria = $_POST['idcategoria'];
		
	// 	$selecionar_pesquisa->set_conteudo($mensagem);
	// 	$array = $selecionar_pesquisa->insere_assunto( $id_usuario , $id_categoria);
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function insere_titulo(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$mensagem = $_POST['assunto'];
	// 	$id_usuario = $_POST['idusuario'];
	// 	$id_assunto = $_POST['idassunto'];
		
	// 	$selecionar_pesquisa->set_conteudo($mensagem);
	// 	$array = $selecionar_pesquisa->insere_titulo( $id_usuario , $id_assunto);
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function cadastra_usuario(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$nome = $_POST['nome'];
	// 	$login = $_POST['login'];
	// 	$senha = md5($_POST['senha']);
	// 	$perfil = $_POST['perfil'];
		
	// 	$array = $selecionar_pesquisa->insere_usuario( $nome , $login , $senha , $perfil);
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function exclui_conteudo(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_conteudo = $_POST['idconteudo'];
	// 	$id_titulo = $_POST['idtitulo'];
		
	// 	$array = $selecionar_pesquisa->exclui_conteudo( $id_conteudo , $id_titulo );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function exclui_conteudo_titulo(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_assunto = $_POST['idassunto'];
	// 	$id_titulo = $_POST['idtitulo'];
		
	// 	$array = $selecionar_pesquisa->exclui_conteudo_titulo( $id_assunto , $id_titulo );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function exclui_conteudo_assunto(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_categoria = $_POST['idcategoria'];
	// 	$id_assunto = $_POST['idassunto'];
		
	// 	$array = $selecionar_pesquisa->exclui_conteudo_assunto( $id_categoria , $id_assunto );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function exclui_conteudo_categoria(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_categoria = $_POST['idcategoria'];
		
	// 	$array = $selecionar_pesquisa->exclui_conteudo_categoria( $id_categoria );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function seleciona_conteudo(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_conteudo = $_POST['idconteudo'];
	// 	$id_titulo = $_POST['idtitulo'];
		
	// 	$array = $selecionar_pesquisa->selecionar_conteudo( $id_conteudo , $id_titulo );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function seleciona_titulo(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_assunto = $_POST['idassunto'];
	// 	$id_titulo = $_POST['idtitulo'];
		
	// 	$array = $selecionar_pesquisa->selecionar_titulo( $id_assunto , $id_titulo );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function seleciona_assunto(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_assunto = $_POST['idassunto'];
		
		
	// 	$array = $selecionar_pesquisa->selecionar_assunto( $id_assunto );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function seleciona_categoria(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_categoria = $_POST['idcategoria'];
		
		
	// 	$array = $selecionar_pesquisa->selecionar_categoria( $id_categoria );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function atualiza_categoria(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_categoria = $_POST['idcategoria'];
	// 	$conteudo_categoria = $_POST['conteudo'];
		
		
	// 	$array = $selecionar_pesquisa->atualiza_categoria( $id_categoria , $conteudo_categoria );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function atualiza_assunto(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_assunto = $_POST['idassunto'];
	// 	$conteudo_assunto = $_POST['conteudo'];
		
		
	// 	$array = $selecionar_pesquisa->atualiza_assunto( $id_assunto , $conteudo_assunto );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function atualiza_titulo(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_assunto = $_POST['idassunto'];
	// 	$conteudo_titulo = $_POST['conteudo'];
	// 	$id_titulo = $_POST['id_titulo'];
		
		
	// 	$array = $selecionar_pesquisa->atualiza_titulo( $id_assunto , $conteudo_titulo , $id_titulo );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
	// public function atualiza_conteudo(){
		
	// 	$selecionar_pesquisa = new Pesquisa();
		
	// 	$id_conteudo = $_POST['id_conteudo'];
	// 	$conteudo = $_POST['conteudo_text'];
	// 	$id_titulo = $_POST['idtitulo'];
		
		
	// 	$array = $selecionar_pesquisa->atualiza_conteudo( $id_conteudo , $conteudo , $id_titulo );
		
		
	// 	if(count( $array ) > 0 )
	// 	{
	// 		echo json_encode($array);
	// 	}
	// 	else
	// 	{
	// 		echo $selecionar_pesquisa->mensagem;
	// 	}

	// 	exit;
	// }
	
}
?>