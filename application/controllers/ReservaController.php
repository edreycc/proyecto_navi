<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReservaController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->helper('autentificacion/reserva');

    }

    // Método para mostrar el formulario de reserva
    public function crear_reserva()
    {
        // Obtener los inputs del formulario (esto puede ser opcional)
        $inputs = $this->get_inputs();
        $this->load->view('formulario_reserva', ['inputs' => $inputs]);
    }


    public function elegirFecha()
    {
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

    public function procesarReserva()
    {

        $this->db->trans_start();

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


        if (empty($serviciosSeleccionados)) {
            $this->session->set_flashdata('error', 'Debes seleccionar al menos un servicio.');
            redirect('ReservaController/elegirFecha'); // Redirigir a la vista deseada
            return;
        }

       // $idReserva= $this->solicitudReservaBD($fechaConvertida);

        foreach ($serviciosSeleccionados as $servicio) {
            if (isset($servicio['id_servicio']) && isset($servicio['precio'])) {
                $idServicio = intval($servicio['id_servicio']);
                $precioServicio = floatval($servicio['precio']);
                $this->reserva_model->insertarServicoReservado($idServicio, $precioServicio, $idReserva);
            }
        }
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            // La transacción falló, manejar el error
            $this->session->set_flashdata('error', 'Error al procesar la reserva. Intenta nuevamente.');
            redirect('cliente/inicio_cli');
        } else {
            // Confirmar éxito
            $this->session->set_flashdata('success', 'Reserva realizada con éxito.');
            redirect('reservacontroller/elegirfechaFecha'); // Redirigir a la vista de éxito
        }
    }


    public function prueba()
    {
        $this->loadClientViews('cliente/prueba');
    }



    public function solicitudReservaBD($fecha)
    {

        $idUsuario = $this->session->userdata('idusuario');
        $emailUsuario = $this->session->userdata('correo');

        $data = [
            'fecha' => $fecha,
            'estado' => 0, // Estado inicial pendiente
            'idusuario' => $idUsuario
        ];
        $idReserva = $this->reserva_model->insertarReserva($data);

        
        // echo 'token' . $token = bin2hex(random_bytes(50)); // Token de 100 caracteres
        $token = bin2hex(random_bytes(50)); // Token de 100 caracteres
        // Guardar el token de confirmación en la base de datos (puedes crear una tabla extra para tokens)
        $dataBD = [
            'id_reserva' => $idReserva,
            'token' => $token,
        ];

        $this->reserva_model->tokenAtentificacion($dataBD);


        $baseUrl = base_url(); 
        $enlaceConfirmacion = "{$baseUrl}index.php/ReservaController/confirmar/{$idReserva}/{$token}";

        //confirmación
        $linkConfirmacion = "<a href='{$enlaceConfirmacion}'>Confirmar reserva</a>";
        $mensaje = "Hola, por favor confirma tu reserva haciendo clic en el siguiente enlace: " . $enlaceConfirmacion;
        
        if ($this->email_model->enviar_correo($emailUsuario, $mensaje, 'Confirma tu reserva')) {
            echo "Correo de confirmación enviado. Revisa tu bandeja de entrada.";
            return $idReserva;
        } else {
            
            echo "Error al enviar el correo.";
        }
    }

    public function confirmar($idReserva, $token)
    {
    
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

    public function loadClientViews($viewName, $data = [])
    {

        $this->load->view('cliente/head');
        $this->load->view('cliente/sidebar');
        $this->load->view('cliente/topbar');
        $this->load->view($viewName, $data);
        $this->load->view('cliente/footer');
    }


}