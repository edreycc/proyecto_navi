<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Email_model extends CI_Model
{
    public function enviar_correo($email, $mensaje, $asunto)
    {
        // Cargar la librería de correo
        $this->load->library('email');

        // Configuración para Gmail
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'lupademiel@gmail.com',  // Tu dirección de Gmail
            'smtp_pass' => 'gvjc ubwj rzls gubj',       // Contraseña o contraseña de aplicación
            'mailtype' => 'html',                // Tipo de correo (puede ser 'html' o 'text')
            'charset' => 'utf-8',
            'newline' => "\r\n",                // Esto es necesario para que funcione correctamente
            'wordwrap' => TRUE
        );

        // Inicializar configuración
        $this->email->initialize($config);

        // Configurar el correo
        $this->email->from('lupademiel@gmail.com', 'Navi-Barber');  // Remitente
        $this->email->to($email);           // Destinatario
        $this->email->subject($asunto);           // Asunto del correo
        $this->email->message($mensaje);  // Cuerpo en HTML

        // Intentar enviar el correo
        if ($this->email->send()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


}