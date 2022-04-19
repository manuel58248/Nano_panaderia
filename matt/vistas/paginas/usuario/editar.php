<div class="card">
  <div class="card-header">

  </div>
  <div class="card-body">

    <form action="" method="post">



      <h1 class="display-6 mb-4"> Actualizacion de usuario</h1>

      <div class="mb-3">
        <label for="usr_email" class="form-label">Email:</label>
        <input required type="text" class="form-control" value="<?php echo $usuario->usr_email; ?>" name=" usr_email" name="usr_email" id="usr_email" aria-describedby="helpId" placeholder="Email  ">

      </div>

      <div class="mb-3">
        <label for="usr_nombre" class="form-label">Nombre:</label>
        <input required type="text" class="form-control" value="<?php echo $usuario->usr_nombre; ?>" name="usr_nombre" id="usr_nombre" aria-describedby="helpId" placeholder="Nombre  ">

      </div>


      <div class="mb-3">
        <label for="usr_estado" class="form-label">Estado:</label>
        <input required type="text" class="form-control" value="<?php echo $usuario->usr_estado; ?>" name="usr_estado" id="usr_estado" aria-describedby="helpId" placeholder="Contrasena  ">

      </div>



      <input name="" id="" class="btn btn-success" type="Submit" value="Actualizacion Usuario">
      <a href="?controlador=usuario&accion=inicio" class="btn btn-info">Cancelar</a>
    </form>


  </div>

</div>