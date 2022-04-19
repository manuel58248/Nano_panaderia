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

async function guardarFormula() {
  let formula_nombre = document.getElementById("formula_nombre").value;
  let formula_descripcion = document.getElementById(
    "formula_descripcion"
  ).value;

  $.ajax({
    url: "http://localhost/PanaderiaNano/dashboard/bd/querys.php",
    type: "POST",
    datatype: "json",
    data: {
      opc: 5,
      nombre: formula_nombre,
      descripcion: formula_descripcion,
    },
    success: function (data) {
      guardarDetalleFormula();
    },
  });
}

async function guardarDetalleFormula() {
  $('#tabl tbody tr').each(function (x, fila) {

    const id = fila.children[0].innerHTML;
    const cantidades = fila.children[2].innerHTML;

    //Inserccion de los valores.
    $.ajax({
      url: "http://localhost/PanaderiaNano/dashboard/bd/querys.php",
      type: "POST",
      datatype: "json",
      data: {
        opc: 8,
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
