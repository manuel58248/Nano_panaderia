<div class="row">

  <div class="col col-6">

    <form action="" method="post">

      <div class="mb-2">
        <label for="area_codigo" class="form-label">ID</label>
        <input type="text" class="form-control" value="<?php echo $Area->area_codigo; ?>" name=" area_codigo" id="area_codigo" aria-describedby="helpId" placeholder="Nombre  ">

      </div>
      <div class="mb-2">
        <label for="area_nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" value="<?php echo $Area->area_nombre; ?>" name=" area_nombre" id="area_nombre" aria-describedby="helpId" placeholder="Nombre  ">

      </div>

      <div class="mb-2">
        <label for="area_descripcion" class="form-label">Descripcion:</label>
        <input type="text" class="form-control" value="<?php echo $Area->area_descripcion; ?>" name="area_descripcion" id="area_descripcion" aria-describedby="helpId" placeholder="Descripcion  ">

      </div>

      <input name="" id="" class="btn btn-success" type="Submit" value="Editar area">
      <a href="?controlador=area&accion=editar&area_codigo" class="btn btn-info">Cancelar</a>

    </form>
  </div>
</div>