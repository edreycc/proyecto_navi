<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProductoController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('autentificacion/productos_val'); 
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
        
        $this->loadAdminViews('admin/productos/agregar_producto',$data);
    }

    public function agregarProductoBD() {
        
        $this->form_validation->set_rules(reglasAgregar());
        
        if ($this->form_validation->run() == FALSE) {
           
            $this->agregarProducto();
        } else {
        
            $datos_producto = recogerDatosProducto($this->input);

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
                    $this->agregarProducto();
                    return;
                }
            }

            
            $this->producto_model->agregarProducto($datos_producto);

            
            redirect('productocontroller/listar','refresh');
        }
    }

    public function modificarProducto() {
        $id_producto = $this->input->post('idproducto'); // Asegúrate de que es 'idproducto'
    
        if (!$id_producto) {
            // Manejar el caso en que no se haya recibido el ID del producto
            show_error('El ID del producto no se ha recibido correctamente.');
        }
    
        $data['producto'] =  $this->producto_model->get_producto($id_producto);
        $data['proveedores'] = $this->producto_model->get_proveedores(); // Obtiene los proveedores
        $data['categorias'] = $this->producto_model->get_categorias(); // Obtiene las categorías
    
        $this->loadAdminViews('admin/productos/modificar_producto', $data);
    }
    

    public function modificarProductoBD() {
        $id_producto = $this->input->post('idproducto'); 
        
        $this->form_validation->set_rules(reglasAgregar());

        if ($this->form_validation->run() == FALSE) {

            $data['producto'] = $this->Producto_model->get_producto($id_producto);
            $data['proveedores'] = $this->Producto_model->get_proveedores();
            $data['categorias'] = $this->Producto_model->get_categorias();
            $this->loadAdminViews('admin/productos/modificar_producto', $data);
        } else {
           
           
            $datos_producto = recogerDatosProducto($this->input);


            if (!empty($_FILES['imagen']['name'])) {
                $config['upload_path']   = './uploads/productos/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('imagen')) {

                    $upload_data = $this->upload->data();
                    $datos_producto['imagen'] = $upload_data['file_name'];
                } else {

                    $data['error'] = $this->upload->display_errors();
                    $data['producto'] = $this->producto_model->get_producto($id_producto);
                    $data['proveedores'] = $this->producto_model->get_proveedores();
                    $data['categorias'] = $this->producto_model->get_categorias();
                    $this->load->view('modificar_producto_view', $data);
                    return;
                }
            }


            $this->producto_model->actualizarProducto($id_producto, $datos_producto);

            
            // $this->session->set_flashdata('success', 'Producto modificado exitosamente.');
            redirect('productocontroller/listar');
        }
    }
    public function eliminarProductoBD() {
        // Obtener el ID del producto desde el formulario
        $id_producto = $this->input->post('idproducto'); // Asegúrate de que este nombre coincida con el campo oculto en tu formulario
    
        // Llamar al modelo para eliminar el producto
        if ($this->producto_model->eliminarProducto($id_producto)) {
            // Redirigir a la página de lista de productos con un mensaje de éxito
            $this->session->set_flashdata('success', 'Producto eliminado correctamente.');
        } else {
            // Redirigir con un mensaje de error si la eliminación falla
            $this->session->set_flashdata('error', 'No se pudo eliminar el producto. Inténtalo de nuevo.');
        }
    
        redirect('productocontroller/listar'); // Cambia esto según tu ruta de redirección
    }
    

}