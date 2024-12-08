<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
.btn {
    transition: background-color 0.3s, transform 0.2s;
    border-radius: 5px;
}

.btn:hover {
    transform: translateY(-2px);
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: white;
}

.btn i {
    margin-right: 5px;
}
.btn-container {
    display: flex;
    justify-content: center; 
    align-items: center; 
    height: 100%; 
}
.btn-warning {
    border-radius: 50px; 
    padding: 12px 30px; 
    font-size: 1.1rem; 
    font-weight: 600; 
    color: white; 
    background: linear-gradient(45deg, #ff8c00, #f7b731); 
    border: none; 
    cursor: pointer; 
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); 
    transition: all 0.4s ease; 
}




  </style>

</head>

<body>
  
<div class="col_12">
    <table border="1" style="width: 100%;"cellspacing>
        <thead>
          <tr>
            <th>Nro</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Categoria</th>
            <th>Proveedor</th>
            <th>Acciones</th>

          </tr>  

        </thead>
        <tbody id="tbl_productos">
     
     </tbody>

    </table>
</div>
<div class="btn_container">
<button type="button" class="btn btn-warning" onclick="window.history.back();">
        <i class="fas fa-arrow-left"></i> Regresar
    </button>
</div>
  
</body>
</html>

<script src="<?php echo BASE_URL; ?>views/js/functions_product.js"></script>