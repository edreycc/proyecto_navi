<div class="container-fluid">

    <!-- Encabezado de la Página -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo base_url(); ?>index.php/productocontroller/listar" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
                <i class="fa-solid fa-left-long"></i> 
                Atras              
            </a> 
            <h6 class="m-0 font-weight-bold text-primary">Modificar Producto</h6>
        </div>
        <div class="card-body">
            
        <?php
        // Abre el formulario con la URL para modificar el producto
        echo form_open_multipart('productocontroller/modificarProductoBD');
        ?>
        <input type="hidden" name="idproducto" value="<?php echo $producto->id_producto; ?>">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_name">Nombre del Producto</label>
                        <input type="text" class="form-control" placeholder="Nombre del Producto" name="nombre" value="<?php echo $producto->nombre; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_brand">Marca</label>
                        <input type="text" class="form-control" placeholder="Marca" name="marca" value="<?php echo $producto->marca; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_price">Precio</label>
                        <input type="number" class="form-control" placeholder="Precio" name="precio" value="<?php echo $producto->precio; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_stock">Stock</label>
                        <input type="number" class="form-control" placeholder="Stock" name="stock" value="<?php echo $producto->stock; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_description">Descripción</label>
                        <textarea class="form-control" placeholder="Descripción del producto" name="descripcion" rows="3" required><?php echo $producto->descripcion; ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_image">Cargar Imagen (opcional)</label>
                        <input type="file" class="form-control" name="imagen" accept="image/*">
                        <small class="form-text text-muted">Deja en blanco si no deseas cambiar la imagen.</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_provider">Proveedor</label>
                        <select class="form-control" name="idproveedor" required>
                            <option value="">Selecciona un proveedor</option>
                            <?php foreach ($proveedores as $proveedor): ?>
                                <option value="<?php echo $proveedor->id_proveedor; ?>" <?php echo ($proveedor->id_proveedor == $producto->id_proveedor) ? 'selected' : ''; ?>><?php echo $proveedor->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_category">Categoría</label>
                        <select class="form-control" name="idcategoria" required>
                            <option value="">Selecciona una categoría</option>
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?php echo $categoria->id_categoria; ?>" <?php echo ($categoria->id_categoria == $producto->id_categoria) ? 'selected' : ''; ?>><?php echo $categoria->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" name="modify_product" class="btn btn-primary">Modificar Producto</button>

        <?php
        form_close();
        ?> 
        </div>
    </div>
</div>
