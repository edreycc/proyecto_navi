<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_model extends CI_Model {
    public function listausuarios()
	{
		$this->db->select('*'); // slecet *
		$this->db->from('usuarios'); //tabla
        $this->db->where('estado','1');
		return $this->db->get(); //devolución del resultado de la consulta
	}

    public function setUsuario($idusuario) {
        $this->db->where('id_usuario', $idusuario);
        $query = $this->db->get('usuarios');
        return $query->row(); // Asegúrate de devolver una fila como un objeto.
    }
    public function modificarUsuario($idusuario,$data){
        $this->db->where('id_usuario',$idusuario);
		$this->db->update('usuarios',$data);		

    }

    public function listardeshabilitados(){
        $this->db->select('*'); // slecet *
		$this->db->from('usuarios'); //tabla
        $this->db->where('estado','0');
		return $this->db->get();
    }
}
