$("#crearUsuario").submit(function (e) {
  e.preventDefault();
  var email = $.trim($("#email").val());
  var nombre = $.trim($("#nombre").val());
  var clave = $.trim($("#clave").val());

  if (
    email.length == "" ||
    nombre.length == "" ||
    clave.length == ""
  ) {
    Swal.fire({
      title: "ERROR",
      text: "Complete todos los parametros",
      icon: "warning",
      showCancelButton: false,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
    });
    return false;
  } else {
    $.ajax({
      url: "http://localhost/PanaderiaNano/dashboard/bd/querys.php",
      type: "POST",
      datatype: "json",
      data: {
        opc: 2,
        correo: email,
        name: nombre,
        password: clave,
      },
      success: function (data) {
        if (data == "null") {
          Swal.fire({
            title: "ERROR",
            text: "Usuario no insertado",
            icon: "warning",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
          });
        } else {
          Swal.fire({
            title: "Buen trabajo",
            text: "Usuario insertado correctamente",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Continuar",
            type: "success",
          }).then((result) => {
            if (result.value) {
              window.location.href = "./inicio.php";
            }
          });
        }
      },
    });
  }
});
