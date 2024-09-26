<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardController extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('autentificacion/modificar_usuario'));
        
    }
    public function loadAdminViews($viewName, $data = []) {
        
        $this->load->view('admin/head');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view($viewName, $data);
        $this->load->view('admin/footer');
    }
    public function index()
    {
        $user_id = $this->session->userdata('idusuario');

        if (!$user_id) {
            redirect('loginform');  // Si no está logueado, redirigimos al login
        }

        // Obtenemos más información del usuario si es necesario
        $data['usuario'] = $this->usuario_model->get_usuario_by_id($user_id);

        // Cargamos la vista del dashboard pasando los datos del usuario
            
        $this->loadAdminViews('admin/inicio',$data);

    }

    public function listar(){
        if($this->session->userdata('tipo')=='admin'){

			$lista=$this->account_model->listausuarios();
			$data['usuarios']=$lista;

            $this->loadAdminViews('admin/usuarios/listar_usuario', $data);
            
        }
    }


    public function deshabilitarUsuario(){
        
        $lista=$this->account_model->listardeshabilitados();
        $data['usuarios']=$lista;

        $this->loadAdminViews('admin/usuarios/deshabilitar_usuario',$data);

    }
   
    public function modificarUsuario(){

        $idusuario=$_POST['idusuario'];
		$data['infousuario']=$this->account_model->setUsuario($idusuario);
        

        $this->loadAdminViews('admin/usuarios/modificar_usuario',$data);

    }

    public function modificarUsuarioBD(){

        
        $idusuario=$_POST['idusuario'];
		$data['nombre'] = ($_POST['nombre']);
		$data['apellidos'] = ($_POST['apellidos']);
		$data['correo'] = ($_POST['correo']);
		$data['celular'] = ($_POST['celular']);
		$data['direccion'] = ($_POST['direccion']);
		$data['login'] = ($_POST['login']);

		$data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		
        $this->account_model->modificarUsuario($idusuario,$data);
		redirect('dashboardcontroller/listar','refresh');
    }

    
    public function deshabilitarUsuarioBD(){


        $idusuario = $this->input->post('idusuario');
		$data['estado']='0';

		$this->account_model->modificarUsuario($idusuario,$data);
		redirect('dashboardcontroller/listar','refresh');
    }

    public function habilitarUsuarioBD(){
        $idusuario = $this->input->post('idusuario');
		$data['estado']='1';

		$this->account_model->modificarUsuario($idusuario,$data);
		redirect('dashboardcontroller/listar','refresh');
    }

    
    
    // public function index()
	// {
	// 	$this->load->view('inc/head');
	// 	$this->load->view('loginform');
        
	// 	$this->load->view('inc/pie');
	// }    
}