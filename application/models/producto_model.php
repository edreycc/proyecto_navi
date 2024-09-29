<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Producto_model extends CI_Model{
    public function get_producto($id_producto) {      
        $this->db->where('id_producto', $id_producto); //tabla
		$query=$this->db->get('productos');
        return $query->row();
    }

    public function obtenerTodosProductos() {
        $this->db->select('productos.*, proveedores.nombre as prov_nombre, proveedores.contacto as prov_contacto, categorias.nombre as cat_nombre');
        $this->db->from('productos');
        $this->db->join('proveedores', 'productos.id_proveedor = proveedores.id_proveedor', 'left');
        $this->db->join('categorias', 'productos.id_categoria = categorias.id_categoria', 'left');
        
        $query = $this->db->get();
        
        return $query; 
    }
    public function get_proveedores() {
        $this->db->select('*'); // slecet *
		$this->db->from('proveedores'); //tabla
		$query=$this->db->get();
        return $query->result();
    }

 
    public function get_categorias() {
        $this->db->select('*'); // slecet *
		$this->db->from('categorias'); //tabla
		$query=$this->db->get();
        return $query->result();
    }

    public function actualizarProducto($id_producto, $data) {
        $this->db->where('id_producto', $id_producto);
        return $this->db->update('productos', $data); // Actualiza la fila con los datos proporcionados
    }

    public function agregarProducto($datos_producto) {
        return $this->db->insert('productos', $datos_producto);
    }

    public function eliminarProducto($id_producto) {
        $this->db->where('id_producto', $id_producto); // Asegúrate de que el nombre del campo coincida con el de tu base de datos
        return $this->db->delete('productos'); // Cambia 'productos' por el nombre de tu tabla
    }
    
}