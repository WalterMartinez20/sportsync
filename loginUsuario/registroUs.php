<!DOCTYPE html>
<html lang="en">
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro estudiante</title>
  <link rel="stylesheet" type="text/css" href="../css/registro.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
</head>

<body>
  <div class="container">
    <h1>Registro de estudiante</h1>
    <form method="post" action="../loginUsuario/servidor/registro/registrarUsuario.php" autocomplete="off">
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
      <div class="input-box">
        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" id="confirm_password" name="confirm_password" />
        <p></p>
      </div>
      <span style="color: red;" id="login-error"></span>
      <input id="btn_reg" type="submit" value="Registrarse" />
    </form>
    <p>¿Ya tienes una cuenta? <a href="doblelogin.php">Iniciar sesion</a></p>
  </div>
  <script src="../js/registroUs.js"></script>
</body>

</html>