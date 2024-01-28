window.addEventListener("load", () => {
  const form = document.querySelector("form");
  const email = document.getElementById("correo");
  const pass = document.getElementById("password");
  const loginError = document.getElementById("login-error");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    validaCampos();
  });

  const validaCampos = () => {
    const emailValor = email.value.trim();
    const passValor = pass.value.trim();
    let validacionesPasadas = true;

    // Validación del campo de correo
    if (!emailValor) {
      validaFalla(email, "");
      //validacionesPasadas = false;
    } else if (!validaEmail(emailValor)) {
      validaOk(email);
      //validaFalla(email, "El e-mail no es válido");
      //validacionesPasadas = false;
    } else {
      validaOk(email);
    }

    // Validación del campo de contraseña
    const er = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,18}$/;
    if (!passValor) {
      validaFalla(pass, "");
      //validacionesPasadas = false;
    } else if (passValor.length < 8) {
      validaOk(pass);
      //validaFalla(pass, "Debe tener 8 caracteres como mínimo.");
      //validacionesPasadas = false;
    } else if (!passValor.match(er)) {
      validaOk(pass);
      //validaFalla(pass, "Debe tener al menos una mayúscula, una minúscula y un número.");
      //validacionesPasadas = false;
    } else {
      //12345678Aa
      validaOk(pass);
    }

    // Envía el formulario solo si todas las validaciones han pasado
    if (validacionesPasadas) {
      enviarFormulario();
    }
  };

  const enviarFormulario = () => {
    let loginForm = new FormData();
    loginForm.append("correo", email.value.trim());
    loginForm.append("password", pass.value.trim());

    fetch("../loginUsuario/servidor/login/logear.php", {
      method: "POST",
      body: loginForm,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          window.location.href = "inicio.php"; // Redirige solo si las credenciales son correctas
        } else {
          loginError.innerHTML = "correo o contraseña incorrectos.";
          //validaCampos(); Activar en caso que se inicie sesion sin dar clic, solo con corregir los datos.
        }
      })
      .catch((error) => {
        console.error("Se produjo un error al procesar la solicitud:", error);
        loginError.innerHTML =
          "Se produjo un error al procesar la solicitud. Por favor, inténtalo de nuevo más tarde.";
      });
  };

  const validaFalla = (input, msje) => {
    const formControl = input.parentElement;
    const aviso = formControl.querySelector("p");
    aviso.innerText = msje;
    formControl.className = "input-box falla";
  };

  const validaOk = (input, msje) => {
    const formControl = input.parentElement;
    formControl.className = "input-box ok";
  };

  const validaEmail = (email) => {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
      email
    );
  };
});

//Mostrar/ocultar contra de login
const createPw = document.querySelector("#password"),
  pwShow = document.querySelector(".show");

pwShow.addEventListener("click", () => {
  if (createPw.type === "password") {
    createPw.type = "text";
    pwShow.classList.replace("fa-eye-slash", "fa-eye");
  } else {
    createPw.type = "password";
    pwShow.classList.replace("fa-eye", "fa-eye-slash");
  }
});
