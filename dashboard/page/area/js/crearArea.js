$("#crearArea").submit(function (e) {
  e.preventDefault();
  var area_nombre = $.trim($("#area_nombre").val());
  var area_descripcion = $.trim($("#area_descripcion").val());

  if (area_nombre.length == "" || area_descripcion.length == "") {
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
        opc: 3,
        area_nombre: area_nombre,
        area_descripcion: area_descripcion,
      },
      success: function (data) {
        if (data == "null") {
          Swal.fire({
            title: "ERROR",
            text: "Area no insertado",
            icon: "warning",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
          });
        } else {
          Swal.fire({
            title: "Buen trabajo",
            text: "Area insertado correctamente",
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
