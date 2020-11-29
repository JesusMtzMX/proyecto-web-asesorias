<!DOCTYPE html>
<html lang="en">

<head>
    <title>Asesorías en línea</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Estilos Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Red+Hat+Text:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilos-compra.css">

</head>

<body>

    <!-- Ir Arriba -->
    <div class="go-top">
        <span class="fas fa-angle-up"></span>
    </div>

    <!-- Menu de Navegacion -->
    <header id="header">

    <?php
        session_start();

        if (session_id() === 'Asesor')
        {
        require_once "menu_asesor.php";
        }
        else if (session_id() === 'Asesorado')
        {
        require_once "menu_asesorado.php";
        }
        else
        {
        require_once "menu_inicial.php";
        }
    ?>


        <!-- Imagen Header -->
        <div class="img-header">
            <div class="header-compra">
                <h1>Curso seleccionado:</h1>
                <span>Nombre curso</span>
                <hr>
                <p>A continuación se muestra información sobre el método de pago</p>

            </div>
        </div>

        <div class="skew-abajo"></div>

    </header>

    <main>

        <div class="seleccionar-metodo">
            <div class="tarjeta-credito">
                <h3>Utilizando su tarjeta de crédito</h3>
                <form action="index.html" method="get">
                    <input type="text" name="nombre" id="" placeholder="Nombre del titular">
                    <input type="text" name="noCuenta" id="" placeholder="Número de cuenta">
                    <input type="text" name="noCuenta" id="" placeholder="Fecha de vencimiento">
                    <input type="text" name="noCuenta" id="" placeholder="Número del titular">
                </form>
            </div>
            <div class="tarjeta-debito">
                <h3>Utilizando su tarjeta de débito</h3>
                <form action="index.html" method="get">
                    <input type="text" name="nombre" id="" placeholder="Nombre del titular">
                    <input type="text" name="noCuenta" id="" placeholder="Número de cuenta">
                    <input type="text" name="noCuenta" id="" placeholder="Fecha de vencimiento">
                    <input type="text" name="noCuenta" id="" placeholder="Número del titular">
                </form>
            </div>
            <div class="paypal">
                <h3>A través de Paypal</h3>
                <p>Puede realizar su pago desde el siguiente link: <a href="www.paypal.com">Paypal de asesor</a> </p>
            </div>
        </div>



        <div id="lista-cursos" class="informacion">

            <table class="info-compra">

            </table>

            <h4>Cursos X</h4>
            <h3>Descripción del curso</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum vitae itaque impedit aspernatur enim
                voluptas
                dignissimos, velit modi officia consequuntur odio maxime eligendi assumenda accusamus eveniet ad? Optio,
                rerum
                labore.
            </p>

        </div>


    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="skew-arriba"></div>
        <div class="deg-footer"></div>
        <div class="ejeZfooter">
            <div class="footer-content">
                <div class="footer-text">
                    <p>&copy; Agencia de asesorías web - 2020</p>
                </div>

            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/35db202371.js"></script>
    <script src="js/app.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>