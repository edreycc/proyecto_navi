<?php
function getModificarRules(){
    return array ( 
            [
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required|min_length[3]|max_length[50]'
            ],
            [
                'field' => 'apellidos',
                'label' => 'Apellidos',
                'rules' => 'required|min_length[3]|max_length[50]'
            ],
            [
                'field' => 'correo',
                'label' => 'Correo',
                'rules' => 'required|valid_email'
            ],
            [
                'field' => 'celular',
                'label' => 'Celular',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'direccion',
                'label' => 'Dirección',
                'rules' => 'required|min_length[1]|max_length[50]'
            ],
            [
                'field' => 'login',
                'label' => 'Login',
                'rules' => 'required|min_length[3]|max_length[50]'
            ],
            [
                'field' => 'password',
                'label' => 'Contraseña',
                'rules' => 'required|min_length[6]'
            ]       
);
}