
function inicioSesionAlert(usuario){

    Swal.fire({
        title: `Sesion iniciada, bienvenido ${usuario}`,
        icon: "success",
        draggable: true
      });
}
function inicioFailAlert(usuario){

    Swal.fire({
        title: `Las credenciales no son correctas`,
        icon: "error",
        draggable: true
      });
}


