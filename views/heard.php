<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/styles.css">
    <title>Trabajo practico final</title>
    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var inicioLink = document.querySelector("#menu ul li:first-child");
            inicioLink.addEventListener("click", function(event) {
                event.preventDefault();
                var submenu = inicioLink.querySelector("ul.submenu");
                submenu.style.display = (submenu.style.display === "none") ? "block" : "none";
            });
        });
    </script>
</head>

<body>
    <div id="container">
        <!-- CABECERA-->
        <header id="header">
            <div id="logo">
                <img src="imagenes/logo.png" /><a href="index.php">Trabajo Practico Final</a>
            </div>
        </header>


        <nav id="menu">
            <ul>
                <li>
                <li>
                    <a href="http://localhost:9090/practica/phpInicialptf/index.php">INICIO</a>
                </li>
                </li>


                <li><a href="#">UNIDAD 1</a>
                    <ul class="submenu">
                        <li>
                            <a href="http://localhost:9090/practica/phpInicialptf/procesar.php"> Método GET</a>
                        </li>
                        <li>
                            <a href="http://localhost:9090/practica/phpInicialptf/cargarUsuario.php">Cargar Usuario</a>
                        </li>
                    </ul>

                </li>

            </ul>
        </nav>