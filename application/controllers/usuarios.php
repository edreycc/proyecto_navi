<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function index()
	{
		$this->load->library('form_validation');
		$this->load->view('inc/head');
		$this->load->view('loginform');
		$this->load->view('inc/pie');
	}

	public function validarusuario()
   {
    $login = $_POST['correo'];
    $password = $_POST['password'];

    // Verificar el login
    $usuario = $this->usuario_model->verificarLogin($login, $password);

    if ($usuario) {
        // Si el usuario es válido, se establece la sesión
        $this->session->set_userdata('idusuario', $usuario->id_usuario);
        $this->session->set_userdata('login', $usuario->login);
        $this->session->set_userdata('tipo', $usuario->rol);
		// En el controlador, después de autenticar al usuario:
        $this->session->set_userdata('nombre', $usuario->nombre);

		

        $estado=$usuario->rol;
		//$rootpage=$estado==='user'
        if($estado==='user'){
			//echo "user";	
			redirect('DashboardControllerUser/index','refresh');
		}else{
           // echo "admin";
			redirect('DashboardController/index', 'refresh');
		}
        // Redirigir a la dashboard
    } else {
        // Si el usuario no es válido, redirigir de vuelta al login
        redirect('usuarios/index', 'refresh');
    }
}
    
	public function registroUsuarioDB()
	{
		
		$data['nombre'] = ($_POST['nombre']);
		$data['apellidos'] = ($_POST['apellidos']);
		$data['correo'] = ($_POST['correo']);
		$data['celular'] = $_POST['celular'];
		$data['direccion'] = ($_POST['direccion']);
		$data['login'] = ($_POST['login']);
		$data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
		$this->usuario_model->agregarUsuarioBD($data);

		redirect('usuarios/index', 'refresh');

	}

	public function panel()
	{
		if ($this->session->userdata('login')) {
			redirect('estudiante/curso', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuarios/index', 'refresh');
	}
	public function registro()
	{
		// Cargar la vista de registro
		$this->load->view('registro');
	}
	
}
