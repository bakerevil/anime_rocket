btnLogin.addEventListener('click', event => {
  event.preventDefault()
  if (inputcorreo.value == "" || inputpasswords.value == "") {
    alert("Completa todos los campos")
    return false
  }
  const form = new FormData(frmLogin)
  form.append("funcion", "login")
  fetch("modules/usuarios/consulta.php", {
    method: "POST",
    body: form
  })
    .then(response => response.json())
    .then(json => {
      if (!json) {
        alert("No se pudo iniciar sesión")
        return false
      }
      sessionStorage.setItem("user", JSON.stringify(json))
      location.href = "modules/usuarios"
    })

})