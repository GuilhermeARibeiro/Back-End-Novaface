<?php
require_once MODEL_DIR."Database.php";

class Pesquisa{
		
	public $conteudo;
	public $mensagem;
	
	public function set_conteudo($conteudo){
		$conteudo = trim($conteudo);
		$this->conteudo = $conteudo;
	}
	
	public function get_conteudo(){
		return $this->conteudo;
	}
	
	public function consultarLogado(){
	
		try
		{
		
			if($this->conteudo == "" || empty($this->conteudo))
			{
				throw new Exception( "Preencha o campo de pesquisa !" );
			}

	
			$sql = new Database();
			if($_SESSION['id_perfil'] == 5){
				$query = "SELECT
						ct.id_categoria as id,
						ct.nome_categoria as categoria,
						a.nome_assunto as assunto,
						t.nome_titulo as titulo,
						c.nome_conteudo as conteudo,
						c.id_conteudo as idc
					FROM
						wiki.categoria as ct 
						INNER JOIN wiki.assunto as a on ct.id_categoria = a.id_categoria_assunto 
						INNER JOIN wiki.titulo as t on a.id_assunto = t.id_assunto_titulo 
						INNER JOIN wiki.conteudo as c on t.id_titulo = c.id_titulo_conteudo 
					WHERE
					(
						ct.nome_categoria like :conteudo OR
						a.nome_assunto like :conteudo OR
						t.nome_titulo like :conteudo OR
						c.nome_conteudo like :conteudo
					)
					AND
						c.exclusao_conteudo = 0
					AND
						t.exclusao_titulo = 0
					AND
						a.exclusao_assunto = 0
					AND
						ct.exclusao_categoria = 0
					AND
						c.nome_conteudo <> ''
					AND
						c.publico_conteudo = 1";
			}else{
			
			$query = "SELECT
						ct.id_categoria as id,
						ct.nome_categoria as categoria,
						a.nome_assunto as assunto,
						t.nome_titulo as titulo,
						c.nome_conteudo as conteudo,
						c.id_conteudo as idc
					FROM
						wiki.categoria as ct 
						INNER JOIN wiki.assunto as a on ct.id_categoria = a.id_categoria_assunto 
						INNER JOIN wiki.titulo as t on a.id_assunto = t.id_assunto_titulo 
						INNER JOIN wiki.conteudo as c on t.id_titulo = c.id_titulo_conteudo
						INNER JOIN wiki.permissao as p on p.id_categoria_permissao = ct.id_categoria AND p.id_perfil_permissao = :permissao
					WHERE
					(
						ct.nome_categoria like :conteudo OR
						a.nome_assunto like :conteudo OR
						t.nome_titulo like :conteudo OR
						c.nome_conteudo like :conteudo
					)
					AND
						c.exclusao_conteudo = 0
					AND
						t.exclusao_titulo = 0
					AND
						a.exclusao_assunto = 0
					AND
						ct.exclusao_categoria = 0
					AND
						c.nome_conteudo <> ''
					";
					
			}
			
			$stmt = $sql->prepare($query);
			$valor = "%$this->conteudo%";
			$stmt->bindParam(':conteudo', $valor, PDO::PARAM_STR);
			$stmt->bindParam(':permissao', $_SESSION['id_perfil'], PDO::PARAM_INT);
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
		
	}
	
	public function consultarDeslogado(){
	
		try
		{
		
			if($this->conteudo == "" || empty($this->conteudo))
			{
				throw new Exception( "Preencha o campo de pesquisa !" );
			}

	
			$sql = new Database();
						
			$query = "SELECT
						ct.id_categoria as id,
						ct.nome_categoria as categoria,
						a.nome_assunto as assunto,
						t.nome_titulo as titulo,
						c.nome_conteudo as conteudo,
						c.id_conteudo as idc
					FROM
						wiki.categoria as ct 
						INNER JOIN wiki.assunto as a on ct.id_categoria = a.id_categoria_assunto 
						INNER JOIN wiki.titulo as t on a.id_assunto = t.id_assunto_titulo 
						INNER JOIN wiki.conteudo as c on t.id_titulo = c.id_titulo_conteudo 
					WHERE
					(
						ct.nome_categoria like :conteudo OR
						a.nome_assunto like :conteudo OR
						t.nome_titulo like :conteudo OR
						c.nome_conteudo like :conteudo
					)
					AND
						c.exclusao_conteudo = 0
					AND
						t.exclusao_titulo = 0
					AND
						a.exclusao_assunto = 0
					AND
						ct.exclusao_categoria = 0
					AND
						c.nome_conteudo <> ''
					AND
						c.publico_conteudo = 1";
					
			
			$stmt = $sql->prepare($query);
			$valor = "%$this->conteudo%";
			$stmt->bindParam(':conteudo', $valor, PDO::PARAM_STR);
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
		
	}
	
	
	public function mostrar_registros( $id ){
		try
		{	
		
			$sql = new Database();
						
			$query = "SELECT
						ct.nome_categoria as categoria ,
						ct.id_categoria as idct,
						ct.id_categoria as permissao_categoria,
						a.nome_assunto as assunto ,
						t.nome_titulo as titulo ,
						c.nome_conteudo as conteudo ,
						c.id_conteudo as id,
						c.comentario_conteudo as comentario,
						c.publico_conteudo as publico,
						t.id_titulo as idtitulo,
						a.id_assunto as idassunto,
						c.data_conteudo as data ,
						c.quantidade_like as ranking,
						u.nome_usuario as usuario ,
						u.id_perfil_usuario as permissao_usuario,
						u.id_usuario as id_usuario,
						c.id_titulo_conteudo as idtituloc,
						c.publico_conteudo as publico,
						GROUP_CONCAT( an.id_anexo ) as ida,
					GROUP_CONCAT( CONCAT( an.pasta_anexo, an.arquivos_anexo ) ) as anexos
					FROM wiki.categoria as ct 
						INNER JOIN wiki.assunto as a on ct.id_categoria = a.id_categoria_assunto 
						LEFT JOIN wiki.titulo as t on a.id_assunto = t.id_assunto_titulo 
						LEFT JOIN wiki.conteudo as c on t.id_titulo = c.id_titulo_conteudo		
						LEFT JOIN wiki.usuario as u on c.usuario_conteudo = u.id_usuario
						LEFT JOIN wiki.anexo as an on an.id_conteudo_anexo = c.id_conteudo
					where 
						c.id_titulo_conteudo = :id_conteudo
					AND
						c.exclusao_conteudo = 0
                        group by c.id_conteudo";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_conteudo', $id, PDO::PARAM_INT);
			
			$stmt->execute();
				
			
		
			RETURN $stmt->fetchAll();
		
		}
		catch (PDOException $e) 
		{

		return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{

		$this->mensagem = $e->getMessage();
		
			return false;
		}
		
	}
	
	public function mostrar_categorias( $id ){
		try
		{	
		
			$sql = new Database();
						
			$query ="SELECT 
						id_categoria as id,
						nome_categoria as categoria
					FROM
						wiki.categoria as c
					INNER JOIN
						permissao as p ON p.id_categoria_permissao = id_categoria
					INNER JOIN
						perfil as pf ON pf.id_perfil = p.id_perfil_permissao
					INNER JOIN
						usuario as u ON u.id_perfil_usuario = pf.id_perfil
					WHERE
						u.id_perfil_usuario = :perfil
					";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':perfil', $_SESSION['id_perfil'], PDO::PARAM_INT);
			
			
			$stmt->execute();
				
			
		
			RETURN $stmt->fetchAll();
		
		
		}
		catch (PDOException $e) 
		{

		return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{

		$this->mensagem = $e->getMessage();
		
			return false;
		}
		
	}

	public function galeria(){
		try
		{	
		
			$sql = new Database();
						
			$query = "select * from imagens";
			
			$stmt = $sql->prepare($query);

			// $stmt->bindParam(':id_conteudo', $id, PDO::PARAM_INT);
						
			$stmt->execute();
			
			RETURN $stmt->fetchAll();
		}
		catch(Exception $e){

		$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function mostrar_assuntos( $id ){
		try
		{	
		
			$sql = new Database();
						
			$query = "SELECT 
							id_assunto as id,
							id_categoria as idcategoria,
							nome_categoria as categoria, 
							nome_assunto	
						FROM
							wiki.categoria as ct
						INNER JOIN 
							wiki.assunto as a
						ON 
							a.id_categoria_assunto = ct.id_categoria
                        WHERE 
							id_categoria = :id_conteudo
						AND
							a.exclusao_assunto = 0
					";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_conteudo', $id, PDO::PARAM_INT);
						
			$stmt->execute();
				
			RETURN $stmt->fetchAll();
		
		
		}
		catch (PDOException $e) 
		{

			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{

			$this->mensagem = $e->getMessage();
		
			return false;
		}
		
	}
	
	public function mostrar_titulos( $id ){
		try
		{	
		
			$sql = new Database();
						
			$query = "SELECT 
							id_assunto as id,
							nome_categoria as categoria, 
							nome_assunto as assunto,
							id_titulo,
							nome_titulo	as titulo
						FROM
							wiki.categoria as ct
						INNER JOIN 
							wiki.assunto as a
						ON 
							a.id_categoria_assunto = ct.id_categoria
						INNER JOIN 
							wiki.titulo as t on t.id_assunto_titulo = a.id_assunto
                        WHERE 
							t.id_assunto_titulo = :id_conteudo
						AND
							t.exclusao_titulo = 0
					";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_conteudo', $id, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
			
		
		}
		catch (PDOException $e) 
		{

			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{

			$this->mensagem = $e->getMessage();
		
			return false;
		}
		
	}
	
	public function mostrar_conteudos( $id ){
		try
		{	
		
			$sql = new Database();
						
			$query = "SELECT 
							id_assunto as id,
							nome_categoria as categoria, 
							nome_assunto as assunto,
							id_titulo,
							nome_titulo	as titulo,
							id_conteudo as idconteudo,
							nome_conteudo as conteudo
						FROM
							wiki.categoria as ct
						INNER JOIN 
							wiki.assunto as a
						ON 
							a.id_categoria_assunto = ct.id_categoria
						INNER JOIN 
							wiki.titulo as t on t.id_assunto_titulo = a.id_assunto
						INNER JOIN 
							wiki.conteudo as c on c.id_titulo_conteudo = t.id_titulo
                        WHERE 
							c.id_titulo_conteudo = :id_conteudo
					";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_conteudo', $id, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
			
		
		}
		catch (PDOException $e) 
		{

			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{

			$this->mensagem = $e->getMessage();
		
			return false;
		}
		
	}
	
	
	public function insere_like( $id , $like ){
		try
		{	
			$sql = new Database();
						
			$query = "UPDATE wiki.conteudo SET quantidade_like = :like WHERE id_conteudo = :id_conteudo";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':like', $like, PDO::PARAM_INT);
			$stmt->bindParam(':id_conteudo', $id, PDO::PARAM_INT);

			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function insere_like2( $id , $usuario ){
		try
		{	
			$sql = new Database();
						
			$query = "INSERT INTO wiki.like (id_conteudo_like, id_usuario_like, data_like )
								VALUES(:id_conteudo , :usuario , NOW() )";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_conteudo', $id, PDO::PARAM_INT);
			$stmt->bindParam(':usuario', $usuario, PDO::PARAM_INT);

			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function insere_comentario( $id , $id_usuario ){
		try
		{	
			$sql = new Database();
						
			$query = "INSERT INTO wiki.conteudo (nome_conteudo , id_titulo_conteudo, usuario_conteudo, data_conteudo )
								VALUES( :conteudo , :id_titulo_conteudo , :usuario_conteudo, NOW() )";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':conteudo', $this->conteudo, PDO::PARAM_STR);
			$stmt->bindParam(':id_titulo_conteudo', $id, PDO::PARAM_INT);
			$stmt->bindParam(':usuario_conteudo', $id_usuario, PDO::PARAM_INT);
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function validar_login($login , $senha){
			
			$sql = new Database();	
			
			$query = "SELECT 
						u.login_usuario as log, 
						u.nome_usuario as nome,
						u.senha_usuario as pass, 
						u.id_usuario as usuario,
						pf.id_perfil as id_perfil,
						pf.nome_perfil as nome_perfil
					FROM
						wiki.usuario as u
					INNER JOIN
						wiki.perfil as pf ON u.id_perfil_usuario = pf.id_perfil
					WHERE
						u.login_usuario = :log_usuario 
					AND 
						u.senha_usuario = :pass_usuario";
								
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':log_usuario', $login, PDO::PARAM_STR);
			$stmt->bindParam(':pass_usuario', $senha, PDO::PARAM_STR);
			$stmt->execute();
			
			return $stmt->fetch();
		
	}

	
	public function insere_categoria($id_usuario){
		try
		{
			$sql = new Database();
			
			$query = "INSERT INTO wiki.categoria (nome_categoria , usuario_categoria , exclusao_categoria, data_categoria)
								VALUES( :conteudo, :usuario_conteudo , 0 , NOW() )";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':conteudo', $this->conteudo, PDO::PARAM_STR);
			$stmt->bindParam(':usuario_conteudo', $id_usuario, PDO::PARAM_INT);
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function insere_assunto( $id_usuario , $id_assunto ){
		try
		{
			$sql = new Database();
			
			$query = "INSERT INTO wiki.assunto (nome_assunto , id_categoria_assunto, id_usuario_assunto, exclusao_assunto, data_assunto)
								VALUES( :conteudo, :id_assunto , :usuario_conteudo , 0 , NOW() )";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':conteudo', $this->conteudo, PDO::PARAM_STR);
			$stmt->bindParam(':id_assunto', $id_assunto, PDO::PARAM_INT);
			$stmt->bindParam(':usuario_conteudo', $id_usuario, PDO::PARAM_INT);
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function insere_titulo( $id_usuario , $id_assunto ){
		try
		{
			$sql = new Database();
			
			$query = "INSERT INTO wiki.titulo (nome_titulo , id_assunto_titulo , id_usuario_titulo, exclusao_titulo, data_titulo)
								VALUES( :conteudo, :id_assunto , :usuario_conteudo , 0 , NOW() )";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':conteudo', $this->conteudo, PDO::PARAM_STR);
			$stmt->bindParam(':id_assunto', $id_assunto, PDO::PARAM_INT);
			$stmt->bindParam(':usuario_conteudo', $id_usuario, PDO::PARAM_INT);
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function insere_usuario( $nome , $login , $senha , $perfil){
		try
		{
			$sql = new Database();
			
			$query = "INSERT INTO wiki.usuario (nome_usuario , login_usuario , senha_usuario, id_perfil_usuario )
								VALUES( :nome, :login , :senha , :perfil)";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
			$stmt->bindParam(':login', $login, PDO::PARAM_STR);
			$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
			$stmt->bindParam(':perfil', $perfil, PDO::PARAM_INT);
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function exclui_conteudo( $id_conteudo , $id_titulo ){
		try
		{
			$sql = new Database();
			
			$query = "UPDATE wiki.conteudo SET exclusao_conteudo=1 WHERE id_conteudo= :id_conteudo AND id_titulo_conteudo = :id_titulo";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_conteudo', $id_conteudo, PDO::PARAM_INT);
			$stmt->bindParam(':id_titulo', $id_titulo, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function exclui_conteudo_titulo( $id_assunto , $id_titulo ){
		try
		{
			$sql = new Database();
			
			$query = "UPDATE wiki.titulo SET exclusao_titulo = 1 WHERE id_assunto_titulo = :id_assunto AND id_titulo = :id_titulo";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_assunto', $id_assunto, PDO::PARAM_INT);
			$stmt->bindParam(':id_titulo', $id_titulo, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function exclui_conteudo_assunto( $id_categoria , $id_assunto ){
		try
		{
			$sql = new Database();
			
			$query = "UPDATE wiki.assunto SET exclusao_assunto = 1 WHERE id_categoria_assunto = :id_categoria AND id_assunto = :id_assunto";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
			$stmt->bindParam(':id_assunto', $id_assunto, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function exclui_conteudo_categoria( $id_categoria ){
		try
		{
			$sql = new Database();
			
			$query = "UPDATE wiki.categoria SET exclusao_categoria = 1 WHERE id_categoria = :id_categoria ";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function selecionar_conteudo( $id_conteudo , $id_titulo ){
		try
		{
			$sql = new Database();
			
			$query = "SELECT * FROM wiki.conteudo 
						WHERE 
							id_conteudo = :id_conteudo AND id_titulo_conteudo = :id_titulo";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_conteudo', $id_conteudo, PDO::PARAM_INT);
			$stmt->bindParam(':id_titulo', $id_titulo, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	
	public function selecionar_titulo( $id_assunto , $id_titulo ){
		try
		{
			$sql = new Database();
			
			$query = "SELECT * FROM wiki.titulo 
						WHERE 
							id_titulo = :id_titulo AND id_assunto_titulo = :id_assunto";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_assunto', $id_assunto, PDO::PARAM_INT);
			$stmt->bindParam(':id_titulo', $id_titulo, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function selecionar_assunto( $id_assunto ){
		try
		{
			$sql = new Database();
			
			$query = "SELECT * FROM wiki.assunto 
						WHERE 
							id_assunto = :id_assunto";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_assunto', $id_assunto, PDO::PARAM_INT);
			
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function selecionar_categoria( $id_categoria ){
		try
		{
			$sql = new Database();
			
			$query = "SELECT * FROM wiki.categoria
						WHERE 
							id_categoria = :id_categoria";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
			
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function atualiza_categoria( $id_categoria , $conteudo_categoria ){
		try
		{
			$sql = new Database();
			
			$query = "UPDATE wiki.categoria SET nome_categoria = :conteudo_categoria WHERE id_categoria = :id_categoria";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
			$stmt->bindParam(':conteudo_categoria', $conteudo_categoria, PDO::PARAM_STR);
			echo $query;
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function atualiza_assunto( $id_assunto , $conteudo_assunto ){
		try
		{
			$sql = new Database();
			
			$query = "UPDATE wiki.assunto SET nome_assunto = :conteudo_assunto WHERE id_assunto = :id_assunto";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_assunto', $id_assunto, PDO::PARAM_INT);
			$stmt->bindParam(':conteudo_assunto', $conteudo_assunto, PDO::PARAM_STR);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function atualiza_titulo( $id_assunto , $conteudo_titulo , $id_titulo ){
		try
		{
			$sql = new Database();
			
			$query = "UPDATE 
						wiki.titulo 
					  SET 
						nome_titulo = :conteudo_titulo 
					  WHERE 
						id_assunto_titulo = :id_assunto 
					  AND 
						id_titulo = :id_titulo ";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_assunto', $id_assunto, PDO::PARAM_INT);
			$stmt->bindParam(':id_titulo', $id_titulo, PDO::PARAM_INT);
			$stmt->bindParam(':conteudo_titulo', $conteudo_titulo, PDO::PARAM_STR);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function atualiza_conteudo(  $id_conteudo , $conteudo , $id_titulo ){
		try
		{
			$sql = new Database();
			
			$query = "UPDATE 
						wiki.conteudo 
					  SET 
						nome_conteudo = :conteudo
					  WHERE 
						id_titulo_conteudo = :id_titulo 
					  AND 
						id_conteudo = :id_conteudo ";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_conteudo', $id_conteudo, PDO::PARAM_INT);
			$stmt->bindParam(':id_titulo', $id_titulo, PDO::PARAM_INT);
			$stmt->bindParam(':conteudo', $conteudo, PDO::PARAM_STR);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function compara_permissao(  $id_perfil , $id_categoria  ){
		try
		{
			$sql = new Database();
			
			$query = "SELECT
							*
					    FROM
							wiki.permissao
					    WHERE
							id_perfil_permissao = :id_perfil 
						AND
							id_categoria_permissao = :id_categoria";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id_perfil', $id_perfil, PDO::PARAM_INT);
			$stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function inserir_anexo($caminho , $anexo , $conteudo , $login){
		try
		{
			$sql = new Database();
			
			$query = "INSERT INTO wiki.anexo ( pasta_anexo , arquivos_anexo , id_conteudo_anexo , usuario_anexo , data_anexo , exclusao_anexo)
								VALUES( :caminho , :anexo , :conteudo , :login , NOW() , 0 )";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':anexo', $anexo, PDO::PARAM_INT);
			$stmt->bindParam(':conteudo', $conteudo, PDO::PARAM_STR);
			$stmt->bindParam(':caminho', $caminho, PDO::PARAM_STR);
			$stmt->bindParam(':login', $login, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function deletarAnexos($id){
		try
		{
			$sql = new Database();
			
			$query = "DELETE FROM wiki.anexo WHERE id_anexo = :id";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function buscar_perfil(){
		try
		{
			$sql = new Database();
			
			$query = "SELECT id_perfil as id , nome_perfil as perfil FROM wiki.perfil ";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function inserir_login($id_login){
		try
		{
			$sql = new Database();
			
			$query = "INSERT INTO 
						wiki.logado (estado_logado , usuario_id_logado , data_logado ) 
							values(1 , :login , NOW() )";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':login', $id_login, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function desloga_usuario($id_login){
		try
		{
			$sql = new Database();
			
			$query = "DELETE FROM wiki.logado WHERE usuario_id_logado = :login";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':login', $id_login, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
	
	public function verifica_logado($id_login){
		try
		{
			$sql = new Database();
			
			$query = "SELECT * FROM
						wiki.logado WHERE usuario_id_logado = :login";
			
			$stmt = $sql->prepare($query);
			$stmt->bindParam(':login', $id_login, PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		catch (PDOException $e) 
		{
			return 'Connection failed: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			$this->mensagem = $e->getMessage();
		
			return false;
		}
	}
}
   
?>