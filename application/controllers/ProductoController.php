<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProductoController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function loadAdminViews($viewName, $data = []) {
        
        $this->load->view('admin/head');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view($viewName, $data);
        $this->load->view('admin/footer');
    }
    public function index()
    {
        $user_id = $this->session->userdata('idusuario');

        if (!$user_id) {
            redirect('loginform');  // Si no está logueado, redirigimos al login
        }

        // Obtenemos más información del usuario si es necesario
        $data['usuario'] = $this->usuario_model->get_usuario_by_id($user_id);

        // Cargamos la vista del dashboard pasando los datos del usuario
            
        $this->loadAdminViews('admin/inicio',$data);

    }

    public function listar(){
        if($this->session->userdata('tipo')=='admin'){

			$lista=$this->producto_model->obtenerTodosProductos();
			$data['productos']=$lista;

            $this->loadAdminViews('admin/productos/listar_producto', $data);
            
        }
    }

    public function agregarProducto() {

        $data['proveedores'] = $this->producto_model->get_proveedores(); // Obtiene los proveedores
        $data['categorias'] = $this->producto_model->get_categorias(); // Obtiene las categorías
        //$this->load->view('agregar_producto', $data); // Carga la vista y pasa los datos
        $this->loadAdminViews('admin/productos/agregar_producto',$data);
    }

    public function agregarProductoBD() {
        // Validación de los datos ingresados
        $this->form_validation->set_rules('nombre', 'Nombre del Producto', 'required');
        $this->form_validation->set_rules('marca', 'Marca', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
        $this->form_validation->set_rules('idproveedor', 'Proveedor', 'required');
        $this->form_validation->set_rules('idcategoria', 'Categoría', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, volver a la vista de agregar con los errores
            $this->agregarProducto();
        } else {
            // Datos del formulario
            $datos_producto = array(
                'nombre'        => $this->input->post('nombre'),
                'marca'         => $this->input->post('marca'),
                'precio'        => $this->input->post('precio'),
                'stock'         => $this->input->post('stock'),
                'id_proveedor'  => $this->input->post('idproveedor'),
                'id_categoria'  => $this->input->post('idcategoria'),
                'descripcion'   => $this->input->post('descripcion')
            );

            // Si se cargó una imagen, procesarla
            if (!empty($_FILES['imagen']['name'])) {
                $config['upload_path']   = './uploads/productos/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']      = 3072; // Tamaño máximo en KB (3MB)
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('imagen')) {
                    // Si la imagen se cargó con éxito, agregar su nombre al array
                    $upload_data = $this->upload->data();
                    $datos_producto['imagen'] = $upload_data['file_name'];
                } else {
                    // Si la carga falla, mostrar error
                    $data['error'] = $this->upload->display_errors();
                    $this->listar();
                    return;
                }
            }

            // Insertar el producto en la base de datos a través del modelo
            $this->Producto_model->agregarProducto($datos_producto);

            // Redirigir a la lista de productos
            redirect('productocontroller/listar','refresh');
        }
    }
}