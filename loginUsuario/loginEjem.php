<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../css/login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
</head>

<body>
  <div class="container">
    <h1>Iniciar sesion</h1>
    <form method="post" action="../loginUsuario/servidor/login/logear.php" autocomplete="off">
      <div class="input-box">
        <label for="correo">Correo institucional:</label>
        <input type="text" id="correo" name="correo" />
        <p></p>
      </div>
      <div class="input-box">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" />
        <i class="fas fa-eye-slash show"></i>
        <p></p>
      </div>
      <span style="color: red;" id="login-error"></span>
      <input type="submit" value="Entrar" />
    </form>
    <p>Registrarse como usuario<a href="registroUs.php">Registrarse</a></p>
    <p>Registrarse como administrador<a href="registroAd.php">Registrarse</a></p>
    <script src="../js/login.js"></script>
</body>

</html>