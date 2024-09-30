<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardControllerUser extends CI_Controller
{
    
    public function index()
    {
        $user_id = $this->session->userdata('idusuario');

        if (!$user_id) {
            redirect('loginform');  // Si no está logueado, redirigimos al login
        }

        $data['servicios']=$this->servicio_model->getServicios();
        // Obtenemos más información del usuario si es necesario
        $data['usuario'] = $this->usuario_model->get_usuario_by_id($user_id);

    
        
        $this->loadClientViews('cliente/inicio_cli',$data);

    }
    public function loadClientViews($viewName, $data = []) {
        
        $this->load->view('cliente/head');
        $this->load->view('cliente/sidebar');
        $this->load->view('cliente/topbar');
        $this->load->view($viewName, $data);
        $this->load->view('cliente/footer');
    }
    
    // public function index()
    // {
    //     $this->load->view('inc/vistaslte/head');
    //     $this->load->view('inc/vistaslte/menu');
    //     $this->load->view('inc/vistaslte/footer');
    //     $this->load->view('inc/vistaslte/test');
    // }
    // $this->load->view('inc/vistaslte/pie');

    // public function vista(){
    //     $this->load->view('dashboard_user');
    // }

    // public function index()
	// {
	// 	$this->load->view('inc/head');
	// 	$this->load->view('loginform');
        
	// 	$this->load->view('inc/pie');
	// }    
}