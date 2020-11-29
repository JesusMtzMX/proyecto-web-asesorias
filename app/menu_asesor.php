<nav class="menu">
  <div class="logo-box">
    <h1><a href="#">Asesorías</a></h1>
    <span class="btn-menu"><i class="fas fa-bars"></i></span>
  </div>

  <div class="list-container">

    <ul class="lists">

      <li><a href="#" class="active">Inicio</a></li>

      <li><a href="#lista-cursos">Cursos</a></li>      

      <li class="nav-item dropdown">

        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Asesores</a>

        <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
          <a href="lista-asesores.php">Ver asesores</a>
          <a href="agendar-asesoria.php">Agendar</a>
          <a href="donar-asesor.php">Donar</a>
          <a href="Reportar Asesor.html">Reportar</a>
        </div>

      </li>

      <li><a href="chat-asesor.php">Chat</a></li>
      <li><a href="#acerca-de">Acerca de</a></li>

      <li class="nav-item dropdown">

        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><?= $_SESSION['username']?>
        </a>
        
        <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">

          <form class="form-inline my-2 my-lg-0" action="../datos/Logout.php" method="POST">
            <button class="btn btn-outline-info mx-2 my-2 my-sm-0" type="submit">Cerrar sesión</button>
          </form>

        </div>

      </li>

    </ul> <!-- lists-->

  </div> <!-- container-->

</nav>