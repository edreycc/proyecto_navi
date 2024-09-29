<?php
    function reglasAgregar()
    {
        return [
            [
                'field' => 'nombre',
                'label' => 'Nombre del Producto',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El nombre del producto es obligatorio.'
                ]
            ],
            [
                'field' => 'marca',
                'label' => 'Marca',
                'rules' => 'required',
                'errors' => [
                    'required' => 'La marca es obligatoria.'
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
            ],
            [
                'field' => 'stock',
                'label' => 'Stock',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'El stock es obligatorio.',
                    'numeric' => 'El stock debe ser un valor numérico.'
                ]
            ],
            [
                'field' => 'idproveedor',
                'label' => 'Proveedor',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El proveedor es obligatorio.'
                ]
            ],
            [
                'field' => 'idcategoria',
                'label' => 'Categoría',
                'rules' => 'required',
                'errors' => [
                    'required' => 'La categoría es obligatoria.'
                ]
            ]
        ];
    }


    if (!function_exists('recogerDatosProducto')) {
        function recogerDatosProducto($input)
        {
            return array(
                'nombre'        => $input->post('nombre'),
                'marca'         => $input->post('marca'),
                'precio'        => $input->post('precio'),
                'stock'         => $input->post('stock'),
                'id_proveedor'  => $input->post('idproveedor'),
                'id_categoria'  => $input->post('idcategoria'),
                'descripcion'   => $input->post('descripcion')
            );
        }
    }