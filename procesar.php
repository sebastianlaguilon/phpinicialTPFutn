<?php require_once 'views/heard.php'; ?>


<h1>Ingrese su datos y realice su compra</h1>

<form action="procesar.php" method="GET">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required><br>

    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" required><br>

    <h3>Agrege produtos al carrito</h3></br>

    <label for="producto1">
        <input type="checkbox" name="productos[]" value="Fernet"> Fernet $ 1000
    </label><br>

    <label for="producto2">
        <input type="checkbox" name="productos[]" value="Coca Cola"> Coca Cola $ 500
    </label><br>

    <label for="producto3">
        <input type="checkbox" name="productos[]" value="Pan Lactal"> Pan Lactal $450
    </label><br>

    <input type="submit" value="Enviar">



    <?php
    if (isset($_GET['nombre']) && isset($_GET['edad']) && isset($_GET['productos'])) {
        $nombre = $_GET['nombre'];
        $edad = $_GET['edad'];
        $productos = $_GET['productos'];

        // Asignar precios a cada producto
        $precios = array(
            'Fernet' => 1000,
            'Coca Cola' => 500,
            'Pan Lactal' => 450
        );

        // Calcular la suma total de los productos seleccionados
        $total = 0;
        $productosSeleccionados = '';

        foreach ($productos as $producto) {
            if (isset($precios[$producto])) {
                $total += $precios[$producto];
                $productosSeleccionados .= $producto . ', ';
            }
        }

        // Eliminar la última coma y espacio de la cadena de productos seleccionados
        $productosSeleccionados = rtrim($productosSeleccionados, ', ');

        if ($edad < 18 && in_array('Fernet', $productos)) {

            echo "<h2>Lo siento, eres menor de edad y no puedes comprar bebidas alcoholicas</h2>";
            echo "<h2>vuelve a iniciar la compra</h2>";
        } else {
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Edad</th><th>Productos Agregados</th><th>Total</th></tr>";
            echo "<tr><td>$nombre</td><td>$edad</td><td>$productosSeleccionados</td><td>$total</td></tr>";
            echo "</table>";
        }
    } else {
        echo "No se han recibido los datos correctamente.";
    }

    ?>

</form>

<?php require_once 'views/footer.php'; ?>