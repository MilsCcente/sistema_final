<?php
require_once('../model/productoModel.php');
require_once('../model/categoriaModel.php');
require_once('../model/personasModel.php');

$tipo = $_REQUEST['tipo'];

//instancio la clase modeloproducto
$objProducto = new ProductoModel();
$objCategoria = new CategoriaModel();
$objPersona = new personasModel();

if ($tipo == "listar") {
    $arr_Respuesta = array('status' => false, 'contenido' => '');
    $arr_productos = $objProducto->obtener_producto();

    if (!empty($arr_productos)) {
        //recorremos el array para agregar las opciones de las categorias
        for ($i = 0; $i < count($arr_productos); $i++) {

            $id_categoria = $arr_productos[$i]->id_categoria;
            $r_categoria = $objCategoria->obtener_categoria($id_categoria);
            $arr_productos[$i]->categoria = $r_categoria;

            $id_proveedor = $arr_productos[$i]->id_proveedor;
            $r_proveedor = $objPersona->obtener_proveedor($id_proveedor);
            $arr_productos[$i]->proveedor = $r_proveedor;
            //$id_producto = $arr_productos[$i]->nombre;
            //localhost/editar-producto/4
            //localhost/eliminar-producto/4

            $id_producto = $arr_productos[$i]->id;

            //eliminar producto(1)
            $opciones = '<a href="' . BASE_URL . 'editar-producto/' . $id_producto . '" class="btn btn-warning">Editar<a/>
            <button onclick ="eliminarProducto(' . $id_producto . ');" class="btn btn-danger">Eliminar</button>';

            $arr_productos[$i]->options =  $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_productos;
    }
    echo json_encode($arr_Respuesta);
}

if ($tipo == "registrar") {
    //print_r($_POST);
    //echo $_FILES['imagen']['name'];
    if ($_POST) {
        $codigo  = $_POST['codigo'];
        $nombre  = $_POST['nombre'];
        $detalle  = $_POST['detalle'];
        $precio  = $_POST['precio'];
        $stock  = $_POST['stock'];
        $categoria  = $_POST['categoria'];
        $fecha_v = $_POST['fecha_v'];
        $imagen  = 'imagen';
        $proveedor = $_POST['proveedor'];

        if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $fecha_v == "" || $categoria == "" || $imagen == "" || $proveedor == "") {
            //respuesta
            $arr_Respuestas = array('status' => false, 'mensaje' => 'error,campos vacios');
        } else {

            //cargar archivos
            $archivo = $_FILES['imagen']['tmp_name'];
            $destino = '../assets/img_productos/';
            $tipoArchivo = strtolower(pathinfo(
                $_FILES["imagen"]['name'],
                PATHINFO_EXTENSION
            ));

            $arrProducto = $objProducto->registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $categoria, $fecha_v, $imagen, $proveedor, $tipoArchivo);

            if ($arrProducto->id_n > 0) {
                $newid = $arrProducto->id_n;
                $arr_Respuestas = array('status' => true, 'mensaje' => 'Registro Exitoso');


                $nombre = $arrProducto->id_n . "." . $tipoArchivo;

                if (move_uploaded_file($archivo, $destino . '' . $nombre)) {
                } else {
                    $arr_Respuestas = array('status' => true, 'mensaje' => 'Registro Exitoso, error al subir imagen');
                }
            } else {
                $arr_Respuestas = array('status' => false, 'mensaje' => 'Error al Registrar Producto');
            }
            echo json_encode($arr_Respuestas);
        }
    }
}


if ($tipo == "ver") {
    //print_r($_POST);
    $id_producto = $_POST['id_producto'];
    $arr_Respuesta = $objProducto->VerProducto($id_producto);
    //print_r($arr_Respuesta);
    if (empty($arr_Respuesta)) {
        $response = array('status' => false, 'mensaje' => 'Error, no hay informacion');
    } else {
        $response = array('status' => true, 'mensaje' => "datos encontrados", 'contenido' => $arr_Respuesta);
    }
    echo json_encode($response);
}


if ($tipo == "actualizar") {
    //print_r($_POST);
    //print_r($_FILES['imagen']['tmp_name']);
    $id_producto = $_POST['id_producto'];
    $img = $_POST['img'];
    $nombre  = $_POST['nombre'];
    $detalle  = $_POST['detalle'];
    $precio  = $_POST['precio'];
    $categoria  = $_POST['categoria'];
    $fecha_v = $_POST['fecha_v'];
    $proveedor = $_POST['proveedor'];

    if ($nombre == "" || $detalle == "" || $precio == "" || $categoria == "" || $fecha_v == "" ||  $proveedor == "") {
        $arr_Respuestas = array('status' => false, 'mensaje' => 'error campos vacios');
    } else {
        $arrProducto = $objProducto->actualizarProducto($id_producto, $nombre, $detalle, $precio, $categoria, $fecha_v, $proveedor);
        if ($arrProducto->p_id > 0) {
            $arr_Respuestas = array('status' => true, 'mensaje' => 'actualizacion Exitoso');

            if ($_FILES['imagen']['tmp_name'] != "") {
                unlink('../asset/img_productos/' . $img);
                //cargar Archivo
                $archivo = $_FILES['imagen']['tmp_name'];
                $destino = '../asset/img_productos/';
                $tipoArchivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));
                if (move_uploaded_file($archivo, $destino . '' . $id_producto . '.' . $tipoArchivo)) {
                }
            }
        } else {
            $arr_Respuestas = array('status' => false, 'mensaje' => 'Error al actualizar Producto');
        }
    }
    echo json_encode($arr_Respuestas);
}



if ($tipo == "eliminar") {
    $id_producto = $_POST['id_producto'];
    try {
        $arr_Respuesta = $objProducto->eliminarProducto($id_producto);
        if (empty($arr_Respuesta)) {
            $response = array('status' => false, 'message' => 'Error al eliminar el producto, esta vinculado con usuario');
        } else {
            $response = array('status' => true, 'message' => 'producto eliminado correctamente.');
        }
    } catch (PDOException $e) {
        // Capturar error de clave foránea
        if ($e->getCode() == 23000) { // Código de error de MySQL para restricción de clave foránea
            $response = array('status' => false, 'message' => 'No se puede eliminar el producto porque está siendo utilizada.');
        } else {
            $response = array('status' => false, 'message' => 'Ocurrió un error inesperado: ' . $e->getMessage());
        }
    }
    echo json_encode($response);
}
