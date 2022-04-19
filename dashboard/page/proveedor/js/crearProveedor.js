$("#crearP").submit(function (e) {
  e.preventDefault();
  var proveed_nombre = $.trim($("#proveed_nombre").val());
  var proveed_telefono = $.trim($("#proveed_telefono").val());
  var proveed_correo = $.trim($("#proveed_correo").val());

  if (
    proveed_nombre.length == "" ||
    proveed_telefono.length == "" ||
    proveed_correo.length == ""
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
        opc: 1,
        nombre: proveed_nombre,
        telefono: proveed_telefono,
        correo: proveed_correo,
      },
      success: function (data) {
        if (data == "null") {
          Swal.fire({
            title: "ERROR",
            text: "Proveedor no insertado",
            icon: "warning",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
          });
        } else {
          Swal.fire({
            title: "Buen trabajo",
            text: "Proveedor insertado correctamente",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Continuar",
            type: "success",
          }).then((result) => {
            if (result.value) {
              window.location.href = "./insertarProveedor.php";
            }
          });
        }
      },
    });
  }
});
