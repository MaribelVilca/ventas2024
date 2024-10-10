<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-container {
            margin: 50px auto;
        }
        .product-img {
            max-width: 100%;
        }
        .product-details {
            padding: 20px;
        }
        .product-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .product-price {
            color: red;
            font-size: 1.2rem;
        }
        .product-old-price {
            text-decoration: line-through;
            color: grey;
        }
        .product-rating {
            color: orange;
        }
        .btn-add-to-cart {
            background-color: #6c757d;
            color: white;
        }
    </style>
</head>
<body>

<div class="container product-container">
    <div class="row">
        <div class="col-md-6">
            <div class="product-images">
                <img src="./views/plantilla/imagenes/perfumes.webp" class="product-img" alt="Producto principal">
               
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-details">
                <h1 class="product-title">Set de Perfumes VIBRANZA Addition de 50ML</h1>
                <div class="product-rating">
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9734;</span> (15)
                </div>
                <p class="mt-2">¿Por qué elegirlo?

                    Set de perfumes de mujer de larga duración: perfume oriental Vibranza y perfume floral para mujer Vibranza Addiction.</p>
                <p class="product-old-price">S/ 50.00</p>
                <p class="product-price">S/ 100.00 <span class="text-success">(Ahorra S/ 150.00)</span></p>
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" id="quantity" class="form-control w-25" value="1">
                </div>
                <a href="<?php echo BASE_URL?>carrito1" class="btn btn-primary">AGREGAR A LA BOLSA</a>
                
            </div>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>