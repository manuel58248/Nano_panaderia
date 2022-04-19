$("#crearP").submit(function (e) {
  e.preventDefault();
  let venta_cliente_id = $.trim($("#venta_metodo_pago_id  ").val());
  let venta_metodo_pago_id = $.trim($("#venta_metodo_pago_id  ").val());
  let venta_num_factura = $.trim($("#venta_num_factura ").val());
  let venta_descripcion = $.trim($("#venta_descripcion").val());
  let venta_descuento = $.trim($("#venta_descuento").val());

  if (
    venta_cliente_id.length == "" ||
    venta_metodo_pago_id.length == "" ||
    venta_num_factura.length == "" ||
    venta_descripcion.length == "" ||
    venta_descuento.length == "" ||
    venta_impuesto.length == "" ||
    venta_subtotal.length == "" ||
    venta_total.length == "" ||
    venta_fecha_registro.length == ""
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
      url: "http://localhost/administracion/prueba/nano/dashboard/bd/querys.php",
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
