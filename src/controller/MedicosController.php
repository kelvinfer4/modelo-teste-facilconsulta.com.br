<?php

require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'MedicosService.php';

class MedicosController
{

	private $medicosService = null;


	public function __construct()
	{
		$this->medicosService = new MedicosService();
	}

	public function redirect($location)
	{
		header('Location: ' . $location);
	}

	public function handleRequest()
	{
		$op = isset($_GET['op']) ? $_GET['op'] : null;

		try {

			if (!$op || $op == 'list') {
				$this->listMedicos();
			} elseif ($op == 'new') {
				$this->saveMedico();
			} elseif ($op == 'edit') {
				$this->editMedico();
			} elseif ($op == 'delete') {
				$this->deleteMedico();
			} elseif ($op == 'show') {
				$this->showMedico();
			} else {
				$this->showError("Page not found", "Page for operation " . $op . " was not found!");
			}
		} catch (Exception $e) {
			$this->showError("Application error", $e->getMessage());
		}
	}

	public function listMedicos()
	{
		$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
		$medicos = $this->medicosService->getAllMedicos($orderby);
		include ROOT_PATH . '../view/medicos.php';
	}

	public function saveMedico()
	{
		$title = 'Adicionar novo Medico';

		$nome = '';
		$senha = '';
		$email = '';
		$endereco_consultorio = '';
		$erro = false;


		$errors = array();

		if (isset($_POST['form-submitted'])) {

			$nome 	 = isset($_POST['nome']) 	? trim($_POST['nome']) 	  : null;
			$senha 	 = isset($_POST['senha']) 	? trim($_POST['senha']) 	  : null;
			$senha = md5($senha);
			$email  = isset($_POST['email']) 	? trim($_POST['email'])   : null;
			$endereco_consultorio  = isset($_POST['endereco_consultorio']) 	? trim($_POST['endereco_consultorio'])   : null;

			if (strlen($nome) < 6 || strlen($nome) > 112) {
				$erro = 'Informe um nome válido';
			}

			if (strlen(trim($_POST['senha'])) < 6 || strlen(trim($_POST['senha'])) > 112) {
				$erro = 'Informe uma senha válida';
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) < 6 || strlen($email) > 112) {
				$erro = 'Informe um email válido';
			}

			if (strlen($endereco_consultorio) < 6 || strlen($endereco_consultorio) > 112) {
				$erro = 'Informe um endereco válido';
			}

			try {
				if (!$erro) {
					$this->medicosService->createNewMedico($nome, $senha, $email, $endereco_consultorio);
					$this->redirect('index.php');
					return;
				}
			} catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
		}

		include ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'medico-form.php';
	}

	public function editMedico()
	{
		$title  = "Editar Medico";

		$nome    = '';
		$senha = '';
		$endereco_consultorio = '';
		$id      = $_GET['id'];
		$data_alteracao = date("Y/m/d h:m:s");

		$errors = array();

		$medico = $this->medicosService->getMedico($id);

		if (isset($_POST['form-submitted'])) {

			$nome 	 = isset($_POST['nome']) 	? trim($_POST['nome']) 	  : null;
			$senha 	 = isset($_POST['senha']) 	? trim($_POST['senha'])   : null;
			$senha	 = md5($senha);
			$endereco_consultorio 	 = isset($_POST['endereco_consultorio']) 	? trim($_POST['endereco_consultorio'])   : null;

			if (strlen($nome) < 6 || strlen($nome) > 112) {
				$erro = 'Informe um nome válido';
			}

			if (trim($_POST['senha'])) {
				if (strlen(trim($_POST['senha'])) < 6 || strlen(trim($_POST['senha'])) > 112) {
					$erro = 'Informe uma senha válida';
				}
			}

			if (strlen($endereco_consultorio) < 6 || strlen($endereco_consultorio) > 112) {
				$erro = 'Informe um endereco válido';
			}

			try {
				if (!$erro) {
					$this->medicosService->editMedico($nome, $senha, $endereco_consultorio, $data_alteracao, $id);
					$this->redirect('index.php');
					return;
				} else {
					echo '<div class="alert alert-danger"><strong>Atenção!! </strong>' . $erro . '</a>.</div>';
				}
			} catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		// Include in the view of the edit form
		include ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'medico-form-edit.php';
	}

	public function deleteMedico()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		if (!$id) {
			throw new Exception('Internal error');
		}
		$this->medicosService->deleteMedico($id);

		$this->redirect('index.php');
	}

	public function showMedico()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$errors = array();

		if (!$id) {
			throw new Exception('Internal error');
		}
		$medico = $this->medicosService->getMedico($id);

		include ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'medico.php';
	}

	public function showError($title, $message)
	{
		include ROOT_PATH . 'view/error.php';
	}
}
