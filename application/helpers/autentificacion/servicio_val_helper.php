<?php
function reglasAgregarServicio()
{
    return [
        [
            'field' => 'nombre',
            'label' => 'Nombre del Servicio',
            'rules' => 'required',
            'errors' => [
                'required' => 'El nombre del servicio es obligatorio.'
            ]
        ],
        [
            'field' => 'descripcion',
            'label' => 'Descripción',
            'rules' => 'required',
            'errors' => [
                'required' => 'La descripción es obligatoria.'
            ]
        ],

        [
            'field' => 'precio',
            'label' => 'Precio',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'El precio es obligatorio.',
                'numeric' => 'El precio debe ser un valor numérico.'
            ]
        ]
    ];
}

if (!function_exists('recogerDatosServicio')) {
    function recogerDatosServicio($input)
    {
        return array(
            'nombre'        => $input->post('nombre'),
            'descripcion'   => $input->post('descripcion'),
            'precio'        => $input->post('precio')
        );
    }
}

