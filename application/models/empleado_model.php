<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Obtener todos los empleados
    public function obtenerEmpleados() {
        $query = $this->db->get('empleados'); // Cambia 'empleados' por el nombre de tu tabla
        return $query->result(); // Devuelve todos los resultados
    }

    // Obtener un empleado por ID
    public function obtenerEmpleadoPorId($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('empleados');
        return $query->row(); // Devuelve una sola fila
    }

    // Agregar un nuevo empleado
    public function agregar_empleado($data) {
        return $this->db->insert('empleados', $data); // Cambia 'empleados' por el nombre de tu tabla
    }

    // Actualizar un empleado
    public function actualizar_empleado($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('empleados', $data); // Cambia 'empleados' por el nombre de tu tabla
    }

    // Eliminar un empleado
    public function eliminar_empleado($id) {
        $this->db->where('id', $id);
        return $this->db->delete('empleados'); // Cambia 'empleados' por el nombre de tu tabla
    }
}
