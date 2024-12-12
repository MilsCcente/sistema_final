<?php
require_once('../model/productoModel.php');
require_once('../model/personasModel.php');
require_once ('../model/compraModel.php');

$tipo = $_REQUEST['tipo'];

$objCompra = new RegistrarComprasModel();
$objPersona = new personasModel();
$objProducto = new  ProductoModel();

if ($tipo == "listar") {
    $arr_Respuestas = array('status' => false, 'contenido' => '');
    $arr_compra = $objCompra->obtener_compras();

    if (!empty($arr_compra)) {
        // recorremos el array para agregar las opciones de la categorias
        for ($i = 0; $i < count($arr_compra); $i++) {

            $id_producto = $arr_compra[$i]->id_producto;
            $r_producto = $objProducto->obtener_product($id_producto);
            $arr_compra[$i]->producto = $r_producto;

            $id_trabajador = $arr_compra[$i]->id_trabajador; // Obtén el ID del proveedor relacionado con el producto
            $r_trabajador = $objPersona->obtener_trabajador($id_trabajador); // Obtén los datos del proveedor
            $arr_compra[$i]->trabajador = $r_trabajador; // Asocia el proveedor al producto


            $id_compra = $arr_compra[$i]->id;
            
            $opciones ='
            <a href="'. BASE_URL.'editar-producto/'.$id_compra.'" class="btn btn-warning" >Editar<a/>
            <button onclick="eliminarcompra('.$id_compra.');" class="btn btn-danger">Eliminar</button>';

            $arr_compra[$i]->options = $opciones;
        }
        $arr_Respuestas['status'] = true;
        $arr_Respuestas['contenido'] = $arr_compra;
    }

    echo json_encode($arr_Respuestas);
}

if ($tipo == "registrar") {
    if ($_POST) {
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $fecha_compra = $_POST['fecha_compra'];
        $id_trabajador = $_POST['id_trabajador'];

        if ($id_producto == "" || $cantidad == "" || $precio == "" || $fecha_compra == "" || $id_trabajador == "") {
            
            $arr_Respuestas = array('status' => false, 'mensaje' => 'Error, campos vacíos');
        } else {
            
            $arrCompra = $objCompra->registrarCompras($id_producto, $cantidad, $precio, $fecha_compra, $id_trabajador);

            if ($arrCompra->id > 0) {
                $arr_Respuestas = array('status' => true, 'mensaje' => 'Registro Exitoso');
            } else {
                $arr_Respuestas = array('status' => false, 'mensaje' => 'Error al Registrar Compra');
            }
        }
        echo json_encode($arr_Respuestas);
    }
}








if ($tipo =="eliminar"){
    $id_compra = $_POST['id_compra'];
    $arr_Respuesta = $objCompra->eliminarCompra($id_compra);
    //print_r($arr_Respuesta);
    if (empty($arr_Respuesta)){
        $response = array('status' => false);

    }else{
        $response = array('status' => true);
    }
    echo json_encode($response);
}
?>
