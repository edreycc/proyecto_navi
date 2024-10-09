<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardControllerUser extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
       
        
    }
    
    public function index()
    {
        $user_id = $this->session->userdata('idusuario');

        if (!$user_id) {
            redirect('loginform');  // Si no está logueado, redirigimos al login
        }

        $data['servicios']=$this->servicio_model->getServicios();
        // Obtenemos más información del usuario si es necesario
        $data['usuario'] = $this->usuario_model->get_usuario_by_id($user_id);

        $this->loadClientViews('cliente/reserva_cli/reserva_cliente',$data);

    }

    public function reservar($id){
        
        $data['empleado']= $this->servicio_model->getServicioById($id);

        $data['empleado']= $this->empleado_model->obtenerEmpleados();
        
        $this->loadClientViews('cliente/reserva_cliente',$data);
        
    }

    public function solicitudReserva(){
        $data=1;
        $this->loadClientViews('cliente/reserva_cli/reserva_cliente',$data);
        
    }

    public function elegirFecha() {
        // Validar y obtener datos del formulario
        $this->form_validation->set_rules('selectedDate', 'Fecha', 'required');
        $this->form_validation->set_rules('selectedHour', 'Hora', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, vuelve a cargar la vista del formulario
            $this->loadClientViews('cliente/reserva_cli/reserva_cliente');
        } else {
            // Obtener los valores enviados desde el formulario
            $fecha = $this->input->post('selectedDate');  // Formato esperado: YYYY-MM-DD
            $horaCompleta = $this->input->post('selectedHour');  // Valor esperado: "09:00 - 09:35"
    
            // Separar la primera hora antes del guion
            $horaPartes = explode(' - ', $horaCompleta);
    
            // Verificar si la separación fue correcta
            if (count($horaPartes) < 2) {
                $data['error'] = 'Formato de hora no válido. Debe ser "HH:mm - HH:mm".';
                $this->loadClientViews('cliente/reserva_cli/reserva_cliente', $data);
            } else {
                $horaInicio = trim($horaPartes[0]);  // Ejemplo: "09:00"
    
                // Combinar fecha y hora de inicio para crear una cadena de fecha
                $fechaHoraStr = $fecha . ' ' . $horaInicio;  // Ejemplo: "2024-10-10 09:00"
    
                // Convertir a timestamp
                $timestamp = strtotime($fechaHoraStr);
    
                // Validar si el timestamp es válido
                if ($timestamp === false) {
                    $data['error'] = 'Hubo un error al procesar la fecha y la hora.';
                    $this->loadClientViews('cliente/reserva_cli/reserva_cliente', $data);
                } else {
                    // Asegurarse de que el timestamp sea un entero antes de asignarlo
                    if (is_int($timestamp)) {
                        $data['fechaReserva'] = date('d/m/Y H:i:s', $timestamp);
                    } else {
                        $data['error'] = 'El timestamp no es válido.';
                        $this->loadClientViews('cliente/reserva_cli/reserva_cliente', $data);
                    }
    
                    $data['servicios'] = $this->servicio_model->getServicios();
                    $this->loadClientViews('cliente/inicio_cli', $data);
                }
            }
        }
    }
    
    
    

    public function procesar_reserva() {
        
        $idReserva = 1; // Cambia esto según tu lógica
    
        // Capturar los IDs de los servicios seleccionados
        $serviciosSeleccionados = $this->input->post('servicios');
    
        // Verificar si hay servicios seleccionados
        if (!empty($serviciosSeleccionados)) {
            foreach ($serviciosSeleccionados as $idServicio) {
                
                $data = array(
                    'reservas_id' => $idReserva,
                    'servicios_id' => $idServicio,
                    'cantidad' => 1, // Puedes ajustar esto según la lógica
                    'precio' => $this->obtenerPrecioServicio($idServicio) // Función para obtener el precio del servicio
                );
                $this->db->insert('servicio_reservado', $data);
            }
            echo "Reserva procesada exitosamente.";
        } else {
            echo "No se seleccionaron servicios.";
        }
    }
    

   
    

    public  function reservaBd(){

       



    }


    public function loadClientViews($viewName, $data = []) {
        
        $this->load->view('cliente/head');
        $this->load->view('cliente/sidebar');
        $this->load->view('cliente/topbar');
        $this->load->view($viewName, $data);
        $this->load->view('cliente/footer');
    }
    
     
}