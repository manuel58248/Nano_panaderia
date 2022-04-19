<?php

// include_once("../conexion2.php");
// $objeto = new Conexion();
// $conexion = $objeto->Conectar();

// session_start();
// $id = $_SESSION['session'];

// $consulta = "SELECT cu.usr_nombre, cr.rol_nombre, cr.rol_estado, cp.perfil_nombre, cp2.perm_nombre FROM cat_usuario cu INNER JOIN tbl_usuario_rol tur ON tur.ur_codigo = cu.usr_codigo INNER join cat_rol cr ON cr.rol_codigo = tur.ur_rol_id INNER JOIN tbl_rol_perfil trp ON trp.rp_rol_id = cr.rol_codigo INNER JOIN cat_perfil cp ON cp.perfil_codigo = trp.rp_perfil_id INNER JOIN tbl_perfil_permiso tpp ON tpp.rp_perfil_id = cp.perfil_codigo INNER JOIN cat_permiso cp2 ON cp2.perm_codigo = tpp.rp_permiso_id WHERE cu.usr_codigo = '$id' AND cr.rol_estado = 1";

// $resultado = $conexion->prepare($consulta);
// $resultado->execute();
// $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

// print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
// $conexion = NULL;
