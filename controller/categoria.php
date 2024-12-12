<?php
require_once('../model/categoriaModel.php');
$tipo =$_REQUEST['tipo'];

$objCategoria = new  categoriaModel();

if ($tipo=="listar") {
     //respuesta
     $arr_Respuesta = array('status'=>false, 'contenido'=>'');
     $arr_Categorias = $objCategoria->obtener_categorias();
     if (!empty($arr_Categorias)) {
          for ($i=0; $i <count($arr_Categorias); $i++) {
               $id_categoria = $arr_Categorias[$i]->id;
               $nombre = $arr_Categorias[$i]->nombre;
               $opciones = '<a href="'.BASE_URL.'editar-categoria/'.$id_categoria.'" class="btn btn-warning">Editar<a/>
            <button onclick ="eliminarCategorias('.$id_categoria.');" class="btn btn-danger">Eliminar</button>';
               $arr_Categorias[$i]->options =  $opciones;
          }
          $arr_Respuesta['status'] = true;
          $arr_Respuesta['contenido'] = $arr_Categorias;
     }
     echo json_encode($arr_Respuesta);
}

if($tipo=="registrar"){
    if($_POST){
    
        $nombre  =$_POST['nombre'];
        $detalle  =$_POST['detalle'];
       

        if ( $nombre=="" || $detalle=="") {
            $arr_Respuestas =array ('status'=>false,'mensaje'=>'error,campos vacios');
           } else{
                $arrRCategoria =$objCategoria-> registrarCategorias($nombre,$detalle);

      if ($arrRCategoria->id>0){
               $arr_Respuestas = array('status'=>true,'mensaje'=>'Registro Exitoso');
               
               
          }else{
              $arr_Respuestas = array('status'=>false,'mensaje'=>'Error al Registrar categoria');
              }
             echo json_encode($arr_Respuestas);
           }
    }
}

if($tipo =="ver"){
     //print_r($_POST);
     $id_categoria = $_POST['id_categoria'];
     $arr_Respuesta = $objCategoria->obtener_categoria($id_categoria);
     //print_r($arr_Respuesta);
     if (empty($arr_Respuesta)){
         $response = array('status' => false, 'mensaje' => 'Error, no hay informacion');
     }else{
         $response = array('status' => true, 'mensaje' => "datos encontrados",
          'contenido' => $arr_Respuesta);
 
     }
     echo json_encode($response);
 }



 if ($tipo == "actualizar") {
    //print_r($_POST);
    //print_r($_FILES['imagen']['tmp_name']);
    $id_categoria = $_POST['id_categoria'];
    $nombre  = $_POST['nombre'];
    $detalle  = $_POST['detalle'];
  

    if ($nombre == "" || $detalle == "") {
        $arr_Respuestas = array('status' => false, 'mensaje' => 'error campos vacios');
    } else {
        $arrCategoria = $objCategoria->actualizarCategoria($id_categoria, $nombre, $detalle);
        if ($arrCategoria->p_id > 0) {
            $arr_Respuestas = array('status' => true, 'mensaje' => 'actualizacion Exitoso');

        } else {
            $arr_Respuestas = array('status' => false, 'mensaje' => 'Error al actualizar Categoria');
        }
    }
    echo json_encode($arr_Respuestas);
}   



 if ($tipo =="eliminar"){
    $id_categoria = $_POST['id_categoria'];
    $arr_Respuesta = $objCategoria->eliminarCategoria($id_categoria);
    //print_r($arr_Respuesta);
    if (empty($arr_Respuesta)){
        $response = array('status' => false);

    }else{
        $response = array('status' => true);
    }
    echo json_encode($response);
}
?>