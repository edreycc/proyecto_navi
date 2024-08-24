<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{

	// public function validar($login, $password)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('usuarios');
	// 	$this->db->where('login', $login);
	// 	$this->db->where('password', $password);
	// 	return $this->db->get(); 
	// }

	public function agregarUsuarioBD($data)
	{

		$this->db->insert('usuarios', $data);
	}
	public function verificarLogin($login, $password)
	{
		// Obtener el usuario por login
		$this->db->where('login', $login);
		$query = $this->db->get('usuarios');
	
		if ($query->num_rows() > 0) {
			$usuario = $query->row();
	
			// Verificar la contraseña
			if (password_verify($password, $usuario->password)) {
				// Contraseña correcta
				return $usuario;
			} else {
				// Contraseña incorrecta
				return false;
			}
		} else {
			// Usuario no encontrado
			return false;
		}
	}
}
