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

        <!-- Imagen Header -->
        <div class="img-header">
            <div class="welcome">
                <h1>Conoce a nuestros asesores</h1>
                <hr>
                <p>En la siguiente tabla encontrarás información acerca de los asesores que estarán dispuestos a
                    ayudarte</p>

            </div>
        </div>

        <div class="skew-abajo">

        </div>

    </header>

    <div class="lista-asesores">
        <div class="titulo-asesores">
            <h1>ASESORES</h1>
            <br>
            <form action="buscar-asignatura.php" method="get" class=form_search>
            <input type="text" placeholder="Buscar usuario" name="palabra" id="btn-seach">
            <input type="submit" value="Buscar" class="buscar">
            </form>
        
        </div>
            <br>
        <table class="tabla-asesores">
            <thead>
                <th> Foto perfil </th>
                <th> Nombre </th>

                <th> Información académica </th>
                <th> Temas ofrecidos</th>
                <th> Cursos ofrecidos</th>
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
                        Lic. en Psicología. <br> Es un profesionista dispuesto a ayudar en diversos temas.
                    </td>
                    <td>
                        <ul>
                            <li>Orientación vocacional.</li>
                            <li>Oratoria.</li>                            
                            <li>Superación personal.</li>
                        </ul>                        
                    </td>
                    <td>
                        Uso de software para transmisión en vivo.
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <img src="img/asesor-2.png" alt="Musk">
                    </td>
                    <td> 
                        Gustavo Ivan Vega
                    </td>
                    <td> Lic. en Informatica <br> Profecional, con diplomado en informatica.
                    </td>
                    <td> 
                        <ul>
                            <li>Arquitectura de computadoras</li>
                            <li>Programación en redes</li>
                            <li>Inteligencia Artificial</li>
                        </ul>
                    </td>
                    <td> Uso de software para transmision en vivo.
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="img/asesor-4.jpg" alt="Mark">
                    </td>
                    <td>
                        Alma Rosa Duran Castañeda
                    </td>
                    <td> Lic. en Derecho <br> Licenciada en derecho. Dispuesta ayudar
                    </td>
                    <td> 
                        <ul>
                            <li>Filosofia en Derecho</li>
                            <li>Derecho Constitucional Mexicano</li>
                            <li>Teoría del Delito</li>
                        </ul>
                    </td>
                    <td> Uso de software para transmision en vivo.
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="img/asesor-3.png" alt="Mark">
                    </td>
                    <td>
                        Pablo Rosiles Malagon
                    </td>
                    <td> Lic. en Arquitectura <br> Profecional, comprometido y dispuesto a mejorar tus habilidades.
                    </td>
                    <td> 
                        <ul>
                            <li>Dibujo Arquitectónico</li>
                            <li>Geometría Descriptiva</li>
                            <li>Sistemas Constructivos</li>
                        </ul>
                    </td>
                    <td> Uso de software para transmision en vivo.
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="img/asesor-5.jpg" alt="Mark">
                    </td>
                    <td>
                        Lucia Lopez Salas
                    </td>
                    <td> Lic. en Medicina <br> 
                    </td>
                    <td> 
                        <ul>
                            <li>Bioestadistica</li>
                            <li>Fisica Medica</li>
                            <li>Historia de la medicina</li>
                        </ul>
                    </td>
                    <td> Uso de software para transmision en vivo.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="agendar">
        <div class="titulo-agendar">
            <h2 class="text-center">¿Te interesa agendar alguna asesoría en línea?</h2>
            <h3 class="text-center">Ponte en contacto con el asesor de tu preferencia que cumpla con el perfil de acuerdo a tu necesidad.</h3>
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-info btn-agendar"> <a href="agendar-asesoria.php"> AGENDAR ASESORÍA </a>  </button>
        </div>
    </div>
    <div class="donar">
        <h2 class="text-center">¿Te gustaría hacer una donación?</h2>
        <br>
        <div class="text-center">
            <button class="btn btn-info btn-agendar"> <a href="donar-asesor.php"> DONAR </a>  </button>
        </div>
    </div>

    </main>

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