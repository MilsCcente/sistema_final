<?php
require_once "../librerias/conexion.php";

class RegistrarComprasModel {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

  
    public function registrarCompras($id_producto, $cantidad, $precio, $fecha_compra, $id_trabajador) {
        $sql = $this->conexion->query("CALL insertCompras('{$id_producto}', '{$cantidad}', '{$precio}', '{$fecha_compra}', '{$id_trabajador}')");
        $sql = $sql->fetch_object();
        return $sql;
    }

    public function obtener_compras() {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM compras");
        
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }

        return $arrRespuesta;
    }
    public function eliminarCompra($id){
        $sql = $this->conexion->query("CALL eliminarCompras('{$id}')");
        $sql = $sql->fetch_object();
        return $sql;

      }
      public function ver_compra($id){
        $respuesta = $this->conexion->query("SELECT * FROM compras WHERE id  = '$id'");
        $objeto = $respuesta->fetch_object();
        return $objeto;
      }

      public function actualizarCompra($id, $id_producto, $cantidad, $precio, $fecha_compra, $id_trabajador){
        $sql = $this->conexion->query("CALL updateCompras('{$id}','{$id_producto}','{$cantidad}','{$precio}','{$fecha_compra}','{$id_trabajador}')");
        $sql = $sql->fetch_object();
        return $sql;
    }
}



?>
