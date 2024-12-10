<form action="" class="form-control" id="formRegistrarper">
        
        <div class?="form group">
                <label for="nro_identidad">N° de identidad: </label>
                <input type="text" required
                        class="form-control" id="nro_identidad" name="nro_identidad"><br><br>
        </div>
        <div class?="form group">
                <label for="razon_social">razon social: </label>
                <input type="text" required
                        class="form-control" id="razon_social" name="razon_social"><br><br>
        </div>
        <div class?="form group">
                <label for="telefono">telefono: </label>
                <input type="number" required
                        class="form-control" id="telefono" name="telefono"><br><br>
        </div>

        <div class?="form group">
                <label for="correo">correo: </label>
                <input type="text" required
                        class="form-control" id="correo" name="correo"><br><br>
        </div>
        <div class?="form group">
                <label for="departamento">departamento: </label>
                <input type="text" required
                        class="form-control" id="departamento" name="departamento"><br><br>
        </div>
        <div class?="form group">
                <label for="provincia">provincia</label>
                <input type="text" require
                        class="form-control" id="provincia" name="provincia"><br><br>
        </div>
        <div class?="form group">
                <label for="distrito">distrito: </label>
                <input type="text" required
                        class="form-control" id="distrito" name="distrito"><br><br>
        </div>
        
        <div class?="form group">
                <label for="cod_postal">codigo postal: </label>
                <input type="text" required
                        class="form-control" id="cod_postal" name="cod_postal"><br><br>
        </div>
        
        <div class?="form group">
                <label for="direccion">direccion: </label>
                <input type="text" required
                        class="form-control" id="direccion" name="direccion"><br><br>
        </div>
        <div class?="form group">
                <label for="rol">rol: </label>
                <select name="rol" id="rol"class="form control"required>
                <option>Seleccione</option>
                <option value="Cliente">Cliente</option>
                <option value="trabajdor">administrador</option>
                <option value="administrador">trabajador</option>

         </select>
        </div>
        
        <div class?="form group">
                <label for="estado">estado: </label>
                <input type="text" required
                        class="form-control" id="estado" name="estado"><br><br>
        </div>
        <div class?="form group">
                <label for="fecha_reg">fecha de registro: </label>
                <input type="date" required
                        class="form-control" id="fecha_reg" name="fecha_reg"><br><br>
        </div>

        <button type="button" class="btn btn-success" onclick="Registrar();">Registrar</button>
</form>


<script src="<?php echo BASE_URL;?>views/js/functions_persona.js"></script>
<script>
        //http://localhost/Ventas_2024/editar-persona/1
        const id_pe=<?php $pagina=explode("/",$_GET['views']); echo $pagina['1'];?>;
        ver_persona(id_pe);
 </script>