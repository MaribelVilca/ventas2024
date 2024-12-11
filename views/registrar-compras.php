<form action="" class="form-control" id="frmRegistrarCom">
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
        <button type="button" class="btn btn-secondary" onclick="Registrarcompras();">
        <i class="fas fa-arrow-left"></i> Registrar </button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">
        <i class="fas fa-arrow-left"></i> Regresar </button>
</form>
<script src="<?php echo BASE_URL;?>views/js/functions_compras.js"></script>