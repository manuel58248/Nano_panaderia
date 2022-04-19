$("#crearCompra").submit(function (e) {
  e.preventDefault();
  let compra_mp_id = $.trim(
    $("select#compra_mp_id option").filter(":selected").val()
  );
  let compra_proveedor_id = $.trim($("#compra_proveedor_id").val());
  let compra_descripcion = $.trim($("#compra_descripcion").val());
  let compra_usr_id = $.trim($("#compra_usr_id").val());
  let compra_subtotal = $.trim($("#compra_subtotal").val());
  let compra_descuento = $.trim($("#compra_descuento").val());
  let compra_total = $.trim($("#compra_total").val());
  let compra_fecha_registro = $.trim($("#compra_fecha_registro").val());
  let compra_fecha_entrega = $.trim($("#compra_fecha_entrega").val());
  console.log(compra_mp_id);

  if (
    compra_proveedor_id.length == 0 ||
    compra_mp_id.length == 0 ||
    compra_descripcion.length == 0 ||
    compra_usr_id.length == 0 ||
    compra_subtotal.length == 0 ||
    compra_descuento.length == 0 ||
    compra_total.length == 0 ||
    compra_fecha_registro.length == 0 ||
    compra_fecha_entrega.length == 0
  ) {
    Swal.fire({
      title: "ERROR",
      text: "Complete todos los parametrosss",
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
        opc: 12,
        compra_mp_id: compra_mp_id,
        compra_proveedor_id: compra_proveedor_id,
        compra_descripcion: compra_descripcion,
        compra_usr_id: compra_usr_id,
        compra_subtotal: compra_subtotal,
        compra_descuento: compra_descuento,
        compra_total: compra_total,
        compra_fecha_registro: compra_fecha_registro,
        compra_fecha_entrega: compra_fecha_entrega,
      },
      success: function (data) {
        if (data == "null") {
          Swal.fire({
            title: "ERROR",
            text: "Compra no insertado",
            icon: "warning",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
          });
        } else {
          Swal.fire({
            title: "Buen trabajo",
            text: "Compra insertado correctamente",
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
