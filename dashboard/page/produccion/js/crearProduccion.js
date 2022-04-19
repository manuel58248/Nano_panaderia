$("#crearProduccion").submit(function (e) {
  e.preventDefault();
  let produccion_descripcion = $.trim($("#produccion_descripcion").val());
  let fechaVencimiento = $.trim($("#fechaVencimiento").val());

  if (produccion_descripcion.length == "" || fechaVencimiento.length == "") {
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
        opc: 6,
        produccion_descripcion: produccion_descripcion,
        produccion_fecha_inicio: fechaVencimiento,
      },
      success: function (data) {
        if (data == "null") {
          Swal.fire({
            title: "ERROR",
            text: "La produccion no fue insertado",
            icon: "warning",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
          });
        } else {
          guadarDetalles();

          Swal.fire({
            title: "Buen trabajo",
            text: "Produccion  insertado correctamente",
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

function guadarDetalles() {
  let dt_produccion_codigo_unico = $.trim(
    $("#dt_produccion_codigo_unico").val()
  );
  let dt_produccion_nombre = "hola";
  let dt_produccion_precio_venta = $.trim(
    $("#dt_produccion_precio_venta").val()
  );
  let dt_produccion_comentario = $.trim($("#dt_produccion_comentario").val());
  let dt_produccion_vecimiento = $.trim($("#dt_produccion_vecimiento").val());
  let dt_produccion_formula_id = $.trim($("#dt_produccion_formula_id").val());
  let dt_produccion_cantidad = $.trim($("#dt_produccion_cantidad").val());
  let dt_produccion_hora_estimada = $.trim(
    $("#dt_produccion_hora_estimada").val()
  );

  if (
    dt_produccion_codigo_unico.length == "" ||
    dt_produccion_nombre.length == "" ||
    dt_produccion_precio_venta.length == "" ||
    dt_produccion_comentario.length == "" ||
    dt_produccion_vecimiento.length == "" ||
    dt_produccion_formula_id.length == "" ||
    dt_produccion_cantidad.length == "" ||
    dt_produccion_hora_estimada.length == ""
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
        opc: 10,
        dt_produccion_codigo_unico: dt_produccion_codigo_unico,
        dt_produccion_nombre: dt_produccion_nombre,
        dt_produccion_precio_venta: dt_produccion_precio_venta,
        dt_produccion_comentario: dt_produccion_comentario,
        dt_produccion_vecimiento: dt_produccion_vecimiento,
        dt_produccion_formula_id: dt_produccion_formula_id,
        dt_produccion_cantidad: dt_produccion_cantidad,
        dt_produccion_hora_estimada: dt_produccion_hora_estimada,
      },
      success: function (data) {
        if (data == "null") {
          Swal.fire({
            title: "ERROR",
            text: "La produccion no fue insertado",
            icon: "warning",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
          });
        } else {
          guadarDetalles();

          Swal.fire({
            title: "Buen trabajo",
            text: "Produccion  insertado correctamente",
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
}
