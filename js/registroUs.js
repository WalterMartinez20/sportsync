window.addEventListener("load", () => {
  const form = document.querySelector("form");
  const email = document.getElementById("correo");
  const pass = document.getElementById("password");
  const passConfirma = document.getElementById("confirm_password");
  const loginError = document.getElementById("login-error");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    validaCampos();
  });

  const validaCampos = () => {
    const emailValor = email.value.trim();
    const passValor = pass.value.trim();
    const passConfirmaValor = passConfirma.value.trim();
    let validacionesPasadas = true;

    // Validación del campo de correo
    if (!emailValor) {
      validaFalla(email, "Campo vacío");
      validacionesPasadas = false;
    } else if (!validaEmail(emailValor)) {
      validaFalla(email, "El e-mail no es válido");
      validacionesPasadas = false;
    } else {
      validaOk(email);
    }

    // Validación del campo de contraseña
    const er = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,18}$/;
    if (!passValor) {
      validaFalla(pass, "Campo vacío");
      validacionesPasadas = false;
    } else if (passValor.length < 8) {
      validaFalla(pass, "Debe tener 8 caracteres como mínimo.");
      validacionesPasadas = false;
    } else if (!passValor.match(er)) {
      validaFalla(
        pass,
        "Debe tener al menos una mayúscula, una minúscula y un número."
      );
      validacionesPasadas = false;
    } else {
      validaOk(pass);
    }

    // Validación del campo de confirmación de contraseña
    if (!passConfirmaValor) {
      validaFalla(passConfirma, "Confirme su contraseña");
      validacionesPasadas = false;
    } else if (passValor !== passConfirmaValor) {
      validaFalla(passConfirma, "La contraseña no coincide");
      validacionesPasadas = false;
    } else {
      validaOk(passConfirma);
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
    loginForm.append("confirm_password", passConfirma.value.trim());

    fetch("../loginUsuario/servidor/registro/registrarUsuario.php", {
      method: "POST",
      body: loginForm,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          window.location.href = "doblelogin.php"; // Redirige solo si las credenciales son correctas
        } else {
          loginError.innerHTML = "Datos de registro incorrectos.";
        }
      })
      .catch((error) => {
        console.error("Se produjo un error al registrar:", error);
        loginError.innerHTML =
          "Se produjo un error al registrar. Por favor, inténtalo de nuevo más tarde.";
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

//Mostrar/ocultar contra de registro
const createPw = document.querySelector("#password"),
  confirmPw = document.querySelector("#confirm_password"),
  pwShow = document.querySelector(".show");

pwShow.addEventListener("click", () => {
  if (createPw.type === "password" && confirmPw.type === "password") {
    createPw.type = "text";
    confirmPw.type = "text";
    pwShow.classList.replace("fa-eye-slash", "fa-eye");
  } else {
    createPw.type = "password";
    confirmPw.type = "password";
    pwShow.classList.replace("fa-eye", "fa-eye-slash");
  }
});

/*script viejo de coincidir contras
//coinciden contras
const password = document.getElementById("password");
const confirm_password = document.getElementById("confirm_password");

function validatePassword() {
  if (password.value !== confirm_password.value) {
    confirm_password.setCustomValidity("Las contraseñas no coinciden");
  } else {
    confirm_password.setCustomValidity("");
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
*/
