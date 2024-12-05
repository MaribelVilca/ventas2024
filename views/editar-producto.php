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
                <label for="categoria">Categoria: </label>
                <select name="categoria" id="categoria"class="form control"required>
                <option>Seleccione</option>
                <option>polos</option>

                </select>
               
        </div>
        <div class?="form group">
                <label for="fecha de Vencimiento">Fecha de Vencimiento</label>
                <input type="date" require
                        class="form-control" id="fecha_vencimiento" name="fecha_vencimiento"><br><br>
        </div>
        <div class?="form group">
                <label for="imagen">imagen: </label>
                <input type="file" required
                        class="form-control" id="imagen" name="imagen"><br><br>
        </div>
        <div class?="form group">
                <label for="proveedor">proveedor: </label>
                <select name="proveedor" id="proveedor"class="form control"required>
                <option>Seleccione</option> 
                
        </select>
        </div>

        <button type="button" class="btn-success" onclick="actualizar_producto()">Registrar</button>
</form>
<script src="<?php echo BASE_URL; ?>views/js/functions_product.js"></script>

<script >listar_categorias();</script>
<script >listar_proveedor();</script>
<script> 
    //http://localhost/ventas_2024/editar-productos/1
    const id_p=<?php $pagina=explode("/", $_GET['views']); echo $pagina['1'];?>;
    ver_producto(id_p);
</script>