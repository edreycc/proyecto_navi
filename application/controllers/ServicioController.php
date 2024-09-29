<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicioController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('autentificacion/servicio_val'); 
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
        $data['servicios'] = $this->servicio_model->getServicios(); // Obtener los servicios desde el modelo
        $this->loadAdminViews('admin/servicios/listar_servicio', $data); // Cargar la vista de listar servicios
    }

    // Método para mostrar el formulario de agregar servicio
    public function agregar() {
        $this->loadAdminViews('admin/servicios/agregar_servicio'); // Cargar la vista de agregar servicio
    }

    // Método para guardar un nuevo servicio en la base de datos
    public function agregarServicioBD() {
        
        $this->form_validation->set_rules(reglasAgregarServicio());
    
        if ($this->form_validation->run() == FALSE) {
            
            $this->loadAdminViews('admin/servicios/agregar_servicio');
        } else {
            
            $data = recogerDatosServicio($this->input);
            $this->Servicio_model->insertServicio($data); // Llamar al modelo para insertar el servicio
            redirect('ServicioController/listar'); // Redirigir a la lista de servicios
        }
    }
    

    // Método para mostrar el formulario de modificar servicio
    public function modificar($id) {
        $data['servicio'] = $this->Servicio_model->getServicioById($id); // Obtener el servicio por ID
        $this->loadAdminViews('servicios/modificar', $data); // Cargar la vista de modificar servicio
    }

    // Método para actualizar el servicio en la base de datos
    public function modificarServicioBD() {
        $data = array(
            'id_servicio' => $this->input->post('id_servicio'),
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'duracion' => $this->input->post('duracion'),
            'precio' => $this->input->post('precio')
        );

        $this->Servicio_model->updateServicio($data); // Llamar al modelo para actualizar el servicio
        redirect('ServicioController/listar'); // Redirigir a la lista de servicios
    }

    // Método para eliminar un servicio
    public function eliminarServicioBD() {
        $id = $this->input->post('id_servicio');
        $this->Servicio_model->deleteServicio($id); // Llamar al modelo para eliminar el servicio
        redirect('ServicioController/listar'); // Redirigir a la lista de servicios
    }
}
