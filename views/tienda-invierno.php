<div class="col-md-12">
    <div class="page-header">
        <h1 class="h1-certificado">Invierno</h1>
    </div>
</div>
<?php
//Si el que esta logueado es el admin nos dará la opción de modificar la tienda
if (isset($_SESSION['correo']) && $_SESSION['correo'] == 'admin@cutsiegirl.mx') { ?>
    <!--modal tienda-->
    <div id="modalAddArticulo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Registro Artículo</h3>
                    <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form" role="form" id="formularioAddArticulo">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombreArticulo" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="marca">Marca:</label>
                                    <input type="text" class="form-control" id="marca" placeholder="Marca">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="from-group">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Proveedor
                                        </button>
                                        <div class="dropdown-menu" id="listProveedores">
                                        </div>
                                        <input type="text" class="form-control" name="idProveedor" id="idProveedor" placeholder="Proveedor" data-idproveedor="0" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Categoría
                                        </button>
                                        <div class="dropdown-menu" id="listaCategorias">
                                        </div>
                                        <input type="text" class="form-control" name="idCategoria" id="idCategoria" placeholder="Categoria" data-idCategoria="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="2" style="resize: none;" placeholder="Descripcion"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <!--existencia, talla, precio, color, imagen-->
                                    <label for="existencia">Existencia:</label>
                                    <input type="number" class="form-control" id="existencia" placeholder="Existencia" min="1" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="talla">Talla:</label>
                                    <input type="number" class="form-control" id="talla" placeholder="Talla" min="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="precio">Precio:</label>
                                    <input type="number" class="form-control" id="precio" placeholder="Precio" min="1" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="color">Color:</label>
                                    <input type="text" class="form-control" id="color" placeholder="Color">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" onclick="addArticulo()" class="btn btn-success">Añadir Articulo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Fin poner modal-->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddArticulo" onclick="$('#formularioAddArticulo').trigger('reset')">Nuevo artículo</button>
    <table>
        <thead>
            <tr>
                <th>idArticulo</th>
                <th>nombre</th>
                <th>marca</th>
                <th>descripcion</th>
                <th>idProveedor</th>
                <th>idCategoria</th>
            </tr>
        </thead>
        <tbody id="patas1"></tbody>

    </table>

<?php
    //cerramos la llave del if y si el admin no es el que esta logueados nos aparecerá la tienda.
} else { ?>

    <h1>Aquí va la tienda</h1>
<?php } ?>