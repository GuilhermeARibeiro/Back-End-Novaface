<?php
require_once MODEL_DIR."Database.php";

class Pesquisa{
		
	public function busca(){

		$sql = new Database();

		$query = "SELECT 
					instrumentos_id as id,
					instrumentos_nome as nome,
					instrumentos_categoria as categoria,
					instrumentos_excluir as excluir
				FROM instrumentos";

		$stmt = $sql->prepare($query);
		$stmt->execute();
		
		return $stmt->fetchAll();

	}

	public function inserir_instrumento($nome, $categoria){

		$sql = new Database();

		$query = "INSERT INTO novaface.instrumentos (instrumentos_nome, instrumentos_categoria) values(:xarabas1 , :xarabas2)";

		$stmt = $sql->prepare($query);
		// $valor = "%$this->conteudo%";
		$stmt->bindParam(':xarabas1', $nome, PDO::PARAM_STR);
		$stmt->bindParam(':xarabas2', $categoria, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetchAll();

	}

	public function selecionar_instrumento($id){

		$sql = new Database();

		$query = "SELECT 
					instrumentos_nome as nome, 
					instrumentos_categoria as categoria,
					instrumentos_id as id
				  FROM instrumentos 
				  WHERE instrumentos_id = :id";

		$stmt = $sql->prepare($query);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetchAll();

	}

	public function atualizar_instrumento($id, $nome, $categoria){

		$sql = new Database();

		$query = "UPDATE instrumentos SET instrumentos_nome = :nome , instrumentos_categoria = :categoria WHERE instrumentos_id = :id";

		$stmt = $sql->prepare($query);
		$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
		$stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetchAll();

	}

	public function excluir_instrumento($id){

		$sql = new Database();

		$query = "UPDATE instrumentos SET instrumentos_excluir = 1 WHERE instrumentos_id = :id";

		$stmt = $sql->prepare($query);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetchAll();

	}

	public function ativar_instrumento($id){

		$sql = new Database();

		$query = "UPDATE instrumentos SET instrumentos_excluir = 0 WHERE instrumentos_id = :id";

		$stmt = $sql->prepare($query);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetchAll();

	}
	
}
   
?>