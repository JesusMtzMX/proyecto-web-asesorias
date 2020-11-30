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
    <link rel="stylesheet" href="sweetalert/SweetAlert2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilos-asesores.css">

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

    <?php

        require_once "../datos/Asesoria_Dao.php";
        $dao=new Asesoria_Dao();



    ?>

        <div class="skew-abajo">
        </div>

    </header>

    <div class="lista-asesores">
        <div class="agenda-titulo-asesores">
            <h1 class="text-center">ASESORES</h1>
            <br>
        </div>
        <br>
        <table class="table tabla-agenda-asesores">
            <thead>
                <th> Foto perfil </th>
                <th> Nombre </th>
                <th> Temas ofrecidos</th>
                <th> Agendar</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="img/asesor-1.png" alt="Alkapone">
                    </td>
                    <td>
                        José Alejandro Leyva Uribe.
                    </td>
                    <td>
                        <li>Orientación vocacional.</li>
                        <li>Oratoria.</li>
                        <li>Superación personal.</li>
                    </td>
                    <td>
                        <button class="btn btn-info btn-agendar" type="button" data-toggle="modal" data-target="#exampleModal">AGENDAR</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="img/asesor-2.png" alt="Musk">
                    </td>
                    <td> Elon Musk
                    <td>
                        <li>Matemáticas.</li>
                        <li>Microcontroladores.</li>
                    </td>
                    <td>
                        <button class="btn btn-info btn-agendar" type="button" data-toggle="modal" data-target="#exampleModal">AGENDAR</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="img/asesor-3.png" alt="Mark">
                    </td>
                    <td>
                        Mark Zuckerberg
                    </td>
                    <td>
                        <li>Programación web.</li>
                        <li>Redes.</li>
                    </td>
                    <td>
                        <button class="btn btn-info btn-agendar" type="button" data-toggle="modal" data-target="#exampleModal">AGENDAR</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </main>

    <?php include 'modal-agendar.php'?>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="sweetalert/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="js/seleccionar-asesor.js"></script>
</body>

</html>