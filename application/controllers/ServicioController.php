<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicioController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('autentificacion/servicio_val'); 
        $this->load->model('Servicio_model', 'servicio_model');
    }

    public function loadAdminViews($viewName, $data = []) {
        $this->load->view('admin/head');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view($viewName, $data);
        $this->load->view('admin/footer');
    }

    // Método para listar servicios
    public function listar() {
        $data['servicios'] = $this->servicio_model->getServicios(); 
        $this->loadAdminViews('admin/servicios/listar_servicio', $data); 
    }

    // Método para mostrar el formulario de agregar servicio
    public function agregar() {
        $this->loadAdminViews('admin/servicios/agregar_servicio'); 
    }

    // Método para guardar un nuevo servicio en la base de datos
    public function agregarServicioBD() {
        
        $this->form_validation->set_rules(reglasAgregarServicio());
    
        if ($this->form_validation->run() == FALSE) {
            
            $this->loadAdminViews('admin/servicios/agregar_servicio');
        } else {
            
            $data = recogerDatosServicio($this->input);
            $this->servicio_model->insertServicio($data); 
            redirect('ServicioController/listar'); 
        }
    }
    

    // Método para mostrar el formulario de modificar servicio
    public function modificar() {
        $id= $this->input->post('idservicio');
        $data['servicio'] = $this->servicio_model->getServicioById($id); 
        $this->loadAdminViews('admin/servicios/modificar_servicio', $data); 
    }

    // Método para actualizar el servicio en la base de datos
    public function modificarServicioBD() {
        
        $id_servicio = $this->input->post('idservicio'); 
        $this->form_validation->set_rules(reglasAgregarServicio());

       
        if ($this->form_validation->run() == FALSE) {
            redirect('ServicioController/modificar'); 
        } else {
            
            $data=recogerDatosServicio($this->input);

            $this->servicio_model->updateServicio($data,$id_servicio); 
            redirect('ServicioController/listar'); 
        }
    }

    // Método para eliminar un servicio
    public function eliminarServicioBD() {
        $id = $this->input->post('idservicio');
        $this->servicio_model->deleteServicio($id); 
        redirect('ServicioController/listar'); 
    }
}
