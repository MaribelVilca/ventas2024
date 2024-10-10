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
                <img src="./views/plantilla/imagenes/perfume2.png" class="product-img" alt="Producto principal">
               
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-details">
                <h1 class="product-title">Perfume NOCTURNE Antiedad de 45ML</h1>
                <div class="product-rating">
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9733;</span>
                    <span>&#9734;</span> (15)
                </div>
                <p class="mt-2">¿Qué es?

                    Perfume de mujer dulce de concentración muy alta, con Base de Laire, legado de alta perfumería francesa, para las mujeres poderosamente atrevidas</p>
                <p class="product-old-price">S/ 80.00</p>
                <p class="product-price">S/ 60.00 <span class="text-success">(Ahorra S/ 15.80)</span></p>
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" id="quantity" class="form-control w-25" value="1">
                </div>
                <a href="carrito1.html" class="btn btn-primary">AGREGAR A LA BOLSA</a>
               
            </div>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>