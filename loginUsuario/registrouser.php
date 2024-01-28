<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/registro.css">
    <title>Registro de usuario</title>
  </head>
  <body>
    <style>
      .campo {
        position: relative;
        width: 305px;
        margin-bottom: 25px;
      }
      div#mover2 {
        display: flex;
        align-items: center;
      }
      .cambio {
        flex: 1;
        text-align: left;
      }
      .error {
        color: #26bfbf;
        float: right;
        text-align: left;
      }
      div#div_file {
        position: relative;
        margin: 2px;
        padding: 2px;
        width: 70px;
        background-color: #2499e3;
        border-radius: 10px;
        align-items: center;
        margin-left: auto;
        right: 60px
      }
      #text {
        text-align: center;
        color: white;
        font-weight: 200;
        margin-top: 10px;
      }
      
      input#btn_agregar {
        position: absolute;
        top: 1px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
      }
      .ojos {
        left: 90%;
        position: absolute;
        top: 35%;
        right: 7px;
        width:7px;
        font-size: 20px;
        color: skyblue;
      }
      #ocultar {
        display: none;
      }

      #mostrar {
        cursor: pointer;
      }
      
    </style>
    <div class="container">
     
      <div class="row">
        <div class="col-lg-10 col-xl-6 mx-auto">
          <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div style=" margin: 0; padding: 0; position: absolute; transform: translate(40%, 120%);">
             <a href="doblelogin.php" style="text-decoration: none;
              padding: 10px; color: black; background-color: #CACCD9; border-radius: 10px;"><em class="fa-solid fa-arrow-left"></em></a>
            </div>

            <div class="card-body p-4 p-sm-5">
              <h5 class="card-title text-center mb-5 fw-light fs-5">CREAR CUENTA</h5>
              <form action="#" method="post" id="registro-form">

              <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="usario" name="usuario"
                  placeholder="myuser" required autofocus>
                  <label for="user">Usuario</label>
                  <div class="error-message" style="color: red; display: none;">Este campo es obligatorio</div>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="telefono" name="telefono"
                  placeholder="mycel" required autofocus>
                  <label for="tel">Numero de telefono</label>
                  <div class="error-tel" style="color: red; display: none;">Ingrese un número valido. Ejemplo: 2222-2222</div>
                </div>

                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="email" name="email"
                  placeholder="myusername" required autofocus>
                  <label for="email">Correo</label>
                  <div class="error-message" style="color: red; display: none;">Correo incorrecto</div>
                </div>

                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="contra" name="password" 
                  placeholder="Password" required>
                  <label for="password">Contraseña</label>
                  <span class="ojos" onclick="mostrarContraseña()">
                    <em id="mostrar" class="fa fa-eye" title="mostrarcontraseña"></em>
                    <em id="ocultar" class="fa fa-eye-slash" title="ocultarcontraseña"></em>
                  </span>
                  <div class="error-contra" style="color: red; display: none;">La contraseña debe tener al menos 8 caracteres</div>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="confpassword" name="confpassword" 
                  placeholder="contraseña" required>
                  <label for="confpassword">Confirmar Contraseña</label>
                  <div class="error-coincidir" style="color: red; display: none;">La contraseña no coincide</div>
                </div>
                <div class="form-floating mb-3" id="mover2">
                  <div class="cambio">Imagen o foto de perfil <strong class="error" id="btn_agregar-error"></strong></div>
                  <div id="div_file" method="post">
                    <p id="text">Agregar</p>
                    <input type="file" id="btn_agregar" name="logo" accept="image/*" required>
                  </div>
                  <div id="previewimgs" class="styleimage">
                    <button id="borrarImagen" style="display: none;">Borrar Imagen</button>
                </div>
                  <div class="error-message" style="color: red; display: none;">Este campo es obligatorio</div>
                </div>
                <div class="d-grid mb-2">
                  <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">REGISTRARSE</button>
                </div>

                <hr class="my-4">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      function mostrarContraseña() {
        var a = document.getElementById("confpassword");
        var x = document.getElementById("contra");
        var y = document.getElementById("ocultar");
        var z = document.getElementById("mostrar");

        if (x.type == 'password') {
            a.type = "text";
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";

        } else {
            a.type = "password";
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";

        }

      }
