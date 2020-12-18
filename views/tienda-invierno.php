<div class="col-md-12">
    <div class="page-header">
        <h1 class="h1-certificado">Invierno</h1>
    </div>
</div>
<div class="container">
    <?php
    //Si el que esta logueado es el admin nos dará la opción de modificar la tienda
    if(isset($_SESSION['nombreUsuario']) && $_SESSION['nombreUsuario']=='Admin') { ?>
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombreArticulo" placeholder="Nombre">
        <label for="marca">Marca:</label>
        <input type="text" class="form-control" id="marca" placeholder="Marca">
        <label for="selectProveedor">Proveedor:</label>
        <select id="selectProveedor" class="form-select" aria-label="Default select example" onchange="alert($('#selectProveedor option:selected').data('idproveedor'))">
            <option value="Seleccionar" selected disabled>Seleccionar</option>
        </select>
        <br>
        <label for="idCategoria">Categoria:</label>
        <input type="number" class="form-control" name="idCategoria" id="idCategoria" placeholder="Categoria">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="2" style="resize: none;" placeholder="Descripcion :v"></textarea>
        <!--existencia, talla, precio, color, imagen-->
        <label for="existencia">Existencia:</label>
        <input type="text" class="form-control" id="existencia" placeholder="Existencia">
        <label for="talla">Talla:</label>
        <input type="number" class="form-control" id="talla" placeholder="Talla">
        <label for="precio">Precio:</label>
        <input type="number" class="form-control" id="precio" placeholder="Precio">
        <label for="color">Color:</label>
        <input type="text" class="form-control" id="color" placeholder="Color">
        <label for="imagen">Imagen:</label>
        <input type="file" class="form-control" id="imagen">
</div>
<button onclick="addArticulo()">Press me</button>
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