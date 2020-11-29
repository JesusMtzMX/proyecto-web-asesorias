<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Editar perfil</title>
  <link rel="stylesheet" href="css/StyleModificarDatos.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body background="img/perfil.jpg">

  <div class="container" id="body">

    <div class="header">
      <h2>Editar perfil</h2>
    </div>

    <form id="form" class="form">

      <div class="form-control">
        <label for="username">Nuevo usuario</label>
        <input type="text" placeholder="Esmeralduchi22" id="username" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error</small>
      </div>

      <div class="form-control">
        <label for="username">Nuevo email</label>
        <input type="email" placeholder="esmelopez536@gmail.com" id="email" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error</small>
      </div>

      <div class="form-control">
        <label for="username">Nueva Contraseña</label>
        <input type="password" placeholder="Contraseña" id="password" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error</small>
      </div>

      <div class="form-control">
        <label for="username">Confirmar contraseña</label>
        <input type="password" placeholder="Confirmar contraseña" id="password2" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error</small>
      </div><input type="submit" value="INICIAR SESION "><a>--></a><a href="index.php "> Volver</a>

    </form>

    <script src="scriptsRegistro.js"></script>
</body>

</html>