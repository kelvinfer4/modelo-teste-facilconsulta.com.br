<?php

require_once 'Database.php';

class MedicosGateway extends Database 
{

	public function selectAll($order)
	{
		if (!isset($order)) {
			$order = 'nome';
		}
		$pdo = Database::connect();
		$sql = $pdo->prepare("SELECT * FROM medico ORDER BY $order ASC");
		$sql->execute();
		// $result = $sql->fetchAll(PDO::FETCH_ASSOC);

		$medicos = array();
		while ($obj = $sql->fetch(PDO::FETCH_OBJ)) {
		
			$medicos[] = $obj;
		}
		return $medicos;
	}

	public function selectById($id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("SELECT * FROM medico WHERE id = ?");
		$sql->bindValue(1, $id);
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_OBJ);
		
		return $result;
    }

	public function insert($nome, $senha, $email, $endereco_consultorio)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("INSERT INTO medico (nome, senha, email, endereco_consultorio) VALUES (?, ?, ?, ?)");
		$result = $sql->execute(array($nome, $senha, $email, $endereco_consultorio));
	}

	public function edit($nome, $senha, $endereco_consultorio, $data_alteracao, $id)
	{
        $pdo = Database::connect();
		$sql = $pdo->prepare("UPDATE medico set nome = ?, senha = ?, endereco_consultorio = ?, data_alteracao = ? WHERE id = ? LIMIT 1");
		$result = $sql->execute(array($nome, $senha, $endereco_consultorio, $data_alteracao, $id));
	}

	public function delete($id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("DELETE FROM medico WHERE id = ?");
		$sql->execute(array($id));
    }
}

?>