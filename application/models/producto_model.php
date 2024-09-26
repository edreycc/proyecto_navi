<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Producto_model extends CI_Model{
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

    public function agregarProducto($datos_producto) {
        return $this->db->insert('productos', $datos_producto);
    }
}