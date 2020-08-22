<?php
require_once 'model/user.php';


class UserController
{
	private $model;
	
	function __CONSTRUCT()
	{
		$this->model = new user();
	}

	public function dashboard()
	{
		require_once 'views/header.php';
		require_once 'views/message.php';
		require_once 'views/footer.php';
	}

	public function index()
	{
		$rows = $this->model->index();
		require_once 'views/header.php';
		require_once 'views/message.php';
		require_once 'views/user/index.php';
		require_once 'views/footer.php';
	}

	public function delete()
	{
		$this->model->delete(Database::encryptor('decrypt',$_REQUEST['id']));
		$mgs = Database::encryptor('encrypt','Usuario eliminado satictactoriamente!!');
		$err = 0;
		header("location: index.php?c=". Database::encryptor('encrypt','user') ."&a=".Database::encryptor('encrypt','index')."&m=". $mgs . '&e='. $err);
	}

	public function edit()
	{
		if (!isset($_REQUEST['id'])) {
			$select1 = null;
			$select2 = null;
			$id     = null;
			$name   = null;
			$email  = null;
			$level  = null;
			$button = 'Crear Usuario';
		} else {
			$id = Database::encryptor('decrypt',$_REQUEST['id']);
			$row = $this->model->view($id);
			$name  = $row->name;
			$email = $row->email;
			$level = $row->level;
			if ($level == 1) {
				$select1 = 'selected';
				$select2 = null;
			} else {
				$select2 = 'selected';
				$select1 = null;
			}
			
			$button = 'Actualizar Usuario';
		}
		
		require_once 'views/header.php';
		require_once 'views/message.php';
		require_once 'views/user/edit.php';
		require_once 'views/footer.php';
	}

	public function crud()
	{
		$id    = $_REQUEST['id'];
		$name  = $_REQUEST['name'];
		$name  = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$level = $_REQUEST['level'];

		if ($id == null) {
			$lastid = $this->model->create($name, $email, $level);
			mkdir('documents/'.$lastid, 0700);
			$mgs =  Database::encryptor('encrypt','Usuario creado satictactoriamente!!');
			$err = 1;
		} else {
			$this->model->update($id, $name, $email, $level);
			$mgs = Database::encryptor('encrypt','Usuario actualizado satictactoriamente!!');
			$err = 2;
		}
		
		header("location: index.php?c=". Database::encryptor('encrypt','user') ."&a=".Database::encryptor('encrypt','index')."&m=". $mgs . '&e='. $err);
	}


	public function login()
	{
		require_once 'views/message.php';
		require_once 'views/user/login.php';
		
	}

	public function validate($email,$password)
	{
		$row = $this->model->validate($email,$password);
		if ($row != false) {
			$this->model->lastAccess($row->id);
			$_SESSION['idUser'] = $row->id;
			$_SESSION['nameUser'] = $row->name;
			$mgs = Database::encryptor('encrypt','Bienvenido Usuario');
			$err = 1;
		}else {
			$mgs = Database::encryptor('encrypt','Sesion Invalida');
			$err = 0;
		}
		header('location: index.php?m='. $mgs . '&e='. $err);
						
	}

	public function logout()
	{
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
			    $params["path"], $params["domain"], 
				$params["secure"], $params["httponnly"]
			);	
		}
		session_destroy();
		header('Location: index.php');
	}


	public function download()
	{
		$id = Database::encryptor('decrypt',$_REQUEST['id']);
		require_once 'views/header.php';
		require_once 'views/message.php';
		require_once 'views/user/download.php';
		require_once 'views/footer.php';
	}

	public function uploadFile()
	{
		$id = $_REQUEST['id'];

		$mgs = Database::encryptor('encrypt','Documento subido saticfactoriamente!!');
	    $err = 1;

	    $target_dir = "documents/$id/";

	    if (!file_exists($target_dir)) {
		    mkdir($target_dir, 0700);
		}

		//Guardar cualquier archivo
		
	    move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name']);
	    

	    //guardar un archivo en especfico
	    /**
	    if ($_FILES["file"]["type"] == "application/pdf") {
	    	move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.'cedula.pdf');
	    } else if($_FILES["file"]["type"] == "image/jpg"){
	    	move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.'cedula.jpf');
	    }else if($_FILES["file"]["type"] == "image/png"){
	    	move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.'cedula.pnf');
	    }else{
	    	$mgs = Database::encryptor('encrypt','Documento subido no valido');
	        $err = 0;
	    }  
	    */
	    header("location: index.php?c=". Database::encryptor('encrypt','user') ."&a=".Database::encryptor('encrypt','index')."&m=". $mgs . '&e='. $err);
	}

	public function viewDoc()
	{
		$id = Database::encryptor('decrypt',$_REQUEST['id']);
		require_once 'views/header.php';
		require_once 'views/message.php';
		require_once 'views/user/viewDoc.php';
		require_once 'views/footer.php';
	}

}

