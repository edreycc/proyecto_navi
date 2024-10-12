<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReservaController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->helper('autentificacion/reserva'); 
        
    }

    // Método para mostrar el formulario de reserva
    public function crear_reserva() {
        // Obtener los inputs del formulario (esto puede ser opcional)
        $inputs = $this->get_inputs();
        $this->load->view('formulario_reserva', ['inputs' => $inputs]);
    }
    

    public function elegirFecha() {
        // Validar y obtener datos del formulario
        $this->form_validation->set_rules('selectedDate', 'Fecha', 'required');
        $this->form_validation->set_rules('selectedHour', 'Hora', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            
            $this->loadClientViews('cliente/reserva_cli/reserva_cliente');
        } else {
            // Obtener los valores enviados desde el formulario
            $fecha = $this->input->post('selectedDate'); 
            $horaCompleta = $this->input->post('selectedHour');  // Valor esperado: "09:00 - 09:35"
    
            // Separar la primera hora antes del guion
            $horaPartes = explode(' - ', $horaCompleta);
    
            // Verificar si la separación fue correcta
            if (count($horaPartes) < 2) {
                $data['error'] = 'Formato de hora no válido. Debe ser "HH:mm - HH:mm".';
                $this->loadClientViews('cliente/reserva_cli/reserva_cliente', $data);
            } else {
                $horaInicio = trim($horaPartes[0]);  
    
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
    
    public function procesarReserva() {

        // $this->db->trans_start();

    $this->form_validation->set_rules('fechaReserva', 'Fecha Reserva', 'required');

    // Verificar si la validación falla
    if ($this->form_validation->run() == FALSE) {
        // Guardar los errores en flashdata
       $this->session->set_userdata('error', validation_errors());

        // Redirigir a la vista de prueba donde se mostrará el mensaje de error
        redirect('ReservaController/prueba');
        return;
    }

    // Obtener los servicios seleccionados
    $fechaReserva = $this->input->post('fechaReserva');
    $serviciosSeleccionados = json_decode($this->input->post('serviciosSeleccionados'), true);
    $fechaConvertida = DateTime::createFromFormat('d/m/Y H:i:s', $fechaReserva)->format('Y-m-d H:i:s');


    // Para hacer pruebas, puedes usar esto para ver los datos
    echo 'prueba ' . json_encode($serviciosSeleccionados);
        
      //  Validar que los servicios seleccionados no estén vacíos
     if (empty($serviciosSeleccionados)) {
         $this->session->set_flashdata('error', 'Debes seleccionar al menos un servicio.');
         redirect('ReservaController/elegirFecha'); // Redirigir a la vista deseada
         return;
     }
        
     echo 'sanatizar'.$fechaReserva = htmlspecialchars($fechaReserva); // Sanitizar fecha
        
    
    //echo 'prueba'.$idReserva = $this->solicitudReservaBD($fechaReserva);
    $this->solicitudReservaBD($fechaConvertida);

        // foreach ($serviciosSeleccionados as $servicio) {
        //     if (isset($servicio['id_servicio']) && isset($servicio['precio'])) {
        //         $idServicio = intval($servicio['id_servicio']);
        //         $precioServicio = floatval($servicio['precio']);
        //         $this->reserva_modelo->insertarServicoReservado($idServicio, $precioServicio, $idReserva);
        //     }
        // }
        // $this->db->trans_complete();
        // // Confirmar la transacción, redirigir o enviar una respuesta
        // if ($this->db->trans_status() === FALSE) {
        //     // La transacción falló, manejar el error
        //     $this->session->set_flashdata('error', 'Error al procesar la reserva. Intenta nuevamente.');
        //     redirect('cliente/inicio_cli');
        // } else {
        //     // Confirmar éxito
        //     $this->session->set_flashdata('success', 'Reserva realizada con éxito.');
        //     redirect(''); // Redirigir a la vista de éxito
        // }
    }
    public function prueba(){
        $this->loadClientViews('cliente/prueba');
    }
      
    public function solicitudReservaBD($fecha) {
        
        echo ' idusuario===>'.$idUsuario = $this->session->userdata('idusuario');    
        echo 'fecha'.$fecha;
        echo 'correo usuario==>'.$emailUsuario = $this->session->userdata('correo');
      

        $data = [
            'fecha' => $fecha,
            'estado' => 0, // Estado inicial pendiente
            'idusuario' => $idUsuario
        ];
        $string = implode(',  ', $data);
        echo '||||   '.$string;

       echo 'id de la reserva =='.$idReserva =  $this->reserva_model->insertarReserva($data).'|||||';
    
       
         echo 'token'.$token = bin2hex(random_bytes(50)); // Token de 100 caracteres
        
         // Guardar el token de confirmación en la base de datos (puedes crear una tabla extra para tokens)
         $dataBD = [
             'id_reserva' => $idReserva,
             'token' => $token,
         ];
    
        $this->reserva_model->tokenAtentificacion($dataBD);
    
    
        $this->email->from('lupademiel@gmail.com', 'Navi Barber');
        $this->email->to($emailUsuario);
    
        $this->email->subject('Confirma tu reserva');
        
        //confirmación
        $linkConfirmacion = base_url() . "ReservaController/confirmar/" . $idReserva . "/" . $token;
        $mensaje = "Hola, por favor confirma tu reserva haciendo clic en el siguiente enlace: " . $linkConfirmacion;
        
        // $this->email->message($mensaje);
    
        // if ($this->email->send()) {
        //     echo "Correo de confirmación enviado. Revisa tu bandeja de entrada.";
        // } else {
        //     echo "Error al enviar el correo.";
        // }
        // return $idReserva;
    }

    public function confirmar($idReserva, $token) {
        // Cargar el modelo de reserva
        $this->load->model('reserva_model');

        // Llamar al método que confirma la reserva
        $resultado = $this->reserva_model->confirmarReserva($idReserva, $token);

        // Verificar el resultado de la confirmación
        if ($resultado) {
            // Si la confirmación fue exitosa
            echo "¡Reserva confirmada con éxito!";
        } else {
            // Si hubo algún problema (token inválido o ya usado)
            echo "El enlace de confirmación no es válido.";
        }
    }
    
       public function loadClientViews($viewName, $data = []) {
        
        $this->load->view('cliente/head');
        $this->load->view('cliente/sidebar');
        $this->load->view('cliente/topbar');
        $this->load->view($viewName, $data);
        $this->load->view('cliente/footer');
    }

 
}
