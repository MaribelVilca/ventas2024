<form action="" class="form-control" id="formActualizarCategoria">
<input type="hidden" name="id_categoria" id="id_categoria" value="">
        <div class?="form group">
                <label for="nombre">nombre: </label>
                <input type="text" required
                        class="form-control" id="nombre" name="nombre"><br><br>
        </div>
        <div class?="form group">
                <label for="detalle">Detalle: </label>
                <input type="text" required
                        class="form-control" id="detalle" name="detalle"><br><br>
        </div>
        <button type="button" class="btn btn-secondary" onclick="ActulizarCategoria();">
        <i class="fas fa-arrow-left"></i> Actualizar </button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">
        <i class="fas fa-arrow-left"></i> Atras </button>
</form>
<script src="<?php echo BASE_URL; ?>views/js/functions_categoria.js"></script>
<script>
        //http://localhost/Ventas_2024/editar-categoria/1
        const id_p=<?php $pagina=explode("/",$_GET['views']); echo $pagina['1'];?>;
        ver_categoria(id_p);
    </script>