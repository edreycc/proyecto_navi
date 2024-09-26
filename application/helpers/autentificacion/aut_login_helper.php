<?php
function getLoginRules(){
    return array ( 
            [
                'field' => 'correo',
                'label' => 'usuario',
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors'=> array('required'=>'el nombre es requerido'),
            ],
            [
                'field' => 'password',
                'label' => 'contrasenia',
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors'=> array('required'=>'la contraseña es requerida'),
            ] 
);
}