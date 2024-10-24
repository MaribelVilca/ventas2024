FORMULARIO DE REGISTRO DE PRODUCTO
<form action="" class="form-control" id="frmRegistrar">
        <div class?="form group">
                <label for="codigo">Codigo: </label>
                <input type="text" required
                        class="form-control" id="codigo" name="codigo"><br><br>

        </div>
        <div class?="form group">
                <label for="nombre">Nombre: </label>
                <input type="text" required
                        class="form-control" id="nombre" name="Nombre"><br><br>
        </div>
        <div class?="form group">
                <label for="detalle">Detalle: </label>
                <input type="text" required
                        class="form-control" id="detalle" name="detalle"><br><br>
        </div>
        <div class?="form group">
                <label for="precio">Precio: </label>
                <input type="number" required
                        class="form-control" id="precio" name="precio"><br><br>
        </div>

        <div class?="form group">
                <label for="stock">Stock Inicial: </label>
                <input type="number" required
                        class="form-control" id="stock" name="Stock Inicial"><br><br>
        </div>
        <div class?="form group">
                <label for="categoria">Categoria: </label>
                <input type="text" required
                        class="form-control" id="categoria" name="categoria"><br><br>
        </div>
        <div class?="form group">
                <label for="fecha de Vencimiento">Fecha de Vencimiento</label>
                <input type="date" require
                        class="form-control" id="fecha_vencimiento" name="fecha_vencimiento"><br><br>
        </div>
        <div class?="form group">
                <label for="imagen">imagen: </label>
                <input type="text" required
                        class="form-control" id="imagen" name="imagen"><br><br>
        </div>
        <div class?="form group">
                <label for="proveedor">proveedor: </label>
                <input type="text" required
                        class="form-control" id="proveedor" name="proveedor"><br><br>
        </div>

        <button type="button" class="btn-success" onclick="registrar_producto()">Registrar</button>
</form>
<script src="<?php echo BASE_URL; ?>views/js/functions_product.js"></script>
<script>Listar_Categorias();</script>