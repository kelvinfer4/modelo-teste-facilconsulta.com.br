<?php

require_once ROOT_PATH.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'MedicosGateway.php';
require_once ROOT_PATH.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Database.php';

class MedicosService extends MedicosGateway
{

	private $medicosGateway = null;

	public function __construct()
	{
		$this->medicosGateway = new MedicosGateway();
	}

	public function getAllMedicos($order) { 
	    try { 
	        self::connect();
	        $res = $this->medicosGateway->selectAll($order); 
	        self::disconnect();
	        return $res; 
	    } catch (Exception $e) { 
	        self::disconnect();
	        throw $e; 
	    } 
	} 

	public function getMedico($id) 
	{
		try {
			self::connect();
			$result = $this->medicosGateway->selectById($id);
			self::disconnect();
			return $result;
		} catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
		return $this->medicosGateway->selectById($id);
    }

	public function createNewMedico($nome, $senha, $email, $endereco_consultorio)
	{
		try {
			self::connect();
			$result = $this->medicosGateway->insert($nome, $senha, $email, $endereco_consultorio);
			self::disconnect();
			return $result;
		} catch(Exception $e) {
			self::disconnect();
			throw $e;

		}
	}

	public function editMedico($nome, $senha, $endereco_consultorio, $data_alteracao, $id)
	{
		try {
			self::connect();
			$result = $this->medicosGateway->edit($nome, $senha, $endereco_consultorio, $data_alteracao, $id);
			self::disconnect();
		}catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
	}

	public function deleteMedico($id)
	{
		try {
			self::connect();
			$result = $this->medicosGateway->delete($id);
			self::disconnect();
		} catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
    }
}

?>