FORMULARIO DE REGISTRO DE PRODUCTO
<for action="" class="form-control" id="" >
<div class?="form group">
        <label for="Codigo">Codigo: </label>
        <input type ="tex" required 
        class="form-control"id="codigo" name="codigo"><br><br>
        
</div>
<div class?="form group">
<label for="Nombre">Nombre: </label>
        <input type ="tex" required 
        class="form-control"id="Nombre" name="Nombre"><br><br>
</div>
<div class?="form group">
<label for="Detalle">Detalle: </label>
        <input type ="tex" required 
        class="form-control"id="Detalle" name="Detalle"><br><br>
</div>
<div class?="form group">
<label for="Precio">Precio: </label>
        <input type ="number" required 
        class="form-control"id="Precio" name="Precio"><br><br>
</div>
              
<div class?="form group">
<label for="Precio">Stock Inicial: </label>
        <input type ="number" required 
        class="form-control"id="Stock Inicial" name="Stock Inicial"><br><br>
</div>
<div class?="form group">
<label for="Categoria">Categoria: </label>
        <input type ="text" required 
        class="form-control"id="Categoria" name="Categoria"><br><br>
</div>
<div class?="form group">
        <label for="Fecha de Vencimiento">Fecha de Vencimiento</label>
        <input type ="date" require
        class="form-control"id="fecha de vencimiento"name="fecha de vencimiento"><br><br>
</div>
<div class?="form group">
        <label for="Imagen">Imagen</label>
        <input type ="tex" require
       class="form control"id="Imagen"name="Imagen"><br><br>
</div>
<div class?="form group">
        <label for="Proveedor">Proveedor</label>
        <input type ="tex" require 
        class="form control" id="Proveedor"name="Proveeedor"require><br><br>

</div class?="">
<form action class="form-control">
        <button type="button" onclick="registrar_producto()" class="btn-success">Registrar</button>
</form>
<script src="<?php echo BASE_URL;?>views/js/functions_product.js"></script>

               
        