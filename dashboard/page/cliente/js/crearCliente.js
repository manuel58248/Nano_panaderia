$("#crearCliente").submit(function (e) {
  e.preventDefault();
  let clt_cedula_ruc = $.trim($("#clt_cedula_ruc").val());
  let clt_usuario_id = $.trim($("#clt_usuario_id").val());
  let clt_persona_id = $.trim($("#clt_persona_id").val());

  if (
    clt_cedula_ruc.length == "" ||
    clt_usuario_id.length == "" ||
    clt_persona_id.length == ""
  ) {
    Swal.fire({
      title: "ERROR",
      text: "Complete todos los parametross",
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
        opc: 10,
        clt_cedula_ruc: clt_cedula_ruc,
        clt_usuario_id: clt_usuario_id,
        clt_persona_id: clt_persona_id,
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
            text: "Cliente insertado correctamente",
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