// Botón para borrar la imagen
let borrarImagenBtn = document.getElementById('borrarImagen');
      document.querySelector('input[name="logo"]').addEventListener('change', function(e) {
          let file = e.target.files[0];

          if (file) {
              let reader = new FileReader();
              reader.readAsDataURL(file);

              reader.onload = function() {
                  let imagePreview = document.createElement('img');
                  imagePreview.src = reader.result;
                  imagePreview.style.width = '200px'; // Estilo para la vista previa
                  imagePreview.style.height = '200px'; // Estilo para la vista previa

                  let previewDiv = document.getElementById('previewimgs');
                  previewDiv.innerHTML = ''; // Limpia el contenido previo
                  previewDiv.appendChild(imagePreview);
                  borrarImagenBtn.style.display = 'block';
              }
          }
      });

      let telefonoInput = document.querySelector('input[name="telefono"]');
        telefonoInput.addEventListener('input', function () {
            let telefono = telefonoInput.value;
            let regex = /^\d{4}[\s-]?\d{4}$/; // Expresión regular para 4 números, espacio o guión, y 4 números

            if (!regex.test(telefono)) {
                // Si no coincide con el formato deseado, muestra un mensaje de error
                document.querySelector('.error-tel').style.display = 'block';
            } else {
                document.querySelector('.error-tel').style.display = 'none';
            }
        });

        
        borrarImagenBtn.addEventListener('click', function () {
            let previewDiv = document.getElementById('previewimgs');
            previewDiv.innerHTML = '';
            borrarImagenBtn.style.display = 'none';
            document.querySelector('input[name="logo"]').value = ''; // Limpiar el valor del input file
        });


      let form = document.querySelector('#registro-form');

      form.addEventListener("submit", function(e) {
        e.preventDefault();

        let usuario = document.querySelector('input[name="usuario"]').value;
        let telefono = document.querySelector('input[name="telefono"]').value;
        let email = document.querySelector('input[name="email"]').value;
        let password = document.querySelector('input[name="password"]').value;
        let confirmPassword = document.querySelector('input[name="confpassword"]').value;

        if (!usuario || !telefono || !email || !password || !confirmPassword) {
            document.querySelectorAll('.error-message').forEach(function (error) {
                error.style.display = 'block';
            });
            return;
        } else {
          document.querySelectorAll('.error-message').forEach(function (error) {
                error.style.display = 'none';
            });
        }

        if (password.length < 8) {
            document.querySelector('.error-contra').style.display = 'block';
            return;
        } else {
          document.querySelector('.error-contra').style.display = 'none';
        }

        if (password !== confirmPassword) {
            document.querySelector('.error-coincidir').style.display = 'block';
            return;
        } else {
          document.querySelector('.error-coincidir').style.display = 'none';
        }

        let loginForm = new FormData();
        loginForm.append('nombre', document.querySelector('input[name="usuario"]').value);
        loginForm.append('telefono', document.querySelector('input[name="telefono"]').value);
        loginForm.append('email', document.querySelector('input[name="email"]').value);
        loginForm.append('password', document.querySelector('input[name="password"]').value);
        loginForm.append('rePassword', document.querySelector('input[name="confpassword"]').value);

        let fileInput = document.querySelector('input[name="logo"]');
        let file = fileInput.files[0];

        if (file) {
          let reader = new FileReader();
          reader.readAsDataURL(file);

          reader.onload = function() {
            loginForm.append('logo', reader.result);
            fetch("servidor/registro/usuarioRegistro.php", {
              method: 'POST',
              body: loginForm,
            })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                Swal.fire({
                  title: '<h2 style="color: #2873ba;">¡ EN HORA BUENA!</h2>',
                  html: 'El usuario: <br>' +
                            '<b style="color: #0E2C48; font-size: 40px;";>' + 
                            document.querySelector('input[name="usuario"]').value +'</b><br> Ha sido creado con éxito.',
                  icon: 'success',
                  showCancelButton: false,
                  confirmButtonText: 'ACEPTAR',
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  stopKeydownPropagation: false,
                }).then((result) => {
                  let userLoginForm = new FormData();
                  userLoginForm.append('email', document.querySelector('input[name="email"]').value);
                  userLoginForm.append('password', document.querySelector('input[name="password"]').value);
                  if (data.success) {
                    fetch("servidor/login/usuario.php", {
                      method: 'POST',
                      body: userLoginForm,
                    })
                    .then(response => response.json())
                    .then(data => {
                      if (data.success) {
                        window.location.href = '../index.php';
                      } else {
                        console.log('No se pudo ingresar');
                      }
                    })
                    .catch(error => {
                      console.error(error);
                    });
                  }
                });
              } else {
                console.log('No se pudo ingresar');
                  // loginError.innerHTML = 'El correo o contraseña es incorrecta, Por favor vuelve a intentarlo';
              }
            })
          }
        } else {
          alert('No image')
        }

      });
    </script>
  </body>
</html>