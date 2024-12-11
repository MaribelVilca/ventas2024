
<form action="" class="form-control" id="formRegistrarCom">
        <div class?="form group">


</div>
        <div class?="form group">
                <label for="id_producto">Id producto: </label>
                <input type="text" required
                        class="form-control" id="id_producto" name="id_producto"><br><br>
        </div>
        <div class?="form group">
                <label for="cantidad">cantidad: </label>
                <input type="number" required
                        class="form-control" id="cantidad" name="cantidad"><br><br>

        </div>
        <div class?="form group">
                <label for="precio">precio: </label>
                <input type="number" required
                        class="form-control" id="precio" name="precio"><br><br>
                        
        </div>
        <div class?="form group">
                <label for="id_trabajador"> id_trabajador: </label>
                <input type="text" required
                        class="form-control" id="id_trabajador" name="id_trabajador"><br><br>
                        
        </div>
        <button type="button" class="btn-success" onclick="registrarcompras();">registrar</button>
</form>
<script src="<?php echo BASE_URL;?>views/js/functions_compras.js"></script>
    <script>listar_productos();</script>
    <script>listar_trabajadores();</script>
    
<script>
        //http://localhost/Ventas_2024/editar-compra/1
        const id_compras=<?php $pagina=explode("/",$_GET['views']); echo $pagina['1'];?>;
        ver_compra(id_compras);
    </script>