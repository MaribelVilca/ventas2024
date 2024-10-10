     
    <div class="w-100 row m-0">
        <div id="productos" class="w-75" style="min-height: 900px;">
            <div class="card w-100 row m-0 mb-1" style="height: 120px;">
                <img src="./views/plantilla/imagenes/perfume1.webp"
                    alt="" class="h-100 p-0 col-2">
                <div id="producto" class="p-0 col-4 h-100">
                    <p>Perfume MOn con Aroma De Frutas Silvetres de 60ML  </p>
                </div>
                <div id="precio" class="col-1 p-0 h-100"><input id="precio_p1" type="hidden" value="30"
                        readonly>S/.80.00</div>
                <div id="cantidad" class="col-3 p-4 h-100 row">
                    <button class="btn btn-danger col-2 h-50 m-1" onclick="restarcantidad();">-</button>
                    <input id="cantidad_p1" type="number" class="col-6 h-50 m-1" value="1">
                    <button class="btn btn-success col-2 h-50 m-1" onclick="sumarcantidad();">+</button>
                </div>
                <div id="subtotal" class="col-1 p-0 h-100">S/.160.00</div>
                <div class="col-1">
                    <button class="btn btn-danger">Eliminar</button>
                </div>
                
            </div>
            <div class="card w-100 row m-0 mb-1" style="height: 120px;">
                <img src="./views/plantilla/imagenes/joyas2.webp"
                    alt="" class="h-100 p-0 col-2">
                <div id="producto" class="p-0 col-4 h-100">
                    <p>Brazalete de oro Puro </p>
                </div>
                <div id="precio" class="col-1 p-0 h-100"><input id="precio_p1" type="hidden" value="30"
                        readonly>S/.100.00</div>
                <div id="cantidad" class="col-3 p-4 h-100 row">
                    <button class="btn btn-danger col-2 h-50 m-1" onclick="restarcantidad();">-</button>
                    <input id="cantidad_p1" type="number" class="col-6 h-50 m-1" value="1">
                    <button class="btn btn-success col-2 h-50 m-1" onclick="sumarcantidad();">+</button>
                </div>
                <div id="subtotal" class="col-1 p-0 h-100">S/.100.00</div>
                <div class="col-1">
                    <button class="btn btn-danger">Eliminar</button>
                </div>    
            </div>
            <div class="card w-100 row m-0 mb-1" style="height: 120px;">
                <img src="./views/plantilla/imagenes/cuidado5.webp"
                    alt="" class="h-100 p-0 col-2">
                <div id="producto" class="p-0 col-4 h-100">
                    <p>Concentré Suero Efecto Peeling 10% Ácido Glicólico 30 ml.</p>
                </div>
                <div id="precio" class="col-1 p-0 h-100"><input id="precio_p1" type="hidden" value="30"
                        readonly>S/.60.00</div>
                <div id="cantidad" class="col-3 p-4 h-100 row">
                    <button class="btn btn-danger col-2 h-50 m-1" onclick="restarcantidad();">-</button>
                    <input id="cantidad_p1" type="number" class="col-6 h-50 m-1" value="1">
                    <button class="btn btn-success col-2 h-50 m-1" onclick="sumarcantidad();">+</button>
                </div>
                <div id="subtotal" class="col-1 p-0 h-100">S/60.00</div>
                <div class="col-1">
                    <button class="btn btn-danger">Eliminar</button>
                </div>
                
            </div>
        </div>
        <div id="monto" class="w-25" style=" height: 200px;">
            <h4 class="text-center">INFORMACIÓN DE PAGO</h4>
            <div class="col-md-12">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>SUBTOTAL</span>
                        <strong>S/ 320.00</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Descuento (10%)</span>
                        <strong>S/ -10.00</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>TOTAL</span>
                        <strong>S/ 310.00</strong>
            
                            </li>
            <div id="medios_pago" class="col-12">
                <a href="https://www.yape.com.pe/" target="_blank"><img class="col-3 m-2" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Yape_text_app_icon.png/250px-Yape_text_app_icon.png" alt=""></a>
                <a href="https://www.viabcp.com/" target="_blank"><img class="col-3 m-2" src="https://www.visa.com.pe/dam/VCOM/regional/lac/SPA/Default/Partner%20With%20Us/Info%20for%20Partners/Info%20for%20Small%20Business/visa-pos-800x400.jpg" alt=""></a>
                <a href="https://www.pagoefectivo.la/pe/" target="_blank"><img class="col-3 m-2" src="https://paginasweb.pe/wp-content/uploads/2016/05/pagoefectivo.png" alt=""></a>
            </div>
            <div class="text-center d-grid gap-2 col-6 mx-auto">
                <a href="" class="btn btn-success">Pagar</a>
                <a href="<?php echo BASE_URL?>producto" class="btn btn-primary">Seguir Comprando</a>
            </div>
        </div>
        </div>
        <footer class="bg-dark text-white w-100 d-flex flex-column justify-content-center">
            <div class="container">
              <div class="row">
                <div class="col-12 text-center">
                  <h2>Bienvenidos a mi sitio web</h2>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-6">
                  <h5>Siguenos en:</h5>
                  <ul class="list-unstyled">
                    <li><a href="https://web.facebook.com/" class="text-white">Facebook</a></li>
                    <li><a href="#" class="text-white">Twitter</a></li>
                    <li><a href="#" class="text-white">Instagram</a></li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h5>Libro de reclamaciones</h5>
                  <p>Si tienes alguna sugerencia o queja, no dudes en contactarnos.</p>
                  <a href="#" class="btn btn-primary">Ir al libro de reclamaciones</a>
                </div>
              </div>
              <div class="text-center mt-4">
                <p> welovemary25089364535@gmail.com</p>
              </div>
            </div>
          </footer>
    </div>
</body>
<script>
    function sumarcantidad() {
        var precio = document.getElementById('precio_p1').value;
        var cantidad = document.getElementById('cantidad_p1').value;
        var nueva_cantidad = parseInt(cantidad) + 1;
        document.getElementById('cantidad_p1').value = nueva_cantidad;
        calcular_subtotal(precio, nueva_cantidad);
    }
    function restarcantidad() {
        var precio = document.getElementById('precio_p1').value;
        var cantidad = document.getElementById('cantidad_p1').value;
        if (cantidad > 1) {
            var nueva_cantidad = parseInt(cantidad) - 1;
            document.getElementById('cantidad_p1').value = nueva_cantidad;
            calcular_subtotal(precio, nueva_cantidad);
        }

    }
    function calcular_subtotal(precio, cantidad) {
        var subtotal = precio * cantidad;
        document.getElementById('subtotal').innerHTML = 'S/. ' + subtotal;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>