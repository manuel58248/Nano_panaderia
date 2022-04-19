async function agregarProducto() {
  let id = document.getElementById("pro").value;
  let cant = document.getElementById("cant").value;

  $.ajax({
    url: "http://localhost/PanaderiaNano/dashboard/bd/consultas.php",
    type: "POST",
    datatype: "json",
    data: {
      opc: 1,
      productoId: id,
    },
    success: function (data) {
      $.each(JSON.parse(data), function (Nivel, name) {
        fila =
          "<tr>" +
          "<td class='txt'>" +
          name.producto_codigo +
          "</td>" +
          "<td class='txt'>" +
          name.producto_nombre +
          "</td>" +
          "<td class='txt'>" +
          cant +
          "</td>" +
          "</tr>";

        var btn = document.createElement("TR");
        btn.innerHTML = fila;
        document.getElementById("tablita").appendChild(btn);
      });
    },
  });
}

async function guardarVenta() {
  let venta_metodo_pago_id = document.getElementById(
    "venta_metodo_pago_id"
  ).value;
  let venta_num_factura = document.getElementById("venta_num_factura").value;
  let venta_descripcion = document.getElementById("venta_descripcion").value;
  let venta_descuento = document.getElementById("venta_descuento").value;
  let venta_impuesto = document.getElementById("venta_impuesto").value;
  let venta_subtotal = document.getElementById("venta_subtotal").value;
  let venta_total = document.getElementById("venta_total").value;
  let venta_fecha_registro = document.getElementById(
    "venta_fecha_registro"
  ).value;

  $.ajax({
    url: "http://localhost/PanaderiaNano/dashboard/bd/querys.php",
    type: "POST",
    datatype: "json",
    data: {
      opc: 9,
      venta_metodo_pago_id: venta_metodo_pago_id,
      venta_num_factura: venta_num_factura,
      venta_descripcion: venta_descripcion,
      venta_descuento: venta_descuento,
      venta_impuesto: venta_impuesto,
      venta_subtotal: venta_subtotal,
      venta_total: venta_total,
      venta_fecha_registro: venta_fecha_registro,
    },
    success: function (data) {
      guardarDetalleFormula();
    },
  });
}

async function guardarDetalleFormula() {
  $("#tabl tbody tr").each(function (x, fila) {
    const id = fila.children[0].innerHTML;
    const cantidades = fila.children[2].innerHTML;

    //Inserccion de los valores.
    $.ajax({
      url: "http://localhost/PanaderiaNano/dashboard/bd/querys.php",
      type: "POST",
      datatype: "json",
      data: {
        opc: 9,
        productoId: id,
        productoCantidades: cantidades,
      },
      success: function (data) {
        Swal.fire({
          title: "Buen trabajo",
          text: "Formula insertada correctamente",
          confirmButtonColor: "#3085d6",
          confirmButtonText: "Continuar",
          type: "success",
        }).then((result) => {
          if (result.value) {
            window.location.href = "./inicio.php";
          }
        });
      },
    });
  });
}
$("#clt_usuario_id").on("change", function () {
  alert(this.value);
});
