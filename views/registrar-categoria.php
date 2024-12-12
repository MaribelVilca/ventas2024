<form action="" class="form-control" id="frmRegistrar">
        <div class?="form group">
</div>
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
        
        <button type="button" class="btn btn-secondary" onclick="RegistrarCategoria();">
        <i class="fas fa-arrow-left"></i> Registrar </button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">
        <i class="fas fa-arrow-left"></i> Regresar </button>
</form>
<script src="<?php echo BASE_URL; ?>views/js/functions_categoria.js"></script>
