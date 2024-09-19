<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_model extends CI_Model {
    public function listausuarios()
	{
		$this->db->select('*'); // slecet *
		$this->db->from('usuarios'); //tabla
		return $this->db->get(); //devolución del resultado de la consulta
	}

}
