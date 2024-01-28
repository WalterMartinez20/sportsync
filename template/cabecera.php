<?php
session_start();
?>
<?php include("loginUsuario/clases/Auth.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fondo.css">
  <link rel="stylesheet" href="css/Perfilsalon.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css">
  <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.theme.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.js"></script>

</head>

<body class="fondo">

  <!-------add nav------ bereeee----->
  <section class="bg-white">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand p-0" href="#">
            <!---logooooo---->
            <!-- <img alt="logo" src="img/Logo.png" style="height: 60px;"> -->
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
              <?php
              if (!isset($_SESSION['id']) || (isset($_SESSION['id']) && $_SESSION['id'] == 0)) {
              ?>
                <li class="nav-item" style="font-weight: 600; margin: 6px; ">
                  <a class="nav-link active" aria-current="page" href="index.php" style="font-size: 20px;">Inicio</a>
                </li>
              <?php
              }
              ?>

              <!-- Modal -->
              <!--<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><em class="fa fa-bookmark"></em> Mis Marcadores</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <?php
                        if (isset($_SESSION['carrito'])) {
                          foreach ($productos as $producto) {
                        ?>
                            <div class="card mb-3" style="max-width: 500px;">
                              <div class="row g-0">
                                <div class="col-md-4">
                                  <img style="padding: 25px;" src="img/productos/<?php echo $producto['imagen']; ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-5">
                                  <div class="card-body">
                                    <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                  </div>
                                  <a href="detalle.php?id=<?php echo $producto['id']; ?>" class="btn btn-primary" style="float: left; margin-right: 4px;">comprar</a>
                                  <!-- <a type="#" class="btn btn-secondary">quitar</a> -->
              <form method="GET" action="loginUsuario/servidor/registro/eliminarCarrito.php">
                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                <button type="submit" class="btn btn-secondary">quitar</button>
              </form>
          </div>
        </div>
    </div>
<?php
                          }
                        }
?>
</div>
<div class="modal-footer">
</div>

<!--INCIO DE VENTANA USUARIO-->
<li class="nav-item" style="font-weight: 600; margin: 6px; ">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="Modalusuario" tabindex="-1" aria-labelledby="ModalLabelusuario" aria-hidden="true">
    <div class="modal-dialog">
      <div style="background-color: rgba(0, 0, 0, 0.6); color: #ffffff; margin-left: 400px;" class="modal-content">
        <div class="modal-header" style="justify-content: flex-start;">
          <a class="navbar-brand p-0" href="#">
            <img src="img/logos/<?php //echo $_SESSION['logo'] 
                                ?>" style="height: 70px; border: 2px solid #fff; border-radius: 50%;">
          </a>
          <a style="text-decoration: none; color: white; float: rith; display: block; padding-top: 9px;" href="<?php
                                                                                                                if (isset($_SESSION['id']) && $_SESSION['id'] !== 0) {
                                                                                                                  if (!strpos($_SERVER['REQUEST_URI'], 'Perfil_Salon.php?id=' . $_SESSION['id'])) {
                                                                                                                ?>Perfil_Salon.php?id=<?php echo $_SESSION['id'];
                                                                                                                                    } else {
                                                                                                                                      ?>#<?php
                                                                                                                                        }
                                                                                                                                      } else {
                                                                                                                                          ?> # <?php
                                                                                                                                              } ?>">
            <h5><?php //echo $_SESSION['nombre'] 
                ?></h5>
            <p><?php echo $_SESSION['email'] ?></p>
          </a>
        </div>
        <?php
        if (isset($_SESSION['id']) && $_SESSION['id'] == 0) {
        ?>
          <div class="modal-body">
            <!-- Button Mis Citas reservadas -->
            <button style="color: #fff; background: transparent; border:none;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <h5 style="font-weight: 300;"><i class="fa fa-scissors"></i> Mis Citas Reservadas</h5>
            </button>
          </div>
        <?php
        }
        ?>
        <div class="modal-footer">
          <!-- Button Cerrar sesion -->
          <button style="color: #fff; background: transparent; border:none; margin-right: 320px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <h5 style="font-weight: 300;"><i class="fa-solid fa-arrow-right-from-bracket"></i> <a style="text-decoration: none; color: white;" href="loginUsuario/servidor/login/logout.php">Cerrar sesion</a></h5>
          </button>
        </div>
      </div>
    </div>
  </div>
</li>
<!--FIN DE VENTANA USUARIO-->
</ul>
</div>
<a class="navbar-brand p-0" href="<?php if (!isset($_SESSION['id'])) { ?> loginUsuario/doblelogin.php <?php } else { ?> # <?php }  ?>" <?php if (isset($_SESSION['id'])) { ?> data-bs-toggle="modal" data-bs-target="#Modalusuario" <?php } ?>>
  <!---logooooo---->
  <?php
  if (isset($_SESSION['logo'])) {
    echo '<img src="img/logos/' . $_SESSION['logo'] . '" alt="Logo" style="width: 70px !important; height: 70px; border: 2px solid #000; border-radius: 50%;">';
  } else {
    echo '<img src="images/personal.png" style="width: 70px !important; height: 70px; border: 2px solid #000; border-radius: 50%;">';
  }
  ?>
</a>

</div>
</nav>
</div>
  </section>
  <!-------add nav------ bereeee----->

  <div class="container">
    <br />
    <div class="row">