<?php
require_once('../model/personasModel.php');

$tipo = $_REQUEST['tipo'];
$objPersona = new personasModel();

if ($tipo == "listar") {
    $arr_Respuestas = array('status' => false, 'contenido' => '');
    $arr_proveedor = $objPersona->obtener_proveedores();

    if (!empty($arr_proveedor)) {
        // recorremos el array para agregar las opciones de la categorias
        for ($i = 0; $i < count($arr_proveedor); $i++) {

            $id_producto = $arr_proveedor[$i]->id;
            $proveedor = $arr_proveedor[$i]->razon_social;
            $opciones = '<a href="'.BASE_URL.'editar-categoria/'.$id_categoria.'" >Editar<a/>
            <button onclick ="eliminar_categoria('.$id_categoria.');">Eliminar</button>';
            $arr_proveedor[$i]->options = $opciones;
        }
        $arr_Respuestas['status'] = true;
        $arr_Respuestas['contenido'] = $arr_proveedor;
    }

    echo json_encode($arr_Respuestas);
}
if ($tipo == "listar_usuarios") {
    $arr_Respuestas = array('status' => false, 'contenido' => '');

    $arr_usuarios = $objPersona->obtener_usuario();

    if (!empty($arr_usuarios)) {
      
        for ($i = 0; $i < count($arr_usuarios); $i++) {
            $id_usuario = $arr_usuarios[$i]->id; 
            $opciones = '<a href="'.BASE_URL.'editar-categoria/'.$id_usuario.'" class="btn btn-warning" >Editar<a/>
            <button onclick ="eliminar_categoria('.$id_usuario.');" class="btn btn-danger">Eliminar</button>';
            $arr_usuarios[$i]->options = $opciones; 
        }
        $arr_Respuestas['status'] = true;
        $arr_Respuestas['contenido'] = $arr_usuarios;
    }

    echo json_encode($arr_Respuestas);
}

if ($tipo == "registrar") {
    if ($_POST) {
        $nro_identidad = $_POST['nro_identidad'];
        $razon_social = $_POST['razon_social'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $departamento = $_POST['departamento'];
        $provincia = $_POST['provincia'];
        $distrito = $_POST['distrito'];
        $cod_postal = $_POST['cod_postal'];
        $direccion = $_POST['direccion'];
        $rol = $_POST['rol'];
        $password = $_POST['password'];
        

        if (
            $nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" ||
            $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" ||
            $direccion == "" || $rol == "" || $password == "" 
        ) {
           
            $arr_Respuestas = array('status' => false, 'mensaje' => 'Error, campos vacíos');
        } else {

            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            // Llamada al método para registrar persona
            $arrPersona = $objPersona->registrarPersonas(
                $nro_identidad,
                $razon_social,
                $telefono,
                $correo,
                $departamento,
                $provincia,
                $distrito,
                $cod_postal,
                $direccion,
                $rol,
                $password_hash,
               
            );

            if ($arrPersona->id > 0) {
                $arr_Respuestas = array('status' => true, 'mensaje' => 'Registro Exitoso');
            } else {
                $arr_Respuestas = array('status' => false, 'mensaje' => 'Error al Registrar Persona');
            }

            echo json_encode($arr_Respuestas);
        }
    }
}
