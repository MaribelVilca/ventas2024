<form action="" class="form-control" id="frmRegistrar">
        <div class?="form group">
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
        <button type="button" class="btn-success" onclick="registrar_categoria()">Registrar</button>
</form>
<script src="<?php echo BASE_URL; ?>views/js/functions_categoria.js"></script>
<script >listar_categorias();</script>