<?php

    function getReservaRules () {
    return [
        [
            'field' => 'totalPrecio',
            'label' => 'Total Precio',
            'rules' => 'required|decimal',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.',
                'decimal' => 'El campo {field} debe ser un número decimal válido.',
            ],
        ],
        [
            'field' => 'totalServicios',
            'label' => 'Total Servicios',
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.',
                'integer' => 'El campo {field} debe ser un número entero válido.',
            ],
        ],
        [
            'field' => 'fechaReserva',
            'label' => 'Fecha Reserva',
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.',
                'valid_date' => 'El campo {field} debe ser una fecha válida.',
            ],
        ]
    ];
}
    function recogerDatosReserva($input) {
        return [
            'totalPrecio' => [
                'name' => 'totalPrecio',
                'type' => 'text',
                'value' => set_value('totalPrecio'),
                'placeholder' => 'Ingrese el total del precio',
                'class' => 'form-control'
            ],
            'totalServicios' => [
                'name' => 'totalServicios',
                'type' => 'number',
                'value' => set_value('totalServicios'),
                'placeholder' => 'Ingrese el total de servicios',
                'class' => 'form-control'
            ],
            'fechaReserva' => [
                'name' => 'fechaReserva',
                'type' => 'date',
                'value' => set_value('fechaReserva'),
                'class' => 'form-control'
            ]
        ];
}
