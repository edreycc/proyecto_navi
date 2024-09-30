<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Obtener todos los servicios
    public function getServicios() {
        return $this->db->get('servicios'); // Cambia 'servicios' al nombre de tu tabla
    }

    // Obtener un servicio por ID
    public function getServicioById($id) {
        return $this->db->get_where('servicios', array('id_servicio' => $id))->row(); // Cambia 'servicios' al nombre de tu tabla
    }

    // Insertar un nuevo servicio
    public function insertServicio($data) {
        return $this->db->insert('servicios', $data); // Cambia 'servicios' al nombre de tu tabla
    }

    // Actualizar un servicio
    public function updateServicio($data,$idServicio) {
        $this->db->where('id_servicio', $idServicio); 
        return $this->db->update('servicios', $data);
    }

    // Eliminar un servicio
    public function deleteServicio($id) {
        return $this->db->delete('servicios', array('id_servicio' => $id)); // Cambia 'id_servicio' al nombre de tu campo ID
    }
}
