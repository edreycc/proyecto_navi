<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Reserva_model extends CI_Model{
   

        public function insertarReserva($data) {
            // Insertar los datos en la tabla de solicitudes de reserva
             $this->db->insert('solicitud_reserva', $data);
            return $this->db->insert_id(); 
        }
       
        
            public function confirmarReserva($idReserva, $token) {
                
                $this->db->where('id_reserva', $idReserva);
                $this->db->where('token', $token);
                $query = $this->db->get('tokens_confirmacion');
        
                // Verificar si el token es válido
                if ($query->num_rows() == 1) {
                    // Token válido, actualizar el estado de la reserva a 1 (confirmada)
                    $this->db->where('id_reserva', $idReserva);
                    $this->db->update('solicitud_reserva', ['estado' => 1]);
        
                    // Eliminar el token ya que ha sido utilizado
                    $this->db->where('id_reserva', $idReserva);
                    $this->db->delete('tokens_confirmacion');
        
                    return true;  // Reserva confirmada
                } else {
                    return false; // Token inválido o ya utilizado
                }
            }
        
            public function insertarServicoReservado($idServicio, $precioServicio, $idReserva) {
                $data = [
                    'id_servicio' => $idServicio,
                    'precio' => $precioServicio,
                    'cantidad' => 1, // Suponiendo que la cantidad siempre es 1, ajusta según sea necesario
                    'idsolicitud_reserva' => $idReserva // Asegúrate de asociarlo con la reserva correcta
                ];
                return $this->db->insert('servicio_reservado', $data);
            }
//------------------------------------------------------------------------------------------------------------------------------ 
        public function tokenAtentificacion($data){
            $this->db->insert('tokens_confirmacion',$data ) ;
        }    
        
}