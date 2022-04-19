$("#crearPersona").submit(function (e) {
  e.preventDefault();
  let persona_fecha_nacimiento = $.trim($("#persona_fecha_nacimiento").val());
  let persona_nombre = $.trim($("#persona_nombre").val());
  let persona_genero = $.trim($("#persona_genero").val());
  let persona_movil = $.trim($("#persona_movil").val());
  let persona_convencional = $.trim($("#persona_convencional").val());
  let persona_direccion = $.trim($("#persona_direccion").val());

  if(
    persona_fecha_nacimiento.length == "" ||
    persona_nombre.length == "" ||
    persona_genero.length == "" ||
    persona_movil.length == "" ||
    persona_convencional.length == "" ||
    persona_direccion.length == ""
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
        opc: 4,
        persona_fecha_nacimiento: persona_fecha_nacimiento,
        persona_nombre: persona_nombre,
        persona_genero: persona_genero,
        persona_movil: persona_movil,
        persona_convencional: persona_convencional,
        persona_direccion: persona_direccion,
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
