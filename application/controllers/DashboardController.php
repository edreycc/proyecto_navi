<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardController extends CI_Controller
{
    public function index()
    {
        $user_id = $this->session->userdata('idusuario');

        if (!$user_id) {
            redirect('loginform');  // Si no está logueado, redirigimos al login
        }

        // Obtenemos más información del usuario si es necesario
        $data['usuario'] = $this->usuario_model->get_usuario_by_id($user_id);

        // Cargamos la vista del dashboard pasando los datos del usuario
        
        $this->load->view('admin/head');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/footer');

    }

    public function listar(){
        if($this->session->userdata('tipo')=='admin'){

			$lista=$this->account_model->listausuarios();
			$data['usuarios']=$lista;
            $this->load->view('admin/head');
            $this->load->view('admin/listar_usuario',$data);
            $this->load->view('admin/footer');
            
        }
    }

    
    // public function index()
	// {
	// 	$this->load->view('inc/head');
	// 	$this->load->view('loginform');
        
	// 	$this->load->view('inc/pie');
	// }    
}