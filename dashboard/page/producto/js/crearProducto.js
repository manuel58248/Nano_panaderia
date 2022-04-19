$("#crearProducto").submit(function (e) {
  e.preventDefault();
  let producto_codigo_unico = $.trim($("#producto_codigo_unico").val());
  let producto_nombre = $.trim($("#producto_nombre").val());
  let producto_precio_compra = $.trim($("#producto_precio_compra").val());
  let producto_um_id = $.trim($("#producto_um_id").val());
  let producto_presentacion_id = $.trim($("#producto_presentacion_id").val());
  let producto_comentario = $.trim($("#producto_comentario").val());
  let producto_vencimiento = $.trim($("#producto_vencimiento").val());
  let producto_stock = $.trim($("#producto_stock").val());

  console.log(producto_codigo_unico + "/" + producto_nombre + "/" + producto_precio_compra + "/" + producto_um_id + "/" + producto_presentacion_id + "/" +producto_comentario + "/" + producto_vencimiento + "/" + producto_stock);


  if (
    producto_codigo_unico.length == "" ||
    producto_nombre.length == "" ||
    producto_precio_compra.length == "" ||
    producto_um_id.length == "" ||
    producto_presentacion_id.length == "" ||
    producto_comentario.length == "" ||
    producto_vencimiento.length == "" ||
    producto_stock.length == ""
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
        opc: 7,
        producto_codigo_unico: producto_codigo_unico,
        producto_nombre: producto_nombre,
        producto_precio_compra: producto_precio_compra,
        producto_um_id: producto_um_id,
        producto_presentacion_id: producto_presentacion_id,
        producto_comentario: producto_comentario,
        producto_vencimiento: producto_vencimiento,
        producto_stock: producto_stock,
      },
      success: function (data) {
        if (data == "null") {
          Swal.fire({
            title: "ERROR",
            text: "El prodcuto no fue insertado",
            icon: "warning",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
          });
        } else {
          Swal.fire({
            title: "Buen trabajo",
            text: "Producto insertado correctamente",
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
