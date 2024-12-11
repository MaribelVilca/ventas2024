<form action="" class="form-control" id="formActualizarCategoria">
<input type="hidden" name="id_categoria" id="id_categoria" value="">
        <div class?="form group">
                <label for="nombre">Nombre: </label>
                <input type="text" required
                        class="form-control" id="nombre" name="nombre"><br><br>
        </div>
        <div class?="form group">
                <label for="detalle">Detalle: </label>
                <input type="text" required
                        class="form-control" id="detalle" name="detalle"><br><br>
        </div>
        <button type="button" class="btn-success" onclick="RegistrarCategoria()">Registrar</button>
</form>
<script src="<?php echo BASE_URL; ?>views/js/functions_categoria.js"></script>
<script>
        //http://localhost/Ventas_2024/editar-producto/1
        const id_co=<?php $pagina=explode("/",$_GET['views']); echo $pagina['1'];?>;
        ver_categoria(id_co);
    </script>