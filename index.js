$("#formLogin").submit(function (e) {
    e.preventDefault();
    var usuario = $.trim($("#user").val());
    var password = $.trim($("#pass").val());
  
    if (usuario.length == "" || password == "") {
      Swal.fire({
        title: "ERROR",
        text: "Debe ingresar un usuario y/o password",
        icon: "warning",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
      });
      return false;
    } else {
      $.ajax({
        url: "bd/login.php",
        type: "POST",
        datatype: "json",
        data: { usuario: usuario, password: password },
        success: function (data) {
          if (data == "null") {
            Swal.fire({
              title: "ERROR",
              text: "Usuario y/o password incorrecta",
              icon: "warning",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
            });
          } else {
            Swal.fire({
              title: "¡Conexión exitosa!",
              confirmButtonColor: "#3085d6",
              confirmButtonText: "Ingresar",
              type: "success",
            }).then((result) => {
              if (result.value) {
                if (JSON.parse(data)[0].usr_estado == 1) {
                  window.location.href = "dashboard/index.php";
                }
              }
            });
          }
        },
      });
    }
  });
  